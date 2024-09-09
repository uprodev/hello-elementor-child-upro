<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {


    $js_directory = get_stylesheet_directory() . '/js';
    $css_directory = get_stylesheet_directory() . '/css';
    $js_url = get_stylesheet_directory_uri() . '/js';
    $css_url = get_stylesheet_directory_uri() . '/css';


    if (is_dir($js_directory)) {
        foreach (glob($js_directory . '/*.js') as $file) {
            $file_name = basename($file);
            wp_enqueue_script($file_name, $js_url . '/' . $file_name, array(), null, true);
        }
    }


    if (is_dir($css_directory)) {
        foreach (glob($css_directory . '/*.css') as $file) {
            $file_name = basename($file);
            wp_enqueue_style($file_name, $css_url . '/' . $file_name);
        }
    }



	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );
