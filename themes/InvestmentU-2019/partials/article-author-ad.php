<hr style="color:#bdbdbd"/>
<?php $auth_id = get_the_author_meta('ID');
$authorDescription = get_field('author_description', 'user_' . $auth_id);
if ( ! empty ( $authorDescription ) ) {
  ?>

  <h2>About <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?php echo get_the_author(); ?></a></h2>
  <p><?php echo $authorDescription; ?></p>
  <!-- <h6>Like what you’re reading from <?php // get_the_author(); ?>? Sign up for his eletter, <?php // echo get_post_meta( $post->ID, 'publication-source', true); ?>.</h6> -->

<?php } ?>

<?php

$terms = json_decode(json_encode(get_the_tags()), true);

if ($terms && !is_front_page()) {

  foreach ($terms as $item) {

    if (strpos($item['slug'], 'zone') !== false) {
      $is_syndicated = 'true';
      break;
    }
  }
}

?>
<div class="native-leadgen-signup">
        <?php echo do_shortcode('[adzerk-get-ad zone="233475" size="4"]'); ?>
      </div>
