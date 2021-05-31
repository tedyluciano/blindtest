<?php

$context = $timber::get_context();
$post = new Timber\Post();;
$context['post'] = $post;
$context['title'] = $post->title();

global $ede_options;
$tb_blog_layout = isset($ede_options['tb_blog_layout']) ? $ede_options['tb_blog_layout'] : '2cr';
$tb_show_page_title = isset($ede_options['tb_page_show_page_title']) ? $ede_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($ede_options['tb_page_show_page_breadcrumb']) ? $ede_options['tb_page_show_page_breadcrumb'] : 1;
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';

$context['options_'] = $ede_options;
/*$context['tb_blog_layout'] = $tb_blog_layout;
$context['tb_show_page_title'] = $tb_show_page_title;
$context['tb_show_page_breadcrumb'] = $tb_show_page_breadcrumb;
$context['cl_content'] = $cl_content;*/

$context['category'] = get_the_category( get_the_ID() );


$timber::render( array('index.twig' ), $context );