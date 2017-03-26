<?php
/*
 *  Author: HoaTong | hoaitvn@gmail.com
 *  URL: dentalservice.jp
 *  Custom functions, support, custom post types and more.
 */

require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');

define('THEME_NAME', 'baito');

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

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'bxslider'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

        wp_register_script('bxslider', get_template_directory_uri() . '/js/bxslider/jquery.bxslider.min.js', array('jquery'), '4.1.2'); // Conditional script(s)
        wp_enqueue_script('bxslider'); // Enqueue it!

        wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6'); // Custom scripts
        wp_enqueue_script('bootstrap'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3', 'all');
    wp_enqueue_style('font-awesome'); // Enqueue it!

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

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Blog', 'Blog'),
        'description' => __('Description for this widget-area...', 'Blog'),
        'id' => 'widget-blog',
        'before_widget' => '<div id="%1$s" class="%2$s widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'Blog'),
        'description' => __('Description for this widget-area...', 'Blog'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
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
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
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

//add_action('init', 'akitsu_posttype_init');

if (!function_exists('akitsu_posttype_init')) :

    function akitsu_posttype_init() {



        $param_labels = array(
            'name' => _x('partner', 'post type general name', 'akitsu'),
            'singular_name' => _x('OnePage', 'post type singular name', 'akitsu'),
            'add_new' => _x('Add New Section', 'Section', 'akitsu'),
            'add_new_item' => __('Add New Section', 'akitsu'),
            'edit_item' => __('Edit Section', 'akitsu'),
            'new_item' => __('New Section', 'akitsu'),
            'all_items' => __('All Sections', 'akitsu'),
            'view_item' => __('View Section', 'akitsu'),
            'search_items' => __('Search Section', 'akitsu'),
            'not_found' => __('No Section found', 'akitsu'),
            'not_found_in_trash' => __('No Sections found in Trash', 'akitsu'),
            'parent_item_colon' => '',
            'menu_name' => __('partner', 'akitsu')
        );

        $akitsu_args = array(
            'labels' => $param_labels,
            'public' => true, //Kích hoạt post type
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu
            'query_var' => false, //Thiết lập query_var cho post type này. Mặc định theo tên của Custom Post Type.
            'rewrite' => false,
            'capability_type' => 'page',
            'has_archive' => false, //Cho phép lưu trữ (month, date, year)
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'menu_position' => 16,
            'menu_icon' => get_template_directory_uri() . '/img/icons/partnership-icon.png',
            'supports' => array('revisions', 'page-attributes')
        );

        register_post_type('partner', $akitsu_args);
        flush_rewrite_rules(false);
    }

endif;

/* * **********BUTTON ADD MULTI IMAGE*************** */

add_action('admin_init', 'add_post_gallery');
add_action('admin_head-post.php', 'print_scripts');
add_action('admin_head-post-new.php', 'print_scripts');
add_action('save_post', 'update_post_gallery', 10, 2);

/**
 * Add custom Meta Box to Posts post type
 */
function add_post_gallery() {
    add_meta_box(
            'post_gallery', 'Image Uploader', 'post_gallery_options', 'partner', // here you can set post type name
            'normal', 'core'
    );
}

/**
 * Print the Meta Box content
 */
function post_gallery_options() {
    global $post;
    $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
    $url_name_data = get_post_meta($post->ID, 'url_name_data', true);
    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'noncename');
    ?>

    <div id="dynamic_form">

        <div id="field_wrap">
            <?php
            if (isset($gallery_data['image_url'])) {
                for ($i = 0; $i < count($gallery_data['image_url']); $i++) {
                    ?>

                    <div class="field_row">

                        <div class="field_left">
                            <div class="form_field">
                                <label>URL</label>
                                <input class="meta_name_url" type="text" name="sitename[image_url][]" 
                                       value="<?php esc_html_e($url_name_data['image_url'][$i]); ?>" />
                                <input type="hidden"
                                       class="meta_image_url"
                                       name="gallery[image_url][]"
                                       value="<?php esc_html_e($gallery_data['image_url'][$i]); ?>"
                                       />
                            </div>
                        </div>

                        <div class="field_right image_wrap">
                            <img src="<?php esc_html_e($gallery_data['image_url'][$i]); ?>" width="80" />
                        </div>

                        <div class="field_right">
                            <input class="button" type="button" value="Choose File" onclick="add_image(this)" />
                            <input class="button" type="button" value="Remove" onclick="remove_field(this)" />
                        </div>

                        <div class="clear" /></div> 
                </div>
                <?php
            } // endif
        } // endforeach
        ?>
    </div>

    <div style="display:none" id="master-row">
        <div class="field_row">
            <div class="field_left">
                <div class="form_field">
                    <label>URL</label>
                    <input class="meta_name_url" value="" type="text" name="sitename[image_url][]" />
                    <input class="meta_image_url" value="" type="hidden" name="gallery[image_url][]" />
                </div>
            </div>
            <div class="field_right image_wrap">
            </div> 
            <div class="field_right"> 
                <input type="button" class="button" value="Choose File" onclick="add_image(this)" />                
                <input class="button" type="button" value="Remove" onclick="remove_field(this)" /> 
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div id="add_field_row">
        <input class="button" type="button" value="Add Field" onclick="add_field_row();" />
    </div>

    </div>

    <?php
}

/**
 * Print styles and scripts
 */
function print_scripts() {
    // Check for correct post_type
    global $post;
    if ('partner' != $post->post_type)// here you can set post type name
        return;
    ?>  
    <style type="text/css">
        .field_left {
            float:left;
        }

        .field_right {
            float:left;
            margin-left:10px;
        }
        .field_right input {
            margin-right: 4px;
        }

        .clear {
            clear:both;
        }

        #dynamic_form {
            width:100%;
        }

        #dynamic_form input[type=text] {
            width:400px;
        }

        #dynamic_form .field_row {
            border:1px solid #999;
            margin-bottom:10px;
            padding:10px;
        }
        #dynamic_form {

        }
        #dynamic_form label {
            padding:0 6px;
        }
        #dynamic_form .field_row {
            border: none;
        }
        #add_field_row {
            border-top: 1px solid #E6E6E6;
            padding-top: 10px;
            margin-top: 20px;
        }
    </style>

    <script type="text/javascript">
        function add_image(obj) {
            var parent = jQuery(obj).parent().parent('div.field_row');
            var inputField = jQuery(parent).find("input.meta_image_url");

            tb_show('', 'media-upload.php?TB_iframe=true');

            window.send_to_editor = function (html) {
                var url = jQuery(html).find('img').attr('src');
                inputField.val(url);
                jQuery(parent)
                        .find("div.image_wrap")
                        .html('<img src="' + url + '" width="80" />');

                // inputField.closest('p').prev('.awdMetaImage').html('<img height=120 width=120 src="'+url+'"/><p>URL: '+ url + '</p>'); 

                tb_remove();
            };

            return false;
        }

        function remove_field(obj) {
            var parent = jQuery(obj).parent().parent();
            //console.log(parent)
            parent.remove();
        }

        function add_field_row() {
            var row = jQuery('#master-row').html();
            jQuery(row).appendTo('#field_wrap');
        }
    </script>
    <?php
}

