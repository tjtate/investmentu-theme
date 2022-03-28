<?php
/**
 * Template Name: Feed Template
 */
$uri = $_SERVER['REQUEST_URI'];
$cat = $_GET['cat'];
$search = $_GET['search'];
$page = parse_url($uri);
$page = explode('/', $page['path']);
if(isset($page[3])){
  $page = $page[3];
} else {
  $page = '';
}
$pageLink = get_permalink();
$args = array(
  'post_type'=> 'post',
  'orderby'    => 'ID',
  'post_status' => 'publish',
  'order'    => 'DESC',
  'posts_per_page' => 12 // this will retrive all the post that is published
  );
if($cat != ''){
  $args['cat'] = $cat;
}
if($search != ''){
  $args['s'] = $search;
}
if($page != ''){
  $args['paged'] = $page;
}

$the_query = new WP_Query( $args );
?>

<main class="secure-feed">
    <div class="container">
    <form role="search" method="get" class="search-form" action="<?php echo $pageLink; ?>">
      <label for="header-search-form">
        <input class="search-field" type="text" id="search" name="search" placeholder="Search">
        <div class="secure-feed-category">
          <?php wp_dropdown_categories( 'show_option_none=Select category' ); ?>
        </div>
        <button class="btn-primary search-submit" type="submit" id="search-button">search</button>
      </label>
    </form>
      <div class="container">
        <div class="row">
            <div class="col-12 row">
                <h1 class="page-title col-12"><?php single_cat_title(); ?></h1>
                <?php if ( $the_query->have_posts() ) : $count = 0;?>
                  <?php
                  // The Loop
                  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="secure-feed-post col-lg-3 col-md-4">
                      <div>
                        <?php $date = get_the_date(); ?>
                          <a href="<?php the_permalink(); ?>">
                          <?php if ( has_post_thumbnail() ) { ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid" alt="<?php if(!empty(get_the_post_thumbnail_caption())){ the_post_thumbnail_caption(); } else { the_title(); } ?>" loading="lazy" />
                          <?php } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-default-image.jpg" class="img-fluid" alt="<?php if(!empty(get_the_post_thumbnail_caption())){ the_post_thumbnail_caption(); } else { the_title(); } ?>" loading="lazy" />
                          <?php } ?>
                        </a>
                      </div>
                      <div>
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                        <p class="articleDate publication-source"><?php echo $date; ?></p>
                        <div class="article_preview d-none d-sm-block"><?php the_excerpt(); ?></div>
                      </div>
                    </div>
                <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                <div class="col-12">
                  <?php new_iu_pagination($the_query); ?>
                </div>
            </div>
          </div>
        </div>
    </div>
  </main>
  <script type="text/javascript">
    <!--
    var dropdown = document.getElementById("cat");
    var url = document.getElementById("search-form").getAttribute('action');
    function onCatChange() {
        if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
            location.href = url + "?cat="+dropdown.options[dropdown.selectedIndex].value;
        }
    }
    dropdown.onchange = onCatChange;
    -->
</script>

<?php
  wp_reset_query();
  ?>
