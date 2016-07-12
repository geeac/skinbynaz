<?php
//* The custom portfolio post type archive template


//* Add the portfolio blurb section
add_action( 'genesis_before_content', 'swank_portfolioblurb_before_content' );
function swank_portfolioblurb_before_content() {

	genesis_widget_area( 'portfolioblurb', array(
	'before' => '<div class="portfolioblurb">',
	) );

}

//* Add the featured image after post title
add_action( 'genesis_entry_header', 'swank_portfolio_grid' );
function swank_portfolio_grid() {

	if ( has_post_thumbnail() ){
		echo '<div class="portfolio-featured-image">';
		echo '<a href="' . get_permalink() .'" title="' . the_title_attribute( 'echo=0' ) . '">';
		echo get_the_post_thumbnail($thumbnail->ID, 'portfolio-featured');
		echo '</a>';
		echo '</div>';
	}

}

//* Remove the ad widget
remove_action( 'genesis_before_loop', 'adspace_before_loop' );

//* Remove author box
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//* Remove the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Remove the post content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

//* Remove the footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

genesis();
