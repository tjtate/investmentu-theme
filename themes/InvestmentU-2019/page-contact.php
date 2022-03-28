
  <?php while (have_posts()) : the_post(); ?>
    <main>
      <div class="container">
        <div class="row my-5">
          <div class="col-12 col-md-12">
            <div class="row">
              <div class="col-10 mx-auto">
                <article>
                  <div class="article-header mb-2">
                    <h1 class="page-title mb-4"><?php the_title(); ?></h1>
                  </div>
                  <?php the_content(); ?>
                  <div class="alert alert-secondary" id="alert" style="display: none;">
                    <h2>Thanks for reaching out.</h2>
                    <p>We will get in touch with you shortly.</p>
                  </div>
                  <form class="js-contact-form contactUs margin-top" id="contact_us_form"></form>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
  <?php endwhile; ?>
  <?php
  wp_enqueue_script('agora-contact-form', get_template_directory_uri() . '/assets/scripts/jquery.agora-contact-form.js', ['jquery'], true);
  wp_enqueue_script('investmentu-contact', get_template_directory_uri() . '/assets/scripts/contact.js', ['agora-contact-form'], true)
  ?>
