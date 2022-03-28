<!-- headshot carousel -->

  <?php
  $args = array(
    'post_type' => 'page',
    'name' => 'homepage-experts-carousel',
    'posts_per_page' => 5
  );
  $the_query = new WP_Query($args);
  ?>
  <div class="container py-4" id="section06" role="complementary">
    <h2 class="mb-3 small-title">Meet the IU Einsteins</h2>
    <div class="container text-center my-3">
      <div class="row">
        <div id="expertCarousel" class="carousel">
          <button class="carousel-controls carousel-controls--prev" data-direction="prev">
            <span class="carousel-controls-icon carousel-controls-icon--prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <div class="carousel-inner row" role="listbox" aria-label="List of our Experts">
            <?php
            if (have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
                if (have_rows('experts')) :
                  $index = 0;
                  while (have_rows('experts')) :
                    the_row();
                    $classList = ['carousel-item', "carousel-item-{$index}", 'col-12', 'col-md-6', 'col-lg-4', 'col-xl-3'];
                    if ($index === 0) {
                      array_push($classList, "carousel-item-actived");
                    }
            ?>
                    <div class="<?php echo implode(" ", $classList); ?>" role="option" <?php if ($index === 0) echo 'aria-selected="true"' ?>>
                      <a href="<?php the_sub_field('expert_page_link'); ?>" title="<?php the_sub_field('expert_name'); ?>" class="carousel-item-link">
                        <img class="carousel-item-headshot" src="<?php the_sub_field('expert_headshot'); ?>" alt="" width="150" height="150" loading="lazy" />
                        <div class="carousel-item-content">
                          <strong class="carousel-item-title"><?php the_sub_field('expert_name'); ?></strong>
                          <p class="carousel-item-description"><?php the_sub_field('expert_title'); ?></p>
                        </div>
                      </a>
                    </div>
            <?php
                    ++$index;
                  endwhile;
                endif;
              endwhile;
            endif; ?>
          </div>
          <button class="carousel-controls carousel-controls--next" data-direction="next">
            <span class="carousel-controls-icon carousel-controls-icon--next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php
  wp_enqueue_style("investmentu-compound-interest-calculator-get-results-style", get_stylesheet_directory_uri() . "/dist/styles/meet-the-experts.css");
  wp_enqueue_script('script-meet-the-experts', get_stylesheet_directory_uri() . "/dist/scripts/meet-the-experts.min.js", null, true);
  ?>
