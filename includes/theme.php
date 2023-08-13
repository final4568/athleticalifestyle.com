<?php

/**
 * Theme setup, support and script/style enqueue
 * 
 */

if ( ! function_exists( 'consyltio_scripts_styles' ) ) {
	
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function consyltio_scripts_styles() {

		// dequeue some scripts loaded by 'hello-brigade'
		wp_dequeue_script( 'jquery-match-height-js' );
		wp_dequeue_script( 'hello-brigade-main-js' );

		wp_enqueue_style(
			'consyltio',
			CONSYLTIO_THEME_URI . '/style.css',
			[],
			CONSYLTIO_THEME_VERSION
		);

		// wp_enqueue_style(
		// 	'consyltio-google-fonts',
		// 	'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap',
		// 	[],
		// 	NULL
		// );
	
		wp_enqueue_style(
			'consyltio-main',
			CONSYLTIO_THEME_URI . '/assets/css/main.css',
			[],
			CONSYLTIO_THEME_VERSION
		);
				
		// jQuery iScroll
		wp_enqueue_script(
			'consyltio-main',
			CONSYLTIO_THEME_URI . '/assets/js/main.js',
			array( 'jquery' ),
			CONSYLTIO_THEME_VERSION,
			true
		);

	}
}
add_action( 'wp_enqueue_scripts', 'consyltio_scripts_styles', 200 );


/**
 * Register sidebars
 * 
 */
if ( ! function_exists( 'consyltio_widgets_init' ) ) {
	function consyltio_widgets_init() {
		
		// this is just a boilerplate
		/*register_sidebar( array(
			'name'          => __( 'Sidebar Name', 'consyltio' ),
			'id'            => 'sidebar-id',
			'description'   => __( 'Some description', 'consyltio' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="heading">',
			'after_title'   => '</h2>',
		) );*/
	}
}
//add_action( 'widgets_init', 'consyltio_widgets_init' );
