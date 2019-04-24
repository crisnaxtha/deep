<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DEEP
 */

get_header();
?>

<div class="container">
  <div class="row large-gutters">
	  <?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
			
    <div class="col-lg-8 mb-7">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
				<!-- Blog-->
					<div class="row blog-post">
						<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content-archive', get_post_type() );

								endwhile;

								the_posts_navigation();

								else :

								get_template_part( 'template-parts/content', 'none' );

								endif;
							?>
					</div>
					<!-- End Blog-->
					<div class="text-center align-items-center"><a class="btn btn-light" href="#">Load More</a></div>
			
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
    <div class="col-lg-4 mb-7">
      <!-- Sidebar-->
			<?php get_sidebar(); ?>
			<!-- Sidebar End-->
    </div>
  </div>
</div>

<?php
get_footer();
