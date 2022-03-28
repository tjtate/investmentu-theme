<!-- lower article previews section -->
<?php
$page = get_page_by_path( 'homepage-featured-posts' );
$pageID = $page->ID;

?>
<div class="container" id="section03" role="complementary">
  <div class="row my-4 row-eq-height">
    <?php for($i = 1; $i < 4; $i++):
          $field = 'featured_article_' . $i;
          $post = get_field($field, $pageID);
          if($post && !get_field('hide_from_homepage', $post->ID)){
            setup_postdata($post);
          }else{
            $post = array_shift($posts);
            setup_postdata($post);
          }
         ?>
        <article class="col-12 col-md-4 col-lg-3">
          <a href="<?php the_permalink(); ?>" class="featured-article-image" aria-hidden="true" tabindex="-1">
            <?php if (has_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('featured-article-xs'); ?>" srcset="<?php the_post_thumbnail_url('featured-article-xs'); ?> 510w,
                      <?php the_post_thumbnail_url('featured-article-sm'); ?> 210w,
                      <?php the_post_thumbnail_url('featured-article-md'); ?> 255w"
                      sizes="(min-width: 1000px) 510px, (min-width: 600px) 210px, 255px"  class="featured-article-image img-fluid" alt="" width="510" height="287" loading="lazy" />
            <?php else : ?>
              <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="featured-article-image img-fluid" alt="" loading="lazy" />
            <?php endif; ?>
          </a>
          <div class="featured-article-excerpt pt-2">
            <?php $category = get_the_category(); ?>
            <?php if (in_category(array('dividend-stocks', 'marijuana-stocks', 'financial-freedom', 'financial-literacy', 'investment-opportunities', 'tech-stocks'))) { ?>
              <a href="<?= esc_url(home_url('/')); ?><?php echo $category[0]->slug; ?>/">
              <?php } else { ?>
                <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
                <?php } ?>
                <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
                </a>
                <a href="<?php the_permalink(); ?>">
                  <strong class="small-title m-0"><?php the_title(); ?></strong>
                </a>
                <?php get_template_part('partials/homepage/article-date'); ?>
                <div class="p-black e-margin"><?php print_excerpt(150); ?></div>
                <span><a href="<?php the_permalink(); ?>" class="readmore">Read More &raquo;</a></span>
          </div>
        </article>
    <?php endfor; ?>

    <?php get_template_part('partials/homepage/homepage-sidead'); ?>
  </div>
</div>
