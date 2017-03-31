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
        <div class="ibox shadow">
            <div class="ibox-title">
                <h5 class="text-uppercase">TÌM VIỆC LÀM PHÙ HỢP</h5>
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
                                <select multiple="true" class="chosen-select form-control" id="cateList" name="job_category[]">
                                    <option value="1">Cửa hàng ăn uống</option>
                                    <option value="2">Kho hàng, công xưởng</option>
                                    <option value="3">Phân loại hàng hoá</option>
                                    <option value="4">Văn phòng</option>
                                    <option value="5">Khách sạn</option>
                                    <option value="6">Phát tờ rơi</option>
                                    <option value="7">Chế biến thực phẩm</option>
                                    <option value="8">Nhân viên nhà bếp</option>
                                    <option value="9">Quán nhậu</option>
                                    <option value="10">Giao hàng, vận chuyển đồ đạc</option>
                                </select>                                
                            </div>
                            <div class="mb10 col-sm-6">                                
                                <select name="place_category[]" multiple="true" class="chosen-select form-control" id="listPlace">
                                    <option value="01" class="dropdown-select address01 option" id="sel_pref_code-1">北海道(Hokkaido)</option>
                                    <option value="02" class="dropdown-select address01 option" id="sel_pref_code-2">青森県(Aomori)</option>
                                    <option value="03" class="dropdown-select address01 option" id="sel_pref_code-3">岩手県(Iwate)</option>
                                    <option value="04" class="dropdown-select address01 option" id="sel_pref_code-4">宮城県(Miyagi)</option>
                                    <option value="05" class="dropdown-select address01 option" id="sel_pref_code-5">秋田県(Akita)</option>
                                    <option value="06" class="dropdown-select address01 option" id="sel_pref_code-6">山形県(Yamagata)</option>
                                    <option value="07" class="dropdown-select address01 option" id="sel_pref_code-7">福島県(Fukushima)</option>
                                    <option value="08" class="dropdown-select address01 option" id="sel_pref_code-8">茨城県(Ibaraki)</option>
                                    <option value="09" class="dropdown-select address01 option" id="sel_pref_code-9">栃木県(Tochigi)</option>
                                    <option value="10" class="dropdown-select address01 option" id="sel_pref_code-10">群馬県(Gunma)</option>
                                    <option value="11" class="dropdown-select address01 option" id="sel_pref_code-11">埼玉県(Saitama)</option>
                                    <option value="12" class="dropdown-select address01 option" id="sel_pref_code-12">千葉県(Chiba)</option>
                                    <option value="13" class="dropdown-select address01 option" id="sel_pref_code-13">東京都(Tokyo)</option>
                                    <option value="14" class="dropdown-select address01 option" id="sel_pref_code-14">神奈川県(Kanagawa)</option>
                                    <option value="15" class="dropdown-select address01 option" id="sel_pref_code-15">新潟県(Niigata)</option>
                                    <option value="16" class="dropdown-select address01 option" id="sel_pref_code-16">富山県(Toyama)</option>
                                    <option value="17" class="dropdown-select address01 option" id="sel_pref_code-17">石川県(Ishikawa)</option>
                                    <option value="18" class="dropdown-select address01 option" id="sel_pref_code-18">福井県(Fukui)</option>
                                    <option value="19" class="dropdown-select address01 option" id="sel_pref_code-19">山梨県(Yamanashi)</option>
                                    <option value="20" class="dropdown-select address01 option" id="sel_pref_code-20">長野県(Nagano)</option>
                                    <option value="21" class="dropdown-select address01 option" id="sel_pref_code-21">岐阜県(Gifu)</option>
                                    <option value="22" class="dropdown-select address01 option" id="sel_pref_code-22">静岡県(Shizuoka)</option>
                                    <option value="23" class="dropdown-select address01 option" id="sel_pref_code-23">愛知県(Aichi)</option>
                                    <option value="24" class="dropdown-select address01 option" id="sel_pref_code-24">三重県(Mie)</option>
                                    <option value="25" class="dropdown-select address01 option" id="sel_pref_code-25">滋賀県(Shiga)</option>
                                    <option value="26" class="dropdown-select address01 option" id="sel_pref_code-26">京都府(Kyoto)</option>
                                    <option value="27" class="dropdown-select address01 option" id="sel_pref_code-27">大阪府(Osaka)</option>
                                    <option value="28" class="dropdown-select address01 option" id="sel_pref_code-28">兵庫県(Hyogo)</option>
                                    <option value="29" class="dropdown-select address01 option" id="sel_pref_code-29">奈良県(Nara)</option>
                                    <option value="30" class="dropdown-select address01 option" id="sel_pref_code-30">和歌山県(Wakayama)</option>
                                    <option value="31" class="dropdown-select address01 option" id="sel_pref_code-31">鳥取県(Tottori)</option>
                                    <option value="32" class="dropdown-select address01 option" id="sel_pref_code-32">島根県(Shimane)</option>
                                    <option value="33" class="dropdown-select address01 option" id="sel_pref_code-33">岡山県(Okayama)</option>
                                    <option value="34" class="dropdown-select address01 option" id="sel_pref_code-34">広島県(Hiroshima)</option>
                                    <option value="35" class="dropdown-select address01 option" id="sel_pref_code-35">山口県(Yamaguchi)</option>
                                    <option value="36" class="dropdown-select address01 option" id="sel_pref_code-36">徳島県(Tokushima)</option>
                                    <option value="37" class="dropdown-select address01 option" id="sel_pref_code-37">香川県(Kagawa)</option>
                                    <option value="38" class="dropdown-select address01 option" id="sel_pref_code-38">愛媛県(Ehime)</option>
                                    <option value="39" class="dropdown-select address01 option" id="sel_pref_code-39">高知県(Kochi)</option>
                                    <option value="40" class="dropdown-select address01 option" id="sel_pref_code-40">福岡県(Fukuoka)</option>
                                    <option value="41" class="dropdown-select address01 option" id="sel_pref_code-41">佐賀県(Saga)</option>
                                    <option value="42" class="dropdown-select address01 option" id="sel_pref_code-42">長崎県(Nagasaki)</option>
                                    <option value="43" class="dropdown-select address01 option" id="sel_pref_code-43">熊本県(Kumamoto)</option>
                                    <option value="44" class="dropdown-select address01 option" id="sel_pref_code-44">大分県(Oita)</option>
                                    <option value="45" class="dropdown-select address01 option" id="sel_pref_code-45">宮崎県(Miyazaki)</option>
                                    <option value="46" class="dropdown-select address01 option" id="sel_pref_code-46">鹿児島県(Kagoshima)</option>
                                    <option value="47" class="dropdown-select address01 option" id="sel_pref_code-47">沖縄県(Okinawa)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" id="btnSearch" value="Tìm kiếm" />                
                        </div>
                    </div>
                </form>
            </div>
        </div><!--End .ibox-->
    </div><!--End .row-->
    <div class="space clearfix"></div>
    <div class="row">
        <div class="ibox box-level shadow text-center">
            <div class="ibox-title">
                <h5 class="text-uppercase text-left">Tìm kiếm công việc theo trình độ tiếng Nhật</h5>
            </div>
            <ul class="level clearfix">
                <li class="col-sm-3 col-xs-6">
                    <a href="#" target="_blank" class="text-uppercase text-center icon-square">N1</a>
                    <span class="text-uppercase">Trình độ N1</span>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="#" target="_blank" class="text-uppercase text-center icon-square">N2</a>
                    <span class="text-uppercase">Trình độ N2</span>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="#" target="_blank" class="text-uppercase text-center icon-square">N3</a>
                    <span class="text-uppercase">Trình độ N3</span>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="#" target="_blank" class="text-uppercase text-center icon-square">Mới biết</a>
                    <span class="text-uppercase">Trình độ Mới biết</span>
                </li>
            </ul><!--End .level-->
        </div><!--End .row-->
    </div>
    <div class="space clearfix"></div>
    <div class="row">
        <div class="ibox box-level shadow text-center">            
            <div class="ibox-title">
                <h5 class="text-uppercase text-left">Loại hình công việc</h5>
            </div>
            <ul class="list">
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Kho xưởng</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Cơm hộp</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Yamato</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Mì lạnh</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Pha chế</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Làm bếp</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Chuyển nhà</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Combini</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Dọn dẹp</a></li>
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Phát báo</a></li>                    
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">Phiên dịch</a></li>                    
                <li class="col-xs-6 col-md-4"><a class="text-color" href="#">IT</a></li>                    
            </ul>>
        </div><!--End .row-->
    </div>
    <div class="space clearfix"></div>
    <div class="row">
        <div class="ibox shadow">
            <div class="ibox-title">
                <h5 class="text-uppercase">Việc làm mới</h5>
            </div>
            <div class="clearfix" id="job-new">                    
                <div class="row row_dotted">
                    <div class="col-sm-3 img-block">
                        <img src="<?php echo get_template_directory_uri() ?>/img/baito1.jpg" alt="" />
                    </div>                    
                    <div class="col-sm-9 job-block">
                        <a target="_blan" class="job-title">Kỹ Sư Cầu Nối (BrSE) Thành thạo Tiếng Nhật (cơ Hội Onsite Tại Nhật Từ 1~3 Năm)</a>
                        <dl class="dl-horizontal clearfix basic-info">
                            <dt>Tiền lương</dt>
                            <dd>950￥/h～1,188￥/h</dd>
                            <dt>Nơi làm việc</dt>
                            <dd>千葉県市川市二俣新町22-1</dd>
                            <dt>Ga gần nhất</dt>
                            <dd>Ga Futamata Shinmachi( Đi bộ 1 phút). Ga Nishifunabashi (đi xe đạp mất 15 phút)</dd>
                        </dl>
                        <ul class="info list-inline">
                            <li><span class="fa fa-calendar"></span> 25/03/2017</li>
                            <li><i class="fa fa-eye"></i> Xem: 263 lượt</li>
                        </ul>
                        <a href="#" class="pull-right">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="row row_dotted">
                    <div class="col-sm-3 img-block">
                        <img src="<?php echo get_template_directory_uri() ?>/img/baito4.jpg" alt="" />
                    </div>                    
                    <div class="col-sm-9 job-block">
                        <a target="_blan" class="job-title">Kyoudousangyou Kabushikigaisha【Dọn giường】</a>
                        <dl class="dl-horizontal clearfix basic-info">
                            <dt>Tiền lương</dt>
                            <dd>Lương theo giờ từ 1050 yên trở lên</dd>
                            <dt>Nơi làm việc</dt>
                            <dd>つけめんGACHI</dd>
                            <dt>Ga gần nhất</dt>
                            <dd>[Tuyến Tokyo Metro, ga Shinjuku Sanchoume] Đi bộ 3 phút từ cửa ra C7</dd>
                        </dl>
                        <ul class="info list-inline clearfix">
                            <li><span class="fa fa-calendar"></span> 25/03/2017</li>
                            <li><i class="fa fa-eye"></i> Xem: 263 lượt</li>
                        </ul>
                        <a href="#" class="pull-right">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>                    
                </div>
                <div class="row row_dotted">
                    <div class="col-sm-3 img-block">
                        <img src="<?php echo get_template_directory_uri() ?>/img/baito6.jpg" alt="" />
                    </div>                    
                    <div class="col-sm-9 job-block">
                        <a target="_blan" class="job-title">Công việc làm tại quán mỳ Ramen</a>
                        <dl class="dl-horizontal clearfix basic-info">
                            <dt>Tiền lương</dt>
                            <dd>￥883</dd>
                            <dt>Nơi làm việc</dt>
                            <dd>Hotel the Lutheran</dd>
                            <dt>Ga gần nhất</dt>
                            <dd>Ga Tanimachi4choume Đi bộ 2 phút</dd>
                        </dl>
                        <ul class="info list-inline">
                            <li><span class="fa fa-calendar"></span> 25/03/2017</li>
                            <li><i class="fa fa-eye"></i> Xem: 263 lượt</li>
                        </ul>
                        <a href="#" class="disabled pull-right">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>                    
                </div>
                <div class="row row_dotted">
                    <div class="col-sm-3 img-block">
                        <img src="<?php echo get_template_directory_uri() ?>/img/baito3.jpg" alt="" />
                    </div>                    
                    <div class="col-sm-9 job-block">
                        <a target="_blan" class="job-title">Thông phiên dịch cho kỹ sư người Nhật – Việt</a>
                        <dl class="dl-horizontal clearfix basic-info">
                            <dt>Tiền lương</dt>
                            <dd>1000円～</dd>
                            <dt>Nơi làm việc</dt>
                            <dd>杉並区荻窪5-15-22　HOLD荻窪ビル3階</dd>
                            <dt>Ga gần nhất</dt>
                            <dd>JR Chuo Line ga Ogikubo Đi bộ 5 phút</dd>
                        </dl>
                        <ul class="info list-inline">
                            <li><span class="fa fa-calendar"></span> 25/03/2017</li>
                            <li><i class="fa fa-eye"></i> Xem: 263 lượt</li>
                        </ul>
                        <a href="#" class="pull-right">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>

            </div>                
        </div><!--End .ibox-->
        <div class="clearfix"></div>
        <p class="text-right">
            <a href="#" target="_blank" class="view-more">Xem tất cả công việc <i class="fa fa-angle-double-right"></i></a>
        </p>
        <!-- Right column -->
    </div>
