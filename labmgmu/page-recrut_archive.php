<?php

/*



Template Name: Recruit Archive Template



 */

get_header();

the_post();

?>



<div id="news" class="section">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <h1>

                    <?php echo get_field_lng('h1'); ?>

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

            <div class="col-md-9">

                <div style="padding-left: 0px">

                    <div class="row">

                        <div style="padding-right: 0px;margin-top: 10px;">

                            <?php require_once "include/search_input.php" ?>

                        </div>

                    </div>

                    <div class="row" style="padding-top: 20px;">

                        <div class="col-md-4" style="padding-left: 0">

                            <?php

                            $studies = get_posts(
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
                                    'post_type' => 'studies',
                                    'post_parent' => '',
                                   'post_status' => 'publish'
                                )
                            );
                            $index = 0;
                            foreach ($studies as $obj) {
                                if (!get_field('archive', $obj->ID)){
                                    continue;
                                }

                                $studies_en = get_field('description_en',$obj->ID);
                                $studies_ru = get_field('descriptin',$obj->ID);

                                if ((LANG == 'RU')&&($studies_ru != '')) {
                                ?>

                                <a onclick="get_study(<?php echo $obj->ID; ?>, 1); return false;" href="#">
                                    <div class="main_news_item">
                                        <div id="study_bg<?php echo $obj->ID; ?>" class="study_bg <?php
                                            if (!$index) {
                                                echo 'active';
                                                $study = $obj;
                                            } ?> archive">
                                            <span class="study_post_title"><?php echo $obj->post_title; ?></span>
                                        </div>
                                        <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>
                                    </div>
                                </a>
                            <?php $index++;
                          } elseif ((LANG == 'EN')&&($studies_en != '')) { ?>

                            <a onclick="get_study(<?php echo $obj->ID; ?>, 1); return false;" href="#">
                                <div class="main_news_item">
                                    <div id="study_bg<?php echo $obj->ID; ?>" class="study_bg <?php
                                        if (!$index) {
                                            echo 'active';
                                            $study = $obj;
                                        } ?> archive">
                                        <span class="study_post_title"><?php echo get_field('title_en',$obj->ID); ?></span>
                                    </div>
                                    <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>
                                </div>
                            </a>

                                <?php
                            $index++;
                            } else continue;
                        }; ?>

                        </div>

                        <div class="col-md-8" style="padding-right: 0">
                            <?php
                                if (isset($study)) { ?>
                                <div id="big_news_item" class="big_news_item">
                                    <h3 class="study_title study_title_archive"><?php if (LANG == 'RU') echo $study->post_title;
                                    else echo get_field('title_en', $study->ID); ?></h3>
                                    <?php
                                    $img = get_field('picture', $study->ID);
                                    if ($img) { ?>
                                        <img src="<?php echo $img['url']; ?>" alt=""/>
                                    <?php } ?>

                                    <div class="big_news_item_date" style="display: none">
                                        <span><?php echo lng_text('Опубликовано');?>:</span>
                                        <?php
                                        $date = strtotime($study->post_date);
                                        $date = date("d ",$date) . get_r_month(date("n",$date));
                                        echo $date; ?>
                                    </div>
                                    <div class="description_archive">
                                        <?php if (LANG == 'RU') echo wiki(get_field('descriptin', $study->ID));
                                         else echo wiki(get_field('description_en', $study->ID)); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <?php

                $banner_category = 2;

                require_once "include/banners.php"; ?>

            </div>

        </div>

    </div>

</div>



<?php get_footer(); ?>
