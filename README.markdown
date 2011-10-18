li3_assetings (0.1)
===========

li3_assetings is a Lithium helper that allows you to easilly configure the required css and script files for your app, controller, action.

More Information
----------------

li3_assetings takes advantage of the yaml formatting standard. More about this at http://yaml.org/ and the complete spec at http://www.yaml.org/spec/1.2/spec.html
I started this because I feel really comfortable with assets declaration in configuration files, clearly separated from my views or controllers.

Dependencies
----------------

To use this application, you will need:

* Lithium, a php 5.3 only framework built for speed, simplicity, and maintainability	[http://dev.lithify.me/](http://dev.lithify.me/ "http://dev.lithify.me/")
* SfYAML, A PHP library that speaks YAML [http://components.symfony-project.org/yaml/](http://components.symfony-project.org/yaml/ "http://components.symfony-project.org/yaml/")

And that's it !

Installing the helper
----------------

First, load the configuration file in your li3 bootstrap file like this :

```php
/**
 * This file sets default path to yml assets configuration files
 */
require __DIR__ . '/assets.php';
```

You've just declared your li3 application to load a file, so create it !
It must contain the path to your yml configuration files like this:

```php
/**
 * This is the path to assets yml configuration files
 */
define('ASSETS_CONF_PATH', dirname(LITHIUM_APP_PATH) . '/app/config/assets');
```

You can put your yml files where it suits best your needs.
In the previously declared ASSETS_CONF_PATH, you need at least 1 configuration file, named application.yml.

The yml files need one top-level key, defining the assets type : javascript or css
Here's an example:

````yml
javascripts:
  - libs/jquery.1.6.2
  - libs/modernizr-2.0.6
css:
  - bootstrap.css

```
Your application yml is the global conf file, so basically whatever you declare in it will be set everywhere.


Accessing the helper
----------------

This is where it gets really **easy and straightforward**
Just insert the following snippet wher you want your 
```html<script type="text/javascript">```
tags to be inserted
```php<?= $this->assets->loadConfFiles(); ?>```	

Similar (and more advanced) Projects
----------------

* Kris Wallsmith and his brilliant "Assetic framework":https://github.com/kriswallsmith/assetic
* "BundleFu":https://github.com/dotsunited/BundleFu

Release notes
----------------
* v 0.1
	* Basic loading and generating of html script tags **ONLY**

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
