<?php 

function task_theme_scripts() {
	wp_enqueue_style('libs', get_template_directory_uri() . '/app/css/libs.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/app/css/style.min.css');
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_script('libs', get_template_directory_uri() . '/app/js/libs.min.js', array(), 1.0, true );
	wp_enqueue_script('script', get_template_directory_uri() . '/app/js/script.js', array(), 1.0, true );
}

add_action('wp_enqueue_scripts', 'task_theme_scripts');

function test_setup() {
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
	'width' => '180', 
	'height' => '40',
	));
	register_nav_menus(array(
	'top-menu' => 'top-menu',
	'footer-menu' => 'footer-menu',
));
}

add_action ('after_setup_theme', 'test_setup');


function task_theme_widgets_init(){
	register_sidebar(array(
		'name' => 'footer-menu',
		'id' => 'footer-menu',
		'description' => 'menu widget in footer',
		'class' => 'footer-menu',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
		'before_sidebar' => '', 
));
}

add_action('widgets_init', 'task_theme_widgets_init');


require get_template_directory() . '/inc/customizer.php';

