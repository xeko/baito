<?php /* Template Name: Page Apply Exist */ ?>
<?php
header('Content-type: application/json');

global $wpdb;
$exist = true;

if(isset($_POST['job_id']) && $_POST['job_id'] != '' && is_numeric($_POST['job_id']))
    $jobID = $_POST['job_id'];
if(isset($_POST['input_form']))
    $input_form = $_POST["input_form"];
$email = $input_form['_email'];
$apply_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE post_id IN (SELECT ID FROM {$wpdb->posts} WHERE post_parent = {$jobID}) AND meta_value = '{$email}'");
if($apply_count > 0)
    $exist = FALSE;

echo json_encode(array(
    'valid' => $exist,
));
