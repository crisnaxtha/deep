<?php
/**
 * DEEP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DEEP
 */

if ( ! function_exists( 'deepmala_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function deepmala_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DEEP, use a find and replace
		 * to change 'deepmala' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'deepmala', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-header' => esc_html__( 'Primary', 'deepmala' ),
			'menu-footer-1' => esc_html__( 'First Footer', 'deepmala' ),
			'menu-footer-2' => esc_html__( 'Second Footer', 'deepmala' ),
			'menu-footer-3' => esc_html__( 'Third Footer', 'deepmala' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'deepmala_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'deepmala_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deepmala_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'deepmala_content_width', 800 );
}
add_action( 'after_setup_theme', 'deepmala_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function deepmala_scripts() {
	wp_enqueue_style( 'deepmala-style', get_stylesheet_uri() );
	//custom-style
	wp_enqueue_style('deepmala-bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css');
	wp_enqueue_style('deepmala-custom-style', get_template_directory_uri(). '/assets/css/style.css');
	wp_enqueue_style('deepmala-font-awesome-all', get_template_directory_uri(). '/assets/css/fontawesome-all.min.css');
	wp_enqueue_style('deepmala-magnific-popup', get_template_directory_uri(). '/assets/css/magnific-popup.css');


	wp_enqueue_script( 'deepmala-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'deepmala-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//custom-script
	wp_enqueue_script('deepmala-jquery', get_template_directory_uri(). '/assets/js/jquery.min.js', array(), '1', true );
	wp_enqueue_script('deepmala-lozad', get_template_directory_uri(). '/assets/js/lozad.min.js', array(), '1', true );
	wp_enqueue_script('deepmala-bootstrap-bundle', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', array(), '1', true );
	wp_enqueue_script('deepmala-aos', get_template_directory_uri(). '/assets/js/aos.js', array(), '1', true );
	wp_enqueue_script('deepmala-slick', get_template_directory_uri(). '/assets/js/slick.min.js', array(), '1', true );
	wp_enqueue_script('deepmala-jquery-magnific-popup', get_template_directory_uri(). '/assets/js/jquery.magnific-popup.min.js', array(), '1', true );
	wp_enqueue_script('deepmala-jquery-countdown', get_template_directory_uri(). '/assets/js/jquery.countdown.js', array(), '1', true );
	wp_enqueue_script('deepmala-jquery-count-to', get_template_directory_uri(). '/assets/js/jquery.countTo.js', array(), '1', true );
	wp_enqueue_script('deepmala-global', get_template_directory_uri(). '/assets/js/global.js', array(), '1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'deepmala_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/************************ Deepmala Sidebar/ Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/most-read-widget.php';
require get_template_directory() . '/inc/widgets/widgets-functions/slider-widget.php';
require get_template_directory() . '/inc/widgets/widgets-functions/category-box-widget.php';

// ************************* Deepmala Theme Setting ************************************

require get_template_directory() . '/inc/deep-function/setting.php';
