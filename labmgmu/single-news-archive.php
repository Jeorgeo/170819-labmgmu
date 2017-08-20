<?php get_header(); ?>



    <div id="news_archive" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1>

                        <a href="/news">

                            <div class="back_btn">« <?php echo lng_text('назад в раздел'); ?></div>

                        </a>

                        <?php echo lng_text('Архив новостей'); ?>

                        <span class="archive_month"><?php echo get_month_name(date("n")); ?></span>

                        <div class="h1_line"></div>

                    </h1>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6" id="list_place">

                    <?php

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

                    $news = array();

                    $post_month = date("n");

                    $post_year = date("Y");

                    $current_month = date("n");

                    $current_year = date("Y");

                    foreach ($list as $obj) {

                        $post_date = strtotime($obj->post_date);

                        $post_month = date("n",$post_date);

                        $post_year = date("Y",$post_date);

                        if ($post_year == $current_year && $post_month == $current_month){

                            if($obj->post_name != 'archive'){

                                $news[] = $obj;

                            }

                        }

                    }

                    foreach ($news as $index=>$obj) {

                      $label_en = get_field('description_en',$obj->ID);
                      $label_ru = get_field('description',$obj->ID);

                      if ((LANG == 'RU')&&($label_ru != '')) {

                        ?>

                        <div class="col-md-6" <?php

                            if (!($index % 2)) {

                                echo 'style="clear: both;"';

                            }

                            ?>>

                            <a onclick="get_news(<?php echo $obj->ID; ?>); return false;" class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">

                                <div id="news_item<?php echo $obj->ID; ?>" class="news_mini news_mini_single <?php

                                    if (!$index) {

                                        echo 'active';

                                    }

                                    ?>">

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

                                        <?php echo get_field_lng('description',$obj->ID); ?>

                                    </div>

                                </div>

                            </a>

                        </div>


                        <?php

                      } elseif ((LANG == 'EN')&&($label_en != '')) {

                        ?>

                        <div class="col-md-6" <?php

                            if (!($index % 2)) {

                                echo 'style="clear: both;"';

                            }

                            ?>>

                            <a onclick="get_news(<?php echo $obj->ID; ?>); return false;" class="news_mini_a" href="/news/<?php echo $obj->post_name; ?>">

                                <div id="news_item<?php echo $obj->ID; ?>" class="news_mini news_mini_single <?php

                                    if (!$index) {

                                        echo 'active';

                                    }

                                    ?>">

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

              }; ?>


                </div>


                <div class="col-md-6">

                    <div class="col-md-12">

                        <?php

                        global $table;

                        $table = 'news';

                        require_once "include/search_input.php" ?>

                        <div id="news_big"></div>

                        <span id="news_place">

                        <?php

                        if (count($news[0])) {

                            $big_post =  $news[0];

                            require_once "include/news_big.php";

                        }

                        ?></span>

                    </div>

                </div>

            </div>

            <div class="row" style="padding-left: 15px;">

                <div class="col-md-12">

                    <h2>

                        <?php echo lng_text('Поиск новостей по месяцам'); ?>

                        <div class="h1_line"></div>

                    </h2>

                    <div class="month_list">

                        <?php

                        if (LANG == 'RU') {
                            $month = array(
                                'январь',
                                'февраль',
                                'март',
                                'апрель',
                                'май',
                                'июнь',
                                'июль',
                                'август',
                                'сентябрь',
                                'октябрь',
                                'ноябрь',
                                'декабрь'
                            );
                        } else {
                            $month = array(
                                'january',
                                'february',
                                'march',
                                'april',
                                'may',
                                'june',
                                'july',
                                'august',
                                'september',
                                'october',
                                'november',
                                'december'
                            );
                        }

                        for ($i = $current_year; $i >= $post_year; $i--) { ?>

                            <?php echo $i; ?>:&nbsp;&nbsp;

                            <?php

                            foreach ($month as $index=>$m) {

                                if ($i == $post_year && $index < $post_month-1 ) {

                                    continue;

                                }

                                if ($i == $current_year && $index >= $current_month) {

                                    continue;

                                }

                                ?>

                                <span class="month_a <?php

                                    if ($m == get_month_name(date("n")) && $i == $current_year) {

                                        echo 'active';

                                    }

                                ?>" year="<?php echo $i; ?>" month="<?php echo $index+1; ?>" id="year<?php echo $i; ?>month<?php echo $index+1; ?>"><?php echo $m; ?></span>

                            <?php } ?>

                            <br /><br />

                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <script>

        $( document ).ready( function() {

            $('.month_a').click( function( e ) {

                var month = $('#'+this.id).attr('month');

                var year = $('#'+this.id).attr('year');

                $('.month_a').removeClass('active');

                $('#year' + year + 'month' + month).addClass('active');

                $.post('<?php echo get_stylesheet_directory_uri(); ?>/ajax/get_archive.php',{

                        month: month,

                        year: year

                    },

                    function( response ){

                        window.scrollTo( 200, 0);

                        response = JSON.parse( response );

                        $('#list_place').html(response.list_place);

                        $('#news_place').html(response.news_place);

                        $('.archive_month').html(response.archive_month);

                    });

            } );



        } );

    </script>

<?php get_footer(); ?>
