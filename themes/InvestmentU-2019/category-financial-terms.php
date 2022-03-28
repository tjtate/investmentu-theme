<main>
    <div class="container both-mandatory">
        <div class="row mt-4">
            <div class="col-12 col-md-8">
                <h1 id="jump-to-title" class="page-title text-center"><?php single_cat_title(); ?></h1>
                    <div id="letter-index" class="letter-index-container">
                        <a href="#number">0-9</a> <a href="#letter-A">A</a>  <a href="#letter-B">B</a>  <a href="#letter-C">C</a>  <a href="#letter-D">D</a>  <a href="#letter-E">E</a>  <a href="#letter-F">F</a>  <a href="#letter-G">G</a>  <a href="#letter-H">H</a>  <a href="#letter-I">I</a>  <a href="#letter-J">J</a>  <a href="#letter-K">K</a>  <a href="#letter-L">L</a>  <a href="#letter-M">M</a>  <a href="#letter-N">N</a>  <a href="#letter-O">O</a>  <a href="#letter-P">P</a>  <a href="#letter-Q">Q</a>  <a href="#letter-R">R</a>  <a href="#letter-S">S</a>  <a href="#letter-T">T</a>  <a href="#letter-U">U</a>  <a href="#letter-V">V</a>  <a href="#letter-W">W</a>  <a href="#letter-X">X</a>  <a href="#letter-Y">Y</a>  <a href="#letter-Z">Z</a>
                    </div>
                <h2 style='font-size: 2.5em; margin-top: 10px;'>0-9</h2>
                <hr />
                <?php
                // The Loop
                $args = array(
                    'posts_per_page' => -1,
                    'category_name' => 'financial-terms',
                    //'orderby' => 'title',
                    'meta_key' => 'glossary_title',
	                'orderby' => 'meta_value',
                    'order' => 'ASC'
                );
                $the_query = new WP_Query($args);
                $curr_letter = '';
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                        //$this_letter = get_the_title()[0];
                        $this_letter = get_field('glossary_title')[0] ?? get_the_title()[0];
                        if ($this_letter != $curr_letter && !is_numeric($this_letter)) {
                            if ($curr_letter !== '') echo "<p class='letter-back' style='margin-top: 15px;'><a href='#jump-to-title' >Back to Index</a></p>";
                                echo "<a name='letter-$this_letter'></a><br />";
                                echo "<h2 style='font-size: 2.5em;'>$this_letter</h2>";
                                echo "<hr />";
                        $curr_letter = $this_letter;
                    } ?>
                    <div class="articlePreview container" style="padding: 0.6rem 0;">
                        <div class="row row-eq-height">
                            <div class="col-12">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                    <h4>
                                        <?php if(!empty(get_field('glossary_title'))) { 
                                            the_field('glossary_title');
                                        } else {
                                            the_title(); 
                                        } ?>
                                    </h4>
                                </a>
                                <div class="article_preview d-none d-sm-block">
                                    <?php if(!empty(get_field('glossary_excerpt'))) { 
                                        the_field('glossary_excerpt');
                                    } else {
                                        the_excerpt(); 
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php echo do_shortcode('[adzerk-get-ad zone="233475" size="4"]'); ?>
            </div>
            <!-- SIDEBAR -->
            <?php get_template_part('partials/sidebar'); ?>
        </div>
    </div>
</main>
