<?php /* Template Name: Page Confirm */ ?>
<?php get_header(); ?>
<div class="section" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <!-- section -->
                <section class="bgwhite">
                    <div id="breadcrumb" class="breadcrumb inner wrap cf"><?php breadcrumb() ?></div>

                    <div class="stepbox clearfix">
                        <ul class="list-inline">
                            <li class="step01 step"><span class="step-num">1</span>Nhập vào</li>
                            <li class="step02 step current"><span class="step-num">2</span>Xác nhận</li>
                            <li class="step03 step"><span class="step-num">3</span>Hoàn tất</li>
                        </ul>
                    </div>

                    <?php
                    $user_data = $_REQUEST['input_form'];
//                    echo '<pre>';
//                    print_r($user_data);
//                    echo '</pre>';
                    $jobID = $_REQUEST['input_form']['job_id'];
                    $birthday = $user_data['birth_year'] . '/' . $user_data['birth_month'] . '/' . $user_data['birth_day'];
//
//                    $apply_info = array(
//                        'post_title' => wp_strip_all_tags('Ứng viên ' . rand()),
//                        'post_type' => 'job_application',
//                        'post_parent' => $jobID,
//                        'post_status' => 'publish'
//                    );
//
//                    $job_apply = wp_insert_post($apply_info);
//                    if ($job_apply) {
//                        // insert post meta
//                        foreach ($user_data as $user_key => $value):
//                            if ($user_key == 'job_id' || $value == '')
//                                continue;
//                            add_post_meta($job_apply, $user_key, $value);
//                        endforeach;
//                        // Insert status job apply. Default pending
//                        add_post_meta($job_apply, '_job_apply_confirm', 'pending');
//
//                        wp_redirect(get_page_link(103));
//                        exit;
//                    }
                    ?>
                    <div class="work-info well well-lg">
                        <?php ?>
                        <p>Công việc: 【<a href="<?php the_permalink($_REQUEST['jobID']) ?>" target="_blank" data-toggle="tooltip" title="Xem chi tiết"><?php echo get_the_title($_REQUEST['jobID']) ?></a>】</p>
                    </div>

                    <div class="entry-content">
                        <h1 class="title-job">Ứng tuyển việc làm</h1>
                        <p class="txt">Hãy xác nhận nội dung bạn đã nhập.</p>

                        <div class="table-responsive"> 
                            <table class="table table-striped">
                                <tbody><tr>
                                        <th style="">Tên của bạn <span class="label-required">✳</span></th>
                                        <td><?php echo $user_data['_uv_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Giới tính</th>
                                        <td><?php echo $user_data['_gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ngày sinh <span class="label-required">✳</span></th>
                                        <td><?php echo $birthday ?></td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại <span class="label-required">✳</span></th>
                                        <td><?php echo $user_data['_tel'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>E-mail</th>
                                        <td><a href="mailto:<?php echo $user_data['_email'] ?>"><?php echo $user_data['_email'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <td><?php echo $user_data['_address'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nghề nghiệp</th>
                                        <td><?php echo $user_data['_employer'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Quốc tịch</th>
                                        <td><?php echo $user_data['_country'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kỳ thi Năng lực tiếng Nhật (JLPT) </th>
                                        <td><?php echo $user_data['_jlpt_level'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Giới thiệu bản thân </th>
                                        <td><?php echo $user_data['_about_me'] ?></td>
                                    </tr>

                                </tbody></table>
                        </div>

                        <form id="finish_form" method="post" action="<?php echo get_page_link(105) ?>">
                            <input type="hidden" name="input_form[job_id]" value="<?php echo $jobID ?>">
                            <input type="hidden" name="input_form[_uv_name]" value="<?php echo $user_data['_uv_name'] ?>">
                            <input type="hidden" name="input_form[_gender]" value="<?php echo $user_data['_gender'] ?>">
                            <input type="hidden" name="input_form[_birthday]" value="<?php echo $birthday ?>">
                            <input type="hidden" name="input_form[_tel]" value="<?php echo $user_data['_tel'] ?>">
                            <input type="hidden" name="input_form[_email]" value="<?php echo $user_data['_email'] ?>">
                            <input type="hidden" name="input_form[_address]" value="<?php echo $user_data['_address'] ?>">
                            <input type="hidden" name="input_form[_employer]" value="<?php echo $user_data['_employer'] ?>">
                            <input type="hidden" name="input_form[_country]" value="<?php echo $user_data['_country'] ?>">
                            <input type="hidden" name="input_form[_jlpt_level]" value="<?php echo $user_data['_jlpt_level'] ?>">
                            <input type="hidden" name="input_form[_about_me]" value="<?php echo $user_data['_about_me'] ?>">
                            <?php wp_nonce_field('submit_token'); ?>
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group btn-group-lg">
                                    <input id="back_button" class="btn-back btn" type="button" name="submit" value="Sửa thông tin">
                                </div>
                                <div class="btn-group btn-group-lg">
                                    <input id="entry_button" class="btn-send btn" type="submit" name="submit" value="Ứng tuyển">
                                </div>
                            </div>

                            <div class="mail-check">
                                <label><input type="checkbox" id="chk_mail_magazine_flg" value="1" checked="checked">Nhận tạp chí thông tin việc làm qua email.</label>
                                <p class="txt">Hãy bỏ chọn mục "Đăng ký nhận Tạp chí thông tin việc làm qua email" nếu bạn không muốn nhận qua email.</p>
                            </div>
                        </form>
                    </div><!--End .entry-content-->
                </section>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

