<?php get_header(); ?>

    <div id="top-banner">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo get_template_directory_uri() ?>/img/main.jpg" alt="" />
            </div>
            <div class="col-lg-6">
                <h1 class="h2 mt-30">SCF - Trung tâm hỗ trợ việc làm</h1>
                <p>Không chỉ giới thiệu thông tin tuyển dụng <strong>HOÀN TOÀN MIỄN PHÍ</strong>, mà đặc biệt trung tâm còn có cả chế độ 
                    tiền mừng gửi đến các bạn trúng tuyển!!</p>
                <ul class="list-unstyled" id="list-focus">
                    <li><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Liên kết với hơn 30 công ty tuyển dụng tại Tokyo</li>
                    <li><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Dùng tiến Mẹ đẻ gửi email, gọi điện đến trực tiếp ứng viên</li>
                    <li><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Tuỳ thuộc vào vị trí sinh sống, trình độ tiếng, có thể tìm được công việc mong muốn</li>                    
                </ul>
                <a class="btn btn-primary btn-lg" href="<?php echo get_bloginfo('url') ?>/dang-ky-ung-vien/" title="Đăng ký ứng viên">Đăng ký ứng viên</a>
                <p class="">Hãy <a href="#" title="問い合わせ" class="text-strong">liên lạc với chung tôi</a> để biết thêm thông tin</p>
                <p class="h2 phone-number"><a href="tel:08045909858"><i class="fa fa-phone" aria-hidden="true"></i> 080-4590-9858</a></p>
                <p class="text-regular text-small">Thời gian làm việc: 9:00-18:00 từ thứ 2 đến thứ 6</p>
            </div>
        </div>
    </div><!--End #top-banner-->    

    <div class="ibox shadow">
        <div class="ibox-title">
            <h5 class="text-uppercase">TÌM VIỆC LÀM PHÙ HỢP</h5>
        </div>
        <div class="ibox-content">
            <form name="search" id="frm_block_quick_search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input type="hidden" name="post_type" value="cv_job" />
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="mb10 col-sm-12">
                                <input id="keyword" class="form-control search-all" name="s" placeholder="Nhập từ khoá..." >
                            </div>
                            <div class="mb10 col-sm-6">
                                <select multiple="true" id="timeWorks" class="chosen-select form-control" name="job_hours[]">
                                    <option value="1">Sáng (6:00-12:00)</option>
                                    <option value="2">Chiều (12:00-18:00)</option>
                                    <option value="3">Tối (18:00-24:00)</option>
                                    <option value="4">Khuya (24:00-06:00)</option>
                                </select>
                            </div>
                            <div class="mb10 col-sm-6">
                                <?php
                                $terms = get_terms('job_category', array('hide_empty' => 0));
                                echo '<select multiple="true" id="cateList" class="chosen-select form-control" name="job_category[]">';
                                foreach ($terms as $term) {
                                    echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                }
                                echo '</select>';
                                ?>                                                        
                            </div>
                            <div class="mb10 col-sm-6">
                                <?php
                                $job_category = get_terms('job_location', array('hide_empty' => 0));
                                echo '<select multiple="true" id="location" class="chosen-select form-control" name="job_location[]">';
                                foreach ($job_category as $term) {
                                    if ($term->parent == 0) {
//                                        if ($i++ != 0)
                                        echo '</optgroup>';
                                        echo '<optgroup label="' . $term->name . '">';
                                        $id = $term->term_id;
                                        $args = array("child_of" => $id, 'hide_empty' => 0);
                                        $this_term = get_terms('job_location', $args);
                                        foreach ($this_term as $the_term) {
                                            $term_name = str_replace($term->name, '', $the_term->name);
                                            echo '<option value="' . $the_term->term_id . '">' . $the_term->name . '</option>';
                                        }
                                    }
                                }
                                echo '</select>';
                                ?>
                            </div>
                        </div>                            
                    </div>
                    <div class="col-sm-3">
                        <input type="submit" class="btn btn-primary" id="btnSearch" value="Tìm kiếm" />                
                    </div>
                </div>
            </form>
        </div>
    </div><!--End .ibox-->

    <div class="space"></div>
    <div class="ibox box-level shadow text-center">
        <div class="ibox-title">
            <h5 class="text-uppercase text-left">Tìm kiếm theo trình độ tiếng Nhật</h5>
        </div>
        <div class="row">
            <ul class="level clearfix">
                <li class="col-sm-3 col-xs-6">
                    <a href="<?php the_permalink(118) ?>?level=N1" target="_blank" class="text-uppercase text-center icon-square">N1</a>
                    <span class="text-uppercase">Trình độ N1</span>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="<?php the_permalink(118) ?>?level=N2" target="_blank" class="text-uppercase text-center icon-square">N2</a>
                    <span class="text-uppercase">Trình độ N2</span>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="<?php the_permalink(118) ?>?level=N3" target="_blank" class="text-uppercase text-center icon-square">N3</a>
                    <span class="text-uppercase">Trình độ N3</span>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="<?php the_permalink(118) ?>?level=N4" target="_blank" class="text-uppercase text-center icon-square">Mới biết</a>
                    <span class="text-uppercase">Trình độ Mới biết</span>
                </li>
            </ul><!--End .level-->        
        </div><!--End .row-->
    </div><!--End .ibox-->

    <div class="space"></div>

    <div class="ibox box-level shadow text-center">            
        <div class="ibox-title">
            <h5 class="text-uppercase text-left">Loại hình công việc</h5>
        </div>
        <div class="row">
            <ul class="level text-left" id="cat_job">
                <?php
                $danhmuc = get_terms('job_category', 'orderby=count&hide_empty=0');

                foreach ($danhmuc as $dm) {
                    ?>
                    <li class="col-xs-12 col-sm-4">
                        <a href="<?php echo get_term_link($dm->slug, 'job_category') ?>"><?php echo $dm->name ?> (<span class="soluong"><?php echo esc_html($dm->count) ?></span>)</a>
                    </li>                                                                
                <?php } ?>
            </ul>            
        </div><!--End .row-->
    </div>

    <div class="space"></div>

    <div class="ibox shadow">
        <div class="ibox-title">
            <h5 class="text-uppercase">Việc làm mới</h5>
        </div>
        <div class="row">
            <div id="job_new">
                <?php
                $job_args = array(
                    'posts_per_page' => 6,
                    'post_type' => 'cv_job',
                    'post_status' => 'publish'
                );
                $job_query = new WP_Query($job_args);
                if ($job_query->have_posts()) :
                    while ($job_query->have_posts()) : $job_query->the_post();
                        $map = get_post_meta(get_the_ID(), '_map', true);
                        ?>
                        <div class="job_item clearfix">
                            <div class="row">
                                <div class="col-sm-3 img-block">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_cover_image', true), 'full', '', array('class' => 'img-responsive'));
                                        ?>
                                    </a>
                                </div>                    
                                <div class="col-sm-9 job-block">
                                    <h3 class="job_title"><a href="<?php the_permalink() ?>" alt="<?php the_title() ?>"><?php the_title() ?></a></h3>
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
                                </div>
                            </div>
                        </div><!--End .job_item-->
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>            
            </div><!--End #job_new-->
        </div><!--End .row-->
    </div><!--End .ibox-->

    <div class="clearfix"></div>

    <p class="text-right">
        <a href="#" target="_blank" class="view-more">Xem tất cả công việc <i class="fa fa-angle-double-right"></i></a>
    </p>

    <div id="pinned_article">
        <div class="row">
            <div class="col-xs-6 col-sm-3 item">
                <a href="#">
                    <div class="box-hover">
                        <img src="<?php echo get_template_directory_uri() ?>/img/ipad-632394.jpg" alt="" />
                        <div class="img-shade"></div>
                        <div class="article_til">Quy tắc làm thêm ở Nhật</div>
                    </div>                        
                </a>
            </div>
            <div class="col-xs-6 col-sm-3 item">
                <a href="#">
                    <div class="box-hover">
                        <img src="<?php echo get_template_directory_uri() ?>/img/avatar-2191918_1920.jpg" alt="" />
                        <div class="img-shade"></div>                        
                        <div class="article_til">Sổ tay hướng dẫn làm thêm</div>
                    </div>                        
                </a>
            </div>
            <div class="col-xs-6 col-sm-3 item">
                <a href="#">
                    <div class="box-hover">
                        <img src="<?php echo get_template_directory_uri() ?>/img/qa.jpg" alt="" />
                        <div class="img-shade"></div>                        
                        <div class="article_til">Hỏi & đáp</div>
                    </div>
                </a>                    
            </div>
            <div class="col-xs-6 col-sm-3 item">
                <a href="#">
                    <div class="box-hover">
                        <img src="<?php echo get_template_directory_uri() ?>/img/avatar-2191918_1920.jpg" alt="" />
                        <div class="img-shade"></div>
                        <div class="article_til">Về asibaito</div>
                    </div>                        
                </a>
            </div>
        </div><!--End .row-->
    </div>

    <section class="bg-gray">
        <h3 class="top-title text-uppercase text-center">Tin tức</h3>
        <div class="row">
            <?php
            $news_args = array('posts_per_page' => 3, 'category' => 76);

            $news_posts = get_posts($news_args);
            foreach ($news_posts as $post) : setup_postdata($post);
                ?>
                <div class="col-sm-4">
                    <div class="ibox shadow">
                        <div class="ibox-content blog-content item">
                            <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title()) ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/default.jpg" />';
                                }
                                ?>
                            </a>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <ul class="small list-inline">
                                <li><span class="text-muted"><i class="fa fa-clock-o"></i> <?php the_time('d/m/Y'); ?></span></li>
                                <li><span class="text-muted"><i class="fa fa-clock-o"></i> Mẹo văn phòng</span></li>
                            </ul>
                            <p><?php the_excerpt() ?></p>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            wp_reset_postdata();
            ?>            
            <div class="clearfix"></div>
            <p class="text-right">
                <a href="#" target="_blank" class="view-more">Xem tất cả bài viết <i class="fa fa-angle-double-right"></i></a>
            </p>
        </div>
    </section><!--End .bg-gray-->

    <?php
    get_footer();

    