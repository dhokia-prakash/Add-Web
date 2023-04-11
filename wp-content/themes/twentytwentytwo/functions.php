<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	wp_enqueue_script('ajax', get_theme_file_uri() . '/assets/js/sorting.js', array('jquery'), NULL, true);
    
    wp_localize_script('ajax' , 'wp_ajax',
        array('ajax_url' => admin_url('admin-ajax.php'))
        );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';


add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {

	$args = array(
		'post_type' => 'resource',
		
	    );
	
	if( isset($_POST['type']) ){

		$args['tax_query'][] = array(
                'taxonomy' => 'resource_type',
                'field' => 'id',
                'terms' => $_POST['type']
        	);
	}
	if( isset($_POST['topic']) ){

		$args['tax_query'][] = array(
                'taxonomy' => 'resource_topic',
                'field' => 'id',
                'terms' => $_POST['topic']
        	);
	}
	
        $query = new WP_Query($args);

        if($query->have_posts()) :
            while($query->have_posts()) : $query->the_post();
		echo '<h2>'.the_title().'</h2>';
		echo '<p>'.the_content().'</p>';               
            endwhile;
        endif;
        wp_reset_postdata(); 


    die();
}


