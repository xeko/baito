<?php /* Template Name: Login */ ?>
<?php get_header(); ?>
<div class="section" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">                                

                <!-- section -->
                <section class="bgwhite">
                    <div id="breadcrumb" class="breadcrumb inner wrap cf"><?php breadcrumb() ?></div>
                    <h2><?php the_title(); ?></h2>
                    <?php if (is_user_logged_in()) {
                        $user_id = get_current_user_id();
                        $current_user = wp_get_current_user();
                        $profile_url = get_author_posts_url($user_id);
                        $edit_profile_url = get_edit_profile_url($user_id); ?>
                        <div class="regted">
                            Bạn đã đăng nhập với tên nick <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> Bạn có muốn <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">Thoát</a> không ?
                        </div>
                    <?php } else { ?>
                        <div class="formdangnhap">
                            <?php wp_login_form(); ?>
                        </div>
                <?php } ?>
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
