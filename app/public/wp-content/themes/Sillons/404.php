<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

global $ede_options;

$context = $timber::get_context();
$context['options_'] = $ede_options;





$timber::render( '404/404.twig', $context );
