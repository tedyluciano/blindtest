<?php


$context = $timber::get_context();
$post = new Timber\Post();;
$context['post'] = $post;
$context['title'] = $post->title();



$args = array(
    'post_type' => 'page',//it is a Page right?
    'post_status' => 'publish',
);
$the_query = new WP_Query($args);


 if ( $the_query->have_posts() ) :



endif;







$timber::render( array('page/page.twig' ), $context );