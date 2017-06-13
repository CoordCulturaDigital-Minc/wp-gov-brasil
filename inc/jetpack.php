<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package wp-gov-brasil
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function wp_gov_brasil_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'wp_gov_brasil_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function wp_gov_brasil_jetpack_setup
add_action( 'after_setup_theme', 'wp_gov_brasil_jetpack_setup' );

function wp_gov_brasil_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function wp_gov_brasil_infinite_scroll_render