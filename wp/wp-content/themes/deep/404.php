<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package deep
 */

get_header();

/**
* The function is located in the following path
* deep/inc/class-deep-theme-init.php
*/
do_action( 'deep_theme_notfound_page' );

get_footer();
