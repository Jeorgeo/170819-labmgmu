<?php


/*





Template Name: Contacts Template





 */


get_header();


?>





    <div id="contacts" class="section">


        <div class="container">


            <div class="row">


                <div class="col-md-9">


                    <h1>


                        <?php echo lng_text('Контакты'); ?>


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


                    <div class="about_body">


                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=<?php echo get_field('map',$post->ID); ?>&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>


                    </div>


                    <div class="contacts_place">


                        <?php echo get_field_lng('org',$post->ID); ?><br />


                        <br />


                        <span><?php if (LANG == 'RU') echo lng_text('ИНН/ОГРН'); else echo lng_text('INN/OGRN'); ?>:</span> <?php if (LANG == 'RU') echo get_field_lng('inn',$post->ID); else echo get_field('inn_en',$post->ID); ?><br />


                        <br />


                        <span><?php echo lng_text('Адрес'); ?>:</span> <?php if (LANG == 'RU') echo get_option('gl_address'); else echo get_option('gl_address_en');?><br />


                        <br />


                        <span><?php echo lng_text('Время работы'); ?>:</span> <?php if (LANG == 'RU') echo get_field('time',$post->ID); else echo get_field('time_en',$post->ID);?><br />


                        <br />


                        <span><?php echo lng_text('Телефон'); ?>:</span> <?php echo get_option('gl_phone'); ?><br />


                        <br />


                        <span>E-Mail:</span> <?php echo get_option('gl_email'); ?>


                    </div>


                </div>





                <div class="col-md-3">


                    <?php


                    $banner_category = 3;


                    require_once "include/banners.php"; ?>


                </div>





            </div>


        </div>


    </div>





<?php get_footer(); ?>
