<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DEEP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content-wrapper">
          <div class="entry-content">
            <header class="entry-header text-md-center">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-media alignwide">
			<?php if( has_post_thumbnail() ){?>
				<img src="<?php the_post_thumbnail_url();?>" alt="Card image cap">
			<?php } ?>
			</div>
			<?php the_content(); ?>
          </div>
	</div>
</article>
