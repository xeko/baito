<?php get_header(); ?>
<div class="bg-gray" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">                    

                <?php breadcrumb() ?>
                
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php the_content(); ?>

                            <br class="clear">

                            <?php edit_post_link(); ?>

                        </article>
                        <!-- /article -->

                    <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>

                    </article>
                    <!-- /article -->

                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</div><!--End #wrap-content-->

<?php
get_footer();
