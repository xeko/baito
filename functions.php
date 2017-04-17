<?php
/*
 *  Author: HoaTong | hoaitvn@gmail.com
 *  URL: dentalservice.jp
 *  Custom functions, support, custom post types and more.
 */

require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');
require_once(TEMPLATEPATH . '/inc/jobs-post-type.php');
require_once(TEMPLATEPATH . '/inc/widgets_init.php');
require_once(TEMPLATEPATH . '/inc/country.php');
require_once(TEMPLATEPATH . '/inc/job-utility.php');
require_once(TEMPLATEPATH . '/inc/post_type-faq.php');
require_once(TEMPLATEPATH . '/inc/post_type-qa.php');

define('THEME_NAME', 'baito');
define( 'BAITO_URI', get_template_directory_uri() );
define( 'BAITO_ADMIN_URI', BAITO_URI . '/admin' );

global $countries;

function job_admin_enqueue_scripts() {
    if (get_post_type() === 'cv_job' || get_post_type() === 'job_application' ) {
        wp_enqueue_style('cv-job', BAITO_ADMIN_URI . '/css/admin-custom.css');
    }
}

add_filter('admin_enqueue_scripts', 'job_admin_enqueue_scripts', 10, 2);

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain(THEME_NAME, get_template_directory() . '/languages');
}

/* ------------------------------------*\
  Functions
  \*------------------------------------ */

function main_navigation() {
    wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu' => '',
                'container' => 'div',
                'container_class' => 'menu-{menu slug}-container',
                'container_id' => '',
                'menu_class' => 'main-menu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul class="nav navbar-nav" id="main-menu">%3$s</ul>',
                'depth' => 0,
                'walker' => new My_Custom_Nav_Walker()
            )
    );
}

function top_nav() {
    wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                'menu' => '',
                'container' => 'div',
                'container_class' => 'menu-{menu slug}-container',
                'container_id' => '',
                'menu_class' => 'top-menu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="extra-link" class="pull-right text-right">%3$s</ul>',
                'depth' => 0,
                'walker' => ''
            )
    );
}

function footer_navigation() {
    wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'menu' => '',
                'container' => 'div',
                'container_class' => 'menu-{menu slug}-container',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul class="menu">%3$s</ul>',
                'depth' => 0,
                'walker' => ''
            )
    );
}

