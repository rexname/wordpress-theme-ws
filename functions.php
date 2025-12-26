<?php
/**
 * Modern Broadsheet functions and definitions
 */

if ( ! function_exists( 'modern_broadsheet_setup' ) ) :
    function modern_broadsheet_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'modern-broadsheet' ),
        ) );

        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'modern_broadsheet_setup' );

/**
 * Enqueue scripts and styles.
 */
function modern_broadsheet_scripts() {
    wp_enqueue_style( 'modern-broadsheet-style', get_stylesheet_uri(), array(), time() );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=UnifrakturMaguntia&family=Bokor&display=swap', array(), null );

    // Enqueue Header Scroll Script
    wp_enqueue_script( 'modern-broadsheet-header', get_template_directory_uri() . '/js/header-scroll.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'modern_broadsheet_scripts' );
