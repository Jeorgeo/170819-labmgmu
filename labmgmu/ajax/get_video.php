<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;

$post_type = $_POST['type'];
$post_id = $_POST['id'];

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
        'post_type' => $post_type,
        'post_parent' => '',
        'post_status' => 'publish'
    )
);
foreach ($list as $obj) {
    if ($obj->ID == $post_id){
        $post = $obj;
    }
}
$frame = '<iframe width="100%" src="//www.youtube.com/embed/' . get_field('video', $post->ID) .'" frameborder="0" allowfullscreen></iframe>';
$result['frame'] = $frame;
$result['description'] = get_field_lng('description', $post->ID);

echo json_encode( $result );