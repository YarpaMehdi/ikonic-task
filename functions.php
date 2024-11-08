<?php

require get_template_directory() . '/include/custom-post.php';
require get_template_directory() . '/include/custom-api-endpoint.php';



/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('ikonic_theme_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 */
	function ikonic_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ikonic_theme, use a find and replace
		 * to change 'ikonictheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('ikonictheme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support(feature: 'title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_theme_support('custom-header');
		set_post_thumbnail_size(1568, 9999);

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'ikonictheme'),
				'footer' => esc_html__('Secondary menu', 'ikonictheme'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height' => $logo_height,
				'width' => $logo_width,
				'flex-width' => true,
				'flex-height' => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);
	}
}
add_action('after_setup_theme', 'ikonic_theme_setup');




/**
 * Enqueue scripts and styles.
 *
 * @since ikonic_theme 1.0
 *
 * @return void
 */
function ikonic_theme_scripts()
{
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ($is_IE) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style('ikonic_theme-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
	}


	// Theme block stylesheet.
	wp_enqueue_style('ikonic-default', get_template_directory_uri() . '/assets/css/default.css');
	// Enqueue JavaScript files
	wp_enqueue_script('script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
	wp_enqueue_script('xjquery-js', get_template_directory_uri() . '/assets/js/xJquery.js', array('jquery'), null, true);
	// Theme stylesheet.
	wp_enqueue_style('ikonic-style', get_stylesheet_uri());

	// Threaded comment reply styles.
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ikonic_theme_scripts');



/*Seach Filter*/

function ikonic_search_by_title_only( $query ) {
    // Check if this is a search query and it's the main query
    if ( $query->is_search() && $query->is_main_query() ) {
        // Limit search to titles only
        $query->set( 'search_title', true );

        // Modify the SQL query to match only the post title
        add_filter( 'posts_search', function( $search, $wp_query ) {
            global $wpdb;

            // Check if we are only targeting the title and there is a search term
            if ( ! empty( $wp_query->query_vars['s'] ) && $wp_query->query_vars['search_title'] ) {
                $search = $wpdb->prepare( " AND {$wpdb->posts}.post_title LIKE %s ", '%' . $wpdb->esc_like( $wp_query->query_vars['s'] ) . '%' );
            }
            
            return $search;
        }, 10, 2 );
    }
}
add_action( 'pre_get_posts', 'ikonic_search_by_title_only' );