/**
 * Save post action, process fields
 */
function update_post_gallery($post_id, $post_object) {
    // Doing revision, exit earlier **can be removed**
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // Doing revision, exit earlier
    if ('revision' == $post_object->post_type)
        return;

    // Verify authenticity
    if (!wp_verify_nonce($_POST['noncename'], plugin_basename(__FILE__)))
        return;

    // Correct post type
    if ('partner' != $_POST['post_type']) // here you can set post type name
        return;

    if ($_POST['gallery']) {
        // Build array for saving post meta
        $gallery_data = array();
        $url_name_data = array();
        for ($i = 0; $i < count($_POST['gallery']['image_url']); $i++) {
            if ('' != $_POST['gallery']['image_url'][$i]) {
                $gallery_data['image_url'][] = $_POST['gallery']['image_url'][$i];
                $url_name_data['image_url'][] = $_POST['sitename']['image_url'][$i];
            }
        }

        if ($gallery_data) {
            update_post_meta($post_id, 'gallery_data', $gallery_data);
            update_post_meta($post_id, 'url_name_data', $url_name_data);
        } else {
            delete_post_meta($post_id, 'gallery_data');
            delete_post_meta($post_id, 'url_name_data');
        }
    }
    // Nothing received, all fields are empty, delete option
    else {
        delete_post_meta($post_id, 'gallery_data');
        delete_post_meta($post_id, 'url_name_data');
    }
}

