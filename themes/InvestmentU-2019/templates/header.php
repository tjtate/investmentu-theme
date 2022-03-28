<?php if(is_page_template('template-feed.php')): ?>
  <!-- main nav -->
<nav class="container-fluid navbar navbar-expand-xl navbar-light bg-light nav-fill stick-top">
    <div class="brand-wrapper">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Investment U"
                class="mx-auto my-3 img-fluid d-xl-inline-block" id="logo" loading="eager" />
            <p class="tagline d-xl-inline-block pl-0 pl-xl-3">The Educational Arm of The Oxford Club</p>
    </div>
</nav>
<?php else: ?>
<!-- main nav -->
<nav class="container-fluid navbar navbar-expand-xl navbar-light bg-light nav-fill stick-top" role="navigation" aria-labelledby="Primary">
    <div class="brand-wrapper">
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Investment U - the educational arm of the oxford club"
                class="mx-auto my-3 img-fluid d-xl-inline-block" id="logo" loading="eager" />
            <p class="tagline d-xl-inline-block pl-0 pl-xl-3">The Educational Arm of The Oxford Club</p>
        </a>
    </div>
    <div class="buttons-mobile">
        <ul class="btn-subscribe-wrapper">
            <li class="btn-subscribe">
                <a title="Subscribe" href="https://investmentu.com/best-investment-newsletters/" class="nav-link" data-wpel-link="internal">Subscribe</a>
            </li>
        </ul>
        <div class="d-xl-none nav-search nav-item" style="text-align: right; margin-right: 1rem; font-size: 1.55rem; ">

            <div class="navbar-form navbar-right">
                <button class="search-form-trigger nav-link" data-toggle="search-form" aria-label="Toggle search form"  aria-expanded="false">
                    <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-search.svg" class="search-icon" alt="Search" aria-hidden="true" style="max-width: 25px;" loading="lazy">
                </button>
            </div>

        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse-nav"
            aria-controls="collapse-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="collapse-nav">
        <div class="main-nav d-block d-xl-none">
            <?php
                wp_nav_menu(array(
                    'menu_id' => 'menu-primary-mega-menu',
                    'theme_location' => 'primary_navigation',
                    'depth' => 3,
                    'container' => 'false',
                    'menu_class' => 'nav nav-links',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker()
                ));
                ?>
        </div>

        <ul class="nav nav-social d-lg-flex">
            <li class="btn-subscribe nav-item d-none d-xl-block">
                <a title="Subscribe" href="/best-investment-newsletters/" class="nav-link"
                    data-wpel-link="internal">Subscribe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/investmentu/" aria-label="Facebook" target="_blank">
                    <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-facebook.svg" class="facebook-icon"
                        alt="Facebook" loading="lazy" />
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://twitter.com/InvestmentU" aria-label="Twitter" target="_blank">
                    <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-twitter.svg" class="twitter-icon"
                        alt="Twitter" loading="lazy" />
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.linkedin.com/showcase/investmentu/" aria-label="LinkedIn"
                    target="_blank">
                    <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-linkedin.svg" class="linkedin-icon"
                        alt="LinkedIn" loading="lazy" />
                </a>
            </li>
            <li class="nav-item d-none d-lg-inline-block">
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="hidden-xs navbar-form navbar-right">
                        <button class="search-form-trigger nav-link" data-toggle="search-form"
                            aria-label="Toggle search form" aria-expanded="false">
                            <img src="/wp-content/themes/InvestmentU-2019/assets/images/icon-search.svg"
                                class="search-icon" alt="Search" loading="lazy" />
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="search-form-wrapper col-lg-12">
        <?php get_search_form(); ?>
    </div>
</nav>
<nav class="navbar navbar-light nav-fill stick-top d-none d-xl-block bottom-nav py-2 main-sticky-nav" role="navigation" aria-labelledby="Secondary">
    <div class="main-nav mx-auto container">
        <?php
        wp_nav_menu(array(
            'menu_id' => 'menu-primary-mega-menu ',
            'theme_location' => 'primary_navigation',
            'depth' => 3,
            'container' => 'false',
            'menu_class' => 'nav nav-links mt-0',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker()
        ));
        ?>
    </div>
</nav>


<?php

$terms = json_decode(json_encode(get_the_tags()), true);
$i = 0;
$is_syndicated='false';
if ($terms && !is_front_page()) {

  foreach ($terms as $item) {

    if (strpos($item['slug'], 'zone') !== false) {
      $is_syndicated = 'true';
      break;
    }
  }
}

//whether to show the sticky signup or not. supporting legacy cookie and new cookie.
$show_sticky =  false;

if (isset($_COOKIE['signup']) || isset($_COOKIE['INVESTME'])) {
  $show_sticky = true;
}

if ($is_syndicated !== 'true' && $show_sticky) {
?>
<!-- sticky signup form (temporarily disabled) -->

<?php

} else {

?>

<?php

}

?>
<?php endif; ?>
