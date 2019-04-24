<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DEEP
 */

get_header();
?>

<?php
	if(is_front_page()):
		if (is_active_sidebar( 'deepmala_slider_section' ) ) : ?>
			  <div class="container">
						<?php dynamic_sidebar( 'deepmala_slider_section' ); ?>
				</div>
		<?php 
		endif; 
	endif;
?> 

<div class="container">
	<hr class="mt-0 mb-5">
	<div class="row">
		<div class="col-xl-8 mb-6">
			<?php if(is_front_page()): ?>
				<?php if (is_active_sidebar( 'deepmala_template_section' ) ) : ?>
					<?php dynamic_sidebar( 'deepmala_template_section' ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="col-xl-4 mb-6">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php if(get_theme_mod('below_news')): ?>

				
<div class="ad-half text-center">
	<a href="javascript:void()"><img src="<?php echo wp_get_attachment_url( get_theme_mod( 'below_news' ) ); ?>" alt="Ads" /></a>
</div>

<?php endif; ?>
<?php

get_footer();