</div><!--End .container-->
<section class="bg-gray">
    <div class="container">
        <div class="row">
            <h3 class="top-title text-uppercase text-center">Blog</h3>
            <div class="col-sm-4">
                <div class="ibox shadow">
                    <div class="ibox-content blog-content item">
                        <a href="#">
                            <img src="http://japan.vietnamworks.com/uploads-image/bUHxDH7Bshutterstock_272455511.jpg" alt="article" class="img-responsive">
                        </a>
                        <a href="#">
                            <h2>Mẹo Outlook giúp giải quyết các công việc hàng ngày nhanh hơn</h2>
                        </a>
                        <ul class="small list-inline">
                            <li><span class="text-muted"><i class="fa fa-clock-o"></i> 30-03-2017</span></li>
                            <li><span class="text-muted"><i class="fa fa-clock-o"></i> Mẹo văn phòng</span></li>                            
                        </ul>
                        <p>Microsoft Outlook phức tạp quá à! Hôm nay mình chỉ bạn các phím tắt hay, cách giải quyết khi mail đầy, lấy lại mail khi lỡ chọn gửi, và nhiều ...</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox shadow">
                    <div class="ibox-content blog-content">
                        <a href="http://japan.vietnamworks.com/tips/detail/113">
                            <img src="http://japan.vietnamworks.com/uploads-image/J9Iqld7Yn-grads-a-20150120-870x579-2416-1422416453.jpg" alt="article" class="img-responsive">
                        </a>
                        <a href="#">
                            <h2>Các hãng lớn Nhật đi khắp châu Á “đánh bắt” nhân tài</h2>
                        </a>
                        <ul class="small list-inline">
                            <li><span class="text-muted"><i class="fa fa-clock-o"></i> 30-03-2017</span></li>
                            <li><span class="text-muted"><i class="fa fa-clock-o"></i> Hoc tieng Nhat</span></li>                            
                        </ul>
                        <p>
                            Dân số trẻ ở Nhật Bản đang giảm dần, để tìm nguồn nhân lực cho tương lai, các công ty Nhật Bản đang chuyển hướng sang tuyển dụng sinh viên ...                    </p>                        
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox shadow">
                    <div class="ibox-content blog-content">                        
                        <a href="http://japan.vietnamworks.com/tips/detail/112">
                            <img src="http://japan.vietnamworks.com/uploads-image/PbdrpiF0kyary-japanese-flag-615-415x260.jpg" alt="article" class="img-responsive">
                        </a>
                        <a href="#">
                            <h2>Một số câu tục ngữ, ca dao Nhật Bản</h2>
                        </a>
                        <ul class="small list-inline">
                            <li><span class="text-muted"><i class="fa fa-clock-o"></i> 30-03-2017</span></li>
                            <li><span class="text-muted"><i class="fa fa-clock-o"></i> Văn hoá Nhật Bản</span></li>                            
                        </ul>
                        <p>
                            Hãy cùng học một số câu ca dao, tục ngữ Nhật Bản, bạn sẽ thấy văn hóa Nhật Bản cũng có nhiều điểm tương đồng so với văn hóa Việt ...                    </p>                        
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <p class="text-right">
                <a href="#" target="_blank" class="view-more">Xem tất cả bài viết <i class="fa fa-angle-double-right"></i></a>
            </p>
        </div>
    </div><!--End .container-->
</section><!--End .bg-gray-->

<?php
get_footer();

