<?php get_header(); ?>

<main id="primary" class="site-main container">
    <!-- Hero Section (3 Columns) -->
    <div class="broadsheet-grid" style="border-bottom: 1px solid #333; padding-bottom: 40px;">
        <!-- Column 1: Lead Headline -->
        <div class="left-column" style="border-right: 1px solid #333; padding-right: 20px;">
            <?php
            $hero_query = new WP_Query( array('posts_per_page' => 1) );
            if ( $hero_query->have_posts() ) : while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                <article class="hero-text-only">
                    <h1 style="font-size: 38px; line-height: 1; margin-bottom: 15px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <p style="font-size: 16px; color: #bbb;"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                    <div class="byline" style="margin-top: 10px;">By <?php the_author(); ?></div>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Column 2: Large Hero Image -->
        <div class="center-column">
            <?php
            if ( $hero_query->have_posts() ) : while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="hero-image">
                        <?php the_post_thumbnail( 'large', array('style' => 'width:100%; height:auto;') ); ?>
                        <div class="thumbnail-caption" style="text-align: right;">(<?php the_author(); ?>/The Post)</div>
                    </div>
                <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <!-- Column 3: Opinions Sidebar -->
        <div class="right-column" style="border-left: 1px solid #333; padding-left: 20px;">
            <span class="column-title">Opinions</span>
            <?php
            $opinion_query = new WP_Query( array('posts_per_page' => 4, 'offset' => 1) );
            if ( $opinion_query->have_posts() ) : while ( $opinion_query->have_posts() ) : $opinion_query->the_post(); ?>
                <div class="opinion-item" style="margin-bottom: 15px; border-bottom: 1px solid #222; padding-bottom: 10px;">
                    <div class="opinion-content">
                        <span class="author" style="font-size: 12px; color: #fff; display: block;"><?php the_author(); ?></span>
                        <h3 style="font-size: 14px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>

    <!-- Secondary Stacked Section -->
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

    <!-- More Top Stories (1-2-1 Layout) -->
    <div class="section-header-wp">
        <h2>More Top Stories</h2>
    </div>
    <div class="more-top-stories">
        <!-- Col 1: Medium Story -->
        <div class="col-1">
            <?php
            $mts1_query = new WP_Query( array('posts_per_page' => 1, 'offset' => 10) );
            if ( $mts1_query->have_posts() ) : while ( $mts1_query->have_posts() ) : $mts1_query->the_post(); ?>
                <article class="mts-main">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
                    <h3 style="font-size: 20px; margin-top: 15px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <!-- Col 2: Stacked Headlines -->
        <div class="col-2" style="border-left: 1px solid #333; border-right: 1px solid #333; padding: 0 20px;">
            <?php
            $mts2_query = new WP_Query( array('posts_per_page' => 4, 'offset' => 11) );
            if ( $mts2_query->have_posts() ) : while ( $mts2_query->have_posts() ) : $mts2_query->the_post(); ?>
                <article style="border-bottom: 1px solid #222; padding-bottom: 10px; margin-bottom: 15px;">
                    <h3 style="font-size: 16px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <!-- Col 3: List -->
        <div class="col-3">
            <h4 style="font-size: 12px; text-transform: uppercase; color: #888; margin-bottom: 15px;">Trending</h4>
            <?php
            $mts3_query = new WP_Query( array('posts_per_page' => 5, 'offset' => 15) );
            if ( $mts3_query->have_posts() ) : while ( $mts3_query->have_posts() ) : $mts3_query->the_post(); ?>
                <div style="margin-bottom: 10px;">
                    <h3 style="font-size: 14px; font-family: 'Public Sans', sans-serif;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>

    <!-- Category Sections Refined -->
    <div class="category-grid">
        <?php
        $categories = get_categories(array(
            'hide_empty' => 0,
        ));
        
        foreach ($categories as $category) : ?>
            <div class="category-block">
                <div class="category-block-header">
                    <h2><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></h2>
                </div>
                <div class="category-block-content" style="grid-template-columns: 1fr;">
                    <?php
                    $c_query = new WP_Query( array(
                        'posts_per_page' => 1, 
                        'cat' => $category->term_id
                    ) );
                    if ( $c_query->have_posts() ) : 
                        while ( $c_query->have_posts() ) : $c_query->the_post(); ?>
                            <div class="cat-main" style="margin-bottom: 15px;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail" style="margin-bottom: 10px;">
                                        <?php the_post_thumbnail('medium', array('style' => 'width:100%; height:auto;')); ?>
                                    </div>
                                <?php endif; ?>
                                <h3 style="font-size: 18px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p style="font-size: 14px; color: #aaa; margin-top: 5px;"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();
                    else : ?>
                        <p style="font-size: 12px; color: #666; font-style: italic;">No stories in this section yet.</p>
                    <?php endif; ?>

                    <!-- List of other stories in this category -->
                    <ul class="category-list" style="list-style: none; padding: 0;">
                        <?php
                        $c_list_query = new WP_Query( array(
                            'posts_per_page' => 3, 
                            'offset' => 1, 
                            'cat' => $category->term_id
                        ) );
                        if ( $c_list_query->have_posts() ) : 
                            while ( $c_list_query->have_posts() ) : $c_list_query->the_post(); ?>
                                <li style="border-top: 1px solid #222; padding: 10px 0;">
                                    <h4 style="font-size: 14px; font-weight: 600;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </li>
                            <?php endwhile; 
                            wp_reset_postdata();
                        endif; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php get_footer(); ?>
