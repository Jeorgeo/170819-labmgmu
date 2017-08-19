<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;

$study_id = $_POST['id'];
$study_arc = 0;
if (isset($_POST['arc'])){
    $study_arc = $_POST['arc'];
}

$studies = get_posts(
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
        'post_type' => 'studies',
        'post_parent' => '',
        'post_status' => 'publish'
    )
);
foreach ($studies as $study) {
    if ($study->ID == $study_id) {
        break;
    }
}
?>
<h3 class="study_title <?php if ($study_arc) { echo "study_title_archive"; } ?>"><?php echo $study->post_title; ?></h3>
<?php
$img = get_field('picture', $study->ID);
if ($img) { ?>
    <img src="<?php echo $img['url']; ?>" alt=""/>
<?php } ?>

<div class="big_news_item_date" style="display: none">
    <span><?php echo lng_text('Опубликовано'); ?>:</span>
    <?php
    $date = strtotime($study->post_date);
    $date = date("d ",$date) . get_r_month(date("n",$date));
    echo $date; ?>
</div>
<div class="<?php if ($study_arc) { echo "description_archive"; } ?>">
    <?php echo wiki(get_field_lng('descriptin', $study->ID)); ?>
</div>
