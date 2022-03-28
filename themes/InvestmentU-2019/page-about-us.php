<?php while (have_posts()) : the_post(); ?>
  <main>
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 col-md-8">
          <div class="row">
            <div class="col-12">
              <article>
                <div class="article-header mb-3">
                  <h1 class="page-title "><?php the_title(); ?></h1>
                </div>
                  <?php if(!empty(get_the_post_thumbnail_url())) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="float-right ml-3 mb-3 featured-image" alt="" loading="lazy" />
                  <?php endif; ?>
                <?php the_content(); ?>

                <!-- Lead gen ad for whichever franchise fits best -->
                <?php //get_template_part('partials/article-mid-ad'); ?>

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
