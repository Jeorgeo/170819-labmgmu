<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>
                    <?php echo get_field('h1'); ?>
                    <div class="h1_line"></div>
                </h1>
            </div>
            <div class="col-md-3">
                <h1 style="padding-left: 0; padding-right: 0">&nbsp;
                    <div class="h1_line gray"></div>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9" style="padding-left: 30px;">
                <?php the_content(); ?>
            </div>
            <div class="col-md-3">
                <?php
                global $banner_category;
                $banner_category = 2;
                require_once "include/banners.php"; ?>
            </div>
        </div>
    </div>
</div>


<?php /*
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
*/ ?>