<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;
setcookie('select_lang', $_GET['lang'], time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);