function header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('custom_script', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'bxslider'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('custom_script'); // Enqueue it!

        wp_register_script('bxslider', get_template_directory_uri() . '/js/bxslider/jquery.bxslider.min.js', array('jquery'), '4.1.2'); // Conditional script(s)
        wp_enqueue_script('bxslider'); // Enqueue it!

        wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6');
        wp_enqueue_script('bootstrap'); // Enqueue it!

        wp_register_script('chosen', get_template_directory_uri() . '/js/chosen.jquery.min.js', array('jquery'), '1.4.2');
        wp_enqueue_script('chosen'); // Enqueue it!

        wp_register_script('bootstrapValidator', get_template_directory_uri() . '/js/bootstrapValidator.min.js', array('jquery'), '0.5.2');
        wp_enqueue_script('bootstrapValidator'); // Enqueue it!

        wp_register_script('headroom', get_template_directory_uri() . '/js/headroom.min.js', array('jquery'), '0.9.3');
        wp_enqueue_script('headroom'); // Enqueue it!

        wp_register_script('jQuery.headroom', get_template_directory_uri() . '/js/jQuery.headroom.js', array('jquery'));
        wp_enqueue_script('jQuery.headroom'); // Enqueue it!

        wp_register_script('matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '1.4.2');
        wp_enqueue_script('matchHeight'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3', 'all');
    wp_enqueue_style('font-awesome'); // Enqueue it!

    wp_register_style('chosen', get_template_directory_uri() . '/css/chosen.min.css', array(), '1.4.2', 'all');
    wp_enqueue_style('chosen'); // Enqueue it!

    wp_register_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '3.5.1', 'all');
//    wp_enqueue_style('animate'); // Enqueue it!

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '3.5.1', 'all');
//    wp_enqueue_style('main'); // Enqueue it!

    wp_register_style('bootstrapValidator', get_template_directory_uri() . '/css/bootstrapValidator.min.css', array(), '0.5.2', 'all');
    wp_enqueue_style('bootstrapValidator'); // Enqueue it!

    wp_register_style('default-style', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');
    wp_enqueue_style('default-style'); // Enqueue it!

    if (is_home() || is_front_page()) {
        wp_register_style('bxslider', get_template_directory_uri() . '/js/bxslider/jquery.bxslider.css', array(), '4.1.2', 'all');
        wp_enqueue_style('bxslider'); // Enqueue it!
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus(array(// Using array to specify more menus if needed
        'main-menu' => __('Main Menu', 'name-theme'), // Main Navigation
        'top-menu' => __('Top Menu', 'name-theme'), // Top Navigation
        'sidebar-menu' => __('Sidebar Menu', 'name-theme'), // Sidebar Navigation
        'footer-menu' => __('Footer Menu', 'name-theme') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

function get_tags_custom($ID) {
    $tags = wp_get_post_tags($ID);
    $html = '';
    foreach ($tags as $k => $tag) {
        $tag_link = get_tag_link($tag->term_id);
        $comma = ($k == count($tags) - 1) ? '' : ', ';

        $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
        $html .= "{$tag->name}</a>" . $comma;
    }
    return $html;
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/* ------------------------------------*\
  Actions + Filters + ShortCodes
  \*------------------------------------ */

// Add Actions
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

/**
 * 
 * @global type $post
 * @param type $divOption
 * Breadcrumb
 */
function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb inner wrap cf")) {
    global $post;
    $str = '';
    if (!is_home() && !is_front_page() && !is_admin()) {
        $tagAttribute = '';
        foreach ($divOption as $attrName => $attrValue) {
            $tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
        }
        $str .= '<div' . $tagAttribute . '>';
        $str .= '<ul class="breadcrumb">';
        $str .= '<li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . home_url() . '/" itemprop="url"><i class="fa fa-home"></i><span itemprop="title"></span></a></li>';

        if (is_category()) {
            $cat = get_queried_object();
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . get_cat_name($ancestor) . '</span></a></li>';
                }
            }
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $cat->name . '</span></li>';
        } elseif (is_single()) {
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str .= '<li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . get_cat_name($ancestor) . '</span></a></li>';
                }
            }
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($cat->term_id) . '" itemprop="url"><span itemprop="title">' . $cat->cat_name . '</span></a></li>';
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb">' . $post->post_title . '</li>';
        } elseif (is_page()) {
            if ($post->post_parent != 0) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ($ancestors as $ancestor) {
                    $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><a href="' . get_permalink($ancestor) . '" itemprop="url"><span itemprop="title">' . get_the_title($ancestor) . '</span></a></li>';
                }
            }
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $post->post_title . '</span></li>';
        } elseif (is_date()) {
            if (is_year()) {
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . get_the_time('Y') . '年</li>';
            } else if (is_month()) {
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '年</a></li>';
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . get_the_time('n') . '月</li>';
            } else if (is_day()) {
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '年</a></li>';
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('n') . '月</a></li>';
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . get_the_time('j') . '日</li>';
            }
            if (is_year() && is_month() && is_day()) {
                $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>' . wp_title('', false) . '</li>';
            }
        } elseif (is_search()) {
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">「' . get_search_query() . '」で検索した結果</span></li>';
        } elseif (is_author()) {
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">投稿者 : ' . get_the_author_meta('display_name', get_query_var('author')) . '</span></li>';
        } elseif (is_tag()) {
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">タグ : ' . single_tag_title('', false) . '</span></li>';
        } elseif (is_attachment()) {
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $post->post_title . '</span></li>';
        } elseif (is_404()) {
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li>ページがみつかりません。</li>';
        } else {
            $str .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> <li itemtype="//data-vocabulary.org/Breadcrumb"><span itemprop="title">' . wp_title('', true) . '</span></li>';
        }
        $str .= '</ul>';
        $str .= '</div>';
    }
    echo $str;
}

/**
 * 
 * @global int $paged
 * @global type $wp_query
 * @param type $pages
 * @param type $range
 * Custom pagination
 */
function custom_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<ul class=\"pagination pagination-sm\">";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'><i class='fa fa-angle-double-right'></i>
</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'><i class='fa fa-angle-double-left'></i>
</a></li>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li class=\"active\"><a href=\"javascript::void(0)\">" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a></li>";
        echo "</ul>\n";
    }
}

/**
 * 
 * @param type $str
 * @param type $length
 * @param type $minword
 * @return string lenght without lost character
 */
function shika_substr($str, $length, $minword = 3) {
    $sub = '';
    $len = 0;
    foreach (explode('。', $str) as $word) {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);

        if (strlen($word) > $minword && strlen($sub) >= $length) {
            break;
        }
    }
    return $sub . (($len < strlen($str)) ? '。' : '');
}

function tanaka_search_form($form) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >    
    
<div id="search-wrap"><input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
    <button type="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div></form>';

    return $form;
}

add_filter('get_search_form', 'tanaka_search_form');

/**
 * 
 * @global type $post
 */
