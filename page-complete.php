<?php /* Template Name: Page Complete */ ?>
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
                            <li class="step01 step"><span class="step-num">1</span>Nhập vào</li>
                            <li class="step02 step"><span class="step-num">2</span>Xác nhận</li>
                            <li class="step03 step current"><span class="step-num">3</span>Hoàn tất</li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <h2 class="main-ttl">Cảm ơn bạn đã ứng tuyển!</h2>
                        <p class="txt">Đã gửi mail hoàn tất ứng tuyển tới địa chỉ email mà bạn đăng ký.</p>
                        <p class="txt">Hãy lưu lại cẩn thận email mà bạn vừa gửi.</p>
                        <p class="txt">Hãy đợi cho đến khi công ty tuyển dụng liên lạc với bạn.</p>


                        <p class="sendmail-txt">
                            <span class="ttl">Trường hợp không nhận được email sau khi đã hoàn tất ứng tuyển</span>
                            <span>Xác nhận lại địa chỉ email đã đăng ký có đúng không.</span>
                            <span><a href="https://nihondebaito.com/vi/user/input" onclick="ga('send', 'event', 'ENTRYCOMPLETE', 'mailAddress_confirm');">Xác nhận địa chỉ email đã đăng ký</a></span>
                            
                            <span>Nếu bạn có thắc mắc khác liên quan tới việc sử dụng các dịch vụ, hãy liên lạc theo địa chỉ dưới đây.</span>
                            <span><a href="#">Trợ giúp</a></span>
                        </p>

                        <p class="back-top text-center"><a href="<?php home_url()?>" class="btn btn-default btn-lg">Quay lại đầu trang</a></p>

                    </div>

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

