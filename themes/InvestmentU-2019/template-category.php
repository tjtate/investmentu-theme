<?php
/**
 * Template Name: Intro category Template
 */
?>

<main>
    <div class="container">
      <div class="row mt-4 mb-5">
        <div class="col-12 col-md-8">
            <?php while (have_posts()) : the_post(); ?>
                <div role="banner">
                <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
                <div role="complementary">
                  <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- SIDEBAR -->
          <?php get_template_part('partials/sidebar'); ?>
      </div>

      <div class="row">
        <div class="col-12">
          <?php get_template_part('partials/category-bottom-ad'); ?> <!-- Bottom Ad -->
        </div>
      </div>
    </div>


    <?php get_template_part('partials/homepage/section4'); ?> <!-- video section -->
    <?php get_template_part('partials/homepage/section5'); ?> <!-- other links section -->
</main>
