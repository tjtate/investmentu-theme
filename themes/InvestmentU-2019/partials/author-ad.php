
<?php $auth_id = get_the_author_meta('ID');
      $authorDescription = get_field('author_description', 'user_' . $auth_id);
?>
<?php

$terms = json_decode(json_encode(get_the_tags()), true);
$i = 0;

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
    <?php echo do_shortcode('[adzerk-get-ad zone="233475" size="4"]');
  ?>
  </div>

