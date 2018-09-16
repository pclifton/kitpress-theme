<?php

/**
 * Setup stuff
 */
function kitpress_setup () {

}
add_action( 'after_setup_theme', 'kitpress_setup' );

/**
 * Enqueue scripts and styles
 */
function kitpress_scripts () {
	// Theme stylesheet
	wp_enqueue_style('kitpress-style', get_stylesheet_uri());
	wp_enqueue_script('kitpress-js', get_theme_file_uri('app.js'), array(), null, true);
}
add_action('wp_enqueue_scripts', 'kitpress_scripts');

/**
 * Clean up generated default page menu. We only want <li>s, nothing more, but
 * wp_page_menu doesn't support any custom wrapping stuff. So instead we just
 * let it do its thing and then regex out the expected surrounding markup.
 */
function kitpress_page_menu_cleanup ($html) {
	return preg_replace('/\<div\>\<ul\>(.*?)\<\/ul\>\<\/div\>/ms','$1', $html);
}
add_filter('wp_page_menu', 'kitpress_page_menu_cleanup');