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
 * Do widget-ey stuff
 */
function kitpress_widgets_init() {
	register_sidebar(array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'kitpress_widgets_init' );

/**
 * Clean up generated default page menu. We only want <li>s, nothing more, but
 * wp_page_menu doesn't support any custom wrapping stuff. So instead we just
 * let it do its thing and then regex out the expected surrounding markup.
 */
function kitpress_page_menu_cleanup ($html) {
	return preg_replace('/\<div\>\<ul\>(.*?)\<\/ul\>\<\/div\>/ms','$1', $html);
}
add_filter('wp_page_menu', 'kitpress_page_menu_cleanup');

/**
 * Generate pagination markup. Just a fancy wrapper for paginate_links.
 */
function kitpress_pagination () {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	return paginate_links(array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'list'
	));
}

/**
 * Wrap image tags in a link for the featherlight modal
 */
function kitpress_filter_images($content){
return preg_replace(
		'/<img (.*?) src="(.*)\.(.*?)" (.*?) \/>/i',
		'<a href="$2.$3" data-featherlight><img src="$2.$3" $1 $4" /></a>',
		$content
	);
}
add_filter('the_content', 'kitpress_filter_images');