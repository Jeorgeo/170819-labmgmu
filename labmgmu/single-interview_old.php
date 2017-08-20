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

                $news = get_posts(

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

                        'post_type' => 'interview',

                        'post_parent' => '',

                        'post_status' => 'publish'

                    )

                );

                $news_count = 0;

                foreach ($news as $index=>$obj) {

                    if($obj->post_name == 'archive'){

                        continue;

                    } ?>

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

                                <?php echo get_field_lng('description',$obj->ID); ?>

                            </div>

                        </div>

                    </a>

                <?php } ?>

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

        $tags = get_the_terms($post->ID, 'interview_tags');

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

                'post_type' => 'interview',

                'post_parent' => '',

                'post_status' => 'publish'

            )

        );

        foreach ($list as $obj){

            $terms = get_the_terms($obj->ID, 'interview_tags');

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

                        <?php echo lng_text('Интервью похожие по теме'); ?>

                        <div class="h1_line"></div>

                    </h1>

                </div>

                <div class="col-md-3"></div>

            </div>

            <div class="row">

                <?php foreach ($news as $obj) { ?>

                    <div class="col-md-3">

                        <a class="news_mini_a" href="/interview/<?php echo $obj->post_name; ?>">

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

                                    <?php echo get_field_lng('description',$obj->ID); ?>

                                </div>

                            </div>

                        </a>

                    </div>

                <?php } ?>

            </div>

        <?php } ?>



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
