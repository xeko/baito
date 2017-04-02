<?php get_header(); ?>
<div class="container">
    <div class="row">
        <!-- section -->
        <section>

            <?php get_template_part('job-loop'); ?>

            <?php get_template_part('pagination'); ?>

        </section>
        <!-- /section -->
    </div>
</div>

<?php get_footer();