function related_post() {
    global $post;
    $max_articles = 8;  // How many articles to display

    echo '<div id="related-articles" class="clearfix"><h3 class="clearfix">関連記事</h3><ul class="list-group clearfix" id="list-post">';

    $cnt = 0;

    $article_tags = get_the_tags();
    $tags_string = '';
    if ($article_tags) {
        foreach ($article_tags as $article_tag) {
            $tags_string .= $article_tag->slug . ',';
        }
    }
    $tag_related_posts = get_posts('exclude=' . $post->ID . '&numberposts=' . $max_articles . '&tag=' . $tags_string);

    if ($tag_related_posts) {
        foreach ($tag_related_posts as $related_post) {
            $cnt++;
            echo '<li class="child-' . $cnt . '"><div class="col-md-3 col-xs-6">';
            $image_id = get_post_thumbnail_id($related_post->ID);
            $image_url = wp_get_attachment_image_src($image_id, array(150, 120), true);
            ?>
            <a href="<?php echo get_permalink($related_post->ID) ?>" rel="bookmark" title="<?php the_title_attribute(array('post' => $related_post->ID)); ?>"><img src="<?php echo $image_url[0]; ?>" alt="" class=""/></a>
            <time class="meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_time('d-m-Y', $post->ID); ?></time>
            <?php
            echo '<a href="' . get_permalink($related_post->ID) . '" class="title">';
            echo $related_post->post_title . '</a></div></li>';
        }
    }

    // Only if there's not enough tag related articles,
    // we add some from the same category

    if ($cnt < $max_articles) {

        $article_categories = get_the_category($post->ID);
        $category_string = '';
        foreach ($article_categories as $category) {
            $category_string .= $category->cat_ID . ',';
        }

        $cat_related_posts = get_posts('exclude=' . $post->ID . '&numberposts=' . $max_articles . '&category=' . $category_string);

        if ($cat_related_posts) {
            foreach ($cat_related_posts as $related_post) {
                $cnt++;
                if ($cnt > $max_articles)
                    break;
                echo '<li class="child-' . $cnt . '"><div class="col-md-3 col-xs-6">';
                $image_id = get_post_thumbnail_id($related_post->ID);
                $image_url = wp_get_attachment_image_src($image_id, array(150, 120), true);
                ?>
                <a href="<?php echo get_permalink($related_post->ID) ?>" rel="bookmark" title="<?php the_title_attribute(array('post' => $related_post->ID)); ?>"><img src="<?php echo $image_url[0]; ?>" alt="" class=""/></a>
                <time class="meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_time('d-m-Y', $post->ID); ?></time>
                <?php
                echo '<a href="' . get_permalink($related_post->ID) . '" class="title">';
                echo $related_post->post_title . '</a></div></li>';
            }
        }
    }

    echo '</ul></div>';
}

add_action('admin_enqueue_scripts', function() {
    global $post;

    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');

    wp_enqueue_media(array(
        'cv_job' => $post->post_type,
    ));
});

