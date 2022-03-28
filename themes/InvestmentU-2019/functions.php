<?php

/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  //'lib/ads.php',    // Article mid ad
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/pagination.php', // Pagination
  'lib/recent-posts.php' // category page recent posts

];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Bootstrap Navigation
 */
// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';

// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length($length)
{
  return 10;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

// Authors Related articles

function get_related_author_posts()
{
  global $authordata, $post;

  $authors_posts = get_posts(array('author' => $authordata->ID, 'post__not_in' => array($post->ID), 'posts_per_page' => 4));
  $author_post_output = '';

  foreach ($authors_posts as $authors_post) {
    $category = get_the_category($authors_post->ID);
    $thumb = get_the_post_thumbnail_url($authors_post->ID, 'post-thumbnail');
    if (!empty($thumb)) {
      $thumb = get_the_post_thumbnail_url($authors_post->ID, 'post-thumbnail');
    } else {
      $thumb = 'https://s3.amazonaws.com/assets.investmentu.com/iu-default-image.jpg';
    }

    if (!empty(get_the_post_thumbnail_caption())) {
      $img_alt = get_the_post_thumbnail_caption();
    } else {
      $img_alt = get_the_title();
    }

    $author_post_output .= '<div class="col-12 col-sm-6 col-lg-3">
    <a href="' . get_permalink($authors_post->ID) . '#" aria-hidden="true" tabindex="-1">
    <img src="' . $thumb . '" class="small-featured-article-image img-fluid" alt="" loading="lazy" />
    </a>
    <div class="small-featured-article-excerpt">
    <a href="' . esc_url(home_url()) . '/category/' .  $category[0]->slug . '/">
    <span class="category-tag generic-color cat-' . $category[0]->slug . ' ">' . $category[0]->cat_name . '</span>
    </a>
    <strong><a href="' . get_permalink($authors_post->ID) . '">' . apply_filters('the_title', $authors_post->post_title, $authors_post->ID) . '</a></strong>
    <p class="date-posted m-0 category-tag">' . get_the_date('F j, Y', $authors_post->ID) . '</p>

    </div>
    </div>';
  }
  return $author_post_output;
}

function custom_video_cat_template($single_template)
{
  global $post;
  if (in_category('video')) {
    $single_template = dirname(__FILE__) . '/single-video.php';
  }
  return $single_template;
}
add_filter("single_template", "custom_video_cat_template");


function create_post_type()
{
  register_post_type(
    'experts',
    array(
      'labels' => array(
        'name' => __('Experts'),
        'singular_name' => __('Expert')
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

add_action('init', 'create_post_type');



// Add img-fluid class to all images
function add_image_responsive_class($content)
{
  global $post;
  $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-fluid"$3>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//Apply class to every paragraph that hold image
// add_filter( 'the_content', 'img_p_class_content_filter' ,20);
// function img_p_class_content_filter($content) {
//   // assuming you have created a page/post entitled 'debug'
//   $content = preg_replace("/(<p[^>]*)(\>.*)(\<img.*)(<\/p>)/im", "\$1 class='aligncenter'\$2\$3\$4", $content);

//   return $content;
// }

// function custom_excerpt_length( $length ) {
//     return 20;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Variable & intelligent excerpt length.
function print_excerpt($length)
{ // Max excerpt length. Length is set in characters
  global $post;
  $text = $post->post_excerpt;
  if ('' == $text) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
  }
  $text = strip_shortcodes($text); // optional, recommended
  $text = strip_tags($text); // use ' $text = strip_tags($text,'&lt;p&gt;&lt;a&gt;'); ' if you want to keep some tags

  $text = substr($text, 0, $length);
  $excerpt = reverse_strrchr($text, '.', 1);
  if ($excerpt) {
    echo apply_filters('the_excerpt', $excerpt);
  } else {
    echo apply_filters('the_excerpt', $text);
  }
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail)
{
  return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

function revive_zone($location)
{

  if ($location === 'sidebar') {
    $terms = json_decode(json_encode(get_the_tags()), true);
    $i = 0;

    if ($terms !== false) {

      foreach ($terms as $item) {
        if ($item['slug'] === 'zone-wealthy-retirement') {
          $zone = 11;
          break;
        }
        if ($item['slug'] === 'zone-liberty-through-wealth') {
          $zone = 12;
          break;
        }
        if ($item['slug'] === 'zone-early-investing') {
          $zone = 13;
          break;
        }
        if ($item['slug'] === 'zone-manward-press') {
          $zone = 14;
          break;
        }
        if ($item['slug'] === 'zone-trade-of-the-day') {
          $zone = 15;
          break;
        }
        if ($item['slug'] === 'zone-profit-trends') {
          $zone = 16;
          break;
        }
        $i++;
      };
    }

    if (!isset($zone)) {
      $zone = 4;
    }
  } else {

    $zone = $location;
  }

  return $zone;
}


/**
 * Disable AddToAny share script on certain pages
 */
add_filter('addtoany_script_disabled', function () {
  return !is_single();
}, 999);

/**
 * Custom image sizes
 */
add_image_size('related-posts-thumbnail', 600, 9999);


/**
 * Enable ACF options page
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

function iu_revive_display($id)
{
  if (!function_exists('revive_display')) {
    return;
  }

  if (isset($_GET['disable_revive'])) {
    return;
  }

  revive_display($id);
}

add_action( 'admin_enqueue_scripts', 'load_og_admin_style' );
function load_og_admin_style() {
  wp_enqueue_style( 'og_admin_style', get_template_directory_uri() . '/dist/styles/og-admin-style.css', false, '1.0.1' );
}

function iu_site_url()
{
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
    $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $domainName = $_SERVER['HTTP_HOST'];
  return $protocol . $domainName;
}


add_filter('wp_nav_menu_items', 'guru_menu_link', 10, 2);

function guru_menu_link($items, $args)
{
  $start_menu_item = '';
  if ($args->theme_location == 'primary_navigation') {
    $start_menu_item .= '<li class="guru-nav nav-item has-mega-menu dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
    <button class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    IU Einsteins
    </button>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <div class="row p-3">
         <div id="menu-item-7164" class="col-sm-6 guru-dropdown mega-menu-column menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown">
           <ul class="p-0" aria-labelledby="menu-item-7164" role="menu">
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="agreen" href="/author/agreen" >
                   <strong>Alexander Green <br>
                   <span>Chief Investment Expert</span></strong>
               </a>
             </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
                <a class="dropdown-item my-2" guru="apatel" href="/author/apatel">
                  <strong>Alpesh Patel <br>
                  <span>Trading Champion</span></strong>
                </a>
              </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="asnyder" href="/author/asnyder">
                   <strong>Andy Snyder <br>
                   <span>Founder, Manward Press</span></strong>
               </a>
             </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="bryan-bottarelli" href="/author/bryan-bottarelli">
                   <strong>Bryan Bottarelli<br>
                   <span>Technical Options Expert</span></strong>
               </a>
             </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="dfessler" href="/author/dfessler">
                   <strong>David Fessler <br>
                   <span>Energy Expert</span></strong>
               </a>
             </li>
           </ul>

         </div>
         <div id="menu-item-7165" class="col-sm-6 guru-dropdown mega-menu-column menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown">
           <ul class="p-0" aria-labelledby="menu-item-7165" role="menu">
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="krahemtulla" href="/author/krahemtulla">
                   <strong>Karim Rahemtulla<br>
                   <span>Fundamental Options Expert</span></strong>
               </a>
             </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="mlichtenfeld" href="/author/mlichtenfeld" >
                   <strong>Marc Lichtenfeld <br>
                   <span>Income Expert</span></strong>
               </a>
             </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="mcarr" href="/author/mcarr">
                   <strong>Matthew Carr <br>
                   <span>Trends Expert</span></strong>
               </a>
             </li>
             <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
               <a class="dropdown-item my-2" guru="nvardy" href="/author/nvardy">
                   <strong>Nicholas Vardy<br>
                   <span>Quantitative Expert</span></strong>
               </a>
             </li>
           </ul>
         </div>
         <div class="col-12 mb-3">
           <center><a class="btn-primary p-3 mx-auto all-gurus" href="/our-experts/">View All IU Einsteins</a></center>
         </div>
      </div>
    </div>

  </li>
       ';
  }
  $new_items = $start_menu_item . $items;
  return $new_items;
}
// Paste the code below to the functions.php file inside the theme directory you're using.
function my_custom_excerpt($excerpt, $limit = 20)
{
  $charlength++;
  if (mb_strlen($excerpt) > $charlength) {
    $subex = mb_substr($excerpt, 0, $charlength - 5);
    $exwords = explode(' ', $subex);
    $excut = - (mb_strlen($exwords[count($exwords) - 1]));
    if ($excut < 0) {
      $output = mb_substr($subex, 0, $excut);
    } else {
      $output = $subex;
    }
    $output .= ' ...';
    return $output;
  } else {
    return $excerpt;
  }
}

function new_excerpt_more($more)
{
  global $post;
  return '… <a href="' . get_permalink($post->ID) . '">' . '<br><span class="read-more">Read More</span>' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function add_async_forscript($url)
{
  if (strpos($url, '#asyncload') === false)
    return $url;

  if (is_admin())
    return str_replace('#asyncload', '', $url);

  return str_replace('#asyncload', '', $url) . "' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

# deployment bump 2021-03-29

add_theme_support('post-thumbnails');

add_image_size('big-featured-article-xs', 510, 287, true);
add_image_size('big-featured-article-sm', 330, 186, true);
add_image_size('big-featured-article-md', 210, 118, true);
add_image_size('big-featured-article-lg', 255, 255, true);

add_image_size('small-featured-article-xs', 510, 287, true);
add_image_size('small-featured-article-sm-v2', 240, 118, true);
add_image_size('small-featured-article-sm', 210, 118, true);
add_image_size('small-featured-article-md', 130, 73, true);
add_image_size('small-featured-article-lg', 160, 90, true);

add_image_size('home-spotlight-md', 579, 240, true);
add_image_size('home-spotlight-lg', 695, 288, true);

add_image_size('featured-article-xs', 510, 287, true);
add_image_size('featured-article-sm', 210, 118, true);
add_image_size('featured-article-md', 255, 143, true);


// Register the three useful image sizes for use in Add Media modal
add_filter('image_size_names_choose', 'wpshout_custom_sizes');
function wpshout_custom_sizes($sizes)
{
  return array_merge($sizes, array(
    'big-featured-article-xs' => __('Big Featured Article (xs)'),
    'big-featured-article-sm' => __('Big Featured Article (sm)'),
    'big-featured-article-md' => __('Big Featured Article (md)'),
    'big-featured-article-lg' => __('Big Featured Article (lg)'),
    'small-featured-article-xs' => __('Small Featured Article (xs)'),
    'small-featured-article-sm-v2' => __('Small Featured Article (sm) v2'),
    'small-featured-article-sm' => __('Small Featured Article (sm)'),
    'small-featured-article-md' => __('Small Featured Article (md)'),
    'small-featured-article-lg' => __('Small Featured Article (lg)'),
    'home-spotlight-md' => __('Home Spotlight (md)'),
    'home-spotlight-lg' => __('Home Spotlight (lg)'),
    'featured-article-xs' => __('Featured Article (xs)'),
    'featured-article-sm' => __('Featured Article (sm)'),
    'featured-article-md' => __('Featured Article (md)'),
  ));
}

function the_post_thumbnail_alt()
{
  return (!empty(get_the_post_thumbnail_caption())) ? the_post_thumbnail_caption() : the_title();
}

// filtering footer_navigation items to add bootstrap cols
function add_additional_class_on_footer_li($classes, $args) {
  if($args->theme_location == 'footer_navigation') {
    $classes[] = 'col-12 col-md-6 col-lg-3 col-xl-auto';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_footer_li', 1, 3);

function get_post_thumbnail_alt()
{
  return (!empty(get_the_post_thumbnail_caption())) ? get_the_post_thumbnail_caption() : get_the_title();
}



function investimentu_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'investimentu_remove_wp_block_library_css', 100 );

/**
 * Disable the emoji's
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
  * Filter function used to remove the tinymce emoji plugin.
  *
  * @param array $plugins
  * @return array Difference betwen the two arrays
  */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
  return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
  return array();
  }
}

/**
  * Remove emoji CDN hostname from DNS prefetching hints.
  *
  * @param array $urls URLs to print for resource hints.
  * @param string $relation_type The relation type the URLs are printed for.
  * @return array Difference betwen the two arrays.
  */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }

  return $urls;
}

function disable_embeds_code_init() {

  // Remove the REST API endpoint.
  remove_action( 'rest_api_init', 'wp_oembed_register_route' );

  // Turn off oEmbed auto discovery.
  add_filter( 'embed_oembed_discover', '__return_false' );

  // Don't filter oEmbed results.
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

  // Remove oEmbed discovery links.
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

  // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
  add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );

  // Remove all embeds rewrite rules.
  add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

  // Remove filter of the oEmbed result before any HTTP requests are made.
  remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}

add_action( 'init', 'disable_embeds_code_init', 9999 );

function disable_embeds_tiny_mce_plugin($plugins) {
    return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules) {
    foreach($rules as $rule => $rewrite) {
        if(false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

// Remove "Good Investing" signoff if it exists and append contextual ad
function replace_signoff_with_adzerk_zone($content) {
    $adzerk_zone_shortcode = "[adzerk-get-ad zone=\"245143\" size=\"4\"]";
    if(is_singular() && in_the_loop() && is_main_query() && !is_page( 'Contact' ) && !is_page_template( 'template-coreg.php' ) ) {
        $content_pieces = explode("<p>Good investing,", $content);
        $content = $content_pieces[0].$adzerk_zone_shortcode;
    }
	return $content;
}
add_filter("the_content", "replace_signoff_with_adzerk_zone");
function delete_homepage_posts_transient() {
  delete_transient('homepage_posts');
}
add_action( 'save_post', 'delete_homepage_posts_transient'  );
add_action( 'delete_post', 'delete_homepage_posts_transient'  );
