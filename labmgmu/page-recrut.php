<?php

/*



Template Name: Recruit Template



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

            <div class="col-md-9" style="padding: 0">

                <div class="text">

                    <?php
                    if(LANG == 'RU') {
                        echo get_the_content();
                    } else {
                        echo get_field('content_en');
                    }?>

                </div>



                <div class="row">

                    <div class="col-md-6">

                        <a href="<?php echo get_field('link1'); ?>" style="text-decoration: none !important;">

                            <div class="recrut_select">

                                <img src="<?php $img = get_field('picture1'); echo $img['url']; ?>" alt="" />

                                <div class="text">

                                    <?php echo lng_text('Подробная информация<br />для добровольцев'); ?>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-md-6">

                        <a href="<?php echo get_field('link2'); ?>" style="text-decoration: none !important;">

                            <div class="recrut_select">

                                <img src="<?php $img = get_field('picture2'); echo $img['url']; ?>" alt="" />

                                <div class="text">

                                    <?php echo lng_text('Информация для исследователей'); ?>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>



                <div style="padding-left: 15px">

                    <h2>

                        <?php echo lng_text('Стать добровольцем'); ?>

                        <div class="h1_line"></div>

                    </h2>

                </div>



                <div class="row">

                    <div class="col-md-4" style="padding-left: 0">

                        <div class="text">

                            <?php echo get_field_lng('description'); ?>

                        </div>

                    </div>

                    <div class="col-md-8">

                        <div class="form_input_message">
                            <?php echo lng_text('Ваша заявка принята!'); ?>
                        </div>

                        <?php if (LANG == 'RU') { ?>

                        <div class="form_input_confirmation" style="display:none; padding: 10px 0;">
                            Нажимая "Отправить заявку", я выражаю согласие и разрешаю ООО «ЛАБМГМУ» обрабатывать свои персональные данные, которые я внес в данную форму, включая сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, распространение (в том числе передачу на территории Российской Федерации), обезличивание, блокирование, уничтожение персональных данных, в целях внесения данной информации в банк добровольцев.
                            <div class="compliance">
                                <div onclick="compliance_check2();" id="compliance_check2" class="compliance_check"></div>
                                <a target="_blank" href="/soglasie-na-obrabotku-personal-ny-h-danny-h/">
                                    Согласие на обработку персональных данных
                                </a>
                            </div>
                            <div onclick="recrut_back()" class="form_input_btn">Назад</div>
                            <div id="form1_btn" onclick="recrut_send()" class="form_input_btn">Отправить заявку</div>
                        </div>

                      <?php } else { ?>

                        <div class="form_input_confirmation" style="display:none; padding: 10px 0;">
                            By clicking on "Send an application", I agree and permit OOO LABMGMU to process my personal data, which I entered into this form, including collection, systematization, accumulation, storage, clarification (updating, modification), use, distribution (including Transfer in the territory of the Russian Federation), depersonalization, blocking, destruction of personal data, in order to make this information available to the volunteer bank.
                            <div class="compliance">
                                <div onclick="compliance_check2();" id="compliance_check2" class="compliance_check"></div>
                                <a target="_blank" href="/soglasie-na-obrabotku-personal-ny-h-danny-h/">
                                    Consent to the processing of personal data
                                </a>
                            </div>
                            <div onclick="recrut_back()" class="form_input_btn">back</div>
                            <div id="form1_btn" onclick="recrut_send()" class="form_input_btn">Send an application</div>
                        </div>

                      <?php }; ?>

                        <script>
                            compliancecheck2 = false;
                            function compliance_check2() {
                                obj = document.getElementById('compliance_check2');
                                if(obj.classList.contains('selected')) {
                                    $('#compliance_check2').removeClass('selected');
                                    $('#form1_btn').css('background', "#cccccc");
                                    $('#form1_btn').css('cursor', "auto");
                                    compliancecheck2 = false;
                                } else {
                                    $('#compliance_check2').addClass('selected');
                                    $('#form1_btn').css('background', "#333333");
                                    $('#form1_btn').css('cursor', "pointer");
                                    compliancecheck2 = true;
                                }
                            }
                        </script>

                        <?php if (LANG == 'RU') { ?>

                        <form class="form_input_place">

                            <div class="form_input">
                                <input type="text" name="fio" id="fio" placeholder="Фамилия Имя Отчество*"/>
                            </div>

                            <div class="form_input">
                                <input type="text" name="birth" id="birth" placeholder="Дата рождения*"/>
                            </div>

                            <div class="form_input form_input_select_place" style="position: relative">

                                <div class="form_fa">
                                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                </div>
                                <div class="form_input_select">

                                    <div onclick="$('.form_input_select').hide();$('.form_input_select_value').html('Мужской');" class="form_input_select_m">Мужской</div>
                                    <div onclick="$('.form_input_select').hide();$('.form_input_select_value').html('Женский');" class="form_input_select_w">Женский</div>

                                </div>

                                <div onclick="$('.form_input_select').show();" class="form_input_select_value">Мужской</div>

                            </div>

                            <div class="form_input">
                                <input type="text" name="town" id="town" placeholder="Город проживания*"/>
                            </div>

                            <div class="form_input">
                                <input type="text" name="phone" id="phone" placeholder="Телефон*"/>
                            </div>

                            <div class="form_input">
                                <input type="text" name="email" id="email" placeholder="E-mail"/>
                            </div>

                            <div class="form_input form_input_select_place_study" style="position: relative">

                                <div class="form_fa">
                                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                </div>
                                <div class="form_input_select_study">

                                    <?php
                                    $study_first = 'Выберете исследования*';
                                    $studies_list = get_posts(
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
                                    $studies = array();
                                    foreach ($studies_list as $obj) {
                                        $studies[] = $obj;
                                        /*
                                        if (!get_field('archive', $obj->ID)) {
                                            $studies[] = $obj;
                                        }
                                        */
                                    }
                                    foreach ($studies as $index=>$study) {
                                        $style = "";
                                        if (!$index) {
                                            $study_first = mb_substr($study->post_title, 0, 60) . '...';
                                            $style = "border-bottom: none;";
                                        }
                                        ?>
                                        <div style="<?php echo $style; ?>" onclick="$('.form_input_select_study').hide();$('.form_input_select_value_study').html('<?php echo mb_substr($study->post_title, 0, 60) . '...'; ?>');$('.form_input_select_value_study_hidden').html('<?php echo $study->post_title; ?>');" class="form_input_select_study_item"><?php echo mb_substr($study->post_title, 0, 60) . '...'; ?></div>
                                    <?php } ?>

                                </div>

                                <div onclick="$('.form_input_select_study').show();" class="form_input_select_value_study"><?php echo $study_first;?></div>
                                <div class="form_input_select_value_study_hidden"><?php echo $study->post_title; ?></div>
                            </div>

                            <div class="form_input" style="position: relative;">
                                <div class="form_input_rec">*Обязательное поле</div>
                                <div onclick="validate_form()" class="form_input_btn">продолжить</div>

                            </div>

                        </form>

                        <?php } else { ?>

                          <form class="form_input_place">

                              <div class="form_input">
                                  <input type="text" name="fio" id="fio" placeholder="Full Name*"/>
                              </div>

                              <div class="form_input">
                                  <input type="text" name="birth" id="birth" placeholder="Date of Birth*"/>
                              </div>

                              <div class="form_input form_input_select_place" style="position: relative">

                                  <div class="form_fa">
                                      <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                  </div>
                                  <div class="form_input_select">

                                      <div onclick="$('.form_input_select').hide();$('.form_input_select_value').html('Male');" class="form_input_select_m">Male</div>
                                      <div onclick="$('.form_input_select').hide();$('.form_input_select_value').html('Female');" class="form_input_select_w">Female</div>

                                  </div>

                                  <div onclick="$('.form_input_select').show();" class="form_input_select_value">Male</div>

                              </div>

                              <div class="form_input">
                                  <input type="text" name="town" id="town" placeholder="City*"/>
                              </div>

                              <div class="form_input">
                                  <input type="text" name="phone" id="phone" placeholder="phone*"/>
                              </div>

                              <div class="form_input">
                                  <input type="text" name="email" id="email" placeholder="E-mail"/>
                              </div>

                              <div class="form_input form_input_select_place_study" style="position: relative">

                                  <div class="form_fa">
                                      <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                  </div>
                                  <div class="form_input_select_study">

                                      <?php
                                      $study_first = 'Choose research*';
                                      $studies_list = get_posts(
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
                                      $studies = array();
                                      foreach ($studies_list as $obj) {
                                          $studies[] = $obj;
                                          /*
                                          if (!get_field('archive', $obj->ID)) {
                                              $studies[] = $obj;
                                          }
                                          */
                                      }
                                      foreach ($studies as $index=>$study) {
                                          $style = "";
                                          if (!$index) {
                                              $study_first = mb_substr($study->post_title, 0, 60) . '...';
                                              $style = "border-bottom: none;";
                                          }
                                          ?>
                                          <div style="<?php echo $style; ?>" onclick="$('.form_input_select_study').hide();$('.form_input_select_value_study').html('<?php echo mb_substr($study->post_title, 0, 60) . '...'; ?>');$('.form_input_select_value_study_hidden').html('<?php echo $study->post_title; ?>');" class="form_input_select_study_item"><?php echo mb_substr($study->post_title, 0, 60) . '...'; ?></div>
                                      <?php } ?>

                                  </div>

                                  <div onclick="$('.form_input_select_study').show();" class="form_input_select_value_study"><?php echo $study_first;?></div>
                                  <div class="form_input_select_value_study_hidden"><?php echo $study->post_title; ?></div>
                              </div>

                              <div class="form_input" style="position: relative;">
                                  <div class="form_input_rec">*Obligatory field</div>
                                  <div onclick="validate_form()" class="form_input_btn">continue</div>

                              </div>

                          </form>

                        <?php }; ?>

                    </div>

                </div>



                <div style="padding-left: 15px">

                    <h2>

                        <?php echo lng_text('Планируемые исследование биоэквивалентности'); ?>

                        <div class="h1_line"></div>

                    </h2>

                    <div class="row">

                        <div style="padding-right: 15px;margin-top: 10px;">

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
				$study = false;
                            foreach ($studies as $obj) {
                                if (get_field('archive', $obj->ID)){
                                    continue;
                                }
                                ?>

                                <a onclick="get_study(<?php echo $obj->ID; ?>, 0); return false;" href="#">
                                    <div class="main_news_item">
                                        <div id="study_bg<?php echo $obj->ID; ?>" class="study_bg <?php
                                            if (!$index) {
                                                echo 'active';
                                                $study = $obj;
                                            } ?>">
                                            <span class="study_post_title"><?php echo $obj->post_title; ?></span>
                                        </div>
                                        <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>
                                    </div>
                                </a>
                            <?php $index++; } ?>

                            <a href="/recruit/archive/">
                                <div class="study_arc_btn">
                                    <?php echo lng_text('Архив исследований'); ?>
                                </div>
                            </a>

                        </div>

                        <div class="col-md-8">
                            <?php
                                if (isset($study) && $study != false) { ?>
                                <div id="big_news_item" class="big_news_item">
                                    <h3 class="study_title"><?php echo $study->post_title; ?></h3>
                                    <?php
                                    $img = get_field('picture', $study->ID);
                                    if ($img) { ?>
                                        <img src="<?php echo $img['url']; ?>" alt=""/>
                                    <?php } ?>

                                    <div class="big_news_item_date" style="display: none">
                                        <span><?php echo lng_text('Опубликовано'); ?>:</span>
                                        <?php
                                        $date = strtotime($study->post_date);
                                        $date = date("d ",$date) . get_r_month(date("n",$date));
                                        echo $date; ?>
                                    </div>
                                    <?php echo wiki(get_field_lng('descriptin', $study->ID)); ?>
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
