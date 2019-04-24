<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DEEP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'deepmala' ); ?></a> -->
 <!-- Navbar-->
 <div class="site-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 ><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p><a  class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				 ?>
			
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            
   
                <?php
                wp_nav_menu( array(
              'theme_location' => 'menu-header',
              'menu_class' => 'navbar-nav ml-auto',
              'menu_id'     => 'navbar',
              'items_wrap'     => '<ul class="navbar-nav ml-auto">%3$s</ul>',
              'depth' => 1,

          ) ); ?>
       
   
              <ul class="navbar-nav ml-auto">
              <!-- Search bar-->
              <li class="nav-item-search">
                <!-- <form class="form-inline navbar-search-bar">
                  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form> -->
                <div class="form-inline">
                <?php get_search_form(true) ; ?>
                </div>
              </li>
              <!-- Social nav-->
              <li class="nav-item-social-nav d-flex align-items-center">
                <a class="text-light-blue" href="<?php if ( get_theme_mod( 'social_links_tw' ) ) : ?><?php echo get_theme_mod( 'social_links_tw' ); ?><?php endif; ?>"><i class="fab fa-twitter"></i></a>
                <a class="text-dark-blue" href="<?php if ( get_theme_mod( 'social_links_fb' ) ) : ?><?php echo get_theme_mod( 'social_links_fb' ); ?><?php endif; ?>"><i class="fab fa-facebook"></i></a>
                <a class="text-red" href="<?php if ( get_theme_mod( 'social_links_u' ) ) : ?><?php echo get_theme_mod( 'social_links_u' ); ?><?php endif; ?>"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- End Navbar-->
	
