<?php
/**
 * Template Name: Page with sidebar
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <main>
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 col-md-8">
          <div class="row">
            <div class="col-12">
              <article>
                <div class="article-header mb-3" role="banner">
                  <h1 class="page-title "><?php the_title(); ?></h1>
                </div>
                  <?php if(!empty(get_the_post_thumbnail_url())) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="float-right ml-3 mb-3 featured-image" alt="" loading="lazy" />
                  <?php endif; ?>
                  <div role="main">
                    <?php the_content(); ?>
                  </div>
              </article>
            </div>
          </div>

        </div>
        <!-- SIDEBAR -->
        <?php get_template_part('partials/sidebar'); ?>
      </div>
    </div>

  </main>
<?php endwhile; ?>
