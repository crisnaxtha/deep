<?php
/**
 * yogbani Theme Customizer
 *
 * @package yogbani
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yogbani_customize_register( $wp_customize ) {

	$wp_customize->add_section('social_section' , array(
		'title' => 'Social Links' ,
		'description' => '' ,
		'priority' => 50 , 
	));

	$wp_customize->add_setting('social_links_fb');
	$wp_customize->add_setting('social_links_tw');
	$wp_customize->add_setting('social_links_u');


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook',
	array(
	'label' => 'Facebook',
	'section' => 'social_section',
	'settings' => 'social_links_fb',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'twitter',
	array(
	'label' => 'Twitter',
	'section' => 'social_section',
	'settings' => 'social_links_tw',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google',
	array(
	'label' => 'Youtube',
	'section' => 'social_section',
	'settings' => 'social_links_u',
	) ) );
	
}
add_action( 'customize_register', 'yogbani_customize_register' );
