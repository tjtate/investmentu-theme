<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php
  // disable robots following and indexing if url doesn't contain investmentu.com
  if (!strpos(home_url('/'), "investmentu.com")) : echo '<meta name="robots" content="none" />';
  endif; ?>

  <!-- IU Custom Stylesheet -->
  <!-- Media type (print) doesn't match the current environment, so browser decides it's not that important and loads the stylesheet asynchronously (without delaying page rendering). On load, we change media type so that the stylesheet gets applied to screens. -->

  <!-- TypeKit fonts -->
  <link rel="stylesheet" href="https://use.typekit.net/svc8hdj.css" media="print" onload="this.media='all'" />
  <!-- Lytics Modal Style -->
  <link rel="stylesheet" href="https://s3.amazonaws.com/assets.oxfordclub.com/css/investmentu/lytics-styles.css" media="print" onload="this.media='all'" />

  <!-- Fallback that only gets inserted when JavaScript is disabled, in which case we can't load CSS asynchronously. -->

  <noscript>
    <!-- TypeKit fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/svc8hdj.css" />
    <!-- Lytics Modal Style -->
    <link rel="stylesheet" href="https://s3.amazonaws.com/assets.oxfordclub.com/css/investmentu/lytics-styles.css" />
  </noscript>

  <?php
    wp_enqueue_style("investmentu-main-style", get_stylesheet_directory_uri() . "/dist/styles/main.css", array(), filemtime(get_stylesheet_directory() . "/dist/styles/main.css"), false);
    wp_enqueue_script("investmentu-head-script", get_stylesheet_directory_uri() . "/dist/scripts/head.min.js#asyncload", ['jquery'], true);
  ?>

  <?php wp_head(); ?>
</head>
