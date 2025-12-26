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
    $theme_ver = filemtime( get_stylesheet_directory() . '/style.css' );
    wp_enqueue_style( 'modern-broadsheet-style', get_stylesheet_uri(), array(), $theme_ver );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=UnifrakturMaguntia&family=Bokor&display=swap', array(), null );

    // Enqueue Header Scroll Script with defer
    wp_enqueue_script( 'modern-broadsheet-header', get_template_directory_uri() . '/js/header-scroll.js', array(), null, true );
    
    // Bookmark Modal Script
    wp_add_inline_script( 'modern-broadsheet-header', "
        document.addEventListener('DOMContentLoaded', function() {
            const bookmarkModal = document.getElementById('bookmark-modal');
            if (!bookmarkModal) return;

            const closeBtn = bookmarkModal.querySelector('.modal-close');
            const overlay = bookmarkModal.querySelector('.modal-overlay');
            const triggerBtns = document.querySelectorAll('.btn-subscribe, .btn-subscribe-sidebar, .btn-subscribe-large');

            function openModal(e) {
                e.preventDefault();
                bookmarkModal.classList.add('is-active');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                bookmarkModal.classList.remove('is-active');
                document.body.style.overflow = '';
            }

            triggerBtns.forEach(btn => btn.addEventListener('click', openModal));
            closeBtn.addEventListener('click', closeModal);
            overlay.addEventListener('click', closeModal);

            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && bookmarkModal.classList.contains('is-active')) {
                    closeModal();
                }
            });

            // Share Modal Logic
            const shareModal = document.getElementById('share-modal');
            if (shareModal) {
                const shareClose = shareModal.querySelector('.modal-close');
                const shareOverlay = shareModal.querySelector('.modal-overlay');
                const shareTriggers = document.querySelectorAll('.float-share, .icon-share');
                const nativeShareBtn = document.getElementById('btn-native-share');
                const nativeContainer = document.getElementById('native-share-container');
                const copyBtn = document.getElementById('btn-copy-link');
                const shareInput = document.getElementById('share-url');
                const toast = document.getElementById('copy-toast');

                if (navigator.share) {
                    nativeContainer.style.display = 'block';
                    nativeShareBtn.addEventListener('click', async () => {
                        try {
                            await navigator.share({
                                title: document.title,
                                url: window.location.href
                            });
                        } catch (err) {
                            console.log('Share failed:', err);
                        }
                    });
                }

                shareTriggers.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        shareModal.classList.add('is-active');
                        document.body.style.overflow = 'hidden';
                    });
                });

                const closeShare = () => {
                    shareModal.classList.remove('is-active');
                    document.body.style.overflow = '';
                };

                shareClose.addEventListener('click', closeShare);
                shareOverlay.addEventListener('click', closeShare);

                copyBtn.addEventListener('click', () => {
                    shareInput.select();
                    shareInput.setSelectionRange(0, 99999);
                    navigator.clipboard.writeText(shareInput.value).then(() => {
                        toast.classList.add('show');
                        setTimeout(() => toast.classList.remove('show'), 2000);
                    });
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && shareModal.classList.contains('is-active')) {
                        closeShare();
                    }
                });
            }
        });
    " );
}
add_action( 'wp_enqueue_scripts', 'modern_broadsheet_scripts' );

/**
 * Defer scripts for better performance.
 */
function modern_broadsheet_defer_scripts( $tag, $handle, $src ) {
    $defer_scripts = array( 'modern-broadsheet-header' );
    if ( in_array( $handle, $defer_scripts ) ) {
        return str_replace( ' src', ' defer src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'modern_broadsheet_defer_scripts', 10, 3 );

/**
 * Remove WordPress default emoji scripts and other unnecessary scripts to reduce requests.
 */
function modern_broadsheet_cleanup_head() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    
    // Remove RSD, WLW, Shortlinks and WP Version
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'modern_broadsheet_cleanup_head' );

/**
 * Dequeue unnecessary scripts.
 */
function modern_broadsheet_dequeue_scripts() {
    wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'modern_broadsheet_dequeue_scripts' );

/**
 * Add crossorigin attribute to Google Fonts style tag.
 */
function modern_broadsheet_font_loader_tag( $tag, $handle ) {
    if ( 'google-fonts' === $handle ) {
        return str_replace( " rel='stylesheet'", " rel='stylesheet' crossorigin", $tag );
    }
    return $tag;
}
add_filter( 'style_loader_tag', 'modern_broadsheet_font_loader_tag', 10, 2 );

/**
 * Optimize performance: Add cache headers and prefetch.
 */
function modern_broadsheet_performance_headers() {
    if ( ! is_admin() ) {
        header( "Cache-Control: public, max-age=31536000, immutable" );
    }
}
add_action( 'send_headers', 'modern_broadsheet_performance_headers' );

/**
 * SEO: Automatically set missing Alt Text to Post Title for thumbnails.
 * Also optimize LCP images by removing lazy loading and adding fetchpriority.
 */
function modern_broadsheet_optimize_images( $attributes, $attachment, $size ) {
    // Set missing Alt Text
    if ( empty( $attributes['alt'] ) ) {
        $parent_post_id = wp_get_post_parent_id( $attachment->ID );
        if ( $parent_post_id ) {
            $attributes['alt'] = get_the_title( $parent_post_id );
        } else {
            $attributes['alt'] = get_the_title( $attachment->ID );
        }
    }

    // Optimize LCP (first large image on home or single)
    if ( ( is_home() || is_front_page() || is_single() ) && $size === 'large' ) {
        $attributes['loading'] = 'eager';
        $attributes['fetchpriority'] = 'high';
        $attributes['decoding'] = 'async';
    } else {
        $attributes['loading'] = 'lazy';
    }

    return $attributes;
}
add_filter( 'wp_get_attachment_image_attributes', 'modern_broadsheet_optimize_images', 10, 3 );
