<!DOCTYPE html>
<html lang="jp-JP">
    <head>
        <?php
        /** Themify Default Variables
         *  @var object */
        global $themify;
        ?>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <!-- wp_head -->
<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> <?php themify_schema_markup(array('markup' => 'body')); ?>>
            <?php themify_body_start(); // hook  ?>
        <div id="pagewrap" class="hfeed site">
                <?php if (themify_theme_show_area('header') && themify_theme_do_not_exclude_all('header')) : ?>
                <div id="headerwrap" <?php themify_theme_header_background() ?>>
    <?php themify_header_before(); // hook  ?>
                    <a id="menu-icon" href="#mobile-menu"></a>
                    <header id="header" class="pagewidth clearfix" <?php themify_schema_markup(array('markup' => 'header')); ?>>
    <?php themify_header_start(); // hook  ?>
                        <div class="header-bar">
                            <div class="headcontact">
                                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td valign="top"><p style="font-size: 16px; line-height: 20px;">Tel./Fax: <span style="font-size: 155%; font-weight: bold;">03-3821-1230</span><br>
                                                    <a href="mailto:info@nezumachidental.com" style="color:#cba675; text-decoration: underline; font-size: 16px !important;">info@nezumachidental.com</a></p></td>
                                            <td valign="top">
                                                <div class="module-buttons-item">
                                                    <a class="brown" href="/contacts/">
                                                        <i class="fa fa-envelope-o"></i>
                                                        <span>お問い合わせ</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php if (themify_theme_show_area('site_logo')) : ?>
                                <?php echo themify_logo_image(); ?>
                            <?php endif; ?>
                            <!--
                            <?php if (themify_theme_show_area('site_tagline')) : ?>
                                <?php echo themify_site_description(); ?>
    <?php endif; ?>
                            -->
                            <a class="phone-mobile" href="tel:0338211230">
                                
                            </a><!--End .phone-mobile-->
                        </div>
                        <!-- /.header-bar -->
                            <?php if (themify_theme_do_not_exclude_all('mobile-menu')) : ?>
                            <div id="mobile-menu" class="sidemenu sidemenu-off">
                                    <?php if (themify_theme_show_area('social_widget') || themify_theme_show_area('rss')) : ?>
                                    <div class="social-widget">
                                        <?php if (themify_theme_show_area('social_widget')) : ?>
                                            <?php dynamic_sidebar('social-widget'); ?>
                                        <?php endif; // exclude social widget ?>
            <?php if (themify_theme_show_area('rss')) : ?>
                                            <div class="rss">
                                                <a href="<?php echo esc_url(themify_get('setting-custom_feed_url') != '' ? themify_get('setting-custom_feed_url') : get_bloginfo('rss2_url') ); ?>"></a>
                                            </div>
            <?php endif; // exclude RSS  ?>
                                    </div>
                                    <!-- /.social-widget -->
                                <?php endif; // exclude social widget or RSS icon ?>
                                    <?php if (themify_theme_show_area('search_form')) : ?>
                                    <div id="searchform-wrap">
            <?php get_search_form(); ?>
                                    </div>
                                    <!-- /searchform-wrap -->
                                <?php endif; // exclude search form ?>
                                    <?php if (themify_theme_show_area('menu_navigation')) : ?>
                                    <nav id="main-nav-wrap" <?php themify_schema_markup(array('markup' => 'nav')); ?>>
            <?php themify_theme_menu_nav(); ?>
                                        <!-- /#main-nav -->
                                    </nav>
                                    <!-- /#main-nav-wrap -->
                                <?php endif; // exclude menu navigation ?>
                                <?php if (themify_theme_show_area('header_widgets')) : ?>
                                    <?php get_template_part('includes/header-widgets'); ?>
                                    <!-- /header-widgets -->
        <?php endif; // exclude header widgets  ?>
                                <a id="menu-icon-close" href="#"></a>
                            </div>
                            <!-- /#mobile-menu -->
                        <?php endif; // do not exclude all this ?>
                        <?php
// If there's a header background slider, show it.
                        global $themify_bg_gallery;
                        $themify_bg_gallery->create_controller();
                        ?>
    <?php themify_header_end(); // hook  ?>
                    </header>
                    <!-- /#header -->
    <?php themify_header_after(); // hook  ?>
                </div>
                <!-- /#headerwrap -->
                <?php endif; // exclude header  ?>
            <div id="body" class="clearfix">
                <?php themify_layout_before(); //hook 
