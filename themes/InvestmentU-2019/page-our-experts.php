<!-- top banner -->
<section class="container-fluid p-0">
  <div class="row guru-banner">
    <?php while (have_posts()) : the_post(); ?>
    <?php endwhile; ?>
    <div class="guru-wrapper col-md-12 p-0 d-none d-md-block">
      <img src="<?php echo get_stylesheet_directory_uri() . "/dist/images/meet-our-gurus-UPDATED.png" ?>" usemap="#image-map" class="guru-banner-img img-fluid" style="width:100%" alt="Our Experts: David Fessler, Alpesh Patel, Matt Carr, Marc Lichtenfeld, Karim Rahemtulla, Alex Green, Bryan Bottarelli, Andy Snyder, and Nicholas Vardy" />
      <a href="#dfessler" title="David Fessler" style="position: absolute; left: 5.6%; top: 8.04%; width: 2.89%; height: 9.18%; z-index: 2;" data-toggle="modal" data-target="#dfessler"></a>
      <a href="#apatel" title="Alpesh Patel" style="position: absolute; left: 16.3%; top: 9.15%; width: 2.95%; height: 9.75%; z-index: 2;" data-toggle="modal" data-target="#apatel"></a>
      <a href="#mcarr" title="Matt Carr" style="position: absolute; left: 27.1%; top: 3.27%; width: 2.83%; height: 9.37%; z-index: 2;" data-toggle="modal" data-target="#mcarr"></a>
      <a href="#mlichtenfeld" title="Marc Lichtenfeld" style="position: absolute; left: 37.82%; top: 4.97%; width: 2.89%; height: 9.37%; z-index: 2;" data-toggle="modal" data-target="#mlichtenfeld"></a>
      <a href="#krahemtulla" title="Karim Rahemtulla" style="position: absolute; left: 48.58%; top: 3.1%; width: 2.89%; height: 8.99%; z-index: 2;" data-toggle="modal" data-target="#krahemtulla"></a>
      <a href="#agreen" title="Alex Green" style="position: absolute; left: 59.3%; top: 4.88%; width: 2.89%; height: 9.18%; z-index: 2;" data-toggle="modal" data-target="#agreen"></a>
      <a href="#bryan-bottarelli" title="Bryan Bottarelli" style="position: absolute; left: 70.05%; top: 1.82%; width: 2.94%; height: 9.18%; z-index: 2;" data-toggle="modal" data-target="#bryan-bottarelli"></a>
      <a href="#asnyder" title="Andy Snyder" style="position: absolute; left: 80.85%; top: 3.37%; width: 2.89%; height: 9.56%; z-index: 2;" data-toggle="modal" data-target="#asnyder"></a>
      <a href="#nvardy" title="Nicholas Vardy" style="position: absolute; left: 91.6%; top: 3.64%; width: 2.71%; height: 9.37%; z-index: 2;" data-toggle="modal" data-target="#nvardy"></a>
    </div>
</section>

<!-- title -->
<section class="container-fluid" id="guru-header">
  <h1 class="text-light pb-2 text-center guru-header">IU Einsteins</h1>
</section>
<!-- List of all Gurus -->
<section class="container my-5 our-gurus">
  <div class="card-group">
    <?php
    $args  = array(
      'role__in' => array('author'),
      'meta_query' => array(
        array(
          'key'   => 'add_to_guru_page',
          'value' => '1',
        ),
      ),
    );
    $query    = get_users($args);

    function cmp($a, $b)
    {
      if ($a->order == $b->order) {
        return 0;
      }
      return ($b->order > $a->order) ? -1 : 1;
    }

    usort($query, 'cmp');
    $total_query = count($query);
    foreach ($query as $q) { ?>
      <?php
      $is_guru = get_field('add_to_guru_page', 'user_' . $q->ID);
      if ($is_guru == true) {
      ?>
        <div class="card col-md-4 justify-content-center p-0" style="min-width: 21rem;" id="users">
          <div class="guru-content-wrapper my-4">
            <div class="col-8 offset-2">
              <a data-toggle="modal" data-target="#<?php the_field('modal_class', 'user_' . $q->ID); ?>">
                <img src="<?php the_field('author_headshot', 'user_' . $q->ID); ?>" class="headshot img-fluid card-img-top" alt="<?php the_title(); ?>" loading="lazy" />
              </a>
            </div>
            <div class="card-body">
              <div class="guru-intro text-center">
                <h2 class="card-title mb-1"><?php echo get_the_author_meta('display_name', $q->ID);  ?></h2>
                <p class="guru-title"><?php the_field('author_title', 'user_' . $q->ID); ?></p>
              </div>
              <?php the_field('author_excerpt', 'user_' . $q->ID); ?>
              <a href="/author/<?php the_field('modal_class', 'user_' . $q->ID); ?>">
                <p class="read-more">Read More</p>
              </a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="<?php the_field('modal_class', 'user_' . $q->ID); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_field('modal_class', 'user_' . $q->ID); ?>Label" aria-hidden="true">
          <div class="modal-dialog <?php the_field('modal_class', 'user_' . $q->ID); ?>" role="document">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="modal-body px-5 pb-4 pt-0">
                <div class="col-4 offset-4">
                  <img src="<?php the_field('author_headshot', 'user_' . $q->ID); ?>" class="headshot img-fluid card-img-top" alt="<?php the_title(); ?>" loading="lazy" />
                </div>
                <div class="guru-intro text-center">
                  <h5 class="card-title mb-1"><?php echo get_the_author_meta('display_name', $q->ID); ?></h5>
                  <p class="guru-title"><?php the_field('author_title', 'user_' . $q->ID); ?></p>
                </div>
                <?php the_field('author_description', 'user_' . $q->ID); ?>
                <a href="/author/<?php the_field('modal_class', 'user_' . $q->ID); ?>">
                  <p class="read-more">Read More</p>
                </a>
              </div>
            </div>
          </div>
        </div>

    <?php }
    } ?>
  </div>
</section>
