<?php
/**
 * Primary sidebar
 *
 * @package  Open Mart
 * @since 1.0.0
 */
$sidebar = apply_filters( 'open_mart_get_sidebar', 'sidebar-1' );
?>
<div id="sidebar-primary" class="sidebar-content-area  <?php echo esc_attr(apply_filters( 'open_mart_stick_sidebar_class',''));?>">
  <div class="sidebar-main">
    <?php
    if ( is_active_sidebar($sidebar) ){
    dynamic_sidebar($sidebar);
     }
    ?>
  </div> <!-- sidebar-main End -->
</div> <!-- sidebar-primary End -->                