class My_Custom_Nav_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        if ($item->is_dropdown && $depth === 0) {
            $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html);
            $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
        }

        $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ($element->current)
            $element->classes[] = 'active';

        $element->is_dropdown = !empty($children_elements[$element->ID]);

        if ($element->is_dropdown) {
            if ($depth === 0) {
                $element->classes[] = 'dropdown';
            } elseif ($depth === 1) {
                // Extra level of dropdown menu, 
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

}

class Custom_Facebook_Page extends WP_Widget {

    function Custom_Facebook_Page() {
        $widget_ops = array('classname' => 'Custom_Facebook_Page', 'description' => 'Facebook page like box');
        $this->WP_Widget('Custom_Facebook_Page', 'Custom Facebook Page', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $fb_page_url = $instance['fb_page_url'];

        if (!empty($fb_page_url)) {
            if (isset($_SESSION['pp_menu_style'])) {
                $pp_menu_style = $_SESSION['pp_menu_style'];
            } else {
                $pp_menu_style = get_option('pp_menu_style');
            }

            $fb_skin = 'light';
            $fb_border = 'ffffff';
            if ($pp_menu_style != 3 && $pp_menu_style != 6) {
                $fb_skin = 'light';
                $fb_border = 'ffffff';
            } else {
                $fb_skin = 'dark';
                $fb_border = '191919';
            }
            ?>
            <h2 class="widgettitle">Find us on Facebook</h2>
            <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($fb_page_url); ?>&amp;width=270&amp;height=258&amp;colorscheme=<?php echo $fb_skin; ?>&amp;show_faces=true&amp;border_color=%23<?php echo $fb_border; ?>&amp;stream=false&amp;header=false&amp;appId=268239076529520" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:258px;" allowTransparency="true"></iframe>
            <?php
        }

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['fb_page_url'] = strip_tags($new_instance['fb_page_url']);

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('fb_page_url' => ''));
        $fb_page_url = strip_tags($instance['fb_page_url']);
        ?>
        <p><label for="<?php echo $this->get_field_id('fb_page_url'); ?>">Facebook Page URL: <input class="widefat" id="<?php echo $this->get_field_id('fb_page_url'); ?>" name="<?php echo $this->get_field_name('fb_page_url'); ?>" type="text" value="<?php echo esc_attr($fb_page_url); ?>" /></label></p>
        <?php
    }

}

register_widget('Custom_Facebook_Page');

function add_fields_user($profile_fields) {
    $profile_fields['googleplus'] = 'Google+';
    $profile_fields['twitter'] = 'Twitter username';
    $profile_fields['facebook'] = 'Facebook profile URL';
    return $profile_fields;
}

//add_filter('user_contactmethods', 'add_fields_user');
//Xu li dang nhap
// Redirect khi đăng nhập
function my_login_redirect($redirect_to, $request, $user) {
    //is there a user to check?
    global $user;
    if (isset($user->roles) && is_array($user->roles)) {
        //check for admins
        if (in_array('administrator', $user->roles)) {
            // redirect them to the default place
            return home_url();
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}

//add_filter('login_redirect', 'my_login_redirect', 10, 3);

function redirect_login_page() {
    $login_page = home_url('/dang-nhap');
    $page_viewed = basename($_SERVER['REQUEST_URI']);
    if ($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}

add_action('init', 'redirect_login_page');

// Kết thúc Redirect khi đăng nhập
// Kiểm tra lỗi đăng nhập
function login_failed() {
    $login_page = home_url('/dang-nhap/');
    wp_redirect($login_page . '?login=failed');
    exit;
}

//add_action('wp_login_failed', 'login_failed');

function verify_username_password($user, $username, $password) {
    $login_page = home_url('/dang-nhap');
    if ($username == "" || $password == "") {
        wp_redirect($login_page . "?login=empty");
        exit;
    }
}

//add_filter('authenticate', 'verify_username_password', 1, 3);
//Dang bai viet
function insert_attachment($file_handler, $post_id, $setthumb = 'false') {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK)
        __return_false();
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    $attach_id = media_handle_upload($file_handler, $post_id);

    if ($setthumb)
        update_post_meta($post_id, '_thumbnail_id', $attach_id);
    return $attach_id;
}

function add_search_to_menu($items, $args) {
    if ('main-menu' === $args->theme_location) {
        $items .= '<li class="search-header-wrap hidden-xs hidden-sm">';
        $items .= '<a id="search-icon-desk">'
                . '<div class="btnsearch"><i class="fa fa-search" aria-hidden="true"></i></div>';
        $items .= '<form class="search-header searchform" action="' . home_url('/') . '">
                <input name="s" class="search-input" type="text" value="' . get_search_query() . '" />
              </form>';
        $items .= '</a></li>';
    }
    return $items;
}

//add_filter('wp_nav_menu_items', 'add_search_to_menu', 10, 2);

function cut_title($text, $len = 30) { //Hàm cắt tiêu đề Unicode
    mb_internal_encoding('UTF-8');
    if ((mb_strlen($text, 'UTF-8') > $len))
        $text = mb_substr($text, 0, $len, 'UTF-8') . "...";
    return $text;
}

function get_taxonomies_terms($post_id, $taxonomy_slug) {

    $out = array();

    $terms = get_the_terms($post_id, $taxonomy_slug);

    if (!empty($terms)) {
        $out[] = "<ul class='list-inline small' id='job_type'>";
        foreach ($terms as $term) {
            $out[] = sprintf('<li><a href="%1$s" data-toggle="tooltip" title="Click để xem các công việc thuộc ' . $term->name . '" target="_blank">%2$s</a></li>', esc_url(get_term_link($term->slug, $taxonomy_slug)), esc_html($term->name)
            );
        }
        $out[] = "\n</ul>\n";
    }

    return implode('', $out);
}

add_action('init', 'add_query_args');

function add_query_args() {
    add_query_arg('level');
}

function func_countries () {
    global $countries;
    $country_str = "";
    foreach ($countries as $code => $name):
        $selected = $code == "VN" ? "selected": "";
        $country_str .= "<option value='{$code}' {$selected}>".$name."</option>";
    endforeach;
    return $country_str;
}

add_shortcode('countries', 'func_countries');

    add_filter( 'nav_menu_link_attributes', 'toggle_menu_atts', 10, 3 );
function toggle_menu_atts( $atts, $item, $args )
{
  $menu_target = 179;
 
  if ($item->ID == $menu_target) {
    $atts['data-toggle'] = 'modal';
    $atts['data-target'] = '#modal_qa';
  }
  return $atts;
}