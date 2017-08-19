<?php

function job_list() {
    $labels = array(
        'all_items' => 'Jobs',
        'menu_name' => 'Jobs',
        'singular_name' => 'Jobs',
        'edit_item' => 'Edit Job',
        'new_item' => 'Add New Job',
        'view_item' => 'View Job',
        'items_archive' => 'Jobs Archive',
        'search_items' => 'Search Jobs',
        'not_found' => 'No jobs found',
        'not_found_in_trash' => 'No jobs found in trash'
    );

    $args = array(
        'labels' => $labels,
        'supports' => array('title', 'author', 'revisions'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => get_template_directory_uri() . '/img/job.png',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
    );
    register_post_type('cv_job', $args);
}

add_action('init', 'job_list');

add_action('init', 'job_category');

function job_category() {
    register_taxonomy('job_category', 'cv_job', array(
        'label' => 'Job Category',
        'labels' => array(
            'name' => __('Category'),
            'add_new_item' => __('New Job Category'),
            'add_new' => __('Add Job Category'),
            'edit_item' => __('Edit Job Category'),
            'singular_name' => 'Job Category',
            'all_items' => 'All Job Category',
            'search_items' => 'Search Job Category',
        ),
        'public' => true,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => true
            )
    );
}

add_action('init', 'job_location');

function job_location() {
    register_taxonomy('job_location', 'cv_job', array(
        'label' => 'Job Location',
        'labels' => array(
            'name' => __('Location'),
            'all_items' => __('All Job Location'),
            'add_new_item' => __('New Job Location'),
            'add_new' => __('Add Job Location'),
            'edit_item' => __('Edit Job Location'),
            'singular_name' => 'Job Location',
            'search_items' => 'Search Job Location',
        ),
        'public' => true,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => true
            )
    );
}

add_action('init', 'job_salary');

function job_salary() {
    register_taxonomy('job_salary', 'cv_job', array(
        'label' => 'Job Salary',
        'labels' => array(
            'name' => __('Salary'),
            'all_items' => __('All Job Salary'),
            'add_new_item' => __('New Job Salary'),
            'add_new' => __('Add Job Salary'),
            'edit_item' => __('Edit Job Salary'),
            'singular_name' => 'Job Salary',
            'search_items' => 'Search Job Salary',
        ),
        'public' => true,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => true
            )
    );
}

add_action('init', 'job_keyword');

function job_keyword() {
    register_taxonomy('job_keyword', 'cv_job', array(
        'label' => 'Job Keyword',
        'labels' => array(
            'name' => __('Keyword'),
            'all_items' => __('All Job Keyword'),
            'add_new_item' => __('New Job Keyword'),
            'add_new' => __('Add Job Keyword'),
            'edit_item' => __('Edit Job Keyword'),
            'singular_name' => 'Job Keyword',
            'search_items' => 'Search Job Keyword',
        ),
        'public' => true,
        'hierarchical' => FALSE,
        'query_var' => true,
        'rewrite' => true
            )
    );
}

$meta_box = array(
    'id' => "job_settings",
    'title' => __('Job Settings', 'baito'),
    'page' => 'cv_job',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array('id' => '_cover_image', 'label' => __('Ảnh bìa', 'baito'), 'type' => 'image'),
        array('id' => '_salary', 'label' => __('Tiền lương', 'baito'), 'type' => 'text'),
        array('id' => '_location', 'label' => __('Nơi làm việc', 'baito'), 'type' => 'text'),
        array('id' => '_map', 'label' => __('Bản đồ', 'baito'), 'type' => 'text'),
        array('id' => '_job_time', 'label' => __('Thời gian làm việc', 'baito'), 'type' => 'text'),
        array('id' => '_job_day', 'label' => __('Số ngày làm việc', 'baito'), 'type' => 'text'),
        array('id' => '_station', 'label' => __('Ga gần nhất', 'baito'), 'type' => 'text'),
        array('id' => '_skill_japanese', 'label' => __('Kĩ năng tiếng Nhật', 'baito'), 'type' => 'select', 'options' => array('N1', 'N2', 'N3', 'N4')),
        array('id' => '_transport_cost', 'label' => __('Chi phí đi lại', 'baito'), 'type' => 'text'),
        array('id' => '_job_content', 'label' => __('Nội dung công việc', 'baito'), 'type' => 'textarea'),
        array('id' => '_job_experience', 'label' => __('Kinh nghiệm', 'baito'), 'type' => 'text'),
        array('id' => '_job_note', 'label' => __('Ghi chú', 'baito'), 'type' => 'textarea'),
        array('id' => '_job_status', 'label' => __('Status', 'baito'), 'type' => 'select', 'options' => array(1 => 'Open', 0 => 'Closed')),
    )
);

