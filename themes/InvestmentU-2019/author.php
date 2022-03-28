<main class="mt-0">
    <?php $auth_id = get_the_author_meta('ID'); ?>
    <div class="container-fluid editor-header">
        <div class="row">
            <div class="container" id="">
                <div class="row">
                    <div class="col-7 my-auto">
                        <h1 class="page-title"><?php echo get_the_author_meta( 'display_name'); ?></h1>
                        <h5 class="expert-title"><?php the_field('author_title', 'user_' . $auth_id); ?></h5>
                    </div>
                    <div class="col-5 mt-3">
                        <img src="<?php the_field('author_headshot', 'user_' . $auth_id); ?>" alt="Editor image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container editor-desc">
        <div class="row my-3">
            <div class="col-lg-8">
                <h4 class="e-header">About</h4>
                <div class="category-paragraph-description">

                    <p><?php the_field('author_description', 'user_' . $auth_id); ?></p>
                    <div class="d-sm-block d-md-none">
                        <!-- Author Ad -->
                        <?php get_template_part('partials/author-ad'); ?>
                    </div>
                </div>
                <!-- Editor E-letters -->

                <?php if( have_rows('editor_free_e-letter', 'user_' . $auth_id) ) { ?>
                <h4 class="text-center"><a class="e-header mt-4"
                        href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"
                        rel="author"><?php echo get_the_author_meta('first_name'); ?>'s Free E-Letter</a></h4>
                <?php
                  while ( have_rows('editor_free_e-letter', 'user_' . $auth_id) ) { the_row();
                ?>
                <div class="row e-services my-4 mx-1">
                    <div class="col-md-8 p-4 e-desc">
                        <div class="services">
                            <img class="align-middle" src="<?php echo esc_url(get_sub_field('e-letter_logo')); ?>"
                                alt="E-letter logo">
                            <h4 class="e-header my-0 align-middle">
                                <?php echo esc_html(get_sub_field('e-letter_name')); ?></h4>
                        </div>
                        <hr>
                        <p><?php echo get_sub_field('e-letter_description'); ?></p>
                        <center><a href="<?php echo esc_url(get_sub_field('e-letter_button_url')); ?>"><button
                                    class="btn btn-primary px-5 py-3 rounded-0"><?php echo get_sub_field('learn_more_button_text'); ?></button></a>
                        </center>
                    </div>
                    <div class="col-md-4 px-3 py-4 e-bullets" style="background-color: #f3f3f3;">
                        <ul class="bullets" style="padding-left: 0px;">
                            <li class="blue-chip">
                                <span><?php echo get_sub_field('e-letter_blue_chip_text', false, false); ?></span>
                            </li>
                            <li class="holding-period">
                                <span><?php echo get_sub_field('e-letter_holding_period_text', false, false); ?></span>
                            </li>
                            <li class="goal">
                                <span><?php echo get_sub_field('e-letter_return_goal_text', false, false); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                  }
                }
                ?>
                <!-- Editor Newsletters -->

                <?php if( have_rows('editor_newsletter', 'user_' . $auth_id) ) { ?>
                <h4 class="text-center"><a class="e-header mt-4"
                        href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"
                        rel="author"><?php echo get_the_author_meta('first_name'); ?>'s Newsletters</a></h4>
                <?php
                  while ( have_rows('editor_newsletter', 'user_' . $auth_id) ) { the_row();
                ?>
                <div class="row e-services my-4 mx-1">
                    <div class="col-md-8 p-4 e-desc">
                        <div class="services">
                            <img class="align-middle" src="<?php echo esc_url(get_sub_field('newsletter_logo')); ?>"
                                alt="newsletter logo">
                            <h4 class="e-header my-0 align-middle">
                                <?php echo esc_html(get_sub_field('newsletter_name')); ?></h4>
                        </div>
                        <hr>
                        <p><?php echo get_sub_field('newsletter_description'); ?></p>
                        <center><a href="<?php echo esc_url(get_sub_field('newsletter_button_url')); ?>"><button
                                    class="btn btn-primary px-5 py-3 rounded-0"><?php echo get_sub_field('newsletter_learn_more_button_text'); ?></button></a>
                        </center>
                    </div>
                    <div class="col-md-4 px-3 py-4 e-bullets" style="background-color: #f3f3f3;">
                        <ul class="bullets" style="padding-left: 0px;">
                            <li class="blue-chip">
                                <span><?php echo get_sub_field('newsletter_blue_chip_text', false, false); ?></span>
                            </li>
                            <li class="holding-period">
                                <span><?php echo get_sub_field('newsletter_holding_period_text', false, false); ?></span>
                            </li>
                            <li class="goal">
                                <span><?php echo get_sub_field('newsletter_return_goal_text', false, false); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                  }
                }
                ?>
                <!-- Editor VIP Trading Services -->
                <?php if( have_rows('editor_trading_services', 'user_' . $auth_id) ) { ?>
                <h4 class="text-center"><a class="e-header mt-4"
                        href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"
                        rel="author"><?php echo get_the_author_meta('first_name'); ?>'s VIP Trading Services</a></h4>
                <?php
                  while ( have_rows('editor_trading_services', 'user_' . $auth_id) ) { the_row();
                ?>
                <div class="row e-services my-4 mx-1">
                    <div class="col-md-8 p-4 e-desc">
                        <div class="services">
                            <img class="align-middle"
                                src="<?php echo esc_url(get_sub_field('trading_services_logo')); ?>"
                                alt="trading services logo">
                            <h4 class="e-header my-0 align-middle">
                                <?php echo esc_html(get_sub_field('trading_services_name')); ?></h4>
                        </div>
                        <hr>
                        <p><?php echo get_sub_field('trading_services_description'); ?></p>
                        <center><a href="<?php echo esc_url(get_sub_field('trading_services_button_url')); ?>"><button
                                    class="btn btn-primary px-5 py-3 rounded-0"><?php echo get_sub_field('trading_services_learn_more_button_text'); ?></button></a>
                        </center>
                    </div>
                    <div class="col-md-4 px-3 py-4 e-bullets" style="background-color: #f3f3f3;">
                        <ul class="bullets" style="padding-left: 0px;">
                            <li class="blue-chip">
                                <span><?php echo get_sub_field('trading_services_blue_chip_text', false, false); ?></span>
                            </li>
                            <li class="holding-period">
                                <span><?php echo get_sub_field('trading_services_holding_period_text', false, false); ?></span>
                            </li>
                            <li class="goal">
                                <span><?php echo get_sub_field('trading_services_return_goal_text', false, false); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                  }
                }
                ?>

                <!-- Editor Articles -->
                <h4 class="text-center"><a class="e-header mt-4"
                        href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">Articles by
                        <?= get_the_author(); ?></a></h4>

                <div class="articlePreview container">
                    <div class="row row-eq-height mx-1">
                        <?php echo do_shortcode('[ajax_load_more id="editor-articles" container_type="div" post_type="post" posts_per_page="4" author="'.$auth_id.'"]') ?>
                    </div>
                </div>

            </div>
            <!-- SIDEBAR -->
            <!-- MAKE THIS STICKY -->
            <div class="col-12 col-lg-4 sticky-top pb-5">
                <div class="sticky-top">
                    <?php dynamic_sidebar('sidebar-primary'); ?>
                    <?php
                      echo '<div class="sidebar-ad col-12 p-0">';
                      echo do_shortcode('[adzerk-get-ad zone="233472" size="3777"]');
                      echo '</div>';
                    ?>
                    <h2 class="pb-2" style="border-bottom: 1px solid #d3d3d3;font-weight: bold; margin-top: 30px;">
                        Popular Posts</h2>
                    <nav class="nav-primary ">
                        <?php
                          if (has_nav_menu('sidebar_navigation')) {
                            wp_nav_menu(['theme_location' => 'sidebar_navigation', 'menu_class' => 'h-popular-posts p-0 mb-4']);
                          }
                        ?>
                    </nav>

                </div>
            </div>

        </div>
    </div>
</main>
