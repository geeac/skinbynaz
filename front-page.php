<?php
/**
 * This file adds the Home Page to the Swank Theme.
 */

add_action( 'genesis_meta', 'swank_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function swank_home_genesis_meta() {

	if ( is_active_sidebar( 'home-slider' ) || is_active_sidebar( 'featured-circles' ) || is_active_sidebar( 'home-featured-area' )) {

		//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add homepage widgets
		add_action( 'genesis_loop', 'swank_homepage_widgets' );

	}
}

//* Add markup for homepage widgets
function swank_homepage_widgets() {

	genesis_widget_area( 'home-slider', array(
		'before' => '<div class="home-slider widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'featured-circles', array(
		'before' => '<div class="featured-circles widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	genesis_widget_area( 'home-featured-area', array(
		'before' => '<div class="home-featured-area widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

genesis();