function job_add_box() {
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'cv_baito_show_box', 'cv_job', $meta_box['context'], $meta_box['priority']);
}

add_action('admin_menu', 'job_add_box');

function cv_baito_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="job_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
        '<th style="width:20%"><label for="', $field['id'], '">', $field['label'], '</label></th>',
        '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', htmlspecialchars($meta) ? htmlspecialchars($meta) : htmlspecialchars($field['std']), '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
            case 'image':
                $display = $meta == "" ? "none" : "inline-block";
                echo '<input class="element-upload" name="', $field['id'], '" type="hidden" value="' . $meta . '" />';
                echo '<a href="javascript;;" id="cover_image_button" class="button button-primary">Select Image</a> ';
                echo '<a href="javascript;;" class="remove-image button after-upload" style="display: ' . $display . '">Remove</a>';
                echo '<div class="image" style="margin-top: 8px;">';
                if (!empty($meta)) {
                    echo wp_get_attachment_image($meta, array("100", "100"));
                }
                echo '</div>';
                break;
        }
        echo '<td>',
        '</tr>';
    }

    echo '</table>';
}

function load_custom_wp_admin_style() {
    wp_enqueue_script('custom_upload_script', get_template_directory_uri() . '/admin/js/custom-upload.js');
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

// Save data from meta box
function job_meta_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['job_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('cv_job' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

add_action('save_post', 'job_meta_save_data');

function job_application() {
    $labels = array(
        'name' => _x('Jobs Application', 'baito'),
        'singular_name' => _x('Jobs Application', 'baito'),
        'menu_name' => __('Jobs Application', 'baito'),
        'all_items' => __('Jobs Application', 'baito'),
        'view_item' => __('View Jobs Application', 'baito'),
        'add_new_item' => __('Add New Jobs Application', 'baito'),
        'add_new' => __('Add New', 'baito'),
        'edit_item' => __('Edit', 'baito'),
        'update_item' => __('Update Jobs Application', 'baito'),
        'search_items' => __('Search Jobs Application', 'baito'),
        'not_found' => __('Not found Jobs Application.', 'baito'),
        'not_found_in_trash' => __('Not found Jobs Application.', 'baito'),
    );
    $args = array(
        'label' => __('sproduct', 'baito'),
        'description' => __('Quản lý người dùng đăng ký công việc', 'baito'),
        'labels' => $labels,
        'supports' => array('title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => get_template_directory_uri() . '/img/Group.png',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    );
    register_post_type('job_application', $args);
}

add_action('init', 'job_application');

$meta_box_uv = array(
    'id' => "uv_settings",
    'title' => __('Thông tin ứng viên', 'baito'),
    'page' => 'job_application',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array('id' => '_uv_name', 'label' => __('Họ tên', 'baito'), 'type' => 'label'),
        array('id' => '_gender', 'label' => __('Giới tính', 'baito'), 'type' => 'label'),
        array('id' => '_birthdate', 'label' => __('Ngày sinh', 'baito'), 'type' => 'birthday'),
        array('id' => '_tel', 'label' => __('Điện thoại', 'baito'), 'type' => 'tel'),
        array('id' => '_email', 'label' => __('Email', 'baito'), 'type' => 'email'),
        array('id' => '_address', 'label' => __('Địa chỉ', 'baito'), 'type' => 'label'),
        array('id' => '_employer', 'label' => __('Nghề nghiệp', 'baito'), 'type' => 'label'),
        array('id' => '_country', 'label' => __('Quốc tịch', 'baito'), 'type' => 'label'),
        array('id' => '_jlpt_level', 'label' => __('Trình độ tiếng Nhật', 'baito'), 'type' => 'label'),
        array('id' => '_about_me', 'label' => __('Giới thiệu bản thân', 'baito'), 'type' => 'label'),
    )
);
$meta_box_history_uv = array(
    'id' => "uv_history_settings",
    'title' => __('Quá khứ của ứng viên', 'baito'),
    'page' => 'job_application',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array('id' => '_job_id', 'label' => __('Công việc đăng ký', 'baito'), 'type' => 'label'),
    )
);

$meta_box__job_apply_confirm = array(
    'id' => "job_apply_confirm",
    'title' => __('Xác nhận thông tin', 'baito'),
    'page' => 'job_application',
    'context' => 'side',
    'priority' => 'high',
    'fields' => array(
        array('id' => '_job_apply_confirm', 'label' => __('Trạng thái', 'baito'), 'type' => 'select', 'options' => get_application_status()),
    )
);

function uv_add_box() {
    global $meta_box_uv, $meta_box_history_uv, $meta_box__job_apply_confirm;
    add_meta_box($meta_box_uv['id'], $meta_box_uv['title'], 'uv_show_box', 'job_application', $meta_box_uv['context'], $meta_box_uv['priority']);
    add_meta_box($meta_box_history_uv['id'], $meta_box_history_uv['title'], 'uv_show_history_box', 'job_application', $meta_box_history_uv['context'], $meta_box_history_uv['priority']);
    add_meta_box($meta_box__job_apply_confirm['id'], $meta_box__job_apply_confirm['title'], 'job_apply_status', $meta_box__job_apply_confirm['page'], $meta_box__job_apply_confirm['context'], $meta_box__job_apply_confirm['priority']);
}

add_action('admin_menu', 'uv_add_box');

function uv_show_box() {
    global $meta_box_uv, $post, $countries, $employer_list, $jlpt_list;

    $post_info = get_post($post->ID);
    $job_id = $post_info->post_parent;
    // Use nonce for verification
    echo '<input type="hidden" name="uv_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';
    echo '<tr>'
    . '<th style="width:20%"><label>Công việc đăng ký</label></th>';

    echo '<td><a href="' . get_the_permalink($job_id) . '">' . get_the_title($job_id) . '</a></td>';
    echo '</tr>';
    foreach ($meta_box_uv['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
        '<th><label for="', $field['id'], '">', $field['label'], '</label></th>',
        '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', htmlspecialchars($meta) ? htmlspecialchars($meta) : htmlspecialchars($field['std']), '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
            case 'image':
                $display = $meta == "" ? "none" : "inline-block";
                echo '<input class="element-upload" name="', $field['id'], '" type="hidden" value="' . $meta . '" />';
                echo '<a href="javascript;;" id="cover_image_button" class="button button-primary">Select Image</a> ';
                echo '<a href="javascript;;" class="remove-image button after-upload" style="display: ' . $display . '">Remove</a>';
                echo '<div class="image" style="margin-top: 8px;">';
                if (!empty($meta)) {
                    echo wp_get_attachment_image($meta, array("100", "100"));
                }
                echo '</div>';
                break;
            case 'label':
                if ($field['id'] == "_country")
                    echo $countries[$meta];
                elseif ($field['id'] == "_employer") {
                    echo $employer_list[$meta];
                } elseif ($field['id'] == "_jlpt_level") {
                    echo $jlpt_list[$meta];
                } else
                    echo $meta;
                break;
            case 'tel':
                echo '<a href="tel:' . $meta . '">' . $meta . '</a>';
                break;
            case 'email':
                echo '<a href="mailto:' . $meta . '">' . $meta . '</a>';
                break;
            case 'birthday':
                echo get_post_meta($post->ID, 'birth_year', true) . '/' . get_post_meta($post->ID, 'birth_month', true) . '/' . get_post_meta($post->ID, 'birth_day', true);
                break;
            default:
                echo htmlspecialchars($meta) ? htmlspecialchars($meta) : htmlspecialchars($field['std']);
                break;
        }
        echo '<td>',
        '</tr>';
    }

    echo '</table>';
}

/**
 * Lấy lịch sử của ứng viên đã apply vào các công việc trước đây
 */
function uv_show_history_box() {
    
}

/**
 * Button xác nhận trạng thái của ứng viên apply công việc
 */
function job_apply_status() {
    global $meta_box__job_apply_confirm, $post;

    $field = $meta_box__job_apply_confirm['fields'][0];
    $meta = get_post_meta($post->ID, $field['id'], true);

    // Use nonce for verification
    echo '<input type="hidden" name="job_apply_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    
    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
    foreach ($field['options'] as $option) {
        echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
    }
    echo '</select>';
}

// Update trạng thái của ứng viên sau khi duyệt hồ sơ đăng ký
function job_apply_save_status($post_id) {
    global $meta_box__job_apply_confirm;

    // verify nonce
    if (!wp_verify_nonce($_POST['job_apply_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('job_application' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box__job_apply_confirm['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

add_action('save_post', 'job_apply_save_status');

/**
 * Add row in post type job application
 */
add_filter('manage_edit-job_application_columns', 'job_application_edit_post_columns');

function job_application_edit_post_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'status' => 'Status',
        '_uv_name' => 'Ứng viên',
        'job_name' => 'Công việc',
        'date' => __('Thời gian')
    );

    return $columns;
}

add_action('manage_posts_custom_column', 'job_application_manage_post_columns', 10, 2);

function job_application_manage_post_columns($column, $post_id) {
    global $post;
    switch ($column) {

        case 'status':
            $status = get_post_meta($post->ID, '_job_apply_confirm', true);            
            echo '<span class="job-application-status job-application-status-' . sanitize_html_class($status) . '">';
            echo esc_html($status);
            echo '</span>';
            break;
        case 'job_name':
            $job = get_post($post->post_parent);

            if ($job && $job->post_type === 'cv_job') {
                echo '<a href="' . get_permalink($job->ID) . '">' . $job->post_title . '</a>';
            } else {
                echo '<span class="na">&ndash;</span>';
            }
            break;
        case '_uv_name':
            echo '<a href="' . get_edit_post_link($post->ID) . '">' . get_post_meta($post->ID, '_uv_name', true) . '</a>';
            break;
        default :
            break;
    }
}

/**
 * Add row in post type cv_job
 */
add_filter('manage_edit-cv_job_columns', 'cv_job_edit_post_columns', 10, 2);

function cv_job_edit_post_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'job_category' => 'Category',
        'apply_number' => 'Apply',
        'job_status' => 'Status',
        'job_view' => 'Views',
        'author' => __('Author'),
        'date' => __('Date')
    );

    return $columns;
}

add_action('manage_posts_custom_column', 'cv_job_manage_post_columns', 10, 2);

function cv_job_manage_post_columns($column, $post_id) {
    global $post, $wpdb;
    switch ($column) {
        case 'apply_number':
            $apply_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'job_application' AND post_parent = {$post->ID}");
            if ($apply_count > 0) {
                $url_args = array('s' => '', 'post_status' => 'all', 'post_type' => 'job_application', 'job' => $post->ID, 'action' => -1, 'action2' => -1);
                $apply_link = esc_url(add_query_arg($url_args, admin_url('edit.php')));
                echo '<strong><a href="' . $apply_link . '">' . $apply_count . '</a></strong>';
            } else {
                echo '-';
            }
            break;
        case 'job_category':
            if (!$terms = get_the_terms($post->ID, $column)) {
                echo '<span class="na">&ndash;</span>';
            } else {
                $terms_edit = array();
                foreach ($terms as $term) {
                    $terms_edit[] = edit_term_link($term->name, '', '', $term, false);
                }
                echo implode(', ', $terms_edit);
            }
            break;
        case 'job_view':
            echo get_PostViews(get_the_ID()) . ' view';
            break;
        case 'job_status':
            $status = get_post_meta(get_the_ID(), '_job_status', true);
            echo $status;
            break;
        default :
            break;
    }
}

/* Popular Posts by Views */

global $count_key;
$count_key = 'job_views_count';

function wp_set_post_views($postID) {
    global $count_key;
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function wp_track_post_views($post_id) {
    if (!is_single())
        return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    wp_set_post_views($post_id);
}

add_action('wp_head', 'wp_track_post_views');

function get_PostViews($post_ID) {
    global $count_key;
    $count = get_post_meta($post_ID, $count_key, true);
    $count = empty($count) ? 0 : $count;
    return $count;
}

/**
 * Reorder column
 * @param array $newcolumn
 * @return string
 */
function register_post_column_views_sortable($newcolumn) {
    $newcolumn['job_view'] = 'job_view';
    $newcolumn['job_status'] = 'job_status';
    return $newcolumn;
}

add_filter('manage_edit-cv_job_sortable_columns', 'register_post_column_views_sortable');

function sort_views_column($vars) {
    global $count_key;
    if (isset($vars['orderby']) && 'job_view' == $vars['orderby']) {
        switch ($vars['orderby']):
            case 'job_view':
                $vars = array_merge($vars, array(
                    'meta_key' => $count_key,
                    'orderby' => 'meta_value_num')
                );
                break;
            case 'job_status':
                $vars = array_merge($vars, array(
                    'meta_key' => '_job_status',
                    'orderby' => 'meta_value_num')
                );
                break;
        endswitch;
    }
    return $vars;
}

add_filter('request', 'sort_views_column');

function shortcode_top_views($params) {
    global $count_key;
    $display = isset($params['num']) ? (int) $params['num'] : 5;

    $conditions = array(
        'post_type' => array('post'),
        'posts_per_page' => $display,
        'post_status' => 'publish',
        'meta_key' => $count_key,
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    );

    $return_str .= '';

    $return_str .= '<ul id="top-view" class="list-unstyled">';
    $query = new WP_query($conditions);
    if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
            $count = get_post_meta(get_the_ID(), 'tanaka_post_views_count', true);
            $return_str .= '<li>
            <a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '" class="zoom-effect">
            <figure class="eyecatch">' . get_the_post_thumbnail(get_the_ID(), array(80, 80), array('class' => 'pull-left')) . '</figure>' . get_the_title() . '
            <ul id="post-meta" class="list-inline list-unstyled">
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> ' . get_the_time("Y-m-d", get_the_ID()) . '</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i> ' . $count . ' views</li>
                    </ul>
            ';
            $return_str .= '</a></li> ';
        endwhile;
    endif;
    wp_reset_query();
    $return_str .= '</ul>';
    return $return_str;
}

add_shortcode('top_views', 'shortcode_top_views');

/**
 * THêm bộ lọc cho post type
 * @global type $typenow
 * @return type
 */
function job_application_filter() {
    global $typenow, $wp_query, $wpdb;

    if ('job_application' != $typenow) {
        return;
    }
    ?>
    <select id="dropdown_job_apply" name="job">
        <option value=""><?php _e('All jobs', 'baito') ?></option>
        <?php
        $jobs_with_applications = $wpdb->get_col("SELECT DISTINCT post_parent FROM {$wpdb->posts} WHERE post_type = 'job_application'");
        $current = isset($_GET['job']) ? $_GET['job'] : 0;
        foreach ($jobs_with_applications as $job_id) {
            if (( $title = get_the_title($job_id) ) && $job_id) {
                echo '<option value="' . $job_id . '" ' . selected($current, $job_id, false) . '">' . $title . '</option>';
            }
        }
        ?>
    </select>   
    <?php
}

add_action('restrict_manage_posts', 'job_application_filter');

function job_apply_data_filter($query) {
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ('job_application' == $type && is_admin() && $pagenow == 'edit.php') {
        if (!isset($query->query_vars['post_type']) || $query->query_vars['post_type'] == 'job_application') {
            if (isset($_GET['job']) && $_GET['job'] != '') {
                $job_id = $_GET['job'];

                $query->query_vars['post_parent'] = $job_id;
            }
        }
    }
}

add_filter('parse_query', 'job_apply_data_filter');

function get_application_status() {
    return apply_filters('cv_application_status', array(
        'rejected' => __('Rejected', 'baito'),
        'pending' => __('Pending', 'baito'),
        'publish' => __('Approved', 'baito'),
        'inactive' => __('Inactive', 'baito'),
    ));
}
