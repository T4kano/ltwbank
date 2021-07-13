<?php
/*
 Plugin Name:       SqueezeWP 3
 Plugin URI:        https://squeezewp.com
 Description:       Plugin Wordpress para a criação de Páginas de captura Fantásticas (Versão 3)
 Version:           3.0.8
 Author:            Jair Rebello
 Author URI:        http://jairrebello.com
 Text Domain:       squeezewp
*/
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
} // end if

require_once(plugin_dir_path(__FILE__) . 'class-squeeze-page.php');
require_once(plugin_dir_path(__FILE__) . 'inc/squeeze-wp-funcoes.php');
require_once(plugin_dir_path(__FILE__) . 'inc/metabox.php');
require_once(plugin_dir_path(__FILE__) . 'inc/duplicate/duplicate-post.php');
require_once(plugin_dir_path(__FILE__) . 'inc/option.php');

register_activation_hook(__FILE__, array('SqueezeWP', 'db_install'));

require ('plugin_update_check.php');
$MyUpdateChecker = new PluginUpdateChecker_2_0 (
   'https://kernl.us/api/v1/updates/5862c0b477221918b79d3222/',
   __FILE__,
   'squeezewp',
   1
);

register_activation_hook(__FILE__, 'my_activation');

function my_activation() {
    if (! wp_next_scheduled ( 'my_hourly_event' )) {
  wp_schedule_event(time(), 'hourly', 'my_hourly_event');
    }
}

add_action('my_hourly_event', 'do_this_hourly');

function do_this_hourly() {
  verificaLicenca(get_option('key_squeeze_wp'));
}

add_action('admin_init', 'admin_load_scripts');

add_action('admin_footer', 'admin_footer_load');

function admin_footer_load(){
    $js_file = plugins_url('js/functions.js', __FILE__);
    wp_enqueue_script('functions', $js_file, array('jquery'));
}

function admin_load_scripts() {
    $css_file = plugins_url('css/css-admin.css', __FILE__);
    $datetime = plugins_url('js/jquery.datetimepicker.js', __FILE__);
    //$bootstrap = plugins_url( 'bootstrap/css/bootstrap.min.css', __FILE__ );
    //$theme_bootstrap = plugins_url( 'bootstrap/bootstrap-theme.min.css', __FILE__ );
    wp_enqueue_script('datetime', $datetime, array('jquery'));
    wp_enqueue_style('css_admin', $css_file);
    //wp_enqueue_style('bootstrap', $bootstrap); 
    //wp_enqueue_style('theme_bootstrap', $theme_bootstrap);
}



include_once(plugin_dir_path(__FILE__) . 'acf/acf.php');
include_once(plugin_dir_path(__FILE__) . 'acf-fields.php');
add_filter('acf/settings/show_admin', '__return_false');


add_action('plugins_loaded', array('SqueezeWP', 'get_instance'));
