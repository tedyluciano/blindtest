<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


$context = $timber::get_context();
$post = $timber::query_post();
$context['post'] = $post;

$templates = array( 'single/single.twig' );
$timber::render( $templates, $context );