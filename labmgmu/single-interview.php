<?php get_header(); ?>



<div id="news" class="section">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <h1 class="red">

                    <a href="/interview">

                        <div class="back_btn">« <?php echo lng_text('назад в раздел'); ?></div>

                    </a>

                    <?php echo lng_text('Интервью'); ?>

                    <div class="h1_line red"></div>

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

                $interview = get_posts(

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

                        'post_type' => 'interview',

                        'post_parent' => '',

                        'post_status' => 'publish'

                    )

                );

                $news_count = 0;

                foreach ($interview as $obj) {

                    if($obj->post_name == 'archive') {

                        continue;

                    }

                    if ($news_count > 9) {

                        break;

                    }

                    $new_en = get_field('description_en',$obj->ID);
                    $new_ru = get_field('description',$obj->ID);

                    if ((LANG == 'RU')&&($new_ru != '')) {

                      ?>

                    <a class="news_mini_a" href="/interview/<?php echo $obj->post_name; ?>">

                        <div class="news_mini news_mini_single">

                            <div class="news_mini_date">

                                <?php

                                $date = strtotime($obj->post_date);

                                $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);

                                echo $date; ?>

                            </div>

                            <div class="news_mini_title <?php if ($post->ID == $obj->ID) { echo 'red'; } ?>">

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

                    <a class="news_mini_a" href="/interview/<?php echo $obj->post_name; ?>">

                        <div class="news_mini news_mini_single">

                            <div class="news_mini_date">

                                <?php

                                $date = strtotime($obj->post_date);

                                $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);

                                echo $date; ?>

                            </div>

                            <div class="news_mini_title <?php if ($post->ID == $obj->ID) { echo 'red'; } ?>">

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

                <br/>

            </div>

            <div class="col-md-6">

                <div class="big_news_item" id="big_news_item">

                    <?php

                    global $table;

                    $table = 'interview';

                    require_once "include/search_input.php" ?>

                    <h3 class="red"><?php echo $post->post_title; ?></h3>

                    <?php

                    $img = get_field('big_picture', $post->ID);

                    if ($img) { ?>

                        <img src="<?php echo $img['url']; ?>" alt=""/>

                    <?php } ?>



                    <div class="big_news_item_date">

                        <?php

                        $date = strtotime($post->post_date);

                        $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);

                        echo $date; ?>

                    </div>

                    <?php echo get_field('content', $post->ID); ?>

                    <?php $user = get_user_by('id', $post->author); ?>

                    <div class="big_news_item_avtor">

                        <a href="#"><?php echo lng_text('Автор'); ?>: <?php echo $user->display_name; ?></a>

                    </div>

                </div>

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
            var theElement = document.getElementById("big_news_item");
            var selectedPosY = 0;
            while (theElement != null) {
                selectedPosY += theElement.offsetTop;
                theElement = theElement.offsetParent;
            }
            $.scrollTo( selectedPosY - 20, 500);
        });
    </script>
<?php } ?>

<?php get_footer(); ?>
