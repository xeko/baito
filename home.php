<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <section id="topPage" class="clearfix">
            <div class="container">
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
                        <p class="h2 phone-number"><a href="tel:08037352142"><i class="fa fa-phone" aria-hidden="true"></i> 080-3735-2142</a></p>
                        <p class="text-regular text-small">Thời gian làm việc: 9:00-18:00 từ thứ 2 đến thứ 6</p>
                    </div>
                </div>
            </div>
        </section><!--End #topPage-->
    </div>
</div><!--End .container-fluid-->

<div class="container">
    <div class="row">
        <div class="ibox float-e-margins clearfix">
            <div class="ibox-title">
                <h5>TÌM VIỆC LÀM PHÙ HỢP</h5>
            </div>
            <div class="ibox-content">
                <form name="search" id="frm_block_quick_search" action="" method="post">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="mb10 col-sm-12">
                                <input id="keywordMainSearch" class="form-control search-all" name="job_title" placeholder="">
                            </div>
                            <div class="mb10 col-sm-6">
                                <select data-placeholder="japanese level" class="form-control" id="japaneseLevelMainSearch" name="jp_level" tabindex="-1">
                                    <option value="0">Tất cả trình độ</option>
                                    <option value="1">Beginner</option>
                                    <option value="2">N3</option>
                                    <option value="3">N2</option>
                                    <option value="4">N1</option>
                                </select>
                            </div>

                            <div class="mb10 col-sm-6">
                                <div class="textbox">
                                    <select data-placeholder="salary" id="salaryMainSearch" name="salary_level" style="width: 100%;" class="form-control">
                                        <option value="0">Tất cả mức lương</option>
                                        <option value="1">&lt;$500</option>                                
                                    </select>
                                </div>
                            </div>
                            <div class="mb10 col-sm-6">
                                <select data-placeholder="Tất cả ngành nghề" multiple="" class="chosen-select form-control" id="cateListMainSearch" name="job_category[]" tabindex="-1" style="display: none;">
                                    <option value="72">In ấn/ Xuất bản</option>
                                    <option value="39">Khác</option>
                                </select>
                                <div class="chosen-container chosen-container-multi" id="cateListMainSearch_chosen">
                                    <ul class="chosen-choices"><li class="search-field">
                                            <input type="text" value="Tất cả ngành nghề" class="default" autocomplete="off" tabindex="-1">
                                        </li>
                                    </ul>
                                    <div class="chosen-drop"><ul class="chosen-results"></ul></div>
                                </div>
                            </div>
                            <div class="mb10 col-sm-6">
                                <select data-placeholder="Tất cả địa điểm" multiple="" class="chosen-select form-control" id="locationMainSearch" name="job_location[]" tabindex="-1" style="display: none;">
                                    <option value="29">Hồ Chí Minh</option>
                                    <option value="24">Hà Nội</option>                                                            
                                </select>
                                <div class="chosen-container chosen-container-multi" title="" id="locationMainSearch_chosen">
                                    <ul class="chosen-choices">
                                        <li class="search-field">
                                            <input type="text" value="Tất cả địa điểm" class="default" autocomplete="off" tabindex="-1">
                                        </li>
                                    </ul>
                                    <div class="chosen-drop">
                                        <ul class="chosen-results"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb10 col-sm-12">
                                <input onclick="ga('send', 'event', 'job_search', 'click', 'search_on_homepage');" type="submit" class="btn btn-primary" id="btnSearch" value="Tìm kiếm" style="width:100%;" data-original-title="" title="">
                            </div>                            
                        </div>

                    </div>
                </form>
            </div>    
            <div class="ibox-footer bg-pink no-borders" style="font-size:14px;text-align:center">
                <p><a href="#"><span style="color:red"><strong>Đăng nhập và tải hồ sơ</strong></span></a> để có thể xin việc mọi lúc mọi nơi</p>
            </div>

        </div>
    </div><!--End .row-->
    <div class="space clearfix"></div>
    <div class="row clearfix">
        <h3 class="banner-group-title text-center">Tìm kiếm công việc theo trình độ tiếng Nhật</h3>        
        <ul class="level-categories list-unstyled">
            <li class="col-sm-3 col-xs-6">
                <a onclick="ga('send', 'event', 'search_job_by', 'click', 'n1')" href="http://japan.vietnamworks.com/japan/type/?jpl=n01level" target="_blank" class="text-uppercase hi-icon hi-icon-text hi-icon-n1"></a>
                <span class="category-title">Trình độ N1</span>
            </li>
            <li class="col-sm-3 col-xs-6">
                <a onclick="ga('send', 'event', 'search_job_by', 'click', 'n2')" href="http://japan.vietnamworks.com/japan/type/?jpl=n02level" target="_blank" class="text-uppercase hi-icon hi-icon-text hi-icon-n2">Trình độ N2</a>
                <span class="category-title">Trình độ N2</span>
            </li>
            <li class="col-sm-3 col-xs-6">
                <a onclick="ga('send', 'event', 'search_job_by', 'click', 'n3')" href="http://japan.vietnamworks.com/japan/type/?jpl=n03level" target="_blank" class="text-uppercase hi-icon hi-icon-text hi-icon-n3">Trình độ N3</a>
                <span class="category-title">Trình độ N3</span>
            </li>
            <li class="col-sm-3 col-xs-6">
                <a onclick="ga('send', 'event', 'search_job_by', 'click', 'beginner')" href="http://japan.vietnamworks.com/japan/type/?jpl=japanesebeginner" target="_blank" class="text-uppercase hi-icon hi-icon-text hi-icon-n0">Trình độ Mới biết</a>
                <span class="category-title">Trình độ Mới biết</span>
            </li>
        </ul>                
    </div>
    <div class="row">
        <div class="col-sm-12 left_side">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Việc làm mới</h5>
                </div>
                <div class="ibox-content" id="results">
                    <div id="blueimp-gallery" class="blueimp-gallery">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                    </div>                                        
                    <div class="row row_dotted">

                        <div class="col-sm-9 job-block red-bold">
                            <a target="_blank" onclick="ga('send', 'event', 'job', 'click', 'newjobs')" href="http://japan.vietnamworks.com/job/777504-0114-hcm-tuyen-gap-ky-su-cau-noi-brse-thanh-thao-tieng-nhat-co-hoi-onsite-tai-nhat-tu-13-nam" class="job-title">[0114-HCM] (TUYỂN GẤP!!!) Kỹ Sư Cầu Nối (BrSE) Thành thạo Tiếng Nhật (cơ Hội Onsite Tại Nhật Từ 1~3 Năm)</a>

                            <div class="info">
                                <span class="date-info">
                                    <span class="fa fa-calendar"></span>
                                    25/03/2017            </span>

                                <span class="place-info">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Hồ Chí Minh            </span>
                                <br>

                                <span class="salary">
                                    Mức lương: <a href="http://japan.vietnamworks.com/login" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem mức lương</a>
                                </span>
                                <br><span class="view-num"><i class="fa fa-eye"></i> Xem: 263 lượt</span>
                            </div>
                            <!-- image job-->

                            <!-- skill -->
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar  progress-small progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/japanese-n1-or-n2" title="Japanese ( N1 Or N2)">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Japanese ( N1 Or N2)</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/developer" title="Developer">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Developer</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/bse" title="BSE">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">BSE</em>
                                    </a>
                                </div>
                            </div>
                            <!-- end skill -->




                        </div>

                        <div class="col-sm-3 name-block">Công Ty IT Lớn Của Nhật</div>

                        <div class="col-sm-12 benefit benefit777504">

                            <a> <i class="fa fa-gift"></i> &nbsp;Phúc lợi công ty <i class="small fa fa-chevron-down"></i> </a>

                            <ul>
                                <li>
                                    <span class="fa fa-fw fa-dollar"></span>
                                    &nbsp;Được tham gia lớp học tiếng Nhật dành cho nhân viên                    </li>
                                <li>
                                    <span class="fa fa-fw fa-user-md"></span>
                                    &nbsp;Du lịch công ty mỗi năm 1 lần                    </li>
                                <li>
                                    <span class="fa fa-fw fa-file-image-o"></span>
                                    &nbsp;Đăng ký bảo hiểm tai nạn 24/24 cho nhân viên                    </li>
                            </ul>
                        </div>

                    </div>
                    <div class="row row_dotted">

                        <div class="col-sm-9 job-block red-bold">
                            <a target="_blank" onclick="ga('send', 'event', 'job', 'click', 'newjobs')" href="http://japan.vietnamworks.com/job/777487-0114-hcm-tuyen-gap-project-manager-thanh-thao-tieng-nhat-luong-thoa-thuan" class="job-title">[0114-HCM] (TUYỂN GẤP!!!) Project Manager Thành thạo Tiếng Nhật (lương Thỏa Thuận)</a>




                            <div class="info">
                                <span class="date-info">
                                    <span class="fa fa-calendar"></span>
                                    25/03/2017            </span>

                                <span class="place-info">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Hồ Chí Minh            </span>
                                <br>

                                <span class="salary">
                                    Mức lương: Thỏa thuận            </span>
                                <br><span class="view-num"><i class="fa fa-eye"></i> Xem: 162 lượt</span>
                            </div>
                            <!-- image job-->

                            <!-- skill -->
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar  progress-small progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/japanese-n1-or-n2" title="Japanese ( N1 Or N2)">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Japanese ( N1 Or N2)</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/japanese-speaking-project-manager" title="Japanese Speaking Project Manager">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Japanese Speaking Project Manager</em>
                                    </a>
                                </div>
                            </div>
                            <!-- end skill -->




                        </div>

                        <div class="col-sm-3 name-block">Công Ty IT Lớn Của Nhật</div>

                        <div class="col-sm-12 benefit benefit777487">

                            <a> <i class="fa fa-gift"></i> &nbsp;Phúc lợi công ty <i class="small fa fa-chevron-down"></i> </a>

                            <ul>
                                <li>
                                    <span class="fa fa-fw fa-dollar"></span>
                                    &nbsp;Được tham gia lớp học tiếng Nhật dành cho nhân viên                    </li>
                                <li>
                                    <span class="fa fa-fw fa-user-md"></span>
                                    &nbsp;Du lịch công ty mỗi năm 1 lần                    </li>
                                <li>
                                    <span class="fa fa-fw fa-file-image-o"></span>
                                    &nbsp;Đăng ký bảo hiểm tai nạn 24/24 cho nhân viên                    </li>
                            </ul>
                        </div>

                    </div>
                    <div class="row row_dotted">

                        <div class="col-sm-9 job-block red-bold">
                            <a target="_blank" onclick="ga('send', 'event', 'job', 'click', 'newjobs')" href="http://japan.vietnamworks.com/job/777448-system-engineer-programmer" class="job-title">System Engineer &amp; Programmer</a>




                            <div class="info">
                                <span class="date-info">
                                    <span class="fa fa-calendar"></span>
                                    25/03/2017            </span>

                                <span class="place-info">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Hà Nội            </span>
                                <br>

                                <span class="salary">
                                    Mức lương: Thỏa thuận            </span>
                                <br><span class="view-num"><i class="fa fa-eye"></i> Xem: 263 lượt</span>
                            </div>
                            <!-- image job-->
                            <div class="co-photos-block">
                                <div class="lightBoxGallery" id="777448">

                                    <a rel="group_777448" href="https://images.vietnamworks.com/company_profile/33928.jpg" title="" data-gallery="#blueimp-gallery-777448">
                                        <img src="https://images.vietnamworks.com/company_profile/33928.jpg" class="first" width="114">
                                    </a>

                                    <a rel="group_777448" href="https://images.vietnamworks.com/company_profile/43043.jpg" title="" data-gallery="#blueimp-gallery-777448">
                                        <img src="https://images.vietnamworks.com/company_profile/43043.jpg" width="114">
                                    </a>

                                    <a rel="group_777448" href="https://images.vietnamworks.com/company_profile/43044.jpg" title="" data-gallery="#blueimp-gallery-777448">
                                        <img src="https://images.vietnamworks.com/company_profile/43044.jpg" width="114">
                                    </a>

                                    <a rel="group_777448" href="https://images.vietnamworks.com/company_profile/43056.jpg" title="" data-gallery="#blueimp-gallery-777448">
                                        <img src="https://images.vietnamworks.com/company_profile/43056.jpg" width="114">
                                    </a>
                                </div>
                            </div>

                            <!-- skill -->
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar  progress-small progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/database-sql" title="Database/ SQL">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Database/ SQL</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/code-coding" title="Code / Coding">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Code / Coding</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/software-engineering" title="Software Engineering">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Software Engineering</em>
                                    </a>
                                </div>
                            </div>
                            <!-- end skill -->




                        </div>

                        <div class="col-sm-3 name-block">MAT (vietnam) Co., Ltd.</div>

                        <div class="col-sm-12 benefit benefit777448">

                            <a> <i class="fa fa-gift"></i> &nbsp;Phúc lợi công ty <i class="small fa fa-chevron-down"></i> </a>

                            <ul>
                                <li>
                                    <span class="fa fa-fw fa-dollar"></span>
                                    &nbsp;Performance Bonus                    </li>
                                <li>
                                    <span class="fa fa-fw fa-user-md"></span>
                                    &nbsp;Social and health insurance based on Vietnam Labour Law                    </li>
                                <li>
                                    <span class="fa fa-fw fa-graduation-cap"></span>
                                    &nbsp;Oversea training opportunities                    </li>
                            </ul>
                        </div>

                    </div>
                    <div class="row row_dotted">

                        <div class="col-sm-9 job-block red-bold">
                            <a target="_blank" onclick="ga('send', 'event', 'job', 'click', 'newjobs')" href="http://japan.vietnamworks.com/job/774427-phien-dich-tieng-nhat" class="job-title">Phiên Dịch Tiếng Nhật</a>




                            <div class="info">
                                <span class="date-info">
                                    <span class="fa fa-calendar"></span>
                                    24/03/2017            </span>

                                <span class="place-info">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Hà Nội            </span>
                                <br>

                                <span class="salary">
                                    Mức lương: <a href="http://japan.vietnamworks.com/login" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem mức lương</a>
                                </span>
                                <br><span class="view-num"><i class="fa fa-eye"></i> Xem: 600 lượt</span>
                            </div>
                            <!-- image job-->

                            <!-- skill -->
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar  progress-small progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/hành-chánh-thư-ký" title="Hành Chánh - Thư Ký">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Hành Chánh - Thư Ký</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/dịch-thuật-thông-dịch-viên" title="Dịch Thuật/ Thông Dịch Viên">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Dịch Thuật/ Thông Dịch Viên</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/biên-phiên-dịch-tiếng-nhật" title="Biên Phiên Dịch Tiếng Nhật">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Biên Phiên Dịch Tiếng Nhật</em>
                                    </a>
                                </div>
                            </div>
                            <!-- end skill -->




                        </div>

                        <div class="col-sm-3 name-block">Công Ty Cổ Phần Kiến Trúc Và Nội Thất HD Style</div>

                        <div class="col-sm-12 benefit benefit774427">

                            <a> <i class="fa fa-gift"></i> &nbsp;Phúc lợi công ty <i class="small fa fa-chevron-down"></i> </a>

                            <ul>
                                <li>
                                    <span class="fa fa-fw fa-dollar"></span>
                                    &nbsp;Được hưởng mức lương hấp dẫn, phù hợp với năng lực và các chế độ phúc lợi mở rộng khác                    </li>
                                <li>
                                    <span class="fa fa-fw fa-user-md"></span>
                                    &nbsp;Hưởng các chế độ đãi ngộ theo luật lao động như: BHXH, BHYT, BHTN …                    </li>
                                <li>
                                    <span class="fa fa-fw fa-check-square-o"></span>
                                    &nbsp;Được làm việc trong môi trường năng động, chuyên nghiệp.                    </li>
                            </ul>
                        </div>

                    </div>

                    <div class="row row_dotted">

                        <div class="col-sm-9 job-block red-bold">
                            <a target="_blank" onclick="ga('send', 'event', 'job', 'click', 'newjobs')" href="http://japan.vietnamworks.com/job/777917-★☆★-nhan-vien-hanh-chinh-nhan-su-tong-hop" class="job-title">★☆★ Nhân Viên Hành Chính Nhân Sự Tổng Hợp</a>




                            <div class="info">
                                <span class="date-info">
                                    <span class="fa fa-calendar"></span>
                                    24/03/2017            </span>

                                <span class="place-info">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Hồ Chí Minh            </span>
                                <br>

                                <span class="salary">
                                    Mức lương: <a href="http://japan.vietnamworks.com/login" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem mức lương</a>
                                </span>
                                <br><span class="view-num"><i class="fa fa-eye"></i> Xem: 2876 lượt</span>
                            </div>
                            <!-- image job-->

                            <!-- skill -->
                            <div class="skills">
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar  progress-small progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/admin" title="Admin">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Admin</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/nhân-sự" title="Nhân Sự">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Nhân Sự</em>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <div class="progress progress-xxs">


                                            <div class="progress-bar progress-small progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <a class="skill" href="http://japan.vietnamworks.com/kw/hành-chính" title="Hành Chính">
                                        <em class="text-xs gray col-sm-10 col-xs-10 text-clip">Hành Chính</em>
                                    </a>
                                </div>
                            </div>
                            <!-- end skill -->




                        </div>

                        <div class="col-sm-3 name-block">Công Ty TNHH Yamato Logistics Việt Nam</div>

                        <div class="col-sm-12 benefit benefit777917">

                            <a> <i class="fa fa-gift"></i> &nbsp;Phúc lợi công ty <i class="small fa fa-chevron-down"></i> </a>

                            <ul>
                                <li>
                                    <span class="fa fa-fw fa-dollar"></span>
                                    &nbsp;Thu nhập hấp dẫn, được xét tăng lương, thưởng theo năng lực                    </li>
                                <li>
                                    <span class="fa fa-fw fa-user-md"></span>
                                    &nbsp;Được hưởng chế độ bảo hiểm xã hội, bảo hiểm y tế, bảo hiểm thất nghiệp theo luật định                    </li>
                                <li>
                                    <span class="fa fa-fw fa-graduation-cap"></span>
                                    &nbsp;Có cơ hội được đào tạo, phát triển sự nghiệp trong môi trường chuyên nghiệp của Nhật Bản                    </li>
                            </ul>
                        </div>

                    </div>                    
                </div>
                <div class="row">
                    <span>
                        <a href="http://japan.vietnamworks.com/japan/type/?date=last3days" target="_blank" class="view-more">Xem tất cả việc làm mới <i class="fa fa-angle-double-right"></i></a>
                    </span>
                </div>
            </div>
        </div>
        <!-- Right column -->
    </div>
