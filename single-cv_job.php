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
                                <h2>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <!-- /post title -->

                                <?php the_content(); // Dynamic Content ?>
                                <br />

                                <?php edit_post_link();?>

                                <div class="btnentry-inner text-center clearfix">
                                    <a class="btn btn-default btn-lg btn-block" href="<?php echo get_page_link(94)?>?jobID=<?php echo the_ID()?>">Ứng tuyển</a>
                                </div>
                            </article>
                            <!-- /article -->

                        <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h1><?php _e('Sorry, nothing to display.', 'baito'); ?></h1>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar('job'); ?>
                </div>
            </div>
        </div>

        <?php
        get_footer();
        