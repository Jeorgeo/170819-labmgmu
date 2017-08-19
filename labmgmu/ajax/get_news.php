<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;

$news_id = $_POST['id'];

$list = get_posts(
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
        'post_type' => 'news',
        'post_parent' => '',
        'post_status' => 'publish'
    )
);
$news = array();
$post_month = $month;
$post_year = $year;
$current_month = $month;
$current_year = $year;
foreach ($list as $obj) {
    if ($obj->ID == $news_id) {
        $news[] = $obj;
    }
}
$news_place = '';
if (count($news[0])) {
    $big_post = $news[0];
    $news_place .= '<div class="big_news_item">';
    if (LANG == 'RU') {
        $news_place .= '<h3>' . $big_post->post_title . '</h3>';
    } else {
        $news_place .= '<h3>' . get_field('title_en',$big_post->ID) . '</h3>';
    }

    $img = get_field('big_picture', $big_post->ID);
    if ($img) {
        $news_place .= '<img src="' . $img['url'] . '" alt=""/>';
    }
    $news_place .= '<div class="big_news_item_date">';
    $date = strtotime($big_post->post_date);
    $date = date("d ", $date) . get_r_month(date("n", $date)) . date(" Y H:i", $date);
    $news_place .= $date;
    $news_place .= '</div>';
    $news_place .= get_field_lng('content', $big_post->ID);
    //$user = get_user_by('id', $big_post->author);
    $news_place .= '<div class="big_news_item_avtor">';
    $news_place .= '<a href="' . get_field('author', $big_post->ID) . '">' . lng_text('Автор') . ': ' . get_field(
        'author',
        $big_post->ID
    ) . '</a>';
    $news_place .= '</div>';
    $news_place .= '</div>';
}
$result['news_place'] = $news_place;

echo json_encode($result);