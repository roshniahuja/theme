<?php
/**
 * Theme Functions.
 *
 * @package rosh-standard
 */

if ( ! defined( 'rosh_standard_THEME_VERSION' ) ) {
	define( 'rosh_standard_THEME_VERSION', '1.0' );
}

if ( ! defined( 'rosh_standard_THEME_PATH' ) ) {
	define( 'rosh_standard_THEME_PATH', __DIR__ );
}

if ( ! defined( 'rosh_standard_THEME_URL' ) ) {
	define( 'rosh_standard_THEME_URL', get_template_directory_uri() );
}

if ( ! defined( 'rosh_standard_BUILD_URI' ) ) {
	define( 'rosh_standard_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'rosh_standard_BUILD_PATH' ) ) {
	define( 'rosh_standard_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'rosh_standard_BUILD_CSS_URI' ) ) {
	define( 'rosh_standard_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'rosh_standard_BUILD_CSS_DIR_PATH' ) ) {
	define( 'rosh_standard_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

if ( ! defined( 'rosh_standard_BUILD_JS_URI' ) ) {
	define( 'rosh_standard_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'rosh_standard_BUILD_JS_DIR_PATH' ) ) {
	define( 'rosh_standard_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

/**
 * Load up the class autoloader.
 */
require_once rosh_standard_THEME_PATH . '/inc/helpers/autoloader.php';

/**
 * Theme Init
 *
 * Sets up the theme.
 *
 * @return void
 * @since 1.0.0
 */
function rosh_standard_get_theme_instance() {
	\rosh_standard\Inc\rosh_standard::get_instance();
}

rosh_standard_get_theme_instance();
