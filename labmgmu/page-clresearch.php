<?php

/*



Template Name: CLResearch Template



 */

get_header();

?>



<div id="clresearch" class="section">

    <div class="container">

        <h1>

            <?php echo get_field_lng('h1'); ?>

            <div class="h1_line"></div>

        </h1>

        <div class="row">

            <div class="col-md-12">

                <div class="text">

                    <?php echo get_field_lng('description'); ?>

                </div>

            </div>

        </div>

        <div class="row main_crsearch_place">

            <?php

            $clrs = get_posts(

                array(

                    'numberposts' => 5,

                    'offset' => 0,

                    'orderby'     => 'date',

                    'order'       => 'DESC',

                    'category' => '',

                    'include' => '',

                    'exclude' => '',

                    'meta_key' => '',

                    'meta_value' => '',

                    'post_type' => 'clrs',

                    'post_parent' => '',

                    'post_status' => 'publish'

                )

            );

            foreach ($clrs as $index => $obj) {

                $clrs[$index]->sort = get_field('sort', $obj->ID);

            }

            usort($clrs, 'cmp_sort');

            foreach ($clrs as $index => $obj) { ?>

                <div class="main_crsearch">

                    <div class="main_research">

                        <a href="/clrs/<?php echo $obj->post_name; ?>">

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

        <?php   if (LANG == 'RU') { ?>

        <h1>

            <?php echo lng_text('Регламент'); ?>

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

                            'post_type' => 'clrs_order',

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

                        <a href="/clrs_order/<?php echo $obj->post_name; ?>">

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

      <?php } ?>

        <h1>

            <?php echo lng_text('Клинические исследования: видео'); ?>

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

                        'post_type' => 'clrs_video',

                        'post_parent' => '',

                        'post_status' => 'publish'

                    )

                );

                foreach ($prrs_video as $obj) {

                  $label_en = get_field('description_en',$obj->ID);
                  $label_ru = get_field('description',$obj->ID);

                  if ((LANG == 'RU')&&($label_ru != '')) {
                  ?>

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

                        <a onclick="get_video('clrs_video',<?php echo $obj->ID; ?>); return false;" href="#">

                            <div class="col-md-6 research_video">

                                <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                            </div>

                        </a>

                    </div>

                    <?php } elseif ((LANG == 'EN')&&($label_en != '')) { ?>

                      <div class="row">

                          <div class="col-md-6">

                              <div class="news_mini">

                                  <div class="news_mini_title">

                                      <?php echo get_field('title_en', $obj->ID); ?>

                                  </div>

                                  <div class="news_mini_info">

                                      <?php echo get_field('short_en', $obj->ID); ?>

                                  </div>

                              </div>

                          </div>

                          <a onclick="get_video('clrs_video',<?php echo $obj->ID; ?>); return false;" href="#">

                              <div class="col-md-6 research_video">

                                  <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>

                              </div>

                          </a>

                      </div>

                <?php
                  } else continue;
              } ?>

            </div>

            <div class="col-md-6">

                <?php require_once "include/search_input.php";

                $label_f = true;
                $video_i = 0;

                while ($video_i <= 30) {  //Делаем выборку по последним 30 новостям
                  if(($prrs_video[$video_i]) && ($label_f)) {

                    $vbig_post = $prrs_video[$video_i];
                    $label_en = get_field('description_en', $vbig_post->ID);
                    $label_ru = get_field('description', $vbig_post->ID);

                    if ((LANG == 'RU')&&($label_ru != '')) {

                  ?>

                  <div class="video_block" id="video_block">

                      <iframe width="100%" src="//www.youtube.com/embed/<?php
                       echo get_field('video', $vbig_post->ID); ?>"
                       frameborder="0" allowfullscreen></iframe>

                  </div>

                  <div class="research_big_text_place">

                      <div class="research_big_text">

                        <?php echo htmlspecialchars_decode (
                          get_field('description', $vbig_post->ID));
                        ?>

                      </div>

                  </div>

                  <?php

                  $label_f = false;

                };
                if ((LANG == 'EN')&&($label_en != '')) { ?>

                  <div class="video_block" id="video_block">

                      <iframe width="100%" src="//www.youtube.com/embed/<?php
                       echo get_field('video_en', $vbig_post->ID); ?>"
                       frameborder="0" allowfullscreen></iframe>

                  </div>

                    <div class="research_big_text_place">

                        <div class="research_big_text">

                          <?php echo htmlspecialchars_decode(
                            get_field('description_en', $vbig_post->ID));?>

                        </div>

                    </div>

                    <?php

                    $label_f = false;

                    };

                  };
                  $video_i++;
                }
               ?>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
