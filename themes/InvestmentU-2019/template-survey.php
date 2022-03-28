<?php
/**
 * Template Name: IU Survey Sign Up Page
 */
?>
<?php
    wp_enqueue_style("iu-coreg-css", get_stylesheet_directory_uri() . "/dist/styles/coreg.css");
    wp_enqueue_script('iu-coreg-js', get_template_directory_uri() . '/dist/scripts/coreg.min.js#asyncload', ['jquery'], true);
?>
<?php while (have_posts()) : the_post(); ?>
  <main>
    <div class="container">
      <div class="row mt-4 justify-content-center">
        <div class="col col-lg-8">
          <article>
            <div class="article-header mb-2">
              <h1 class="page-title mb-4"><?php the_title(); ?></h1>
            </div>
          </article>
        </div>
      </div>
    </div>
    <div class="container sticky-top email-container">
        <div class="row justify-content-center">
          <form class="input-group py-3 col-12 col-md-8" style="border-bottom: 1px solid #ddd" id="form">
            <input class="form-control email" id="Email" name="Email" type="email" placeholder="Enter Email Address">
            <div class="input-group-append">
                <button type="submit" class="input-group-text coreg-submit btn btn-primary">Sign Me Up!</button>
            </div>
            <p style="margin-top: 1em !important; margin-bottom: 0em !important; font-size: 0.85em;">By submitting your email address, you will receive a free subscription to any of the services you select below, and offers from us and our affiliates that we think might interest you. You can unsubscribe at any time. | <a href="https://investmentu.com/privacy-policy-2/">Privacy Policy</a></p>
          </form>
        </div>
        <div class="row justify-content-center">
        </div>
        <div class="row justify-content-center">
            <div class="my-2 col-md-8">
            <div class="submit-message"></div>
            </div>
        </div>
    </div>
    </section>
    <div class="container">
      <div class="row pt-3 justify-content-center">
        <div class="col col-lg-8">
          <article>
            <?php the_content(); ?>
            <label class="sr-only" for="Email">Email Address</label>
          </article>
        </div>
      </div>
    </div>
  </main>
  <section class="iframe"></section>
<?php endwhile; ?>
