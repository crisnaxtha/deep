<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DEEP
 */

// if ( ! is_active_sidebar( 'deepmala_main_sidebar' ) ) {
// 	return;
// }
?>

<aside id="secondary" class="widget-area">
<?php if(is_front_page()): ?>
	<?php if (is_active_sidebar( 'deepmala_template_sidebar_section' ) ) : ?>
		<?php dynamic_sidebar( 'deepmala_template_sidebar_section' ); ?>
	<?php endif;?>
<?php else: ?>
	<?php if (is_active_sidebar( 'deepmala_main_sidebar' ) ) : ?>
		<?php  dynamic_sidebar( 'deepmala_main_sidebar' ); ?>
	<?php endif;?>
<?php endif; ?>
</aside><!-- #secondary -->
