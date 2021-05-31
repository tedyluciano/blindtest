<?php
/**
 * CONTROLLER HOME.
 */


$context = $timber::get_context();
$context['posts'] = $timber::get_posts();

global $ede_options;
$context['options_'] = $ede_options;



$tb_blog_layout = isset($ede_options['tb_blog_layout']) ? $ede_options['tb_blog_layout'] : '2cr';
$tb_show_page_title = isset($ede_options['tb_page_show_page_title']) ? $ede_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($ede_options['tb_page_show_page_breadcrumb']) ? $ede_options['tb_page_show_page_breadcrumb'] : 1;
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';

$context['tb_blog_layout'] = $tb_blog_layout;
$context['tb_show_page_title'] = $tb_show_page_title;
$context['tb_show_page_breadcrumb'] = $tb_show_page_breadcrumb;
$context['cl_content'] = $cl_content;

$context['left_sidebar'] = Timber::get_widgets('ede-left-sidebar');
$context['main_sidebar'] = Timber::get_widgets('ede-main-sidebar');
$context['right_sidebar'] = Timber::get_widgets('ede-right-sidebar');


if ( is_front_page() ) {
	array_unshift( $templates, 'front-page.twig' );
}
$templates = array( 'home.twig' );
$timber::render( $templates, $context );