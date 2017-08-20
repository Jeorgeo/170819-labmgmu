<?php
global $tags_post;
$tags = get_the_terms($tags_post->ID, 'news_tags');
$news = array();
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
foreach ($list as $obj){
    $terms = get_the_terms($obj->ID, 'news_tags');
    $found = false;
    if ($terms){
        foreach ($terms as $term){
            if ($tags) {
                foreach ($tags as $tag){
                    if ($tag == $term){
                        $found = true;
                    }
                }
            }
        }
    }
    if ($found) {
        $news[] = $obj;
        if (count($news) == 4){
            break;
        }
    }
}
if (count($news)) {
?>
<div class="row">
    <div class="col-md-9">
        <h1>
            <?php echo lng_text('Новости похожие по теме'); ?>
            <div class="h1_line"></div>
        </h1>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <?php foreach ($news as $obj) {

      $tag_en = get_field('description_en',$obj->ID);
      $tag_ru = get_field('description',$obj->ID);

      if ((LANG == 'RU')&&($tag_ru != '')) {

      ?>
        <div class="col-md-3">
            <a class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">
                <div class="news_mini">
                    <div class="news_mini_date">
                        <?php
                        $date = strtotime($obj->post_date);
                        $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);
                        echo $date; ?>
                    </div>
                    <div class="news_mini_title">
                        <?php echo $obj->post_title; ?>
                    </div>
                    <div class="news_mini_info">
                        <?php echo get_field('description',$obj->ID); ?>
                    </div>
                </div>
            </a>
        </div>

        <?php

      } elseif ((LANG == 'EN')&&($tag_en != '')) {

        ?>

        <div class="col-md-3">
            <a class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">
                <div class="news_mini">
                    <div class="news_mini_date">
                        <?php
                        $date = strtotime($obj->post_date);
                        $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);
                        echo $date; ?>
                    </div>
                    <div class="news_mini_title">
                        <?php echo get_field('title_en',$obj->ID); ?>
                    </div>
                    <div class="news_mini_info">
                        <?php echo get_field('description_en',$obj->ID); ?>
                    </div>
                </div>
            </a>
        </div>

        <?php
      } else continue;
    };


     } ?>
</div>
