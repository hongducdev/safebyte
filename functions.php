<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Case-Themes
 * @since Safebyte 1.0
 */

if(!defined('DEV_MODE')){ define('DEV_MODE', true); }

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
 
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
/**
 * Theme Require
*/
safebyte()->require_folder('inc');
safebyte()->require_folder('inc/classes');
safebyte()->require_folder('inc/theme-options');
safebyte()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    safebyte()->require_folder('woocommerce');
}