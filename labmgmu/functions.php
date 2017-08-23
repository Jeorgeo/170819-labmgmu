<?php
/*
$use_sts = true;
if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    header('Strict-Transport-Security: max-age=31536000');
} elseif ($use_sts) {
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], true, 301);
    die();
}
*/

/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */

$use_sts = true;
if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    header('Strict-Transport-Security: max-age=31536000');
} elseif ($use_sts) {
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], true, 301);
    die();
}
if (!isset($content_width)) {

    $content_width = 660;

}


/**
 * Twenty Fifteen only works in WordPress 4.1 or later.

 */

if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {

    require get_template_directory() . '/inc/back-compat.php';

}


if (!function_exists('twentyfifteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */

    function twentyfifteen_setup()

    {


        /*

         * Make theme available for translation.

         * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen

         * If you're building a theme based on twentyfifteen, use a find and replace

         * to change 'twentyfifteen' to the name of your theme in all the template files

         */

        load_theme_textdomain('twentyfifteen');


        // Add default posts and comments RSS feed links to head.

        add_theme_support('automatic-feed-links');


        /*

         * Let WordPress manage the document title.

         * By adding theme support, we declare that this theme does not use a

         * hard-coded <title> tag in the document head, and expect WordPress to

         * provide it for us.

         */

        add_theme_support('title-tag');


        /*

         * Enable support for Post Thumbnails on posts and pages.

         *

         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

         */

        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(825, 510, true);


        // This theme uses wp_nav_menu() in two locations.

        register_nav_menus(

            array(

                'primary' => __('Primary Menu', 'twentyfifteen'),
                'social' => __('Social Links Menu', 'twentyfifteen'),

            )

        );


        /*

         * Switch default core markup for search form, comment form, and comments

         * to output valid HTML5.

         */

        add_theme_support(

            'html5',
            array(

                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption'

            )

        );


        /*

         * Enable support for Post Formats.

         *

         * See: https://codex.wordpress.org/Post_Formats

         */

        add_theme_support(

            'post-formats',
            array(

                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'status',
                'audio',
                'chat'

            )

        );


        /*

         * Enable support for custom logo.

         *

         * @since Twenty Fifteen 1.5

         */

        add_theme_support(

            'custom-logo',
            array(

                'height' => 248,
                'width' => 248,
                'flex-height' => true,

            )

        );


        $color_scheme = twentyfifteen_get_color_scheme();

        $default_color = trim($color_scheme[0], '#');


        // Setup the WordPress core custom background feature.


        /**
         * Filter Twenty Fifteen custom-header support arguments.
         *
         * @since Twenty Fifteen 1.0
         *
         * @param array $args {
         *     An array of custom-header support arguments.
         *
         * @type string $default -color            Default color of the header.
         * @type string $default -attachment     Default attachment of the header.
         * }

         */

        add_theme_support(

            'custom-background',
            apply_filters(

                'twentyfifteen_custom_background_args',
                array(

                    'default-color' => $default_color,
                    'default-attachment' => 'fixed',

                )

            )

        );


        /*

         * This theme styles the visual editor to resemble the theme style,

         * specifically font, colors, icons, and column width.

         */

        add_editor_style(array('css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url()));


        // Indicate widget sidebars can use selective refresh in the Customizer.

        add_theme_support('customize-selective-refresh-widgets');

    }

endif; // twentyfifteen_setup

add_action('after_setup_theme', 'twentyfifteen_setup');


/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function twentyfifteen_widgets_init()

{

    register_sidebar(
        array(
            'name' => __('Widget Area', 'twentyfifteen'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Второй телефон в шапке', 'twentyfifteen'),
            'id' => 'phone-1',
            'description' => __('Добавьте телефон записью в формате: <i class="fa fa-phone" aria-hidden="true"></i>
            <a href="tel:+74951504190"> +7 (495) 150 41 90</a>', 'twentyfifteen'),
            'before_widget' => '<div class="widget_phone-1">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Второй телефон в шапке мобильной версии', 'twentyfifteen'),
            'id' => 'phone-2',
            'description' => __('Добавьте телефон записью в формате: <a href="tel:+74951504190">
            <i class="fa fa-phone" aria-hidden="true"></i></a>', 'twentyfifteen'),
            'before_widget' => '<div class="widget_phone-2">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

}


add_action('widgets_init', 'twentyfifteen_widgets_init');


if (!function_exists('twentyfifteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Fifteen.
     *
     * @since Twenty Fifteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */

    function twentyfifteen_fonts_url()

    {

        $fonts_url = '';

        $fonts = array();

        $subsets = 'latin,latin-ext';


        /*

         * Translators: If there are characters in your language that are not supported

         * by Noto Sans, translate this to 'off'. Do not translate into your own language.

         */

        if ('off' !== _x('on', 'Noto Sans font: on or off', 'twentyfifteen')) {

            $fonts[] = 'Noto Sans:400italic,700italic,400,700';

        }


        /*

         * Translators: If there are characters in your language that are not supported

         * by Noto Serif, translate this to 'off'. Do not translate into your own language.

         */

        if ('off' !== _x('on', 'Noto Serif font: on or off', 'twentyfifteen')) {

            $fonts[] = 'Noto Serif:400italic,700italic,400,700';

        }


        /*

         * Translators: If there are characters in your language that are not supported

         * by Inconsolata, translate this to 'off'. Do not translate into your own language.

         */

        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentyfifteen')) {

            $fonts[] = 'Inconsolata:400,700';

        }


        /*

         * Translators: To add an additional character subset specific to your language,

         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.

         */

        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen');


        if ('cyrillic' == $subset) {

            $subsets .= ',cyrillic,cyrillic-ext';

        } elseif ('greek' == $subset) {

            $subsets .= ',greek,greek-ext';

        } elseif ('devanagari' == $subset) {

            $subsets .= ',devanagari';

        } elseif ('vietnamese' == $subset) {

            $subsets .= ',vietnamese';

        }


        if ($fonts) {

            $fonts_url = add_query_arg(

                array(

                    'family' => urlencode(implode('|', $fonts)),
                    'subset' => urlencode($subsets),

                ),
                'https://fonts.googleapis.com/css'

            );

        }


        return $fonts_url;

    }

endif;


/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */

function twentyfifteen_javascript_detection()

{

    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

}


add_action('wp_head', 'twentyfifteen_javascript_detection', 0);


/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */

function twentyfifteen_scripts()

{

    // Add custom fonts, used in the main stylesheet.

    wp_enqueue_style('twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null);


    // Add Genericons, used in the main stylesheet.

    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');


    // Load our main stylesheet.

    wp_enqueue_style('twentyfifteen-style', get_stylesheet_uri());


    // Load the Internet Explorer specific stylesheet.

    wp_enqueue_style(

        'twentyfifteen-ie',
        get_template_directory_uri() . '/css/ie.css',
        array('twentyfifteen-style'),
        '20141010'

    );

    wp_style_add_data('twentyfifteen-ie', 'conditional', 'lt IE 9');


    // Load the Internet Explorer 7 specific stylesheet.

    wp_enqueue_style(

        'twentyfifteen-ie7',
        get_template_directory_uri() . '/css/ie7.css',
        array('twentyfifteen-style'),
        '20141010'

    );

    wp_style_add_data('twentyfifteen-ie7', 'conditional', 'lt IE 8');


    wp_enqueue_script(

        'twentyfifteen-skip-link-focus-fix',
        get_template_directory_uri() . '/js/skip-link-focus-fix.js',
        array(),
        '20141010',
        true

    );


    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }


    if (is_singular() && wp_attachment_is_image()) {

        wp_enqueue_script(

            'twentyfifteen-keyboard-image-navigation',
            get_template_directory_uri() . '/js/keyboard-image-navigation.js',
            array('jquery'),
            '20141010'

        );

    }


    wp_enqueue_script(

        'twentyfifteen-script',
        get_template_directory_uri() . '/js/functions.js',
        array('jquery'),
        '20150330',
        true

    );

    wp_localize_script(

        'twentyfifteen-script',
        'screenReaderText',
        array(

            'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'twentyfifteen') . '</span>',
            'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'twentyfifteen') . '</span>',

        )

    );


    wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('owl.carousel.css', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0');
    wp_enqueue_style(
        'jquery.fancybox.css',
        get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css',
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'jquery.fancybox-buttons.css',
        get_template_directory_uri() . '/fancybox/source/helpers/jquery.fancybox-buttons.css',
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'jquery.fancybox-thumbs.css',
        get_template_directory_uri() . '/fancybox/source/helpers/jquery.fancybox-thumbs.css',
        array(),
        '1.0'
    );

    wp_enqueue_style('main.css', get_template_directory_uri() . '/css/main.css', array(), '1.0');


    wp_enqueue_script('jquery-1-12-2.min', get_template_directory_uri() . '/scripts/jquery-1-12-2.min.js');

    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/scripts/owl.carousel.min.js');

    wp_enqueue_script('jquery.scrollTo.min', get_template_directory_uri() . '/scripts/jquery.scrollTo.min.js');


    wp_enqueue_script(
        'jquery.mousewheel',
        get_template_directory_uri() . '/fancybox/lib/jquery.mousewheel-3.0.6.pack.js'
    );

    wp_enqueue_script(
        'jquery.fancybox.pack',
        get_template_directory_uri() . '/fancybox/source/jquery.fancybox.pack.js'
    );

    wp_enqueue_script(
        'fancybox-buttons',
        get_template_directory_uri() . '/fancybox/source/helpers/jquery.fancybox-buttons.js'
    );

    wp_enqueue_script(
        'fancybox-media',
        get_template_directory_uri() . '/fancybox/source/helpers/jquery.fancybox-media.js'
    );

    wp_enqueue_script(
        'fancybox-thumbs',
        get_template_directory_uri() . '/fancybox/source/helpers/jquery.fancybox-thumbs.js'
    );


    wp_enqueue_script('main', get_template_directory_uri() . '/scripts/main.js');

}


add_action('wp_enqueue_scripts', 'twentyfifteen_scripts');


/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */

function twentyfifteen_resource_hints($urls, $relation_type)
{

    if (wp_style_is('twentyfifteen-fonts', 'queue') && 'preconnect' === $relation_type) {

        if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '>=')) {

            $urls[] = array(

                'href' => 'https://fonts.gstatic.com',
                'crossorigin',

            );

        } else {

            $urls[] = 'https://fonts.gstatic.com';

        }

    }


    return $urls;

}


add_filter('wp_resource_hints', 'twentyfifteen_resource_hints', 10, 2);


/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */

function twentyfifteen_post_nav_background()

{

    if (!is_single()) {

        return;

    }


    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);

    $next = get_adjacent_post(false, '', false);

    $css = '';


    if (is_attachment() && 'attachment' == $previous->post_type) {

        return;

    }


    if ($previous && has_post_thumbnail($previous->ID)) {

        $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');

        $css .= '

			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }

			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }

			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }

		';

    }


    if ($next && has_post_thumbnail($next->ID)) {

        $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');

        $css .= '

			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); border-top: 0; }

			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }

			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }

		';

    }


    wp_add_inline_style('twentyfifteen-style', $css);

}


