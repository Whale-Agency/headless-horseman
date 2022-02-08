<?php
/**
 * headless-horseman functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package headless-horseman
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '0.0.129' );
}

if ( ! function_exists( 'headless_horseman_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function headless_horseman_setup() {
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		//Register nav menu locations
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'headless-horseman' ),
			)
		);

		/*
		 * Switch default core markup to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'headless_horseman_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function headless_horseman_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'headless-horseman' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'headless-horseman' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'headless_horseman_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function headless_horseman_scripts() {
	wp_enqueue_style( 'headless-horseman-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'headless_horseman_scripts' );

/**
 * Load required and recommended plugins
 */
require get_template_directory() . '/config/tgm/init.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer
 */
require get_template_directory() . '/inc/customizer/customizer.php';