function partner_shortcode() {
    ob_start();
    query_posts(array(
        'post_type' => 'partner',
        'showposts' => 1,
    ));
    if (have_posts()) : while (have_posts()) : the_post();
            $gallery_data = get_post_meta(get_the_ID(), 'gallery_data', true);
            $url_name_data = get_post_meta(get_the_ID(), 'url_name_data', true);
            ?>

            <?php
        endwhile;
    endif;
    wp_reset_query();

    if (isset($gallery_data['image_url'])) {
        $text_join = '';
        $image = "<ul id='partner'>";

        for ($i = 0; $i < count($gallery_data['image_url']); $i++) {
            $partner_url = ($url_name_data['image_url'][$i] != "") ? $url_name_data['image_url'][$i] : "#";

            $text_join .= '<li><a href="' . $partner_url . '" title="" class="thumbnail" target="_blank"><img src="' . $gallery_data['image_url'][$i] . '" /></a></li>';
        }
        $image .= $text_join;
        $image .= '</ul>';
        echo $image;
    }
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('partner_code', 'partner_shortcode');

//Add thichbox js for admin
function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

add_action('admin_enqueue_scripts', 'load_admin_things');

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

//Them nut login vao chi tiet cong viec
function func_apply($content) {
    $add_content = '';
    if (is_single()):
        $add_content = '
    
    <div class="card-item bg-info">
        <h4 class="text-uppercase text-left">Để ứng tuyển, bạn phải đăng nhập/ hoăck đăng ký</h4>

        <ul class="btn-group btn-group-justified" role="tablist">
            <li class="btn-group active" role="tab" data-toggle="tab" data-target="#js-form-login-pane">
                <a class="btn btn-block btn-sm btn-primary" href="#" title="Đăng nhập">Đăng nhập</a>
            </li>
            <li class="btn-group" role="tab" data-toggle="tab" data-target="#js-form-register-pane">
                <a class="btn btn-block btn-sm btn-gray" href="#" title="Đăng ký">Đăng ký</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="js-form-login-pane" class="tab-pane fade active in" role="tabpanel">
                <form action="#" method="post" role="form">

                    <div class="row gutter-xs">
                        <div class="col-sm-6 form-group">
                            <label for="form-login-username">Eメール</label>
                            <input class="form-control" type="text" id="form-login-username" name="username" value="" maxlength="255" aria-describedby="help-form-login">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="form-login-password">パスワード</label>
                            <input class="form-control" type="password" id="form-login-password" name="password" value="" maxlength="40" aria-describedby="help-form-login">
                        </div>
                    </div>

                    <ul class="list-inline-caret text-color text-right text-small pull-right-md">
                        <li><a href="#" title="パスワードを忘れた方はこちら">パスワードを忘れた方はこちら</a></li>
                        <li><a href="#" title="ログインできない場合">ログインできない場合</a></li>
                    </ul>

                    <input class="btn btn-lg block-xs-12 block-sm-12 block-md-4 btn-primary mt-15" type="submit" value="ログイン" name="userlogin">                        
                </form>
            </div>

            <div id="js-form-register-pane" class="tab-pane fade" role="tabpanel">
                <form action="#" method="post" role="form">
                    <div class="row gutter-xs">
                        <div class="col-sm-6 form-group pull-right">
                            <label for="form-register-firstname">名</label>
                            <input class="form-control" type="text" id="form-register-firstname" name="first_name" value="" maxlength="100" aria-describedby="help-form-register-firstname">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="form-register-lastname">姓</label>
                            <input class="form-control" type="text" id="form-register-lastname" name="last_name" value="" maxlength="100" aria-describedby="help-form-register-lastname">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="form-register-email">Eメール</label>
                            <input class="form-control" type="email" id="form-register-email" name="email" value="" maxlength="255" aria-describedby="help-form-register-email">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="form-register-password">
                                パスワード						<span class="text-danger">半角英数字で8文字以上</span>
                            </label>
                            <input class="form-control" type="password" id="form-register-password" name="password" value="" maxlength="40" aria-describedby="help-form-register-password">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="form-register-confirm_password">パスワード（確認用）</label>
                            <input class="form-control" type="password" id="form-register-confirm_password" name="confirm_password" value="" maxlength="40" aria-describedby="help-form-register-confirm_password">
                        </div>
                    </div>
                    <div class="checkbox">
                        <label class="active">
                            <input type="checkbox" name="jobmail_optin" value="yes" checked="">
                            ジョブメールの購読をします。				</label>
                    </div>

                    <div class="modal fade js-modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>						<input class="btn btn-lg block-xs-12 block-sm-12 block-md-4 btn-primary mt-15" type="submit" name="" value="送信">
                </form>
            </div>
        </div>

        <div class="mt-30 text-center-xs text-center-sm text-left-md">
            <h4 class="text-uppercase">フェイスブックユーザー</h4>
            <p class="text-small">フェイスブックのアカウントでサービスを利用することもできます。</p>


        </div>				</div>   
    ';
    endif;
    return $content . $add_content;
}

//add_filter('the_content', 'func_apply');

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

add_filter('wp_nav_menu_items', 'add_search_to_menu', 10, 2);
