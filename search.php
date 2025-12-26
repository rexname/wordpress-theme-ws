<?php get_header(); ?>

<main id="primary" class="site-main container archive-container">
    <!-- Schema.org SearchResultsPage -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SearchResultsPage",
        "name": "<?php printf( esc_html__( 'Search Results for: %s', 'modern-broadsheet' ), get_search_query() ); ?>",
        "url": "<?php echo esc_url( home_url( $wp->request ) ); ?>",
        "mainEntity": {
            "@type": "ItemList",
            "itemListElement": [
                <?php
                $i = 1;
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        if ($i > 1) echo ',';
                        ?>
                        {
                            "@type": "ListItem",
                            "position": <?php echo $i; ?>,
                            "url": "<?php the_permalink(); ?>",
                            "name": "<?php echo esc_attr( get_the_title() ); ?>"
                        }
                        <?php
                        $i++;
                    endwhile;
                    rewind_posts();
                endif;
                ?>
            ]
        }
    }
    </script>
    <header class="archive-header">
        <div class="archive-breadcrumbs">
            <span>Search Results</span>
        </div>
        <h1 class="archive-title">
            <?php
            printf(
                /* translators: %s: search query. */
                esc_html__( 'Results for: %s', 'modern-broadsheet' ),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>
    </header>

    <div class="archive-content-layout">
        <div class="archive-main-column">
            <?php if ( have_posts() ) : ?>
                <div class="archive-list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="archive-item">
                            <div class="archive-item-date">
                                <?php echo get_the_date('F j, Y'); ?>
                            </div>
                            <div class="archive-item-content">
                                <h2 class="archive-item-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="archive-item-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                                </div>
                            </div>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="archive-item-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="archive-pagination">
                    <?php
                    global $wp_query;
                    $current_page = max(1, get_query_var('paged'));
                    $total_pages = $wp_query->max_num_pages;

                    if ($total_pages > 1) {
                        echo '<div class="custom-pagination">';
                        
                        // Previous link
                        if ($current_page > 1) {
                            echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="pagination-arrow">&lsaquo;</a>';
                        } else {
                            echo '<span class="pagination-arrow disabled">&lsaquo;</span>';
                        }

                        // Page indicator
                        echo '<span class="page-indicator">Page ' . $current_page . '</span>';

                        // Next link
                        if ($current_page < $total_pages) {
                            echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="pagination-arrow">&rsaquo;</a>';
                        } else {
                            echo '<span class="pagination-arrow disabled">&rsaquo;</span>';
                        }

                        echo '</div>';
                    }
                    ?>
                </div>

            <?php else : ?>
                <div class="no-results-content">
                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'modern-broadsheet' ); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <aside class="archive-sidebar">
            <div class="sidebar-widget">
                <a href="#" class="btn-subscribe-large">Sign up</a>
            </div>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
