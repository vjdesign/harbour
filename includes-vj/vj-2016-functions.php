<?php
if ( ! function_exists( 'vj_setup' ) ) :
function vj_setup() {
  /*
	 * Let WordPress manage the document title (instead of hardcoded <title> tag in head).
	 */
	add_theme_support( 'title-tag' );

	// ENABLING SHORTCODES IN WIDGETS - https://www.smashingmagazine.com/2012/05/wordpress-shortcodes-complete-guide/
	add_filter('widget_text', 'do_shortcode');
	add_filter( 'comment_text', 'do_shortcode' );
	add_filter( 'the_excerpt', 'do_shortcode');

	// https://www.smashingmagazine.com/2012/05/wordpress-shortcodes-complete-guide/
	function googlemap_function($atts, $content = null) {
	   extract(shortcode_atts(array(
	      "width" => '640',
	      "height" => '480',
	      "src" => ''
	   ), $atts));
	   return '<iframe width="'.$width.'" height="'.$height.'" src="'.$src.'&output=embed" ></iframe>';
	}
	add_shortcode("googlemap", "googlemap_function");

  /*
	 * Switch default core markup to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

  /*
	 * Enable support for Post Formats. See: https://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat', ) );

}
endif; // vj_setup
add_action( 'after_setup_theme', 'vj_setup' );

/*
 * Registers a widget area. https://developer.wordpress.org/reference/functions/register_sidebar/
 * the <?php get_sidebar(); ?> is in index.php
 */
function vj_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'vj' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'harbor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vj_widgets_init' );

/**
 * Adds custom classes to the array of body classes.
 */
function vj_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) { $classes[] = 'custom-background-image'; }

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) { $classes[] = 'group-blog'; }

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) { $classes[] = 'no-sidebar'; }

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) { $classes[] = 'hfeed'; }

	return $classes;
}
add_filter( 'body_class', 'vj_body_classes' );

remove_action('wp_head', 'rsd_link'); // Removes the Really Simple Discovery link
remove_action('wp_head', 'wlwmanifest_link'); // Removes the Windows Live Writer link
remove_action('wp_head', 'wp_generator'); // Removes the WordPress version
remove_action('wp_head', 'start_post_rel_link'); // Removes the random post link
remove_action('wp_head', 'index_rel_link'); // Removes the index page link
remove_action('wp_head', 'adjacent_posts_rel_link'); // Removes the next and previous post links
