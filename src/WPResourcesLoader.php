<?php

namespace WPResourcesLoader;

class WPResourcesLoader {
  private $theme_uri;
  private $theme_dir;
  function __construct($theme_uri, $theme_dir) {
    $this->theme_uri = $theme_uri;
    $this->theme_dir = $theme_dir;
  }
  public function load_css($file_path, $name, $version = "1.0") {
    $that = $this;
    add_action('wp_enqueue_scripts', function() use($that, $file_path, $name, $version) {
      wp_register_style($name, $that->theme_uri.$file_path, null, filemtime( $that->theme_dir . $file_path ), 'screen' );
      wp_enqueue_style( $name );
    });
  }
  public function load_css_external($url, $name, $version = "1.0") {
    $that = $this;
    add_action('wp_enqueue_scripts', function() use($that, $url, $name, $version) {
      wp_register_style($name, $url, null, null, 'screen' );
      wp_enqueue_style( $name );
    });
  }
  public function load_js($file_path, $name, $version = "1.0", $in_footer = false) {
    $that = $this;
    add_action('wp_enqueue_scripts', function() use($that, $file_path, $name, $version, $in_footer) {
      wp_register_script( $name, $that->theme_uri.$file_path, null, filemtime( $that->theme_dir . $file_path ), $in_footer);
      wp_enqueue_script( $name );
    });
  }
  public function load_js_external($url, $name, $version = "1.0", $in_footer = false) {
    $that = $this;
    add_action('wp_enqueue_scripts', function() use($that, $url, $name, $version, $in_footer) {
      wp_register_script( $name, $url, null, $version, $in_footer);
      wp_enqueue_script( $name );
    });
  }
  public function enqueue_js($name) {
    add_action('wp_enqueue_scripts', function() use($name) {
      wp_enqueue_script( $name );
    });
  }
  public function localize_js($handle, $namespace, $variable) {
    add_action('wp_enqueue_scripts', function() use($handle, $namespace, $variable) {
      wp_localize_script( $handle, $namespace, $variable );
    });
  }
}