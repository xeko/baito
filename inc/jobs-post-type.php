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
        'supports' => array('title', 'editor', 'author', 'revisions'),
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
        array('id' => '_cover_image', 'label' => __('Cover Image', 'baito'), 'type' => 'image'),
        array('id' => '_salary', 'label' => __('Tiền lương', 'baito'), 'type' => 'text'),
        array('id' => '_location', 'label' => __('Nơi làm việc', 'baito'), 'type' => 'text'),
        array('id' => '_time', 'label' => __('Thời gian làm việc', 'baito'), 'type' => 'text'),
        array('id' => '_map', 'label' => __('Bản đồ', 'baito'), 'type' => 'text'),
    )
);

function bcdonline_add_box() {
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'cv_baito_show_box', 'cv_job', $meta_box['context'], $meta_box['priority']);
}

add_action('admin_menu', 'bcdonline_add_box');

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
        'supports' => array('title', 'editor'),
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

/**
 * Add row in post type job application
 */
add_filter('manage_edit-job_application_columns', 'job_application_edit_post_columns');

function job_application_edit_post_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'status' => 'Status',
        'title' => 'Ứng viên',
        'job_name'  => 'Công việc',
        'date' => __('Thời gian')
    );

    return $columns;
}

add_action('manage_post_job_application_custom_column', 'job_application_manage_post_columns', 10, 2);

function job_application_manage_post_columns($column, $post_id) {

    switch ($column) {
        
        default :
            break;
    }
}
