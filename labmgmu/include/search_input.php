<?php
global $table, $target;
$search = '';
if (isset($_POST['search'])) {
    $search = trim($_POST['search']);
}
?>
<div class="search_form">
    <form <?php
        if (!isset($target)) {
            echo 'action="/search"';
        } ?> method="post">
        <div class="search_form_btn"><img src="<?php echo get_template_directory_uri(); ?>/img/search.png" alt=""/></div>
        <input type="text" name="search" id="search" placeholder="<?php echo lng_text('Введите запрос'); ?>" value="<?php echo $search; ?>" />
        <input type="hidden" name="table" id="table" value="<?php echo $table; ?>"/>
    </form>
</div>
