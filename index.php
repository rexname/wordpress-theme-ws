<?php get_header(); ?>

<main id="primary" class="site-main container">
    <!-- Hero Section (3 Columns) -->
    <div class="broadsheet-grid">
        <!-- Main Content Area (Left + Center) -->
        <div class="main-content-column">
            <div class="hero-top-layout">
                <!-- Column 1: Lead Headline -->
                <div class="left-column">
                    <?php
                    $hero_query = new WP_Query( array('posts_per_page' => 1) );
                    if ( $hero_query->have_posts() ) : while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                        <article class="hero-text-only">
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                            <div class="byline">By <?php the_author(); ?></div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>

                <!-- Column 2: Large Hero Image -->
                <div class="center-column">
                    <?php
                    if ( $hero_query->have_posts() ) : while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="hero-image">
                                <?php the_post_thumbnail( 'large' ); ?>
                                <div class="thumbnail-caption">(<?php the_author(); ?>/The Post)</div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>

            <!-- Secondary Stacked Section (Now inside main content flow) -->
            <div class="secondary-stack">
                <?php
                $secondary_query = new WP_Query( array('posts_per_page' => 5, 'offset' => 5) );
                if ( $secondary_query->have_posts() ) : while ( $secondary_query->have_posts() ) : $secondary_query->the_post(); ?>
                    <article class="stacked-article">
                        <div class="content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div class="byline">By <?php the_author(); ?></div>
                        </div>
                        <div class="image">
                            <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium_large' ); ?>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>

        <!-- Column 3: Opinions Sidebar (Now goes all the way down) -->
        <div class="right-column">
            <p class="column-title">Opinions</p>
            <?php
            $opinion_query = new WP_Query( array('posts_per_page' => 10, 'offset' => 1) );
            if ( $opinion_query->have_posts() ) : while ( $opinion_query->have_posts() ) : $opinion_query->the_post(); ?>
                <div class="opinion-item">
                    <div class="opinion-content">
                        <span class="author"><?php the_author(); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>

    <!-- More Top Stories & Most Read -->
    <div class="top-stories-most-read-container">
        <div class="more-top-stories-section">
            <div class="section-header-wp-left">
                <p class="section-title">More Top Stories</p>
            </div>
            <div class="top-stories-grid">
                <!-- Large Story with Image -->
                <div class="top-story-large">
                    <?php
                    $mts_large_query = new WP_Query( array('posts_per_page' => 1, 'offset' => 10) );
                    if ( $mts_large_query->have_posts() ) : while ( $mts_large_query->have_posts() ) : $mts_large_query->the_post(); ?>
                        <article class="mts-large-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="mts-image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="mts-caption">(Courtesy of <?php the_author(); ?>)</div>
                            <h3 class="mts-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </article>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>

                <!-- Stacked Headlines -->
                <div class="top-stories-stacked">
                    <?php
                    $mts_stacked_query = new WP_Query( array('posts_per_page' => 5, 'offset' => 11) );
                    if ( $mts_stacked_query->have_posts() ) : while ( $mts_stacked_query->have_posts() ) : $mts_stacked_query->the_post(); ?>
                        <article class="mts-stacked-item">
                            <h3 class="mts-stacked-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </article>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                    
                    <!-- Featured Analysis -->
                    <?php
                    $mts_analysis_query = new WP_Query( array('posts_per_page' => 1, 'offset' => 16) );
                    if ( $mts_analysis_query->have_posts() ) : while ( $mts_analysis_query->have_posts() ) : $mts_analysis_query->the_post(); ?>
                        <article class="mts-analysis-item">
                            <div class="analysis-tag">Analysis <span class="author-name"><?php the_author(); ?></span></div>
                            <h3 class="mts-analysis-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </article>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>

        <!-- Most Read Sidebar -->
        <div class="most-read-section">
            <div class="section-header-wp-left">
                <p class="section-title">Most Read</p>
            </div>
            <div class="most-read-list">
                <?php
                $most_read_query = new WP_Query( array('posts_per_page' => 4, 'offset' => 0) );
                $counter = 1;
                if ( $most_read_query->have_posts() ) : while ( $most_read_query->have_posts() ) : $most_read_query->the_post(); ?>
                    <div class="most-read-item">
                        <span class="most-read-number"><?php echo $counter++; ?></span>
                        <h3 class="most-read-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </div>

    <!-- Category Sections Refined -->
    <div class="category-grid">
        <?php
        $categories = get_categories(array(
            'hide_empty' => 1,
            'exclude' => array(1) // Usually exclude Uncategorized
        ));
        
        foreach ($categories as $category) : ?>
            <div class="category-block">
                <div class="category-block-header">
                    <h2><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?> <span class="chevron">></span></a></h2>
                </div>
                <div class="category-block-content">
                    <?php
                    $c_query = new WP_Query( array(
                        'posts_per_page' => 1, 
                        'cat' => $category->term_id
                    ) );
                    if ( $c_query->have_posts() ) : 
                        while ( $c_query->have_posts() ) : $c_query->the_post(); ?>
                            <div class="category-main-story">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="category-post-thumbnail">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </div>
                                <?php endif; ?>
                                <h3 class="category-main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();
                    endif; ?>

                    <!-- List of other stories in this category -->
                    <div class="category-secondary-stories">
                        <ul class="category-list">
                            <?php
                            $c_list_query = new WP_Query( array(
                                'posts_per_page' => 4, 
                                'offset' => 1, 
                                'cat' => $category->term_id
                            ) );
                            if ( $c_list_query->have_posts() ) : 
                                while ( $c_list_query->have_posts() ) : $c_list_query->the_post(); ?>
                                    <li class="category-list-item">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </li>
                                <?php endwhile; 
                                wp_reset_postdata();
                            endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php get_footer(); ?>
