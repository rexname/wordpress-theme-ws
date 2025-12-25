<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
            
            <header class="post-header-centered container-narrow">
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
                        <div class="google-news-badge">
                            <img src="https://www.gstatic.com/images/branding/googlelogo/svg/googlelogo_clr_74x24px.svg" alt="Google" width="50">
                            <span>Make us preferred on Google</span>
                        </div>
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

        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>