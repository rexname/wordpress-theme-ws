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
    wp_enqueue_style( 'modern-broadsheet-style', get_stylesheet_uri() );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=UnifrakturMaguntia&display=swap', array(), null );

    // Inline Sticky Header Script
    wp_add_inline_script('modern-broadsheet-style', "
        window.addEventListener('scroll', function() {
            const headerWrapper = document.querySelector('.header-top-wrapper');
            const siteBranding = document.querySelector('.site-branding');
            
            if (headerWrapper && siteBranding) {
                // Gunakan bounding client rect untuk deteksi posisi yang lebih akurat
                const rect = siteBranding.getBoundingClientRect();
                
                // Jika bagian bawah logo utama sudah melewati batas atas layar (0)
                if (rect.bottom < 0) {
                    headerWrapper.classList.add('is-scrolled');
                } else {
                    headerWrapper.classList.remove('is-scrolled');
                }
            }
        });
    ", 'after');
}
add_action( 'wp_enqueue_scripts', 'modern_broadsheet_scripts' );
