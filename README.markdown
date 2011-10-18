li3_assetings (0.1)
===========

li3_assetings is a Lithium helper that allows you to easilly configure the required css and script files for your app, controller, action.

More Information
----------------
I like yaml. I really do. And I hate my templates (or my views, or my controllers) to get crippled with verbose-mode helpers, setting files, options ... etc...etc...
If you feel like the following snippet is not for you

``` php
$css = new AssetCollection(array(
    new FileAsset('/path/to/src/styles.less', array(new LessFilter())),
    new GlobAsset('/path/to/css/*'),
), array(
    new Yui\CssCompressorFilter('/path/to/yuicompressor.jar'),
));

// this will echo CSS compiled by LESS and compressed by YUI
echo $css->dump();
```
and you're more into something like
``` php
<?= $this->assets->loadConfFiles(); ?>
```
then you've come to the right place.
li3_assetings takes advantage of the yaml file format. More about this at http://yaml.org/ and the complete spec at http://www.yaml.org/spec/1.2/spec.html

Dependencies
----------------

To use this application, you will need:

* Lithium, a php 5.3 only framework built for speed, simplicity, and maintainability	[http://dev.lithify.me/](http://dev.lithify.me/ "http://dev.lithify.me/")
* SfYAML, A PHP library that speaks YAML [http://components.symfony-project.org/yaml/](http://components.symfony-project.org/yaml/ "http://components.symfony-project.org/yaml/")

And that's it !

Installing/configuring the helper
----------------

First, load the configuration file in your li3 bootstrap file like this :

``` php
/**
 * This file sets default path to yml assets configuration files
 */
require __DIR__ . '/assets.php';
```

You've just declared your li3 application to load a file, so create it !
It must contain the path to your yml configuration files like this:

``` php
/**
 * This is the path to assets yml configuration files
 */
define('ASSETS_CONF_PATH', dirname(LITHIUM_APP_PATH) . '/app/config/assets');
```

You can put your yml files where it suits best your needs.
In the previously declared ASSETS_CONF_PATH, you need at least 1 configuration file, named application.yml.

The yml files need one top-level key, defining the assets type : javascript or css
Here's an example:

``` yml
javascripts:
  - libs/jquery.1.6.2
  - libs/modernizr-2.0.6
css:
  - bootstrap.css

```
Your application yml is the global conf file, so basically whatever you declare in it will be set everywhere.
For now, each time the helper is called, it uses li3's 

Accessing the helper
----------------

This is where it gets really **easy and straightforward**
Just insert the following snippet wher you want your 
``` html 
<script type="text/javascript">
```
tags to be inserted
``` php
<?= $this->assets->loadConfFiles(); ?>
```	

Based on cool projects like:
----------------

* Kris Wallsmith and his brilliant "Assetic framework": [https://github.com/kriswallsmith/assetic](https://github.com/kriswallsmith/assetic "https://github.com/kriswallsmith/assetic")
* "BundleFu": [https://github.com/dotsunited/BundleFu](https://github.com/dotsunited/BundleFu "https://github.com/dotsunited/BundleFu")

Release notes
----------------
* v 0.1
	* Basic loading and generating of html script tags **ONLY**

Future releases notes
----------------
I have plenty of stuff to offer, like:
* css handling
* assets bundling for better performances
* configuration handling in the yaml application.yml file

If there are some features you would like li3_assetings to handle, send me a mail or make a pull-request (see "Contributing" below)

Contributing
----------------

If you make improvements to this application, please share with others.
* Fork the project on GitHub.
* Make your feature addition or bug fix.
* Commit with Git.
* Send the author a pull request.

If you add functionality to this application, create an alternative implementation, or build an application that is similar, please contact me and I'll add a note to the README so that others can find your work.

Credits
----------------


License
----------------
