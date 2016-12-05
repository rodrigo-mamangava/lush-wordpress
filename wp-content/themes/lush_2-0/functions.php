<?php

/**
 * lush_2.0 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lush_2.0
 */
if (!function_exists('lush_2_0_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function lush_2_0_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on lush_2.0, use a find and replace
         * to change 'lush_2-0' to the name of your theme in all the template files.
         */
        load_theme_textdomain('lush_2-0', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'lush_2-0'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('lush_2_0_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif;
add_action('after_setup_theme', 'lush_2_0_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lush_2_0_content_width() {
    $GLOBALS['content_width'] = apply_filters('lush_2_0_content_width', 640);
}

add_action('after_setup_theme', 'lush_2_0_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lush_2_0_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'lush_2-0'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'lush_2-0'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'lush_2_0_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function lush_2_0_scripts() {
    
    //css
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    wp_enqueue_style('fatNav-css', get_template_directory_uri().'/bower_components/jquery-fatNav/dist/jquery.fatNav.min.css');
    wp_enqueue_style('cloud-typography-css', '//cloud.typography.com/6062032/6854972/css/fonts.css');
    wp_enqueue_style('lush_2-0-style', get_stylesheet_uri());
    
    
    //js
     
    wp_enqueue_script('cloud-typography-js', '//fast.fonts.net/jsapi/6537c185-c64d-42aa-8693-55767d8abcf7.js', '', true);
    
    wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '', true);
    
    wp_enqueue_script('fatNav-js', get_template_directory_uri() . '/bower_components/jquery-fatNav/dist/jquery.fatNav.min.js', array('jquery'), '', true);

    wp_enqueue_script('lush_2-0-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true);
    wp_enqueue_script('lush_2-0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true);
    
    wp_enqueue_script('fatNav-main', get_template_directory_uri() . '/js/fatNav.js', array('jquery', 'fatNav-js'), '', true);
    
    //wp_enqueue_script('scroll', get_template_directory_uri() . '/js/scroll.js', array('jquery'), '', true);
    
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '', true);
    
    //

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'lush_2_0_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load functions MMGV
 */
require get_template_directory() . '/functions-mmgv/functions-mmgv.php';
require get_template_directory() . '/functions-mmgv/functions-woocommerce.php';
require get_template_directory() . '/functions-mmgv/functions-layout.php';
require get_template_directory() . '/functions-mmgv/functions-admin.php';
