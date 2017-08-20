<?php get_header(); ?>





    <div id="news" class="section">


        <div class="container">


            <div class="row">


                <div class="col-md-9">


                    <h1>


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
                    $news_count = 0;
                    foreach ($news as $obj) {
                        if($obj->post_name == 'archive'){
                            continue;
                        }
                        if (($news_count++) < 2 ){ ?>
                        <a class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">
                            <div class="news_mini">
                                <div class="news_mini_date">
                                    <?php
                                    $date = strtotime($obj->post_date);
                                    $date = date("d ",$date) . get_r_month(date("n",$date)) . date(" Y H:i",$date);
                                    echo $date; ?>
                                </div>
                                <div class="news_mini_title">
                                    <?php if (LANG == 'RU')echo $obj->post_title; else echo get_field('title_en',$obj->ID); ?>
                                </div>
                                <div class="news_mini_info">
                                    <?php echo get_field_lng('description',$obj->ID); ?>
                                </div>


                            </div>


                        </a>


                        <?php
                        }
                        if (get_field('main', $obj->ID)) {
                            $big_post =  $obj;
                            $tags_post = $obj;
                        }
                    } ?>
                    <br/>
                    <h2 class="red"><?php echo lng_text('Интервью'); ?></h2>
                    <div class="h1_line red"></div>
                    <?php
                    $interview = get_posts(
                        array(
                            'numberposts' => 2,
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


                    foreach ($interview as $obj) { ?>


                        <a href="/interview/<?php echo $obj->post_name; ?>">
                            <div class="main_news_item">
                                <div class="main_news_bg red">
                                    <?php if (LANG == 'RU') echo $obj->post_title; else echo get_field('title_en',$obj->ID); ?>
                                    <div class="main_news_bg_text">
                                        <?php echo get_field_lng('description', $obj->ID); ?>
                                    </div>


                                </div>


                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>


                            </div>


                        </a>


                    <?php } ?>





                </div>


                <div class="col-md-6">


                    <?php


                    global $table;


                    $table = 'news';


                    require_once "include/search_input.php" ?>


                    <?php require_once "include/news_big.php"; ?>


                </div>


                <div class="col-md-3">


                    <?php


                    $banner_category = 1;


                    require_once "include/banners.php"; ?>


                </div>


            </div>


            <?php require_once "include/news_tags.php"; ?>





        </div>


    </div>





<?php get_footer(); ?>
