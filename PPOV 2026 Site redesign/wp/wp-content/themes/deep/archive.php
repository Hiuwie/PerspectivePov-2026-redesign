<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package deep
 */

get_header();

/**
 * The function is located in the following path
 * deep/inc/class-deep-theme-init.php
 */
do_action( 'deep_theme_archive' );

get_footer();