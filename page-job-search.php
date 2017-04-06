<?php /* Template Name: Job Search */ ?>
<?php get_header(); ?>
<div class="section" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">                                

                <!-- section -->
                <section class="bgwhite">
                    <div id="breadcrumb" class="breadcrumb inner wrap cf"><?php breadcrumb() ?></div>                    

                    <div class="work-info well well-lg">
                        <?php
                        $level = (isset($_REQUEST['level']) && $_REQUEST['level'] != "") ? $_REQUEST['level'] : "";
                        ?>
                        <p>Công việc theo trình độ: <strong><?php echo $level ?></strong></p>
                    </div>                    
                    <?php
                    if (!empty($level)):
                        $args = array(
                            'post_type' => 'cv_job',
                            'meta_query' => array(
                                array(
                                    'key' => '_skill_japanese',
                                    'value' => $level,
                                    'compare' => '=',
                                ),
                            ),
                        );
                        $query = new WP_Query($args);                        
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $map = get_post_meta(get_the_ID(), '_map', true);
                                ?>

                                <div class="row row_dotted">
                                    <div class="col-sm-3 img-block">
                                        <a href="<?php the_permalink() ?>">
                                            <?php
                                            echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_cover_image', true), 'full', '', array('class' => 'img-responsive'));
                                            ?>
                                        </a>
                                    </div>                    
                                    <div class="col-sm-9 job-block">
                                        <a href="<?php the_permalink() ?>" class="job-title"><?php echo cut_title(get_the_title(), 100) ?></a>
                                        <dl class="dl-horizontal clearfix basic-info">
                                            <dt>Tiền lương</dt>
                                            <dd><?php echo get_post_meta(get_the_ID(), '_salary', true); ?></dd>
                                            <dt>Nơi làm việc</dt>
                                            <dd><?php echo get_post_meta(get_the_ID(), '_location', true); ?><?php if (!empty($map)): ?> <span class="label label-danger"><a href="<?php echo $map ?>" target="_blank">bản đồ</a></span><?php endif ?></dd>
                                            <dt>Thời gian làm việc</dt>
                                            <dd><?php echo get_post_meta(get_the_ID(), '_time', true); ?></dd>
                                        </dl>
                                        <ul class="info list-inline">
                                            <li><span class="fa fa-calendar"></span> Ngày đăng: <?php the_time('d/m/Y'); ?></li>
                                            <li><i class="fa fa-eye"></i> Xem: 263 lượt</li>
                                        </ul>
                                        <a href="<?php the_permalink() ?>" class="pull-right">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            ?>

                            <article>
                                <h2 class="text-center"><?php _e('Sorry, nothing to display.', 'baito'); ?></h2>
                            </article>
                        <?php endif; ?>

                    <?php endif; ?>

                </section>
            </div>
            <div class="col-md-3">
                <sidebar>
                    <?php get_sidebar('job'); ?>
                </sidebar>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

