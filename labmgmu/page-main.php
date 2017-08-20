<?php

/*



Template Name: Main Template



 */

get_header();

?>



<div id="home" class="section">

    <div class="container">

        <h1>

            <?php echo get_field_lng('h1'); ?>

            <div class="h1_line"></div>

        </h1>

        <div class="row">

            <div class="col-md-12">

                <div class="title">

                    <?php echo get_field_lng('link'); ?>

                    <a href="<?php echo get_field('link_url'); ?>"><span class="more_btn"><?php echo lng_text('ПОДРОБНО'); ?> <i class="fa fa-play" aria-hidden="true"></i></span></a>

                </div>

                <div class="text">

                    <?php echo get_field_lng('description'); ?>

                </div>

            </div>

        </div>

        <div class="row">

            <?php
            $services = get_posts(
                array(
                    'numberposts' => 3,
                    'offset' => 0,
                    'category' => '',
                    'include' => '',
                    'exclude' => '',
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'our_services',
                    'post_parent' => '',
                    'post_status' => 'publish'
                )
            );
            foreach ($services as $index => $obj) {
                $services[$index]->sort = get_field('sort', $obj->ID);
            }
            usort($services, 'cmp_sort');
            foreach ($services as $obj) { ?>

                <div class="col-md-4">

                    <div class="main_research">

                        <div class="main_research_title">

                            <?php echo get_field_lng('title', $obj->ID); ?>

                        </div>

                        <a href="<?php echo get_field('link', $obj->ID); ?>">

                            <div class="main_research_inner">

                                <div class="main_research_inner_bg"></div>

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt="" />



                                <div class="main_research_inner_text">

                                    <?php echo get_field_lng('description', $obj->ID); ?>

                                </div>

                            </div>

                            <div class="main_research_out"></div>

                        </a>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</div>



<?php require_once "lastnews.php"; ?>



<?php get_footer(); ?>
