<?php /* Template Name: Question & Answer */ ?>
<?php

$qa_data = array(
    'post_title' => $_POST['qa_title'],
    'post_type' => 'qa',
    'post_status' => 'publish'
);

if (isset($_POST['qa_content']) && trim($_POST['qa_content']) != "")
    $qa_answer = $_POST['qa_content'];
if (isset($_POST['qa_type']) && trim($_POST['qa_type']) != "")
    $qa_type = $_POST['qa_type'];

$qa_info = wp_insert_post($qa_data);

if ($qa_info) {
    $qa_custom_data = add_post_meta($qa_info, '_qa_question', $qa_answer);
    //Insert taxonomy...
    $qa_taxonomy = wp_set_object_terms($qa_info, $qa_type, 'category_qa', true);
}
if($qa_custom_data)
    return "Cảm ơn bạn đã đặt câu hỏi. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.";
    