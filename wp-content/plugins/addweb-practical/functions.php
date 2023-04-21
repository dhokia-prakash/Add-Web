<?php

/*
 * Plugin Name: Custom Post Type
 * Description: Custom Post Type name is Resource with taxonomy.
 * Author: Add Web Team
 * Version: 1.0
 * Author URI:http://localhost/wordpress
 * Text Domain: add-web
 * Domain Path: /includes/languages
*/
if (! defined('ABSPATH')) {
    die();
}

if (!defined('CUSTOM_POST_FOLDER')) {
    define('CUSTOM_POST_FOLDER', 'custom-post');
}
if (!defined('POST_ROOT_DIR')) {
    define('POST_ROOT_DIR', plugin_dir_path(__FILE__));
}
if (!defined('POST_ROOT_PATH')) {
    define('POST_ROOT_PATH', plugin_dir_url(__FILE__));
}

require_once(POST_ROOT_DIR.'/includes/classes/class-custom-post.php');
$custom_post = new CUSTOM_POST();
