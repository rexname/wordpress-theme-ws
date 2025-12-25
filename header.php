<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                        <h1 class="masthead-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
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
            <h1 class="masthead-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
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