</div><!--End .container-->
<section class="bg-gray">
    <div class="container">
        <?php
        global $jobman_shortcode_jobs, $jobman_shortcode_all_jobs, $jobman_shortcode_category, $jobman_shortcodes, $jobman_field_shortcodes, $wp_query;
        $options = get_option('jobman_options');

        $content = '';

        $page = get_post($options['main_page']);

        if ('all' != $cat) {
            $page->ID = -1;
            $page->post_type = 'jobman_joblist';
            $page->post_title = __('Jobs Listing', 'jobman');
        }

        if ('all' != $cat) {
            $jobman_shortcode_category = $category = get_term($cat, 'jobman_category');
            if (NULL == $category) {
                $cat = 'all';
            } else {
                $page->post_title = $category->name;
                $page->post_parent = $options['main_page'];
                $page->post_name = $category->slug;
            }
        }

        $args = array(
            'post_type' => 'jobman_job',
            'suppress_filters' => false
        );

        if (!empty($options['sort_by'])) {
            switch ($options['sort_by']) {
                case 'title':
                    $args['orderby'] = 'title';
                    break;
                case 'dateposted':
                    $args['orderby'] = 'date';
                    break;
                case 'closingdate':
                    $args['orderby'] = 'meta_value';
                    $args['meta_key'] = 'displayenddate';
                    break;
                default:
                    $args['orderby'] = 'meta_value';
                    $args['meta_key'] = $options['sort_by'];
                    break;
            }
        }

        if ($options['jobs_per_page'] > 0) {
            $args['numberposts'] = $options['jobs_per_page'];
            $args['posts_per_page'] = $options['jobs_per_page'];

            if (array_key_exists('page', $wp_query->query_vars) && $wp_query->query_vars['page'] > 1)
                $args['offset'] = ( $wp_query->query_vars['page'] - 1 ) * $options['jobs_per_page'];
        }
        else {
            $args['numberposts'] = -1;
        }

        if (in_array($options['sort_order'], array('asc', 'desc')))
            $args['order'] = $options['sort_order'];
        else
            $args['order'] = 'asc';

        if ('all' != $cat)
            $args['jcat'] = $category->slug;

        add_filter('posts_where', 'jobman_job_live_where');
        add_filter('posts_join', 'jobman_job_live_join');
        add_filter('posts_distinct', 'jobman_job_live_distinct');

        $jobs = get_posts($args);

        $related_cats = array();
        foreach ($jobs as $id => $job) {
            // Get related categories
            if ($options['related_categories']) {
                $categories = wp_get_object_terms($job->ID, 'jobman_category');
                if (count($categories) > 0) {
                    foreach ($categories as $cat) {
                        $related_cats[] = $cat->slug;
                    }
                }
            }
        }
        $related_cats = array_unique($related_cats);
        ?>
        <ul class="row list-cate list-unstyled text-small clearfix">
            <?php
            if ($options['related_categories'] && count($related_cats) > 0) {
                $links = array();
                foreach ($related_cats as $rc) {
                    $cat = get_term_by('slug', $rc, 'jobman_category');
                    ?>
                    <li class="col-sm-6 col-md-4">
                        <div class="tag gpjs-open-link">
                            <span class="tag-object default-icon default-icon-dashboard-full"></span>
                            <div class="tag-body">
                                <h4 class="tag-heading"><a href="<?php echo get_term_link($cat->slug, 'jobman_category') ?>" title="<?php echo $cat->name ?>"><?php echo $cat->name ?></a></h4>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>            
        </ul>
    </div>
</section><!--End .bg-gray-->
<section class="bgwhite">
    <div class="container wrapper-lg">        
        <div class="row">
            <section class="col-md-8">                
                <h3 class="text-uppercase text-gray">Loại hình công việc</h3>
                <ul class="list list-divided">
                    <li><a class="text-color" href="#">Kho xưởng</a></li>
                    <li><a class="text-color" href="#">Cơm hộp</a></li>
                    <li><a class="text-color" href="#">Yamato</a></li>
                    <li><a class="text-color" href="#">Mì lạnh</a></li>
                    <li><a class="text-color" href="#">Pha chế</a></li>
                    <li><a class="text-color" href="#">Làm bếp</a></li>
                    <li><a class="text-color" href="#">Chuyển nhà</a></li>
                    <li><a class="text-color" href="#">Combini</a></li>
                    <li><a class="text-color" href="#">Dọn dẹp</a></li>
                    <li><a class="text-color" href="#">Phát báo</a></li>                    
                </ul>
            </section>
            <aside class="col-md-4 pull-right-md">

                <div class="widget">
                    <div id="register" class="clearfix">
                        <div class="widget-header">
                            <big><a href="<?php echo get_bloginfo('url') ?>/dang-ky-ung-vien/" title="">Đăng ký ứng viên</a></big> <small><a href="<?php echo get_bloginfo('url') ?>/dang-nhap/">hoặc đăng nhập</a></small>
                        </div>
                        <div class="widget-body">
                            <p>Hoàn toàn miễn phí! Có tiền mừng tuyển dụng!</p>
                        </div>
                    </div><!--End #register-->
                    <div id="find-us-facebook" class="clearfix">
                        <div class="widget-header">
                            <h3 class="widget-heading">Find us on Facebook</h3>
                        </div>
                        <div class="widget-body">
                            <p><div class="fb-page" data-href="https://www.facebook.com/scfvietnam" data-small-header="true" 
                                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/scfvietnam" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/scfvietnam">SCF VietNam - Trung tâm hỗ trợ người Việt Nam tại Nhật Bản</a></blockquote></div></p>
                        </div>                    
                    </div><!--End #find-us-facebook-->
                </div>                                
            </aside>            
        </div>
    </div>
</section><!--End .bgwhite-->

<section class="section">	
    <div class="container">
        <div class="row text-center">
            <h3 class="section-title pull-left"><i class="fa fa-arrows" aria-hidden="true"></i> Contact</h3>
            <h2 class="h1 text-center">Liên hệ</h2>
            <p class="text-large text-gray-light">Để biết thông tin chi tiết、<br class="hidden-xs">hãy liên hệ bằng điện thoại hoặc form liên hệ dưới đây.</p>
            <p class="phone-number h1 mb-10"><i class="fa fa-phone" aria-hidden="true"></i><br /><a href="tel:08037352142"><span class="h2">080-3735-2142</span></a><br />
            </p>
            <small>営業時間<br class="visible-xs">月〜金 9:00-18:00<br>(祝日は営業しておりません)</small>
            <p class="btn-block-sm mb-50 center-block"><a class="btn btn-primary" href="#" title="お問い合わせ">お問い合わせ</a></p>
        </div>
    </div>
</section>
<?php
get_footer();

