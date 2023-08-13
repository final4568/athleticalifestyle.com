<?php
/**
 * Theme functions and definitions
 *
 * @package CONSYLTIO_THEME
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined('CONSYLTIO_THEME_VERSION') ) {
	define( 'CONSYLTIO_THEME_VERSION', '1.0.0.1' );
}
if ( ! defined('CONSYLTIO_TEXTDOMAIN') ) {
	define( 'CONSYLTIO_TEXTDOMAIN', 'consyltio' );
}

if ( ! defined('CONSYLTIO_THEME_URI') ) {
	define( 'CONSYLTIO_THEME_URI', get_stylesheet_directory_uri() );
}

if ( ! defined('CONSYLTIO_THEME_DIR') ) {
	define( 'CONSYLTIO_THEME_DIR', get_stylesheet_directory() );
}

if ( ! defined('CONSYLTIO_THEME_INC_DIR') ) {
	define( 'CONSYLTIO_THEME_INC_DIR', CONSYLTIO_THEME_DIR . '/includes' );
}


// General functions
require_once CONSYLTIO_THEME_INC_DIR . '/general-functions.php';

// Theme setup and script/style enqueue
require_once CONSYLTIO_THEME_INC_DIR . '/theme.php';

// WP actions/filters
require_once CONSYLTIO_THEME_INC_DIR . '/wp-hooks.php';

// Functions/Hooks related to ACF
require_once CONSYLTIO_THEME_INC_DIR . '/acf.php';

// AJAX functions
require_once CONSYLTIO_THEME_INC_DIR . '/ajax.php';

// Gravity Forms Hooks
require_once CONSYLTIO_THEME_INC_DIR . '/gform.php';

// Contains all the shortcodes
require_once CONSYLTIO_THEME_INC_DIR . '/shortcodes.php';
