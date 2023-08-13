<?php

/**
 * Contains all the shortcodes
 * 
 */


if ( ! function_exists('consyltio_current_year_shortcode') ) {
	/**
	 * Get the current year.
	 *
	 * @return string
	 */
	function consyltio_current_year_shortcode() {
		return date( "Y" );
	}
}
add_shortcode( 'consyltio_current_year', 'consyltio_current_year_shortcode' );