add_action('wp_enqueue_scripts', 'twentyfifteen_post_nav_background');


/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $item_output The menu item output.
 * @param WP_Post $item Menu item object.
 * @param int $depth Depth of the menu.
 * @param array $args wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */

function twentyfifteen_nav_description($item_output, $item, $depth, $args)
{

    if ('primary' == $args->theme_location && $item->description) {

        $item_output = str_replace(

            $args->link_after . '</a>',
            '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>',
            $item_output

        );

    }


    return $item_output;

}


add_filter('walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4);


/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */

function twentyfifteen_search_form_modify($html)
{

    return str_replace('class="search-submit"', 'class="search-submit screen-reader-text"', $html);

}


add_filter('get_search_form', 'twentyfifteen_search_form_modify');


/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */

require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */

require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */

require get_template_directory() . '/inc/customizer.php';


function cmp_sort($a, $b)
{

    $a = $a->sort;

    $b = $b->sort;

    if ($a == $b) {

        return 0;

    }

    return ($a < $b) ? -1 : 1;

}


function cmp_parent($a, $b)
{

    $a = $a['post_parent'];

    $b = $b['post_parent'];

    if ($a == $b) {

        return 0;

    }

    return ($a < $b) ? -1 : 1;

}


require_once 'admin-menu.php';

require_once 'page-taxonomies.php';

require_once 'xls-menu.php';


function remove_admin_login_header()

{

    remove_action('wp_head', '_admin_bar_bump_cb');

}


add_action('get_header', 'remove_admin_login_header');


function save_post_custom($post_id)
{

    if ($_POST['post_type'] == 'news') {

        if (get_field('main', $post_id)) {

            $news = get_posts(

                array(

                    'numberposts' => -1,
                    'offset' => 0,
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

            foreach ($news as $obj) {

                update_post_meta($obj->ID, 'main', false);

            }

            update_post_meta($post_id, 'main', true);

        }

    }

    if ($_POST['post_type'] == 'interview') {

        if (get_field('main', $post_id)) {

            $news = get_posts(

                array(

                    'numberposts' => -1,
                    'offset' => 0,
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

            foreach ($news as $obj) {

                update_post_meta($obj->ID, 'main', false);

            }

            update_post_meta($post_id, 'main', true);

        }

    }

    if ($_POST['post_type'] == 'clrs_order' || $_POST['post_type'] == 'prrs_order') {

        if (get_field('sort', $post_id) == '') {

            update_post_meta($post_id, 'sort', 9999);

        }

    }

}


add_action('save_post', 'save_post_custom');


function get_r_month($month)
{

    if (LANG == 'RU') {
        switch ($month) {
            case 1:
                $month = 'января';
                break;

            case 2:
                $month = 'февраля';
                break;

            case 3:
                $month = 'марта';
                break;

            case 4:
                $month = 'апреля';
                break;

            case 5:
                $month = 'мая';
                break;

            case 6:
                $month = 'июня';
                break;

            case 7:
                $month = 'июля';
                break;

            case 8:
                $month = 'августа';
                break;

            case 9:
                $month = 'сентября';
                break;

            case 10:
                $month = 'октября';
                break;

            case 11:
                $month = 'ноября';
                break;

            case 12:
                $month = 'декабря';
                break;
        }
    } else {
        switch ($month) {
            case 1:
                $month = 'january';
                break;

            case 2:
                $month = 'february';
                break;

            case 3:
                $month = 'march';
                break;

            case 4:
                $month = 'april';
                break;

            case 5:
                $month = 'may';
                break;

            case 6:
                $month = 'june';
                break;

            case 7:
                $month = 'july';
                break;

            case 8:
                $month = 'august';
                break;

            case 9:
                $month = 'september';
                break;

            case 10:
                $month = 'october';
                break;

            case 11:
                $month = 'november';
                break;

            case 12:
                $month = 'december';
                break;
        }
    }

    return $month;
}


function get_month_name($month)
{

    if (LANG == 'RU') {
        switch ($month) {

            case 1:

                $month = 'январь';

                break;

            case 2:

                $month = 'февраль';

                break;

            case 3:

                $month = 'март';

                break;

            case 4:

                $month = 'апрель';

                break;

            case 5:

                $month = 'май';

                break;

            case 6:

                $month = 'июнь';

                break;

            case 7:

                $month = 'июль';

                break;

            case 8:

                $month = 'август';

                break;

            case 9:

                $month = 'сентябрь';

                break;

            case 10:

                $month = 'октябрь';

                break;

            case 11:

                $month = 'ноябрь';

                break;

            case 12:

                $month = 'декабрь';

                break;

        }
    } else {
        switch ($month) {
            case 1:
                $month = 'january';
                break;

            case 2:
                $month = 'february';
                break;

            case 3:
                $month = 'march';
                break;

            case 4:
                $month = 'april';
                break;

            case 5:
                $month = 'may';
                break;

            case 6:
                $month = 'june';
                break;

            case 7:
                $month = 'july';
                break;

            case 8:
                $month = 'august';
                break;

            case 9:
                $month = 'september';
                break;

            case 10:
                $month = 'october';
                break;

            case 11:
                $month = 'november';
                break;

            case 12:
                $month = 'december';
                break;
        }
    }

    return $month;

}


function show_menu($point, $menu, $orders, $post)
{

    $current_id = $menu[$point];

    if ($current_id) {

        echo '<div class="order_2">';

    }


    foreach ($orders as $order) {

        if ($current_id == $order->post_parent) {

            $classes = '';

            if (in_array($order->ID, $menu)) {

                $classes = 'open';

                if (!$order->post_parent) {

                    $classes .= ' active';

                }

            }

            if ($post->ID == $order->ID) {

                $classes = 'open active';

            }

            echo '<a href="' . get_permalink($order->ID) . '">';

            echo '<div class="order_link ' . $classes . '">';

            echo $order->post_title;

            echo '</div>';

            echo '</a>';

            if (in_array($order->ID, $menu)) {

                if ($point) {

                    show_menu($point - 1, $menu, $orders, $post);

                }

            }

        }

    }


    if ($current_id) {

        echo '</div>';

    }

}


function wiki($string)
{

    $content = $string;

    $t = array(

        ' ',
        "\t",
        '=',
        '+',
        '*',
        '/',
        '\\',
        ',',
        '.',
        ';',
        ':',
        '[',
        ']',
        '{',
        '}',
        '(',
        ')',
        '<',
        '>',
        '&',
        '%',
        '$',
        '@',
        '#',
        '^',
        '!',
        '?',
        '~'

    ); // separators

    $string = str_replace($t, " ", $string);

    $words = explode(' ', $string);

    foreach ($words as $index => $obj) {

        $words[$index] = mb_strtoupper($obj);

    }


    $wiki = get_posts(

        array(

            'numberposts' => -1,
            'offset' => 0,
            'category' => '',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'wiki',
            'post_parent' => '',
            'post_status' => 'publish'

        )

    );

    $return = $content;

    $sym = array('(', ')', ' ', ',', ';');

    foreach ($wiki as $obj) {

        if (mb_strpos(mb_strtoupper($content), mb_strtoupper($obj->post_title)) === false) {

        } else {

            if (mb_strpos(mb_strtoupper($content), mb_strtoupper($obj->post_title)) == 0 ||

                (

                    in_array(

                        mb_substr($content, mb_strpos(mb_strtoupper($content), mb_strtoupper($obj->post_title)) - 1, 1),
                        $sym

                    ) &&

                    in_array(

                        mb_substr(

                            $content,
                            mb_strpos(mb_strtoupper($content), mb_strtoupper($obj->post_title)) + mb_strlen(

                                $obj->post_title

                            ),
                            1

                        ),
                        $sym

                    )

                )

            ) {

                $pos = mb_strpos(mb_strtoupper($content), mb_strtoupper($obj->post_title));

                $return = mb_substr($content, 0, $pos);

                $return .= '<span class="list_word">';

                $return .= '<span style="" class="list_word_text">';

                $return .= str_replace(array('<p>', '</p>'), '', get_field('description', $obj->ID));

                $return .= '</span>';

                $return .= mb_substr($content, $pos, mb_strlen($obj->post_title));

                $return .= '</span>';

                $return .= mb_substr($content, $pos + mb_strlen($obj->post_title));

                $return = str_replace(array('<p>', '</p>'), '<br>', $return);

                $content = $return;

            }

        }

    }


    return $return;

}


function reg_search($table)
{

    $list = get_posts(

        array(

            'numberposts' => -1,
            'offset' => 0,
            'orderby' => 'date',
            'order' => 'DESC',
            'category' => '',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => $table,
            'post_parent' => '',
            'post_status' => 'publish'

        )

    );

    $found = array();

    if (isset($_POST['search'])) {

        $search = trim($_POST['search']);

    }

    if (!empty($search)) {

        foreach ($list as $obj) {

            $active = false;

            if (mb_strpos(mb_strtolower($obj->post_title), mb_strtolower($search)) === false) {

                if (mb_strpos(mb_strtolower(get_field('description', $obj->ID)), mb_strtolower($search)) === false) {

                } else {

                    $active = true;

                }

            } else {

                $active = true;

            }

            if ($active) {

                $found[] = $obj;

                if (count($found) > 25) {

                    break;

                }

            }

        }

    }

    foreach ($found as $index => $obj) {

        ?>

        <a class="news_mini_a" href="/<?php echo $table; ?>/<?php echo $obj->post_name; ?>">

            <div style="padding: 10px 0; color: #ff0000;text-decoration: underline;">

                <?php echo $obj->post_title; ?>...

            </div>

        </a>

    <?php

    }

    if (!count($found)) {

        ?>



    <?php

    }

}


function get_menu_active($links)
{

    $active = '';

    foreach ($links as $link) {

        if (strpos($_SERVER['REQUEST_URI'], $link)) {

            $active = 'active';

        }

    }

    return $active;

}

function set_select_lang() {
    if (!isset($_COOKIE['select_lang'])) {
        $cookie = 'RU';
        setcookie('select_lang', $cookie, time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
    }
    //setcookie('select_lang', 'EN', time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
    define ('LANG', $_COOKIE['select_lang']);
}
add_action( 'init', 'set_select_lang');

function lng_text($text) {
    if (LANG == 'EN') {
        switch ($text) {
            case 'Набор<br />пациентов': return 'Recruitment<br />of patients';
            case 'Набор пациентов': return 'Recruitment of patients';
            case 'Проводимые исследования': return 'Conducted research';
            case 'Введите запрос': return 'Enter the query';
            case 'Сегодня в ГК ЛАБМГМУ входят:': return 'Today the GC LABMGMU includes:';
            case 'Положение о защите персональных данных': return 'Regulation on the protection of personal data';
            case 'Поиск новостей по месяцам': return 'News search by month';
            case 'Ваша заявка принята!': return 'Your application is accepted!';
            case 'Автор': return 'Author';
            case 'Интервью похожие по теме': return 'Interviews similar in theme';
            case 'Другие услуги': return 'Other services';
            case 'назад в раздел': return 'Back to section';
            case 'Информация для исследователей': return 'Information for Researchers';
            case 'Планируемые исследование биоэквивалентности': return 'Planned bioequivalence study';
            case 'Стать добровольцем': return 'Become a volunteer';
            case 'Качество нашей работы': return 'Quality of our work';
            case 'Адрес': return 'Address';
            case 'Время работы': return 'Work time';
            case 'Телефон': return 'Phone';
            case 'Качество нашей работы': return 'Quality of our work';
            case 'Опыт': return 'Experience';
            case 'Список МНН по завершенным проектам': return 'List of INN on completed projects';
            case 'Оригинальные лекарственные препараты': return 'Original medicines';
            case 'Благотворительность': return 'Charity';
            case 'Контакты': return 'Contacts';
            case 'Вакансии': return 'Vacancies';
            case 'Новости<br/>медицины': return 'News of<br/>medicine';
            case 'Новости медицины': return 'News of medicine';
            case 'Интервью': return 'Interviews';
            case 'Архив<br/>новостей': return 'News<br>archive';
            case 'Архив новостей': return 'News archive';
            case 'Набор<br/>добровольцев': return 'For<br/>volunteers';
            case 'Набор добровольцев': return 'For volunteers';
            case 'Архив <br/>исследований': return 'Research<br>Archive';
            case 'Архив исследований': return 'Research Archive';
            case 'Клинические<br/>исследования': return 'Clinical<br>research';
            case 'Клинические исследования': return 'Clinical research';
            case 'Клинические исследования видео': return 'Clinical research video';
            case 'Клинические исследования: видео': return 'Clinical research: video';
            case 'видео': return 'video';
            case 'Регламент': return 'Regulations';
            case 'Доклинические<br/>исследования': return 'Preclinical<br/>research';
            case 'Доклинические исследования': return 'Preclinical research';
            case 'доклинические<br/>исследования': return 'preclinical<br/>research';
            case 'Видео доклинические исследования': return 'Video preclinical research';
            case 'Видео': return 'Video';
            case 'Наши<br/>услуги': return 'Our<br/>services';
            case 'Наши услуги': return 'Our services';
            case 'О нас': return 'About us';
            case 'НАВЕРХ': return 'Top';
            case 'ПОДРОБНО': return 'DETAILS';
            case 'Открытые вакансии': return 'Open vacancies';
            case 'Обязанности': return 'Responsibility';
            case 'Требования': return 'Requirements';
            case 'Условия': return 'Conditions';
            case 'Новости': return 'News';
            case 'Последние новости': return 'Last news';
            case 'Дизайн': return 'Design';
            case 'Полиграфия': return 'Polygraphy';
            case 'Партнерство': return 'Partnership';
            case 'Подробная информация<br />для добровольцев': return 'Detailed information<br>for volunteers';
            case 'Опубликовано': return 'Published';
            case 'Поиск': return 'Search';
            case 'Новости похожие по теме': return 'Related news';
            case 'Новостей за этот период нет': return 'There are no news for this period';
            case 'Проводимые исследования:': return 'Conducted research:';
        }
    }
    return $text;
}

function get_field_lng($field, $id = false) {
    $prefix = '';
    if (LANG == 'EN') {
        $prefix = '_en';
    }
    if ($id) {
        $value = get_field($field . $prefix, $id);
    } else {
        $value = get_field($field . $prefix);
    }
    if ($value == '') {
        if ($id) {
            $value = get_field($field, $id);
        } else {
            $value = get_field($field);
        }
    }
    return $value;
}

function http_to_https_redirect(){
    if( is_ssl() ) return;

    if ( 0 === strpos($_SERVER['REQUEST_URI'], 'http') )
        wp_redirect( set_url_scheme( $_SERVER['REQUEST_URI'], 'https' ), 301 );
    else
        wp_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );

    exit;
}
add_action('init', 'http_to_https_redirect');
