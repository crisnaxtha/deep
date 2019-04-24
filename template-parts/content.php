<?php
/**
 * Template part for displaying posts
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
              <div class="entry-meta-top">
				  <span class="entry-author"><i class="far fa-user"></i><?php the_author(); ?></span>
				  <span class="entry-meta-date"> <i class="far fa-clock"></i><?php the_time('F j, Y'); ?></span>
				  <span class="entry-comment-count"><a href="#"><i class="far fa-comment-alt"></i><?php echo get_comments_number(); ?></a></span>
				
              </div>
            </header>
            <div class="entry-media alignwide">
			<?php if( has_post_thumbnail() ){?>
				<img src="<?php the_post_thumbnail_url();?>" alt="Card image cap">
			<?php } ?>
			</div>
			<?php the_content(); ?>
          </div>
          <footer class="entry-footer">
            <!-- Entry Meta Bottom-->
            <div class="entry-meta-bottom">
              <ul class="entry-tags">
				<li class="tags-icon"><i class="fas fa-tags"></i></li>
				<?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
              </ul>
            </div>
            <!-- Post Author-->
            <div class="entry-author-container">
              <div class="row">
                <div class="col-md-3"><img class="rounded-circle avatar avatar-200 photo" alt="Author" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" height="200" width="200"></div>
                <div class="col-md-9"><small class="caps">Written by</small>
                  <h5 class="mb-2"><a href="" title="Posts" rel="author"><?php the_author_link(); ?></a></h5>
					<?php the_author_description() ?>
                  <ul class="list-inline mb-0">
					
					<!-- <li class="list-inline-item"><a href="<?php the_author_link(); ?> "><i class="fa fa-globe"></i></a></li> -->
					
                   
                  </ul>
                </div>
              </div>
            </div>
            <!-- Post navigation-->
            <div class="navigation post-navigation">
              <div class="row align-items-center text-center nav-links">
                
				<?php
					the_post_navigation( array(
						'prev_text' => '<div class="col-lg-6 mb-4 mb-lg-0 text-lg-left"><div class="nav-subtitle">' . __( 'Previous', 'magbook' ) . '</div> ' .
						'<div class="nav-title"><i class="fas fa-long-arrow-alt-left fa-lg mr-1"></i>%title</div></div>',
							
						'next_text' => '<div class="col-lg-6 mb-lg-0 text-lg-right"><div class="nav-subtitle">' . __( 'Next', 'magbook' ) . '</div> ' .
							'<div class="nav-title">%title<i class="fas fa-long-arrow-alt-right fa-lg ml-1"></i></div></div>',
						
					) );
					?>
              </div>
			</div>
			
        </footer>
	</div>
</article>
