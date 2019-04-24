<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DEEP
 */

?>



	
<!-- Footer-->
<footer class="site-footer bg-dark all-text-white">
      <div class="footer-top-area pt-8 pb-3">
        <div class="container">
          <div class="row large-gutters">
            <div class="col-lg-4 mb-4">
              <?php if(is_front_page()): ?>
                  <?php if (is_active_sidebar( 'deepmala_footer_section_1' ) ) : ?>
                    <?php dynamic_sidebar( 'deepmala_footer_section_1' ); ?>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="col-lg-4 mb-4">
            <?php if(is_front_page()): ?>
                  <?php if (is_active_sidebar( 'deepmala_footer_section_2' ) ) : ?>
                    <?php dynamic_sidebar( 'deepmala_footer_section_2' ); ?>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="col-lg-4 mb-4">
            <?php if(is_front_page()): ?>
                  <?php if (is_active_sidebar( 'deepmala_footer_section_3' ) ) : ?>
                    <?php dynamic_sidebar( 'deepmala_footer_section_3' ); ?>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom-area py-4">
        <div class="container py-2">
          <div class="row large-gutters">
            <div class="col-md-6">
              <div class="footer-widget">
                <p class="m-md-0">© 
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'deepmala' ), 'deepmala', '<a href="http://www.krishnaharishrestha.com.np">Lochan</a>' );
				?>
				</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="footer-widget">
                
                  
                <?php
                wp_nav_menu( array(
              'theme_location' => 'footer-menu-1',
              'items_wrap'     => '<ul class="list-inline m-0 p-0 text-md-right footer-nav">%3$s</ul>',
              'depth' => 1,

          ) ); ?>
               
              </div>
            </div>
          </div>
        </div>
      </div>
</footer>
<!-- End Footer-->
		
<?php wp_footer(); ?>

</body>
</html>
