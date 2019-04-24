<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DEEP
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-xl-8 mb-6">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<div class="blog-post single-post">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			
			//If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
	<div class="col-xl-4 mb-6">
			<?php get_sidebar(); ?>
	</div>
	</div>
	</div>
<?php

get_footer();
