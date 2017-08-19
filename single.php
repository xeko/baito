<?php get_header(); ?>

<main role="main">
    <!-- section -->
    <div class="section" id="wrap-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                            <!-- article -->
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <!-- post title -->
                                <div class="titl_wrap">
                                    <h1><?php the_title(); ?></h1>
                                    <div class="datetime"><?php the_time('Y.m.d'); ?></div>
                                </div>
                                <!-- /post title -->                                

                                <?php the_content(); ?>
                                <br />

                                <?php edit_post_link(); ?>

                            </article>
                            <!-- /article -->

                        <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h1><?php _e('Sorry, nothing to display.'); ?></h1>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

        <?php
        get_footer();
        