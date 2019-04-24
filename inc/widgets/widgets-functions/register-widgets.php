<?php
/**
 * Custom template widgets register for this theme
 *
 * 
 *
 * @package DEEP
 */
/**************** DEEPMALA REGISTER WIDGETS ***************************************/

 add_action('widgets_init', 'deepmala_widgets_init');
 function deepmala_widgets_init() {

    register_sidebar(array(
        'name' => __('DM: Main Sidebar', 'deepmala'),
        'id' => 'deepmala_main_sidebar',
        'description' => __('Shows widgets at Main Sidebar.', 'deepmala'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('DM: Top Header Info', 'deepmala'),
        'id' => 'deepmala_header_info',
        'description' => __('Shows widgets on all page.', 'deepmala'),
        'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('DM: Slider Section', 'deepmala'),
        'id' => 'deepmala_slider_section',
        'description' => __('Use any Slider Plugins and drag that slider widgets to this Slider Section.', 'deepmala'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Deepmala Front-Page Section', 'deepmala'),
        'id' => 'deepmala_template_section',
        'description' => __('Shows widgets only on Deepmala Template.', 'deepmala'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Deepmala Front-Page Sidebar Section', 'deepmala'),
        'id' => 'deepmala_template_sidebar_section',
        'description' => __('Shows widgets only on Deepmala Template Sidebar.', 'deepmala'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Deepmala First Footer Section', 'deepmala'),
        'id' => 'deepmala_footer_section_1',
        'description' => __('Shows widgets on First Footer Section.', 'deepmala'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Deepmala Second Footer Section', 'deepmala'),
        'id' => 'deepmala_footer_section_2',
        'description' => __('Shows widgets on Second Footer Section', 'deepmala'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Deepmala Third Footer Section', 'deepmala'),
        'id' => 'deepmala_footer_section_3',
        'description' => __('Shows widgets on Third Footer Section', 'deepmala'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    //Register Widget.
	register_widget( 'Deepmala_Most_Read_Widget' );
	register_widget( 'Deepmala_Slider_Widget' );
	register_widget( 'Deepmala_Category_Widget' );

 }