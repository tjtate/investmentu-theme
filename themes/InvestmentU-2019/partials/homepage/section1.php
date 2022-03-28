<!-- top article previews section -->
<?php //<!-- <p>Today's date echo date('F jS Y'); </p> -->
$posts = get_transient( 'homepage_posts' );
if ( false === $posts ) {
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 7,
    'category__not_in' => array(7228),
    'meta_query' => array(
      'relation' => 'OR',
       array(
           'key'     => 'hide_from_homepage',
           'value'   => 0,
           'compare' => '='
       ),
       array(
           'key'     => 'hide_from_homepage',
           'compare' => 'NOT EXISTS',
       ),
   )
  );

  $posts = new WP_Query( $args );

  // Sets transient for one day duration
  set_transient( 'homepage_posts', $posts, DAY_IN_SECONDS );
}
$posts = $posts->posts;
$page = get_page_by_path( 'homepage-featured-posts' );
$pageID = $page->ID;
?>
<div class="container" id="section01" role="complementary">
  <h1>InvestmentU</h1>
  <div class="row my-4 row-eq-height">
    <?php
    $post = get_field('big_featured_article', $pageID);
    if($post && !get_field('hide_from_homepage', $post->ID)){
      setup_postdata($post);
    }else{
      $post = array_shift($posts);
      setup_postdata($post);
    }
    ?>
          <article class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
              <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('big-featured-article-xs'); ?>" srcset="<?php the_post_thumbnail_url('big-featured-article-xs'); ?> 510w,
                      <?php the_post_thumbnail_url('big-featured-article-sm'); ?> 330w,
                      <?php the_post_thumbnail_url('big-featured-article-md'); ?> 210w,
                      <?php the_post_thumbnail_url('big-featured-article-lg'); ?> 255w"
                      sizes="(min-width: 1200px) 510px, (min-width:1000px) 330px, (min-width: 600px) 210px, 255px" alt="" width="510" height="287" class="big-featured-article-image img-fluid first-post" loading="lazy" />
              <?php else : ?>
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="big-featured-article-image img-fluid first-post" alt="" loading="lazy" />
              <?php endif; ?>
            </a>
          </article>
          <article class="col-12 col-md-6 col-lg-3 main-featured-article-excerpt">
            <?php $category = get_the_category(); ?>
            <a href="<?= esc_url(home_url('/')); ?><?php echo $isInSpecialCategories ? '' : 'category/' ?><?php echo $category[0]->slug; ?>/">
              <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
            </a>
            <a href="<?php the_permalink(); ?>">
              <strong class="mb-0"><?php the_title(); ?></strong>
            </a>
            <?php get_template_part('partials/homepage/article-date'); ?>
            <div class="p-black e-margin"><?php print_excerpt(150); ?></div>
            <span><a href="<?php the_permalink(); ?>" class="readmore">Read More &raquo;</a></span>
          </article>
        <?php
        wp_reset_postdata();
        for($i = 1; $i < 4; $i++):
          $field = 'small_featured_article_' . $i;
          $post = get_field($field, $pageID);
          if($post && !get_field('hide_from_homepage', $post->ID)){
            setup_postdata($post);
          }else{
            $post = array_shift($posts);
            setup_postdata($post);
          }
        ?>
          <article class="col-12 col-md-4 col-lg-2 mb-3 mb-lg-0">
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
              <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('small-featured-article-xs'); ?>" srcset="<?php the_post_thumbnail_url('small-featured-article-xs'); ?> 510w,
                      <?php the_post_thumbnail_url('small-featured-article-sm'); ?> 210w,
                      <?php the_post_thumbnail_url('small-featured-article-md'); ?> 130w,
                      <?php the_post_thumbnail_url('small-featured-article-lg'); ?> 160w"
                      sizes="(min-width: 1200px) 510px, (min-width: 1000px) 210px, (min-width: 600px) 160px, 130px" class="small-featured-article-image img-fluid" alt="" width="510" height="287" loading="lazy" />
              <?php else : ?>
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="small-featured-article-image img-fluid" alt="" loading="lazy" />
              <?php endif; ?>
            </a>
            <div class="small-featured-article-excerpt pt-2">
              <?php $category = get_the_category(); ?>
              <a href="<?= esc_url(home_url('/')); ?><?php echo $isInSpecialCategories ? '' : 'category/' ?><?php echo $category[0]->slug; ?>/">
                <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
              </a>
              <a href="<?php the_permalink(); ?>">
                <strong class="m-0"><?php the_title(); ?></strong>
              </a>
              <?php get_template_part('partials/homepage/article-date'); ?>
            </div>
          </article>

    <?php
    wp_reset_postdata();
  endfor; ?>
  </div>
</div>
