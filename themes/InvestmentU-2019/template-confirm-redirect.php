<?php
/**
 * Template Name: Confirm Redirect
 */
?>

<script src="https://cdn.optimizely.com/js/1205141306.js"></script> 

<section class="container mt-3">
  <div class="row">
    <div class="col">
      <h1><?php the_title(); ?></h1>
      <?php
        /* Template Name: Confirm Page */
        while (have_posts()) : the_post();
        get_template_part('templates/content', 'page');
        endwhile;
      ?>
    </div>
  </div>
</section>


<script type="text/javascript">setTimeout(function(){window.location.href = "<?php echo home_url(); ?>";}, 10000)</script>