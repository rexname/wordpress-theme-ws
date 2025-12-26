<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $site_description = get_bloginfo( 'description', 'display' );
    $site_name = get_bloginfo( 'name', 'display' );
    $focus_keywords = "Latest News, Trends, Analysis, Technology, and Global Updates";
    
    if ( is_front_page() || is_home() ) {
        $meta_description = $site_description;
        // Ensure common keywords are present in description
        if ( !empty($meta_description) ) {
            $meta_description = "Discover " . $meta_description . ". Stay updated with our " . $focus_keywords . " from around the world.";
        } else {
            $meta_description = "Explore " . $site_name . " for the " . $focus_keywords . ". Your trusted source for in-depth reporting and breaking news.";
        }
    } elseif ( is_single() || is_page() ) {
        $meta_description = wp_strip_all_tags( get_the_excerpt() );
        if ( empty($meta_description) ) {
            $meta_description = wp_trim_words( get_the_content(), 25 );
        }
    } else {
        $meta_description = $site_description . " - " . $focus_keywords;
    }
    
    // Limit to 160 characters
    $meta_description = mb_strimwidth($meta_description, 0, 160, "...");
    ?>
    <meta name="description" content="<?php echo esc_attr( $meta_description ); ?>">

    <!-- Hreflang for SEO -->
    <link rel="alternate" hreflang="<?php echo strtolower( get_bloginfo('language') ); ?>" href="<?php echo esc_url( ( is_single() || is_page() ) ? get_permalink() : home_url( add_query_arg( array(), $wp->request ) ) ); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url( home_url( '/' ) ); ?>">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo esc_url( ( is_single() || is_page() ) ? get_permalink() : home_url( add_query_arg( array(), $wp->request ) ) ); ?>">

    <!-- Social Meta Tags -->
    <?php
    if ( is_front_page() || is_home() ) {
        // Match Title with Description keywords
        $title = $site_name . " | " . $focus_keywords;
    } else {
        $title = wp_title( '', false ) . ' – ' . $site_name;
    }
    
    $description = $meta_description; // Use the optimized description from above
    $url = ( is_single() || is_page() ) ? get_permalink() : home_url( add_query_arg( array(), $wp->request ) );
    $image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
    ?>
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
    <?php if ( $image ) : ?>
    <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
    <?php endif; ?>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <?php if ( $image ) : ?>
    <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
    <?php endif; ?>

    <!-- Schema.org WebSite -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php bloginfo( 'name' ); ?>",
        "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo esc_url( home_url( '/' ) ); ?>?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    
    <style>
        /* Critical CSS */
        :root { --bg-color: #121212; --text-color: #fff; --border-color: #333; }
        body { background-color: var(--bg-color); color: var(--text-color); font-family: 'Public Sans', sans-serif; margin: 0; -webkit-font-smoothing: antialiased; }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 20px; }
        .site-header { padding: 20px 0; border-bottom: 1px solid var(--border-color); text-align: center; }
        .masthead-title { font-family: "Bokor", system-ui; font-size: clamp(60px, 10vw, 120px); line-height: 1; margin: 0 0 5px; }
        .masthead-title a { color: inherit; text-decoration: none; }
        .site-tagline { font-style: italic; color: #b0b0b0; font-size: 14px; margin-bottom: 20px; }
        .header-top-wrapper { position: fixed; top: 0; left: 0; width: 100%; background: var(--bg-color); z-index: 2000; border-bottom: 1px solid #222; height: 45px; }
        .header-top { display: grid; grid-template-columns: repeat(3, 1fr); height: 45px; align-items: center; }
        .main-navigation { border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); padding: 14px 0 12px; margin-top: 20px; }
        .main-navigation ul { list-style: none; display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; padding: 0; margin: 0; }
        .main-navigation a { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #eee; text-decoration: none; }
        .broadsheet-grid { display: grid; grid-template-columns: 320px 1fr 300px; gap: 30px; margin-top: 40px; }
        .main-content-column { grid-column: span 2; display: flex; flex-direction: column; gap: 40px; }
        .hero-top-layout { display: grid; grid-template-columns: 320px 1fr; gap: 30px; }
        .left-column { border-right: 1px solid var(--border-color); padding-right: 30px; }
        @media (max-width: 1024px) { 
            .broadsheet-grid { grid-template-columns: 1fr; } 
            .header-top { grid-template-columns: 1fr 1fr; } 
            .header-center { display: none; }
            .hero-top-layout { grid-template-columns: 1fr; }
            .left-column { border-right: none; padding-right: 0; border-bottom: 1px solid var(--border-color); padding-bottom: 30px; }
        }
        .hero-image img { width: 100%; height: auto; display: block; background: #222; }

        /* Bookmark Modal */
        .custom-modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; align-items: center; justify-content: center; }
        .custom-modal.is-active { display: flex; }
        .modal-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.85); backdrop-filter: blur(4px); }
        .modal-content { position: relative; background: #1a1a1a; padding: 40px; border-radius: 4px; max-width: 400px; width: 90%; border: 1px solid #333; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
        .modal-close { position: absolute; top: 10px; right: 15px; background: none; border: none; color: #888; font-size: 28px; cursor: pointer; padding: 5px; line-height: 1; }
        .modal-close:hover { color: #fff; }
        .modal-title { margin-bottom: 25px; font-size: 24px; color: #fff; }
        .modal-body p { margin-bottom: 15px; font-size: 16px; color: #ccc; }
        kbd { background: #333; border: 1px solid #444; border-radius: 3px; padding: 2px 6px; font-family: inherit; font-size: 14px; color: #fff; box-shadow: 0 2px 0 #000; }
        .mobile-only { display: none; }
        @media (max-width: 768px) { .desktop-only { display: none; } .mobile-only { display: block; } .modal-content { padding: 30px 20px; } }

        /* Share Modal Specific */
        .share-modal-content { max-width: 450px; }
        .share-btn-primary { width: 100%; background: #0056b3; color: #fff; border: none; padding: 12px; border-radius: 4px; font-weight: 700; cursor: pointer; font-size: 16px; display: flex; align-items: center; justify-content: center; gap: 10px; transition: background 0.2s; }
        .share-btn-primary:hover { background: #004494; }
        .copy-link-section { margin-bottom: 25px; position: relative; }
        .copy-input-wrapper { display: flex; background: #222; border: 1px solid #333; border-radius: 4px; overflow: hidden; }
        .copy-input-wrapper input { flex: 1; background: none; border: none; color: #fff; padding: 10px 15px; font-size: 14px; outline: none; }
        .copy-input-wrapper button { background: #333; color: #fff; border: none; padding: 0 20px; font-weight: 600; cursor: pointer; transition: background 0.2s; border-left: 1px solid #444; }
        .copy-input-wrapper button:hover { background: #444; }
        .toast-msg { position: absolute; top: -30px; left: 50%; transform: translateX(-50%); background: #00a82d; color: #fff; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: 700; opacity: 0; transition: opacity 0.3s; pointer-events: none; }
        .toast-msg.show { opacity: 1; }
        .social-quick-buttons { display: flex; justify-content: space-between; gap: 15px; padding-top: 15px; border-top: 1px solid #333; }
        .social-icon { width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #222; transition: transform 0.2s, background 0.2s; border: 1px solid #333; }
        .social-icon:hover { transform: translateY(-3px); background: #2a2a2a; border-color: #444; }
        .social-icon img { width: 22px; height: 22px; transition: transform 0.2s; }
        .social-icon:hover img { transform: scale(1.1); }
    </style>

    <?php if ( is_home() || is_front_page() || is_single() ) : 
        $lcp_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        if ( $lcp_image ) : ?>
            <link rel="preload" as="image" href="<?php echo esc_url( $lcp_image ); ?>" fetchpriority="high">
        <?php endif; 
    endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="side-menu" class="side-menu">
    <div class="side-menu-content">
        <div class="side-menu-header">
            <a href="#" class="btn-subscribe-sidebar">Save and subscribe</a>
            <button class="menu-close">&times;</button>
        </div>
        
        <div class="side-menu-search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="search-input-wrapper">
                    <input type="search" placeholder="Ask a question or search" name="s" value="<?php echo get_search_query(); ?>">
                    <button type="submit" class="search-submit">&#128269;</button>
                </div>
            </form>
        </div>

        <nav class="side-menu-nav">
            <ul>
                <li class="menu-item-home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home Page</a></li>
                <?php
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'hide_empty' => 0
                ) );

                foreach ( $categories as $category ) {
                    printf(
                        '<li><a href="%1$s">%2$s <span class="chevron">&rsaquo;</span></a></li>',
                        esc_url( get_category_link( $category->term_id ) ),
                        esc_html( $category->name )
                    );
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
<div class="side-menu-overlay"></div>

<header class="site-header">
    <div class="header-top-wrapper">
        <div class="container">
            <div class="header-top">
                <div class="header-left">
                    <button class="menu-toggle">&#9776;</button>
                </div>

                <div class="header-center-sticky">
                    <div class="site-branding sticky-branding">
                        <p class="masthead-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </p>
                        <p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
                    </div>
                </div>

                <div class="header-right">
                    <a href="#" class="btn-subscribe">Save and subscribe</a>
                    <a href="#" class="btn-signin">Sign in</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="site-branding">
            <?php if ( is_front_page() || is_home() ) : ?>
                <h1 class="masthead-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            <?php else : ?>
                <p class="masthead-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </p>
            <?php endif; ?>
            <p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
        </div>


        <nav id="site-navigation" class="main-navigation">
                <ul id="primary-menu" class="menu">
                    <?php
                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => 1 // Tampilkan semua meskipun kosong
                    ) );

                    foreach ( $categories as $category ) {
                        printf(
                            '<li><a href="%1$s">%2$s</a></li>',
                            esc_url( get_category_link( $category->term_id ) ),
                            esc_html( $category->name )
                        );
                    }
                    ?>
                </ul>
            </nav>
    </div>
</header>
