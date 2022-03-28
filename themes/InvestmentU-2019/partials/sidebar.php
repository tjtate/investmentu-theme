<!-- MAKE THIS STICKY -->
<div class="col-12 col-md-4 sticky-top pb-5" role="complementary">
  <div class="sticky-top">
    <?php dynamic_sidebar('sidebar-primary'); ?>
    <?php
      echo '<div class="sidebar-ad col-12 p-0">';
      echo do_shortcode('[adzerk-get-ad zone="233472" size="3777"]');
      echo '</div>';
    ?>
    <h2 class="pb-2" style="border-bottom: 1px solid #d3d3d3;font-weight: bold; margin-top: 30px;">Popular Posts</h2>
    <nav class="nav-primary ">
      <?php
      if (has_nav_menu('sidebar_navigation')) :
        wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'h-popular-posts p-0 mb-4']);
      endif;
      ?>
    </nav>

  </div>
</div>
