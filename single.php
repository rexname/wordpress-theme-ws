<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Schema.org NewsArticle -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "<?php echo esc_attr( get_the_title() ); ?>",
            "image": [
                "<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>"
            ],
            "datePublished": "<?php echo get_the_date('c'); ?>",
            "dateModified": "<?php echo get_the_modified_date('c'); ?>",
            "author": [{
                "@type": "Person",
                "name": "<?php echo esc_attr( get_the_author() ); ?>",
                "url": "<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
            }],
            "publisher": {
                "@type": "Organization",
                "name": "<?php bloginfo( 'name' ); ?>",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo esc_url( get_site_icon_url() ); ?>"
                }
            },
            "description": "<?php echo esc_attr( wp_strip_all_tags( get_the_excerpt() ) ); ?>"
        }
        </script>
        <div class="floating-side-controls">
            <div class="floating-left">
                <button class="float-btn float-back-home" onclick="window.location.href='<?php echo esc_url(home_url('/')); ?>'">
                    <span class="icon">&#8962;</span>
                    <span class="label">Home</span>
                </button>
                <button class="float-btn float-comments">
                    <span class="icon">&#128172;</span>
                    <span class="label">Comments</span>
                </button>
            </div>
            <div class="floating-right">
                <button class="float-btn float-back-to-top">
                    <span class="icon">&#8593;</span>
                    <span class="label">Top</span>
                </button>
                <button class="float-btn float-share">
                    <span class="icon">&#10150;</span>
                    <span class="label">Share</span>
                </button>
            </div>
        </div>

        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
            
            <header class="post-header-centered container-narrow">
                <div class="entry-breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1" />
                    </span>
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo ' &rsaquo; ';
                        echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
                        echo '<a itemprop="item" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"><span itemprop="name">' . esc_html( $categories[0]->name ) . '</span></a>';
                        echo '<meta itemprop="position" content="2" />';
                        echo '</span>';
                    }
                    ?>
                </div>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                
                <div class="entry-excerpt">
                    <?php echo get_the_excerpt(); ?>
                </div>

                <div class="entry-meta-top">
                    <span class="posted-on"><?php echo get_the_date('F j, Y'); ?></span>
                </div>

                <div class="entry-actions-bar">
                    <div class="actions-left">
                        <span class="action-item reading-time">
                            <span class="icon-headphones">&#127827;</span> 5 min
                        </span>
                        <span class="action-item icon-share">&#10150;</span>
                        <span class="action-item icon-bookmark">&#128278;</span>
                        <span class="action-item icon-comments">
                            <span class="comment-icon">&#128172;</span> 1,648
                        </span>
                    </div>
                    <div class="actions-right">
                        <a href="https://www.google.com/preferences/source?q=<?php echo parse_url(home_url(), PHP_URL_HOST); ?>" target="_blank" class="google-news-badge" style="text-decoration: none; display: flex; align-items: center; gap: 8px;">
                            <img src="https://www.gstatic.com/images/branding/googlelogo/svg/googlelogo_clr_74x24px.svg" alt="Google" width="50">
                            <span>Make us preferred on Google</span>
                        </a>
                    </div>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-featured-image-full container-narrow">
                    <div class="featured-image-wrapper">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                    <div class="thumbnail-caption-container">
                        <span class="caption-text">(<?php the_author(); ?>/The Post)</span>
                    </div>
                </div>
            <?php endif; ?>

            <div class="entry-content container-narrow">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer container-narrow">
                <div class="related-stories-section">
                    <div class="section-header-wp-left">
                        <h2 class="section-title">Related Stories</h2>
                    </div>
                    
                    <div class="related-stories-grid">
                        <?php
                        $current_post_id = get_the_ID();
                        $categories = get_the_category();
                        $category_ids = array();
                        
                        foreach($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }

                        $related_query = new WP_Query( array(
                            'category__in'   => $category_ids,
                            'post__not_in'   => array($current_post_id),
                            'posts_per_page' => 3,
                            'orderby'        => 'rand'
                        ) );

                        if ( $related_query->have_posts() ) :
                            while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                                <div class="related-story-item">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="related-story-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="related-story-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="related-story-meta">
                                        <?php echo get_the_date('M j, Y'); ?>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <div class="more-from-category-section">
                    <?php
                    $main_category = $categories[0];
                    ?>
                    <div class="section-header-wp-left">
                        <h2 class="section-title">More from <?php echo esc_html($main_category->name); ?></h2>
                    </div>

                    <div class="more-from-grid">
                        <?php
                        $more_query = new WP_Query( array(
                            'category__in'   => array($main_category->term_id),
                            'post__not_in'   => array($current_post_id),
                            'posts_per_page' => 4,
                            'offset'         => 0 // Could offset if we want different ones from related
                        ) );

                        if ( $more_query->have_posts() ) :
                            while ( $more_query->have_posts() ) : $more_query->the_post(); ?>
                                <div class="more-from-item">
                                    <h3 class="more-from-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="more-from-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </footer>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>