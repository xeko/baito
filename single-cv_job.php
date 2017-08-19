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
                                <h2><?php the_title(); ?></h2>
                                <!-- /post title -->
                                <?php
                                echo get_taxonomies_terms(get_the_ID(), 'job_category');
                                ?>
                                <div class="mb10 clearfix"></div>
                                <?php
                                $fields = array(
                                    array('id' => '_location', 'label' => __('Địa chỉ', 'baito')),
                                    array('id' => '_station', 'label' => __('Ga gần nhất', 'baito')),
                                    array('id' => '_skill_japanese', 'label' => __('Kĩ năng tiếng Nhật', 'baito')),
                                    array('id' => '_job_time', 'label' => __('Giờ làm việc', 'baito')),
                                    array('id' => '_job_day', 'label' => __('Số ngày làm việc', 'baito')),
                                    array('id' => '_salary', 'label' => __('Lương', 'baito')),
                                    array('id' => '_transport_cost', 'label' => __('Chi phí đi lại', 'baito')),
                                    array('id' => '_job_content', 'label' => __('Nội dung công việc', 'baito')),
                                    array('id' => '_job_experience', 'label' => __('Kinh nghiệm', 'baito')),
                                );
                                $cover_image_id = get_post_meta(get_the_ID(), '_cover_image', true);
                                $job_note = get_post_meta(get_the_ID(), '_job_note', true);

                                if (!empty($cover_image_id)) {
                                    echo wp_get_attachment_image($cover_image_id, 'full', '', array('class' => 'center-block img-responsive', 'id' => 'job-cover'));
                                }
                                ?>
                                <div class="mb10 clearfix"></div>
                                <div class="table-responsive"> 
                                    <table class="table table-striped">
                                        <?php
                                        foreach ($fields as $key => $value):
                                            $inline_css = ($key == 0) ? 'style="min-width: 180px;"' : '';
                                            ?>
                                            <tr>
                                                <th <?php echo $inline_css ?>><?php echo $value['label'] ?></th>
                                                <td><?php echo get_post_meta(get_the_ID(), $value['id'], true); ?></td>
                                            </tr>
                                        <?php endforeach; ?>                                        
                                    </table>
                                </div>
                                <?php if (!empty($job_note)): ?>
                                    <p><mark>Ghi chú: <?php echo $job_note ?></mark></p>
                                <?php endif; ?>
                                <br />

                                <?php edit_post_link(); ?>

                                <div class="btnentry-inner text-center clearfix">
                                    <a class="btn btn-default btn-lg btn-block" href="<?php echo get_page_link(14) ?>?jobID=<?php echo the_ID() ?>">Ứng tuyển</a>
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
        