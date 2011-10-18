<?php

/**
 * Description of Assets
 *
 * @author Romain Simiand <contact@pixelboy.fr>
 */

namespace app\extensions\helper;

use sfyaml\sfYaml;
use lithium\storage\Session;
use \lithium\core\Libraries;
use \lithium\net\http\Media;

class Assets extends \lithium\template\Helper {

    private $files;
    private $conf;
    private $assets;
    private $baseJs;
    private $baseCss;

    public function _init() {

        parent::_init();

        $this->request = $this->_context ? $this->_context->request() : null;
        
    }
    
    public function jsInserts($arr)
    {
        $html = '';
        
        foreach($arr as $val){
            $html .= '<script type="text/javascript" src="/js/'. $val .'.js"></script>'."\n";
        }
        
        return $html;
    }
    
    /*
     * 
     * Remove duplicate values in assets list
     * And init proper method to insert js or css files
     * 
     */

    public function dispatchAssets() {
        foreach($this->assets as $key => $val){
            
            // Sanitize array to remove duplicate values
            $tempAssets = array_unique($val);
            
            if('javascripts' === $key){
                return $this->jsInserts($tempAssets);   
            }
            elseif('css' === $key){
                return $this->cssInserts($tempAssets);   
            }
            else{
                return false;
            }
        }
    }

    /*
     * 
     * Create list of assets to be loaded by fetching each and every file relative to $this->request->params
     * 
     */

    public function loadConfFiles($params = array()) {
        // Build path live
        $params = $this->request->params;
        
        $path = ASSETS_CONF_PATH;
        $assets = sfYaml::load($path . '/application.yml');

        foreach ($params as $i => $val) {
            $path .= (is_dir($path . '/' . $val)) ? '/' . $val : '';
            $file = $path . '/' . $val . '.yml';
            if (file_exists($file)) {
                $assets = array_merge_recursive($assets, sfYaml::load($file));
            }
        }
        $this->assets = $assets;
        return $this->dispatchAssets();
    }

}