<?php/*Template Name: Vacancies Template */the_post();get_header();?>    <div id="about_media" class="section">        <div class="container">            <div class="row">                <div class="col-md-12">                    <h1>                        <?php echo get_field_lng('h1'); ?>                        <div class="h1_line"></div>                    </h1>                </div>            </div>            <div class="row">                <div class="col-md-9" style="padding-left: 30px;">                    <?php the_content(); ?>                    <div class="vacancies_title"><?php echo lng_text('Открытые вакансии'); ?></div>                    <div class="vacancies">                    <?php                    $vacancies = get_posts(                        array(                            'numberposts' => -1,                            'offset' => 0,                            'category' => '',                            'include' => '',                            'exclude' => '',                            'meta_key' => '',                            'meta_value' => '',                            'post_type' => 'vacancies',                            'post_parent' => '',                            'post_status' => 'publish'                        )                    );                    foreach ($vacancies as $index => $vacant) {                        $vacancies[$index]->sort = get_field('sort', $vacant->ID);                    }                    usort($vacancies, 'cmp_sort');                    foreach ($vacancies as $index=>$vacant) { ?>                        <div id="vacancies_link<?php echo $vacant->ID; ?>" class="vacancies_link">                            <div class="vacancies_link_fa">                                <i class="fa fa-sort-desc" aria-hidden="true"></i>                            </div>                            <?php echo $vacant->post_title; ?>                        </div>                        <div id="vacancies_box<?php echo $vacant->ID; ?>" class="vacancies_box">                            <div class="vacancies_box_title"><?php echo lng_text('Обязанности');?>:</div>                            <div class="vacancies_box_text"><?php echo get_field_lng('p1', $vacant->ID); ?></div>                            <div class="vacancies_box_title"><?php echo lng_text('Требования');?>:</div>                            <div class="vacancies_box_text"><?php echo get_field_lng('p2', $vacant->ID); ?></div>                            <div class="vacancies_box_title"><?php echo lng_text('Условия');?>:</div>                            <div class="vacancies_box_text"><?php echo get_field_lng('p3', $vacant->ID); ?></div>                        </div>                        <div id="vacancies_box_c<?php echo $vacant->ID; ?>" class="vacancies_box_contacts">                            <?php echo get_field_lng('contacts', $vacant->ID); ?>                        </div>                        <div class="vacancies_box_space"></div>                    <?php } ?>                    </div>                </div>                <div class="col-md-3">                    <?php                    $banner_category = 1;                    require_once "include/banners.php"; ?>                </div>            </div>        </div>    </div><?php require_once "lastnews.php"; ?><?php get_footer(); ?>