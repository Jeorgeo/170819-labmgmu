<?php

/**

 * The template for displaying the header

 *

 * Displays all of the head element and everything up until the "site-content" div.

 *

 * @package WordPress

 * @subpackage Twenty_Fifteen

 * @since Twenty Fifteen 1.0

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/png">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PMZKRHQ');</script>
    <!-- End Google Tag Manager -->

    <!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

    <script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/30575dff7c7bf0af784d516c37863556_1.js" async></script>

    <?php if ($_SERVER['REQUEST_URI'] == '/') { ?>
        <meta name="yandex-verification" content="3e134f0fdd945dc8" />
        <meta name="google-site-verification" content="w4xxsC1rYOPUExvNpJs66zfXD0O4GbfywRc4778tl48" />
    <?php } ?>
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMZKRHQ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header id="header">

    <div class="container">

        <div class="header_mobile in-mobile">

            <div class="navicon"><i class="fa fa-bars" aria-hidden="true"></i></div>

            <div class="mobile_logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Labmgmu"/></a></div>

            <div class="mobile_contacts">

                <a href="tel:+74993401014"><i class="fa fa-phone" aria-hidden="true"></i></a>
								<?php dynamic_sidebar( 'phone-2' ); ?>

            </div>

            <div class="mobile_lang_switch">
                <?php
                if (LANG == 'RU') { ?>
                    <div onclick="set_lang('EN');" class="mobile_lang mobile_lang_en"></div>
                <?php } else { ?>
                    <div onclick="set_lang('RU');" class="mobile_lang"></div>
                <?php } ?>
            </div>



        </div>

        <div class="col-md-2 no-mobile">

            <div class="logo">

                <?php

                $header_image = get_template_directory_uri() . '/img/logo.png';

                if ( get_header_image() ) {

                    $header_image = header_image();

                } ?>

                <a href="/"><img src="<?php echo $header_image; ?>" alt="Labmgmu"/></a>

            </div>

        </div>

        <div class="col-md-7 no-mobile">

            <div class="top_menu">

                <div class="item">

                    <?php

                    $active = '';

                    if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/about/') {

                        $active = 'active';

                    } ?>

                    <div class="inner <?php echo $active; ?>">

                        <div class="sub_menu" style="margin-left: -15px;">

                            <a href="/">

                                <div class="sub_menu inner">

                                    <?php echo lng_text('Наши<br/>услуги'); ?>

                                </div>

                            </a>

                            <a href="/about/kontraktno-issledovatel-skaya-organizatsiya-labmgmu/">

                                <div class="sub_menu inner">

                                <?php echo lng_text('О нас'); ?>

                                </div>

                            </a>

                        </div>

                        <span><?php echo lng_text('Наши<br/>услуги'); ?></span>

                    </div>

                </div>

                <div class="item">

                    <div class="inner <?php echo get_menu_active(array('prresearch', 'prrs_order')); ?>">

                        <div class="sub_menu">

                            <a href="/prresearch">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Доклинические<br/>исследования'); ?>
                                </div>
                            </a>

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
                            ?>

                            <a href="/prrs_order/<?php echo $prrs_order[ 0]->post_name; ?>">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Регламент'); ?>
                                </div>
                            </a>

                            <a href="/prresearch#video">
                                <div class="sub_menu inner">
                                <?php echo lng_text('Видео'); ?><br/>
                                    <?php echo lng_text('доклинические<br/>исследования'); ?>
                                </div>

                            </a>

                        </div>

                        <span><?php echo lng_text('Доклинические<br/>исследования'); ?></span>

                    </div>

                </div>

                <div class="item">

                    <div class="inner <?php echo get_menu_active(array('clresearch', 'clrs_order')); ?>">

                        <div class="sub_menu">

                            <a href="/clresearch">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Клинические<br/>исследования'); ?>
                                </div>
                            </a>

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
                            ?>

                            <a href="/clrs_order/<?php echo $prrs_order[ 0]->post_name; ?>">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Регламент'); ?>
                                </div>
                            </a>

                            <a href="/clresearch#video">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Клинические<br/>исследования'); ?>
                                    <br/>
                                    <?php echo lng_text('видео'); ?>
                                </div>
                            </a>

                        </div>
                        <span><?php echo lng_text('Клинические<br/>исследования'); ?></span>
                    </div>

                </div>

                <div class="item">

                    <a href="/recruit">

                        <div class="inner <?php echo get_menu_active(array('recruit')); ?>">

                            <div class="sub_menu">

                                <a href="/recruit">

                                    <?php
                                    $vacancies = get_posts(
                                       array(
                                            'numberposts' => -1,
                                            'offset' => 0,
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
                                    foreach ($vacancies as $obj){
                                        if (!get_field('archive', $obj->ID)) {
                                            $studies[] = $obj;
                                        }
                                    }
                                    ?>

                                    <div class="sub_menu inner">
                                        <?php echo lng_text('Набор<br/>добровольцев'); ?>&nbsp;(<?php echo count($studies); ?>)
                                    </div>

                                </a>

                                <a href="/recruit/archive">
                                    <div class="sub_menu inner">
                                        <?php echo lng_text('Архив <br/>исследований'); ?>
                                    </div>
                                </a>

                                <a href="/recruit/nabor-patsientov/">
                                    <?php
                                    $vacancies = get_posts(
                                        array(
                                            'numberposts' => -1,
                                            'offset' => 0,
                                            'category' => '',
                                            'include' => '',
                                            'exclude' => '',
                                            'meta_key' => '',
                                            'meta_value' => '',
                                            'post_type' => 'patients',
                                            'post_parent' => '',
                                            'post_status' => 'publish'
                                        )
                                    );
                                    $studies = array();
                                    foreach ($vacancies as $obj){
                                        if (!get_field('archive', $obj->ID)) {
                                            $studies[] = $obj;
                                        }
                                    }
                                    ?>
                                    <div class="sub_menu inner">
                                        <?php echo lng_text('Набор<br />пациентов'); ?>&nbsp;(<?php echo count($studies); ?>)
                                    </div>
                                </a>

                            </div>
                            <span><?php echo lng_text('Набор<br/>добровольцев'); ?>&nbsp;(<?php echo count($studies); ?>)</span>
                        </div>

                    </a>

                </div>

                <div class="item">

                    <div class="inner <?php echo get_menu_active(array('news', 'interview','')); ?>">

                        <div class="sub_menu">

                            <a href="/news">

                                <div class="sub_menu inner">
                                    <?php echo lng_text('Новости<br/>медицины'); ?>
                                </div>

                            </a>

                            <a href="/interview">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Интервью'); ?>
                                </div>
                            </a>

                            <a href="/news/archive">
                                <div class="sub_menu inner">
                                    <?php echo lng_text('Архив<br/>новостей'); ?>
                                </div>
                            </a>

                        </div>

                        <span><?php echo lng_text('Новости<br/>медицины'); ?></span>

                    </div>

                </div>

                <div class="item">

                    <a href="/contacts">

                        <div class="inner <?php echo get_menu_active(array('contacts')); ?>">

                            <div class="sub_menu">

                                <a href="/contacts">
                                    <div class="sub_menu inner">
                                        <?php echo lng_text('Контакты'); ?>
                                    </div>
                                </a>

                                <a href="/vacancy">

                                    <?php

                                    $vacancies = get_posts(
                                        array(
                                            'numberposts' => -1,
                                            'offset' => 0,
                                            'category' => '',
                                            'include' => '',
                                            'exclude' => '',
                                            'meta_key' => '',
                                            'meta_value' => '',
                                            'post_type' => 'vacancies',
                                            'post_parent' => '',
                                            'post_status' => 'publish'
                                        )
                                    ); ?>

                                    <div class="sub_menu inner">
                                        <?php echo lng_text('Вакансии'); ?> (<?php echo count($vacancies); ?>)
                                    </div>
                                </a>
                            </div>
                            <span><?php echo lng_text('Контакты'); ?></span>

                        </div>

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-1 no-mobile">

            <div class="lang_switch">

                <div onclick="set_lang('RU');" class="lang lang_ru <?php if (LANG == 'RU') echo 'active'; ?>"></div>

                <div onclick="set_lang('EN'); //location.href='http://en.labmgmu.ru/';" class="lang lang_en <?php if (LANG == 'EN') echo 'active'; ?>"></div>

            </div>

        </div>
        <script>
            function set_lang(lang) {
                $.get('/wp-content/themes/labmgmu/ajax/set_lang.php',{
                        lang: lang
                    },
                    function( response ){
                        location.reload();
                    });
            }
        </script>

        <div class="col-md-2 no-mobile">

            <div class="top_contacts">

                <i class="fa fa-phone" aria-hidden="true"></i>

                <a href="tel:<?php echo str_replace(array('(',')',' ','-'), '', get_option('gl_phone')); ?>"><?php echo get_option('gl_phone'); ?></a><br/>

								<?php dynamic_sidebar( 'phone-1' ); ?>

                <i class="fa fa-envelope-o" aria-hidden="true"></i>

                <a href="mailto:<?php echo get_option('gl_email'); ?>"><?php echo get_option('gl_email'); ?></a><br/>

            </div>

        </div>

    </div>

</header>

<div class="mobile_menu in-mobile">

    <div class="mobile_menu_close">

        <i class="fa fa-times" aria-hidden="true"></i>

    </div>



    <div class="mobile_menu_item"><a href="/"><?php echo lng_text('Наши услуги'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/about/kontraktno-issledovatel-skaya-organizatsiya-labmgmu/"><?php echo lng_text('О нас'); ?></a></div>



    <div class="mobile_menu_item"><a href="/prresearch"><?php echo lng_text('Доклинические исследования'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/prrs_order/farmakokineticheskie-doklinicheskie-issledovaniya-preparata/"><?php echo lng_text('Регламент'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/prresearch#video"><?php echo lng_text('Видео доклинические исследования'); ?></a></div>



    <div class="mobile_menu_item"><a href="/clresearch"><?php echo lng_text('Клинические исследования'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/clrs_order/obshhie-polozheniya/"><?php echo lng_text('Регламент'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/clresearch#video"><?php echo lng_text('Клинические исследования видео'); ?></a></div>



    <div class="mobile_menu_item"><a href="/recruit"><?php echo lng_text('Набор добровольцев'); ?></a></div>
    <div class="mobile_menu_sub_item"><a href="/recruit/archive/"><?php echo lng_text('Архив исследований'); ?></a></div>
    <div class="mobile_menu_sub_item"><a href="/recruit/nabor-patsientov/"><?php echo lng_text('Набор пациентов'); ?></a></div>



    <div class="mobile_menu_item"><a href="/news"><?php echo lng_text('Новости медицины'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/interview"><?php echo lng_text('Интервью'); ?></a></div>

    <div class="mobile_menu_sub_item"><a href="/news/archive/"><?php echo lng_text('Архив новостей'); ?></a></div>



    <div class="mobile_menu_item"><a href="/contacts"><?php echo lng_text('Контакты'); ?></a></div>
    <div class="mobile_menu_sub_item"><a href="/vacancy/"><?php echo lng_text('Вакансии'); ?></a></div>

</div>

<div class="up_btn">

    <i class="fa fa-caret-up" aria-hidden="true"></i> <?php echo lng_text('НАВЕРХ'); ?>

</div>

<div id="top"></div>
