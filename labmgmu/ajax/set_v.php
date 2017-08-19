<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;

$fio = trim($_POST['fio']);
$birth = trim($_POST['birth']);
$sex = trim($_POST['sex']);
$town = trim($_POST['town']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$study = trim($_POST['study']);

$volunteers = get_posts(
    array(
        'numberposts' => -1,
        'offset' => 0,
        'orderby' => 'date',
        'order' => 'DESC',
        'category' => '',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'volunteers',
        'post_parent' => '',
        'post_status' => 'publish'
    )
);
foreach ($volunteers as $obj) {
    if ($obj->post_title == $fio &&
        get_field('study', $obj->ID) == $study &&
        get_field('phone', $obj->ID) == $phone ) {
        die('Вы уже отправляли заявку!');
    }
}
$post_data = array(
    'ID' => 0,
    'post_title' => wp_strip_all_tags($fio),
    'post_status' => 'publish',
    'post_author' => 1,
    'post_type' => 'volunteers',

);
$ID = wp_insert_post($post_data);
update_post_meta($ID, 'birth', $birth);
update_post_meta($ID, 'sex', $sex);
update_post_meta($ID, 'town', $town);
update_post_meta($ID, 'phone', $phone);
update_post_meta($ID, 'email', $email);
update_post_meta($ID, 'study', $study);
die('Ok');
