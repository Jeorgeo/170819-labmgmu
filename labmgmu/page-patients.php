<?php
/*

Template Name: Patients

 */
the_post();
get_header();
?>

    <div id="patients" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="padding-right: 0">
                    <h1>
                        <?php echo get_field_lng('h1'); ?>
                        <div class="h1_line"></div>
                    </h1>
                </div>
                <div class="col-md-3" style="padding: 0">
                    <h1>&nbsp;
                        <div class="h1_line gray"></div>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9" style="padding-left: 30px; padding-right: 0">

                    <div style="padding-right: 15px;margin-bottom: 10px;">
                        <?php require_once "include/search_input.php" ?>
                    </div>

                    <?php
                    if (LANG == 'RU') {
                        the_content();
                    } else {
                        echo get_field('content_en');
                    }
                    ?>

                    <div class="patients_blocks">
                        <div class="patients_main_h1"> <?php echo lng_text('Проводимые исследования:'); ?></div>
                        <?php
                        $patients = get_posts(
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
                        foreach ($patients as $patient) { ?>
                            <a href="/patients/<?php echo $patient->post_name; ?>">
                                <div class="patient_title">
                                    <i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_field_lng('h1', $patient->ID); ?>
                                </div>
                            </a>
                        <?php } ?>
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

<?php require_once "lastnews.php"; ?>
<?php get_footer(); ?>
