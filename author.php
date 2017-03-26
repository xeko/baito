<?php /* Template Name: User Update */ ?>
<?php get_header(); ?>
<div class="section" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">                                

                <!-- section -->
                <section class="bgwhite">
                    <div id="breadcrumb" class="breadcrumb inner wrap cf"><?php breadcrumb() ?></div>
                    <h2><?php the_title(); ?></h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 style="font-size:21px;">Thông tin thành viên</h1>
                        </div>
                        <div class="panel-body">
                            <?php
                            $user_id = get_current_user_id();
                            $author_vnkings = get_user_by('slug', get_query_var('author_name'));
                            $author_id = $author_vnkings->ID;
                            if ($user_id == $author_id) {
                                ?>
                                <?php
                                if (isset($_POST['user_profile_nonce_field']) && wp_verify_nonce($_POST['user_profile_nonce_field'], 'user_profile_nonce')) {
                                    if (!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
                                        if ($_POST['pass1'] == $_POST['pass2'])
                                            wp_update_user(array('ID' => $current_user->ID, 'user_pass' => esc_attr($_POST['pass1'])));
                                        else
                                            echo $error[] = __('Mật khẩu của bạn không được cập nhật', 'profile');
                                    }
                                    /* Update thông tin user. */
                                    if (!empty($_POST['user_url'])) {
                                        wp_update_user(array('ID' => $current_user->ID, 'user_url' => esc_url($_POST['user_url'])));
                                    }
                                    if (!empty($_POST['nickname'])) {
                                        update_user_meta($current_user->ID, 'nickname', esc_attr($_POST['nickname']));
                                    }
                                    if (!empty($_POST['twitter'])) {
                                        update_user_meta($current_user->ID, 'twitter', esc_attr($_POST['twitter']));
                                    }
                                    if (!empty($_POST['googleplus'])) {
                                        update_user_meta($current_user->ID, 'googleplus', esc_attr($_POST['googleplus']));
                                    }
                                    if (!empty($_POST['facebook'])) {
                                        update_user_meta($current_user->ID, 'facebook', esc_attr($_POST['facebook']));
                                    }
                                    if (!empty($_POST['description'])) {
                                        update_user_meta($current_user->ID, 'description', esc_attr($_POST['description']));
                                    }
                                    echo '<div class="alert alert-success"><strong>Bạn đã sửa thông tin cá nhân thành công!</strong></div>';
                                }
                                ?>
                                <form role="form" action="" id="user_profile" method="POST">
    <?php wp_nonce_field('user_profile_nonce', 'user_profile_nonce_field'); ?>
                                    <div class="form-group col-md-6">
                                        <label for="nickname">Họ Tên</label>
                                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Họ Tên" value="<?php the_author_meta('nickname', $author_id); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input disabled type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php the_author_meta('user_email', $author_id); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="user_url">Website</label>
                                        <input type="text" class="form-control" id="user_url" name="user_url" placeholder="Website của bạn" value="<?php the_author_meta('user_url', $author_id); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook của bạn" value="<?php the_author_meta('facebook', $author_id); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="googleplus">Google Plus</label>
                                        <input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="Google Plus của bạn" value="<?php the_author_meta('googleplus', $author_id); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter của bạn" value="<?php the_author_meta('twitter', $author_id); ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="description">Mô tả về bạn</label>
                                        <textarea class="form-control" name="description" id="description" rows="3" cols="50"><?php the_author_meta('description', $author_id); ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pass1">Password</label>
                                        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pass2">Nhập lại Password</label>
                                        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-12"><button type="submit" class="btn btn-success">Cập nhật</button></div>
                                </form>
                                    <?php } else { ?>
                                <div class="col-md-4">
                                    <a href="<?php echo get_author_posts_url($author_id); ?>">
                                        <?php $avatar = get_user_meta($author_id, 'lovendpic', true);
                                        $image = wp_get_attachment_image_src($avatar, 'medium');
                                        ?>
    <?php if (!empty($image)) { ?>
                                            <img style="border:1px solid #ccc;padding:2px;border-radius:5px;" alt="<?php echo $useridname; ?>" id="avatar-img" src="<?php echo $image[0]; ?>">
    <?php } else { ?>
                                            <img style="border:1px solid #ccc;padding:2px;border-radius:5px;width:100%;height:auto;" alt="<?php echo $useridname; ?>" id="avatar-img" src="http://vnkings.com/wp-content/uploads/2015/11/logo.png">
    <?php } ?>
                                    </a>
                                </div>
                                <div class="info_author col-md-8">
                                    <ul class="list-group vnk_label">
                                        <li class="list-group-item"><label for="nickname">Họ Tên:</label> <?php $vnkings_name = the_author_meta('nickname', $author_id);
    if (isset($vnkings_name)) {
        echo $vnkings_name;
    } ?></li>
                                        <li class="list-group-item"><label for="user_url">Website:</label> <a rel="nofollow" href="<?php the_author_meta('user_url', $author_id); ?>"><?php the_author_meta('user_url', $author_id); ?></a></li>
                                        <li class="list-group-item"><label for="user_url">Facebook:</label> <a rel="nofollow" href="<?php the_author_meta('facebook', $author_id); ?>"><?php the_author_meta('facebook', $author_id); ?></a></li>
                                        <li class="list-group-item"><label for="user_url">Google+:</label> <a rel="nofollow" href="<?php the_author_meta('googleplus', $author_id); ?>"><?php the_author_meta('googleplus', $author_id); ?></a></li>
                                        <li class="list-group-item"><label for="user_url">Twitter:</label> <a rel="nofollow" href="<?php the_author_meta('twitter', $author_id); ?>"><?php the_author_meta('twitter', $author_id); ?></a></li>
                                        <li class="list-group-item"><label for="description">Chia sẻ về tôi</label>: <?php the_author_meta('description', $author_id); ?></li>
                                    </ul>
                                </div>
<?php } ?>
                        </div>
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
