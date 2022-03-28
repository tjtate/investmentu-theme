<?php while (have_posts()) : the_post(); ?>
  <main>
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 col-md-12">
          <div class="row">
            <div class="col-10 mx-auto">
              <article>
                <div class="article-header mb-2">
                  <h1 class="page-title mb-4"><?php the_title(); ?></h1>
                </div>
                  <?php if(!empty(get_the_post_thumbnail_url())) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="float-right ml-3 mb-3 featured-image" alt="<?php if(!empty(get_the_post_thumbnail_caption())){ the_post_thumbnail_caption(); } else { the_title(); } ?>" loading="lazy" />
                  <?php endif; ?>
                <?php the_content(); ?>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
<?php endwhile; ?>
