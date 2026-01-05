<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Open Mart
 * @since 1.0.0
 */
get_header();
if(empty(get_post_meta( $post->ID, 'open_mart_sidebar_dyn', true ))){
$open_mart_sidebar = 'no-sidebar';
}else{
$open_mart_sidebar = get_post_meta( $post->ID, 'open_mart_sidebar_dyn', true );
}
?>
<div id="content" class="page-content archive  <?php echo esc_attr($open_mart_sidebar); ?>">
            <div class="content-wrap" >
                <div class="container">
                    <div class="main-area">
                        <div id="primary" class="primary-content-area">
                            <div class="page-head">
                   <?php open_mart_get_page_title();?>
                   <?php open_mart_breadcrumb_trail();?>
                            </div>
                            <div class="primary-content-wrap">
                                 <?php
            if( have_posts()):
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
                
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;

           open_mart_post_loader();
            ?>
                           </div> <!-- end primary-content-wrap-->
                        </div> <!-- end primary primary-content-area-->
                        <?php if(open_mart_is_blog()){
                               if(get_post_meta(get_option( 'page_for_posts' ),$open_mart_sidebar)!='no-sidebar'){
                                            get_sidebar();
                            }
                        } ?><!-- end sidebar-primary  sidebar-content-area-->
                    </div> <!-- end main-area -->
                </div>
            </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>