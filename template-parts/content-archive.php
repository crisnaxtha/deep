<?php
/**
 * Template part for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DEEP
 */

?>
<div class="col-lg-6">
  <article>
    <figure class="entry-media">
    <?php if( has_post_thumbnail() ){?>
        <img class="lozad"  data-src="<?php the_post_thumbnail_url(); ?>" />
    <?php } ?>
    </figure>
    <div class="entry-content-wrapper">
      <header class="entry-header">
        <div class="entry-meta-top">
            <span class="entry-meta-date"> <i class="far fa-clock"></i><?php the_time('F j, Y'); ?></span>
            <span class="entry-comment-count"><a href="#"><i class="far fa-comment-alt"></i><?php echo get_comments_number(); ?></a></span>
        </div>
        <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
      </header>
      <div class="entry-content">
        <p><?php the_excerpt() ?></p>
      </div>
    </div>
  </article>
</div>
           

      