<?php
/*

Template Name: About Org Template

 */

the_post();
get_header();
?>

    <div id="about_org" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <?php echo get_field_lng('h1'); ?>
                        <div class="h1_line"></div>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9" style="padding-left: 30px;">
                    <div class="org_title">
                        <?php echo get_field_lng('h1'); ?>
                    </div>

                    <?php
                    if (LANG == 'RU') {
                        the_content();
                    } else {
                        echo get_field('content_en');
                    }?>

                    <div class="org_schema">

                        <?php
                        $org_info = get_posts(
                            array(
                                'numberposts' => -1,
                                'offset' => 0,
                                'category' => '',
                                'include' => '',
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' => '',
                                'post_type' => 'org_info',
                                'post_parent' => '',
                                'post_status' => 'publish'
                            )
                        );
                        foreach ($org_info as $obj) { ?>

                            <div id="org_schema_info<?php echo $obj->ID; ?>" class="org_schema_info" style="<?php echo get_field('style', $obj->ID); ?>">
                                <table>
                                    <tr><td>
                                            <span class="org_schema_info_title"><?php
                                                if (LANG == 'RU') {
                                                    echo $obj->post_title;
                                                } else {
                                                    echo get_field('title_en', $obj->ID);
                                                } ?></span><br />
                                            <?php echo get_field_lng('description', $obj->ID); ?>
                                        </td></tr>
                                </table>
                            </div>

                        <?php } ?>

                        <div class="org_schema_img">
                            <img src="<?php $img = get_field_lng('schema'); echo $img['url']; ?>" usemap="#Navigation" />
                        </div>

                        <map id="Navigation" name="Navigation">
                            <? foreach ($org_info as $obj) { ?>
                                <area onclick="return show_info(<?php echo $obj->ID; ?>)" shape="poly" coords="<?php echo get_field('coords', $obj->ID); ?>" href="#" alt="<?php
                                    if (LANG == 'RU') {
                                        echo $obj->post_title;
                                    } else {
                                        echo get_field('title_en', $obj->ID);
                                    } ?>">
                            <?php } ?>
                        </map>

                        <script>
                            function show_info(id) {
                                $('.org_schema_info').hide();
                                $('#org_schema_info' + id).show();
                                return false;
                            }
                        </script>

                    </div>

                   

                    <div class="org_block">
                        <div class="org_title">
                            <?php echo lng_text('Партнерство'); ?>
                        </div>
                        <?php echo get_field_lng('partner'); ?>
                        <?php
                        $part_logo = get_posts(
                            array(
                                'numberposts' => 6,
                                'offset' => 0,
                                'category' => '',
                                'include' => '',
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' => '',
                                'post_type' => 'part_logo',
                                'post_parent' => '',
                                'post_status' => 'publish'
                            )
                        );
                        foreach ($part_logo as $index => $obj) {
                            $part_logo[$index]->sort = get_field('sort', $obj->ID);
                        }
                        usort($part_logo, 'cmp_sort');
                        foreach ($part_logo as $obj) { ?>
                        <div class="col-md-4 part_logo">
                            <?php if (trim(get_field('link', $obj->ID)) != '') { ?>
                                <a target="_blank" href="<?php echo get_field('link', $obj->ID); ?>">
                                    <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" />
                                </a>
                            <?php } else { ?>
                            <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" />
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="clear" style="width: 100%; height: 40px;"></div>

                    <div class="org_block">
                        <div class="org_title">
                            <?php echo lng_text('Благотворительность'); ?>
                        </div>
                        <?php echo get_field_lng('blag'); ?>
                        <a target="_blank" href="<?php echo get_field('blag_link')?>">
                            <img src="<?php $img = get_field('blag_picture'); echo $img['url']; ?>" />
                        </a>
                    </div>

                     <div class="org_block">
                        <div class="org_title">
                            <?php echo lng_text('Опыт'); ?>
                        </div>
                        <?php echo get_field_lng('exp'); ?>
                    </div>

                    <div class="org_block">
                        <div class="org_title">
                            <?php echo lng_text('Список МНН по завершенным проектам'); ?>
                        </div>
                        <?php
                        $drugs = get_posts(
                            array(
                                'numberposts' => -1,
                                'offset' => 0,
                                'category' => '',
                                'include' => '',
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' => '',
                                'post_type' => 'mhh',
                                'post_parent' => '',
                                'post_status' => 'publish'
                            )
                        );
                        foreach ($drugs as $index=>$drug) {
                            $class = '';
                            if (!($index % 2)) {
                                $class = 'gray';
                            } ?>
                            <div class="col-md-8" style="padding-left: 0;">
                                <div class="org_table_line <?php echo $class; ?>">
                                    <?php
                                    if (LANG == 'RU') {
                                        echo $drug->post_title;
                                    } else {
                                        echo get_field('title_en', $drug->ID);
                                    }?>
                                </div>
                             </div>
                            <div class="col-md-4" style="padding-right: 0;">
                                <div class="org_table_line <?php echo $class; ?>">
                                    <?php echo get_field_lng('mhh', $drug->ID); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="clear"></div>
                    </div>

                    <div class="org_block">
                        <div class="org_title">
                            <?php echo lng_text('Оригинальные лекарственные препараты'); ?>
                        </div>
                        <?php
                        $drugs = get_posts(
                            array(
                                'numberposts' => -1,
                                'offset' => 0,
                                'category' => '',
                                'include' => '',
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' => '',
                                'post_type' => 'drugs',
                                'post_parent' => '',
                                'post_status' => 'publish'
                            )
                        );
                        foreach ($drugs as $index=>$drug) {
                            $class = '';
                            if (!($index % 2)) {
                                $class = 'gray';
                            } ?>
                            <div class="col-md-8" style="padding-left: 0;">
                                <div class="org_table_line <?php echo $class; ?>">
                                    <?php if (LANG == 'RU') {
                                        echo $drug->post_title;
                                    } else {
                                        echo get_field('title_en', $drug->ID);
                                    }?>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding-right: 0;">&nbsp;</div>
                        <?php } ?>
                        <div class="clear"></div>
                    </div>

                    <div class="org_block">
                        <div class="org_title">
                            <?php echo lng_text('Качество нашей работы'); ?>
                        </div>
                        <?php echo get_field_lng('kach'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php echo get_the_post_thumbnail( $post->id, 'large' ); ?>
                </div>
            </div>
        </div>
    </div>

<?php require_once "lastnews.php"; ?>
<?php get_footer(); ?>