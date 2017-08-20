<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;

$year = $_POST['year'];
$month = $_POST['month'];

$list = get_posts(
    array(
        'numberposts' => -1,
        'offset' => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
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
    $post_date = strtotime($obj->post_date);
    $post_month = date("n",$post_date);
    $post_year = date("Y",$post_date);
    if ($post_year == $current_year && $post_month == $current_month){
        if($obj->post_name != 'archive'){
            $news[] = $obj;
        }
    }
}
$list_place = '';
foreach ($news as $index=>$obj) {
    $list_place .= '<div class="col-md-6"';
    if (!($index % 2)) {
        $list_place .= ' style="clear: both;"';
    }
    $list_place .= '><a onclick="get_news('.$obj->ID.'); return false;" class="news_mini_a" href="/news/' . $obj->post_name . '">';
    $list_place .= '<div id="news_item' . $obj->ID . '" class="news_mini news_mini_single ';
    if (!$index) {
        $list_place .= 'active';
    }
    $list_place .= '">';
    $list_place .= '<div class="news_mini_date">';
    $date = strtotime($obj->post_date);
    $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);
    $list_place .= $date;
    $list_place .= '</div>';
    $list_place .= '<div class="news_mini_title">';
    if (LANG == 'RU'){
        $list_place .= $obj->post_title;
    } else {
        $list_place .= get_field('title_en',$obj->ID);
    }
    $list_place .= '</div>';
    $list_place .= '<div class="news_mini_info">';
    $list_place .= get_field_lng('description',$obj->ID);
    $list_place .= '</div>';
    $list_place .= '</div>';
    $list_place .= '</a>';
    $list_place .= '</div>';
}
$news_place = '';
if (count($news[0])) {
    $big_post =  $news[0];
    $news_place .='<div class="big_news_item">';
    $news_place .='<h3>' . $big_post->post_title .'</h3>';
    $img = get_field('big_picture', $big_post->ID);
    if ($img) {
        $news_place .='<img src="' . $img['url'] .'" alt=""/>';
    }
    $news_place .='<div class="big_news_item_date">';
    $date = strtotime($big_post->post_date);
    $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);
    $news_place .= $date;
    $news_place .='</div>';
    $news_place .= get_field_lng('content', $big_post->ID);
    $user = get_user_by('id', $big_post->author);
    $news_place .='<div class="big_news_item_avtor">';
    $news_place .='<a href="#">' . lng_text('Автор') . ': ' . $user->display_name .'</a>';
    $news_place .='</div>';
    $news_place .='</div>';
}
$result['list_place'] = $list_place;
$result['news_place'] = $news_place;
$result['archive_month'] = get_month_name($month);

echo json_encode( $result );
die();
