<?php

// * Enqueue Backstretch

add_action('wp_enqueue_scripts', 'enqueue_backstretch');

function enqueue_backstretch()
{
	wp_enqueue_script('backstretch', get_stylesheet_directory_uri() . '/js/backstretch.js', array(
		'jquery'
	) , '1.0.0');

	// Services Pages background images fade.

	if (is_front_page() || is_home())
	{

		// check if the repeater field has rows of data

		if (have_rows('homepage_backgrounds')):

			// create an empty array

			$hpimages = array();

			// loop through the rows of data

			while (have_rows('homepage_backgrounds')):
				the_row();
			  $hpimage = get_sub_field('imageshp');
			  $hpimages[] = $hpimage['url'];
			endwhile;
		else:

			// Default Background

		endif;
    // enqueue js settings file
		wp_enqueue_script('backstretch-set-hp', get_stylesheet_directory_uri() . '/js/backstretch-set-hp.js', array('jquery','backstretch') , '1.0.0');
    // pass data to backstretch settings
		wp_localize_script('backstretch-set-hp', 'BackStretchImgHP', $hpimages);
	}
}
