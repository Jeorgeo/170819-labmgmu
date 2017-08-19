<div id="news" class="section">


    <div class="container">


        <div class="row">


            <div class="col-md-6">


                <h2><?php echo lng_text('Последние новости'); ?></h2>


                <div class="h1_line"></div>


            </div>
            <div class="col-md-6">
                <h2 class="red"><?php echo lng_text('Интервью'); ?></h2>
                <div class="h1_line red"></div>
            </div>
        </div>
        <div class="row">
            <div class="main_news_place">

                <?php

                $news = get_posts(

                    array(

                        'numberposts' => 30,
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


                $index = 0;

                foreach ($news as $obj) {

                    if ($obj->post_name == 'archive'){

                        continue;

                    }

                    if ($index > 1){

                        break;

                    }

                    $new_en = get_field('description_en',$obj->ID);
                    $new_ru = get_field('description',$obj->ID);

                    if ((LANG == 'RU')&&($new_ru != '')) {

                      ?>

                      <div class="col-md-3">

                        <a href="/news/<?php echo $obj->post_name; ?>">

                            <div class="main_news_item">

                                <div class="main_news_bg">

                                    <?php echo $obj->post_title; ?>

                                    <div class="main_news_bg_text">

                                        <?php echo get_field_lng('description', $obj->ID); ?>

                                    </div>

                                </div>

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>

                    </div>

                      <?php

                      $index++;
                    } elseif ((LANG == 'EN')&&($new_en != '')) {

                      ?>

                      <div class="col-md-3">

                        <a href="/news/<?php echo $obj->post_name; ?>">

                            <div class="main_news_item">

                                <div class="main_news_bg">

                                    <?php echo get_field('title_en',$obj->ID); ?>

                                    <div class="main_news_bg_text">

                                        <?php echo get_field('description_en', $obj->ID); ?>

                                    </div>

                                </div>

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>

                    </div>

                      <?php

                      $index++;
                     } else continue;

                 };

                $interviews = get_posts(

                    array(

                        'numberposts' => 9,
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

                $index = 0;

                foreach ($interviews as $obj) {

                    if ($obj->post_name == 'archive'){

                        continue;

                    }

                    if ($index > 1){

                        break;

                    }

                    $interview_en = get_field('description_en',$obj->ID);
                    $interview_ru = get_field('description',$obj->ID);

                    if ((LANG == 'RU')&&($interview_ru != '')) {

                      ?>

                      <div class="col-md-3">

                        <a href="/interview/<?php echo $obj->post_name; ?>">

                            <div class="main_news_item">

                                <div class="main_news_bg red">

                                    <?php echo $obj->post_title; ?>

                                    <div class="main_news_bg_text">

                                        <?php echo get_field('description', $obj->ID); ?>

                                    </div>

                                </div>

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>

                    </div>

                      <?php

                      $index++;
                    } elseif ((LANG == 'EN')&&($interview_en != '')) {

                      ?>

                      <div class="col-md-3">

                        <a href="/interview/<?php echo $obj->post_name; ?>">

                            <div class="main_news_item">

                                <div class="main_news_bg red">

                                    <?php echo get_field('title_en',$obj->ID); ?>

                                    <div class="main_news_bg_text">

                                        <?php echo get_field('description_en', $obj->ID); ?>

                                    </div>

                                </div>

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>

                    </div>

                      <?php

                      $index++;
                     } else continue;

                 };
                 ?>


            </div>


        </div>


    </div>


</div>
