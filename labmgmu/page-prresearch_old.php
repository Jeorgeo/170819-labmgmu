<?php
/*

Template Name: PRResearch Template

 */

get_header();
?>

<div id="prresearch" class="section">

    <div class="container">

        <h1>

            <?php if (LANG == 'RU') echo get_field_lng('h1'); else echo get_field('h1_en'); ?>

            <div class="h1_line"></div>

        </h1>

        <div class="row">

            <div class="col-md-12">

                <div class="text">

                    <?php if (LANG == 'RU') echo get_field_lng('description'); else echo get_field('description_en');?>

                </div>

            </div>

        </div>

        <div class="row">

            <?php

            $prrs = get_posts(

                array(

                    'numberposts' => 4,

                    'offset' => 0,

                    'orderby'     => 'date',

                    'order'       => 'DESC',

                    'category' => '',

                    'include' => '',

                    'exclude' => '',

                    'meta_key' => '',

                    'meta_value' => '',

                    'post_type' => 'prrs',

                    'post_parent' => '',

                    'post_status' => 'publish'

                )

            );

            foreach ($prrs as $index => $obj) {

                $prrs[$index]->sort = get_field('sort', $obj->ID);

            }

            usort($prrs, 'cmp_sort');

            foreach ($prrs as $index => $obj) { ?>

                <div class="col-md-3">

                    <div class="main_research">

                        <a href="/prrs/<?php echo $obj->post_name; ?>">

                            <div class="main_research_inner">

                                <div class="main_research_inner_bg"></div>

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>



                        <div class="main_research_title">

                            <?php echo get_field_lng('title', $obj->ID); ?>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>



        <h1>

            <?php if (LANG == 'RU') echo lng_text('Регламент'); else echo lng_text('Regulations');?>

            <div class="h1_line"></div>

        </h1>

        <div class="row">

            <div class="col-md-3">

                <div class="reg_links">

                    <?php

                    $list = get_posts(
                        array(
                            'numberposts' => -1,
                            'offset' => 0,
                            'orderby'     => 'menu_order',
                            'order'       => 'ASC',
                            'category' => '',
                            'include' => '',
                            'exclude' => '',
                            'meta_key' => '',
                            'meta_value' => '',
                            'post_type' => 'prrs_order',
                            'post_parent' => '',
                            'post_status' => 'publish'
                        )
                    );

                    $prrs_order = array();
                    foreach ($list as $obj){
                        if (!$obj->post_parent) {
                            $prrs_order[] = $obj;
                        }
                    }

                    foreach ($prrs_order as $index=>$obj) { ?>

                        <a href="/prrs_order/<?php echo $obj->post_name; ?>">

                            <div class="reg_link <?php

                                if (!$index) {

                                    echo 'active';

                                } ?>">

                                <?php echo $obj->post_title; ?>

                            </div>

                        </a>

                    <?php } ?>

                </div>

            </div>

            <div class="col-md-9">

                <div class="text">

                    <?php echo get_field_lng('description', $prrs_order[ 0]->ID); ?>

                </div>

            </div>

            <span id="video"></span>

        </div>



        <h1>

            <?php echo lng_text('Видео доклинические исследования'); ?>

            <div class="h1_line"></div>

        </h1>

        <div class="row pr_research">

            <div class="col-md-6">

                <?php

                $prrs_video = get_posts(

                    array(

                        'numberposts' => 10,

                        'offset' => 0,

                        'orderby'     => 'date',

                        'order'       => 'DESC',

                        'category' => '',

                        'include' => '',

                        'exclude' => '',

                        'meta_key' => '',

                        'meta_value' => '',

                        'post_type' => 'prrs_video',

                        'post_parent' => '',

                        'post_status' => 'publish'

                    )

                );

                foreach ($prrs_video as $obj) { ?>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="news_mini">

                                <div class="news_mini_title">

                                    <?php echo $obj->post_title; ?>

                                </div>

                                <div class="news_mini_info">

                                    <?php echo get_field('short', $obj->ID); ?>

                                </div>

                            </div>

                        </div>

                        <a onclick="get_video('prrs_video',<?php echo $obj->ID; ?>); return false;" href="#">

                            <div class="col-md-6 research_video">

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>

                    </div>

                <?php } ?>



            </div>



            <div class="col-md-6">

                <?php

                global $table;

                $table = 'news';

                require_once "include/search_input.php" ?>

                <div class="video_block" id="video_block">

                    <iframe width="100%" src="//www.youtube.com/embed/<?php echo get_field('video', $prrs_video[ 0]->ID); ?>" frameborder="0" allowfullscreen></iframe>

                </div>



                <div class="research_big_text_place">

                    <div class="research_big_text">

                        <?php echo htmlspecialchars_decode( get_field_lng('description', $prrs_video[ 0]->ID)); ?>

                    </div>

                </div>

            </div>

        </div>



    </div>

</div>



<?php get_footer(); ?>
