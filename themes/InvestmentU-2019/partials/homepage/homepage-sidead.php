<div class="col-12 col-lg-3 d-none d-md-none d-lg-block sidebar-banner-ad">

  <?php
    if (!isset($_COOKIE['INVESTME'])):


        echo '<div class="sidebar-ad col-12 p-0">';
        echo do_shortcode('[adzerk-get-ad zone="233472" size="3777"]');
        echo '</div>';
    else :
  ?>
    <h2 class="p-blue m-0 pb-2" style="border-bottom: 1px solid #d3d3d3;">Popular Posts</h2>

    <nav class="nav-primary ">
        <?php
        if (has_nav_menu('sidebar_navigation')) :
            wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'h-popular-posts p-0']);
        endif;
        ?>
    </nav>
  <?php endif; ?>
</div>
<div class="col-md-12 d-block d-md-block d-lg-none mt-4 sidebar-ad">
  <?php echo do_shortcode('[adzerk-get-ad zone="233472" size="3777"]');
 ?>
</div>
