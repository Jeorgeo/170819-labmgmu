<?php
global $big_post;
if ($big_post->ID == NULL){
    $big_post = $post;
}
?>

<div class="big_news_item">
    <h3><?php
        if (LANG == 'RU') {
            echo $big_post->post_title;
        } else {
            echo get_field('title_en',$big_post->ID);
        };
        ?></h3>
    <?php
    $img = get_field('big_picture', $big_post->ID);
    //var_dump($img);
    if ($img) { ?>
        <img src="<?php $img = get_field('big_picture', $big_post->ID); echo $img['url']; ?>" alt=""/>
    <?php } ?>

    <div class="big_news_item_date">
        <?php
        $date = strtotime($big_post->post_date);
        $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);
        echo $date; ?>
    </div>
    <?php echo wiki(get_field_lng('content', $big_post->ID)); ?>
    <div class="big_news_item_avtor">
        <a href="<?php echo get_field('author', $big_post->ID)?>"><?php echo lng_text('Автор'); ?>: <?php echo get_field('author', $big_post->ID)?></a>
    </div>
</div>
