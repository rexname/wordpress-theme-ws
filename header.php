<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bokor&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-top-wrapper">
        <div class="container">
            <div class="header-top">
                <div class="header-left">
                    <button class="menu-toggle">&#9776;</button>
                    <button class="search-toggle">&#128269;</button>
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

        <!-- Sticky Header (Visible on scroll) -->
        <div class="sticky-header">
            <div class="container sticky-container">
                <div class="sticky-left">
                    <button class="menu-toggle-sticky">&#9776;</button>
                    <div class="sticky-logo">The Washington Post</div>
                    <div class="sticky-tagline">Democracy Dies in Darkness</div>
                </div>
                <div class="sticky-right">
                    <a href="#" class="btn-subscribe-small">Save and subscribe</a>
                    <a href="#" class="btn-signin-small">Sign in</a>
                </div>
            </div>
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
