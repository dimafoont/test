<?php
/**
 * test Theme Customizer
 *
 * @package test
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function test_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'test_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'test_customize_partial_blogdescription',
			)
		);
	}
	
	//test-task Custom Customizer
	$wp_customize->add_section('test_task_options', array(
		'title' => __('Front-page-options', 'test-task'),
		'priority' => 10,
	));
	//page-header-field
	$wp_customize->add_setting('test_task_page_header_custom', array(
		'default' => '',
	));
	$wp_customize->add_control(
		'test_task_page_header_custom',
		array(
			'label' => __('Page in header', 'test-task'),
			'section' => 'test_task_options',
			'type' => 'text',
		)
	);
	//about field
	$wp_customize->add_setting('test_task_about_custom', array(
		'default' => '',
	));
	$wp_customize->add_control(
		'test_task_about_custom',
		array(
			'label' => __('Page about', 'test-task'),
			'section' => 'test_task_options',
			'type' => 'text',
		)
	);
	//testimonial field
	$wp_customize->add_setting('test_task_testimonial_custom', array(
		'default' => '',
	));
	$wp_customize->add_control(
		'test_task_testimonial_custom',
		array(
			'label' => __('Category in testimonials', 'test-task'),
			'section' => 'test_task_options',
			'type' => 'text',
		)
	);
	//get in touch field
	$wp_customize->add_setting('test_task_getintouch_custom', array(
		'default' => '',
	));
	$wp_customize->add_control(
		'test_task_getintouch_custom',
		array(
			'label' => __('Get in touch content page', 'test-task'),
			'section' => 'test_task_options',
			'type' => 'text',
		)
	);
	
}
add_action( 'customize_register', 'test_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function test_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function test_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function test_customize_preview_js() {
	wp_enqueue_script( 'test-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'test_customize_preview_js' );
