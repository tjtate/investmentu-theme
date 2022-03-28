<!-- ?? grey banner section -->
<?php

$args = array(
  'post_type' => 'page',
  'name' => 'homepage-categories',
  'posts_per_page' => '1'
);

$the_query = new WP_Query($args);

if (have_posts()) {
  while ($the_query->have_posts()) {
    $the_query->the_post();
?>
    <section class="container-fluid py-4" id="section02" role="complementary">
      <div class="row">
        <div class="container">
            <div class="row">
            <?php
            if (have_rows('categories')) {
              while (have_rows('categories')) {
                the_row();
            ?>
               <div class="col-12 col-md-4 pb-3 pb-md-0">
               <?php $url = get_sub_field('category_slug'); ?>
                        <a href="<?php echo esc_url($url); ?>">
                    <div class="row align-items-center">
                      <div class="col-3 col-md-12 col-lg-3 mb-md-2 align-middle">
                          <img src="<?php the_sub_field('category_icon'); ?>" class="img-fluid mx-auto d-block" alt="" loading="lazy" />
                      </div>
                      <div class="col-9 col-md-12 col-lg-9">
                          <strong class="text-left text-md-center text-lg-left"><?php the_sub_field('category_title'); ?></strong>
                          <div aria-hidden="true" tabindex="-1" class="p-black d-none d-md-block"><?php the_sub_field('category_exerpt'); ?></div>
                        </div>
                    </div>
                  </a>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
<?php
  }
}
?>
