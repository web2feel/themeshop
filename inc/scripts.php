<?php
if(!function_exists('edds_load_scripts')) {
	function edds_load_scripts() {
	
		// scripts
		wp_enqueue_script('jquery');
		wp_enqueue_script('superfish', EDDS_THEME_URL . '/js/superfish.js');
		wp_enqueue_script('fancybox', EDDS_THEME_URL . '/js/jquery.fancybox.pack.js');
		wp_enqueue_script('flexslider', EDDS_THEME_URL . '/js/jquery.flexslider-min.js');
		wp_enqueue_script('scripts', EDDS_THEME_URL . '/js/scripts.js');
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );		

	
		// styles
		wp_enqueue_style('styles', EDDS_THEME_URL . '/style.css');
		wp_enqueue_style('flexcss', EDDS_THEME_URL . '/css/flexslider.css'); // 960 grid
		wp_enqueue_style('fancycss', EDDS_THEME_URL . '/css/jquery.fancybox.css'); // 960 grid
		wp_enqueue_style('grid', EDDS_THEME_URL . '/css/960.css'); // 960 grid
		
		
	}
	}
add_action('wp_enqueue_scripts', 'edds_load_scripts');