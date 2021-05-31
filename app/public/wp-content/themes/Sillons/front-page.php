<?php


use Timber\Post;
$post = new Post();

$context = $timber::get_context();
$context['post'] = $post;

$context['title'] = 'Front-page';
$context['is_front_page'] = true;
$timber::render(array('front/front-page.twig'), $context);