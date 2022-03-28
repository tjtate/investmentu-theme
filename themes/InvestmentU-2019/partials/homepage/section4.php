<!-- video section -->
<div class="container-fluid py-4" id="section04" role="complementary">
  <div class="row">
    <div class="container">
      <div class="row">
        <?php
        $the_query = new WP_Query(array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => 3,
          'category_name' => 'video',
          'meta_key' => '_custom_post_order',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        ));

        if ($the_query->have_posts()) {

          while ($the_query->have_posts()) {
            $the_query->the_post();
            $isFirst = ($the_query->current_post == 0);

            if ($isFirst) { // ISFIRST

              $wistia = get_field('video_wistia_code');
              $youtube = get_field('youtube_link');

              function getYoutubeVideoId($string)
              {
                return explode('embed/', $string)[1];
              }
              ?>
                <div class="col-12 col-lg-6">
                  <div class="video-container">
                    <?php
                    if (!empty($wistia) && has_post_thumbnail()) {
                      wp_enqueue_script('investmentu-load-wistia', get_template_directory_uri() . '/dist/scripts/video-featured.min.js#asyncload', null, true);
                    ?>
                      <a href="#" class="video-featured-container embed-responsive-item" data-wistia="<?php echo $wistia; ?>">
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="video-featured-image" alt="<?php the_post_thumbnail_alt(); ?>" width="300" height="169" />
                        <svg class="video-featured-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z" />
                        </svg>
                      </a>
                    <?php
                    } elseif (!empty($youtube)) {



                      $yt_url = $youtube;
                      $yt_image_path = getYoutubeVideoId($youtube);
                      $thumb_alt = get_post_thumbnail_alt();

                      $constructed_srcdoc = <<<TXT
<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto; z-index: 1;}svg{position: absolute;display: block; transform: translate(-50%,-50%); width: 4em; height: 4em; top: 50%; left: 50%; z-index: 2; fill: #1e82c5;}</style><a href="${yt_url}?autoplay=1"><img src="https://img.youtube.com/vi/${yt_image_path}/maxresdefault.jpg" alt="Video ${thumb_alt}" loading="lazy"><svg class="video-featured-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z" /></svg></a>
TXT;
                    ?>

                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="<?php echo $youtube ?>" class="embed-responsive-item" srcdoc="<?php echo htmlspecialchars($constructed_srcdoc); ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="<?php the_post_thumbnail_alt() ?>" loading="lazy"></iframe>
                      </div>
                    <?php
                    } // end ELIF
                    ?>
                    <a href="<?php the_field('video_page_url'); ?>">
                      <h2 class="mt-3 p-black videoTitle"><?php the_title(); ?></h2>
                    </a>
                  </div>
                </div>
              <?php
              // end ISFIRST
            } else { // NOTFIRST
              ?>
              <article class="col-12 col-sm-6 col-lg-3">
                <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">

                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('featured-article-xs'); ?>" srcset="<?php the_post_thumbnail_url('featured-article-xs'); ?> 510w,
                      <?php the_post_thumbnail_url('featured-article-sm'); ?> 210w,
                      <?php the_post_thumbnail_url('featured-article-md'); ?> 255w" sizes="(min-width: 1000px) 510px, (min-width: 600px) 210px, 255px" class="featured-article-image img-fluid" alt="" width="510" height="287" loading="lazy" />
                  <?php else : ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="featured-article-image img-fluid" alt="" loading="lazy" />
                  <?php endif; ?>
                </a>
                <div class="featured-article-excerpt pt-2">
                  <?php
                  $category = get_the_category();
                  ?>
                  <a href="<?= esc_url(home_url('/')); ?>category/<?php echo $category[0]->slug; ?>/">
                    <span class="category-tag generic-color cat-<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></span>
                  </a>
                  <a href="<?php the_permalink(); ?>">
                    <h2 class="small-title"><?php the_title(); ?></h2>
                  </a>
                  <div class="p-black e-margin"><?php the_excerpt(); ?></div>
                  <span><a href="<?php the_permalink(); ?>" class="readmore">Watch Now &raquo;</a></span>
                </div>
              </article>
        <?php
            } // end NOTFIRST
          } // end WHILE
        } // end HAVEPOSTS
        ?>
      </div>
    </div>
  </div>
</div>
