<?php get_header(); ?>



<div id="news" class="section">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <h1>

                    <a href="/news">

                        <div class="back_btn">« <?php echo lng_text('назад в раздел'); ?></div>

                    </a>

                    <?php echo lng_text('Новости'); ?>

                    <div class="h1_line"></div>

                </h1>

            </div>

            <div class="col-md-3">

                <h1>&nbsp;

                    <div class="h1_line gray"></div>

                </h1>

            </div>

        </div>

        <div class="row">

            <div class="col-md-3">



                <?php

                $news = get_posts(

                    array(

                        'numberposts' => 100,

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

                $news_count = 0;

                foreach ($news as $obj) {

                    if($obj->post_name == 'archive'){

                        continue;

                    }

                    if ($news_count > 9){

                        break;

                    }

                    $new_en = get_field('description_en',$obj->ID);
                    $new_ru = get_field('description',$obj->ID);

                    if ((LANG == 'RU')&&($new_ru != '')) {

                      ?>

                    <a class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">

                        <div class="news_mini news_mini_single <?php if ($post->ID == $obj->ID) { echo 'active'; } ?>">

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

                    <?php

                    $news_count++;
                  } elseif ((LANG == 'EN')&&($new_en != '')) {

                    ?>

                    <a class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">

                        <div class="news_mini news_mini_single <?php if ($post->ID == $obj->ID) { echo 'active'; } ?>">

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

                    <?php

                    $news_count++;
                   } else continue;

               }; ?>

                <a href="/news/archive">

                    <div class="news_archive_btn">

                        <?php echo lng_text('Архив новостей'); ?>

                    </div>

                </a>

                <br/>



            </div>

            <div class="col-md-6">

                <?php

                global $table;

                $table = 'news';

                require_once "include/search_input.php" ?>

                <div id="news_big"></div>

                <?php

                $big_post =  $post;

                require_once "include/news_big.php";

                ?>

            </div>

            <div class="col-md-3">

                <?php

                $banner_category = 1;

                require_once "include/banners.php"; ?>

            </div>

        </div>



        <?php

        $tags_post = $post;

        require_once "include/news_tags.php"; ?>



    </div>

</div>

<?php if ($post->ID) { ?>
    <script>
        $(document).ready(function () {
            var theElement = document.getElementById("news_big");
            var selectedPosY = 0;
            while (theElement != null) {
                selectedPosY += theElement.offsetTop - 50;
                theElement = theElement.offsetParent;
            }
            $.scrollTo( selectedPosY, 500);
        });
    </script>
<?php } ?>

<?php get_footer(); ?>
