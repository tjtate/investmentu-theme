<?php

/**
 * Template Name: Sitemap
 */
?>
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
              <?php get_template_part('partials/sitemap'); ?>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
