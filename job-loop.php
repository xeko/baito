<?php
$conditions = array();

if(!empty($_REQUEST['job_category']))
    $job_category = array(
        'taxonomy' => 'job_category',
        'field' => 'term_id',
        'terms' => $_REQUEST['job_category'],
        'operator' => 'IN'
    );
if(!empty($_REQUEST['job_location']))
    $job_location = array(
        'taxonomy' => 'job_location',
        'field' => 'term_id',
        'terms' => $_REQUEST['job_location'],
        'operator' => 'IN'
    );
$conditions = array(
    'relation' => 'AND',
    $job_category,
    $job_location
);

$args['post_type'] = 'cv_job';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;
$args['post_status'] = 'publish';
$args['s'] = $_REQUEST['s'];

$args['tax_query'] = $conditions;

$wp_query = new WP_Query($args);

echo ($wp_query->found_posts > 0) ? '<h3 class="">' . $wp_query->found_posts. ' kết quả tìm thấy</h3>' : '<h3 class="text-center">Not found</h3>';

if ($wp_query->have_posts()) :
    while ($wp_query->have_posts()) : $wp_query->the_post();
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
<?php endif;