# WP Resources Loader
Helper class to make loading resources (CSS/JS) in WordPress Easier

# Usage
```php
define("THEME_URI", get_template_directory_uri()."/");
define("THEME_DIR", get_template_directory()."/" );
$loader = new Loader(THEME_URI, THEME_DIR);
$loader->load_css("css/reset.css", "css-reset");
$loader->enqueue_js("jquery");
$loader->load_js("js/jquery.dcverticalmegamenu.1.0.js", "js-dcverticalmegamenu")
```