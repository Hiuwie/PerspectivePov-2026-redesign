<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package  Open Mart
 * @since 1.0.0
 */ 
?>
<footer>
         <?php 
          // top-footer 
          do_action( 'open_mart_top_footer' ); 
          // widget-footer
		      do_action( 'open_mart_widget_footer' );
		      // below-footer
          do_action( 'open_mart_below_footer' );  
        ?>
     </footer> <!-- end footer -->
    </div> <!-- end openmart-site -->
<?php wp_footer(); ?>
</body>
</html>