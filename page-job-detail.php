<?php /* Template Name: Job Detail */ ?>
<?php get_header(); ?>
<div class="section" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">                                

                <!-- section -->
                <section class="bgwhite">
                    <div id="breadcrumb" class="breadcrumb inner wrap cf"><?php breadcrumb() ?></div>

                    <div class="stepbox clearfix">
                        <ul class="list-inline">
                            <li class="step01 step current"><span class="step-num">1</span>Nhập vào</li>
                            <li class="step02 step"><span class="step-num">2</span>Xác nhận</li>
                            <li class="step03 step"><span class="step-num">3</span>Hoàn tất</li>
                        </ul>
                    </div>

                    <div class="short-desc clearfix hidden">
                        <p class="txt">Với ai chưa là thành viên, việc đăng ký thành viên sẽ hoàn tất cùng lúc với việc ứng tuyển.</p>
                        <p id="login_modal_open" class="open-login"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Đăng nhập để xem thông tin thành viên</p>
                    </div>

                    <div class="work-info well well-lg">
                        <?php
                        ?>
                        <p>Công việc: 【<a href="<?php the_permalink($_REQUEST['jobID']) ?>" target="_blank" data-toggle="tooltip" title="Xem chi tiết"><?php echo get_the_title($_REQUEST['jobID']) ?></a>】</p>
                    </div>                    

                    <div class="entry-content">
                        <h1 class="title-job">Ứng tuyển việc làm</h1>
                        <p class="txt">Hãy nhập thông tin cá nhân của bạn sau khi xác nhận thông tin tuyển dụng việc làm.</p>                    

                        <form id="entry_form" class="form-horizontal" action="<?php echo get_page_link(18) ?>" method="post">
                            <?php wp_nonce_field('job_apply_nonce', 'job_apply_nonce_field'); ?>
                            <input type="hidden" name="input_form[job_id]" id="job-id" value="<?php echo $_REQUEST['jobID'] ?>" />
                            <div class="form-group">
                                <label for="fullname" class="col-sm-3 control-label">Tên của bạn <span class="label-required">✳</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="fullname" name="input_form[_uv_name]" placeholder="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Giới tính</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="input_form[_gender]" checked="" value="Female">Nam
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="input_form[_gender]" value="Male">Nữ
                                    </label>                                
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label for="birthday-year" class="col-sm-3 control-label">Ngày sinh <span class="label-required">✳</span></label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <select name="input_form[birth_year]" class="form-control" id="birthday-year">
                                                <option value>Year</option>
                                                <?php for ($i = 2008; $i >= 1980; $i--): ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php endfor; ?>                                            
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <select name="input_form[birth_month]" class="birthday-month form-control">
                                                <option value>Month</option>
                                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <select name="input_form[birth_day]" class="birthday-day form-control">
                                                <option value>Day</option>
                                                <?php for ($i = 1; $i < 31; $i++): ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label for="telephone_number" class="col-sm-3 control-label">Số điện thoại <span class="label-required">✳</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="input_form[_tel]" id="telephone_number" value="" maxlength="12" class="form-control">
                                </div>
                            </div> <!-- /.form-group -->                        
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">E-mail <span class="label-required">✳</span></label>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="input_form[_email]" class="form-control" value="" placeholder="">
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Địa chỉ <span class="label-required">✳</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="input_form[_address]" id="address" class="form-control" value="" placeholder="">
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label for="job_type" class="col-sm-3 control-label">Nghề nghiệp</label>
                                <div class="col-sm-6">
                                    <select name="input_form[_employer]" id="job_type" class="form-control">
                                        <?php echo do_shortcode('[employer]') ?>
                                    </select>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label for="nationality_code" class="col-sm-3 control-label">Quốc tịch</label>
                                <div class="col-sm-6">                                
                                    <select name="input_form[_country]" class="form-control" id="nationality_code">
                                        <?php echo do_shortcode('[countries]') ?>                                    
                                    </select>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label for="jlpt_code" class="col-sm-3 control-label">Kỳ thi Năng lực tiếng Nhật (JLPT) <span class="label-required">✳</span></label>
                                <div class="col-sm-6">
                                    <select name="input_form[_jlpt_level]" class="form-control" id="jlpt_code">
                                        <?php echo do_shortcode('[japan_level]') ?>                                    
                                    </select>
                                </div>
                            </div> <!-- /.form-group -->                                          
                            <div class="form-group">
                                <label for="entry_appeal_point" class="col-sm-3 control-label">Giới thiệu bản thân</label>
                                <div class="col-sm-6">
                                    <textarea name="input_form[_about_me]" id="entry_appeal_point" class="form-control" rows="6" 
                                              placeholder="Hãy chứng tỏ bản thân để được nhà tuyển dụng lựa chọn!"></textarea>
                                </div>
                            </div> <!-- /.form-group -->                        
                            <div class="form-group">
                                <div class="col-sm-3 col-sm-offset-3">
                                    <button type="submit" value="submit" class="btn btn-primary btn-block btn-lg">Xác nhận nội dung</button>
                                </div>                            
                            </div> <!-- /.form-group -->

                        </form>



                        <div id="login_modal" class="login-modal modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">                                

                                </div>
                            </div>
                        </div>
                    </div><!--End .entry-content-->
                </section>
            </div>            
        </div>
    </div>
</div>
<?php
get_footer();

