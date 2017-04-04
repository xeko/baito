<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!-- section -->
            <section>

                <?php get_template_part('job-loop'); ?>

                <?php get_template_part('pagination'); ?>

            </section>
            <!-- /section -->
        </div>
        <div class="col-md-3">
            <sidebar>
                <?php get_sidebar('job'); ?>
            </sidebar>
        </div>
    </div>
</div>

<?php
get_footer();
