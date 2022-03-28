<div class="row my-4 row-eq-height category-article-preview-row border-top related-category-posts pt-4">
  <?php $orig_post = $post;
  global $post;
  $categories = get_the_category($post->ID);
  if ($categories) {
    $category_ids = array();
    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args = array(
      'category__in' => $category_ids,
      'post__not_in' => array($post->ID),
      'posts_per_page' => 4, // Number of related posts that will be shown.
    );
  ?>
    <div class="col-12">
      <h2>Related Articles</h2>
    </div>
    <?php

    $my_query = new wp_query($args);
    if ($my_query->have_posts()) {
      while ($my_query->have_posts()) {
        $my_query->the_post();
        $date = get_the_date();
    ?>

        <div class="col-12 col-sm-6 col-lg-3">
          <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php if (has_post_thumbnail()) { ?>
              <img src="<?php the_post_thumbnail_url('related-posts-thumbnail'); ?>" class="small-featured-article-image img-fluid" alt="" loading="lazy" />
            <?php } else { ?>
              <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="small-featured-article-image img-fluid" alt="" loading="lazy" />
            <?php } ?>
          </a>
          <div class="small-featured-article-excerpt">
            <?php $category = get_the_category(); ?>
            <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
              <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
            </a>

            <a href="<?php the_permalink(); ?>">
              <strong><?php the_title(); ?></strong>
            </a>
            <p class="date-posted m-0 category-tag"><?php echo $date; ?> </p>
          </div>
        </div>

  <?php
      }
    }
  }
  $post = $orig_post;
  wp_reset_query();
  ?>
</div>
