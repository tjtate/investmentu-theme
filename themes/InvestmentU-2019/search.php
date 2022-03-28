
<main>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-8"> 
            <?php get_template_part('templates/page', 'header'); ?>

            <?php if (!have_posts()) : ?>
              <div class="alert alert-warning">
                <?php _e('Sorry, no results were found.', 'sage'); ?>
              </div>
              <?php get_search_form(); ?>
            <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/content', 'search'); ?>
            <?php endwhile; ?>
            
            <?php iu_pagination(); ?>
            <?php //the_posts_navigation(); ?>

                
            </div>
            <!-- SIDEBAR -->
            <?php get_template_part('partials/sidebar'); ?>
        </div>       
    </div>
  </main>

