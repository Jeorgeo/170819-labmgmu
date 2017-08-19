<?php
global $banner_category;
$banners = get_posts(
    array(
        'numberposts' => -1,
        'offset' => 0,
        'category' => '',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'banners',
        'post_parent' => '',
        'post_status' => 'publish'
    )
);
foreach ($banners as $index => $obj) {
    $banners[$index]->sort = get_field('sort', $obj->ID);
}
usort($banners, 'cmp_sort');
foreach ($banners as $obj) {
    if (get_field('category', $obj->ID) == $banner_category){ ?>
    <div class="news_baners">
        <a <?php
           if (get_field('target', $obj->ID)) {
               echo 'target="_blank"';
           }
           ?> href="<?php echo get_field('link', $obj->ID); ?>">
            <img src="<?php $img = get_field('picture', $obj->ID); echo $img['url']; ?>" alt=""/>
        </a>
    </div>
<?php }
} ?>
