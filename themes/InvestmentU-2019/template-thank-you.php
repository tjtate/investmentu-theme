<?php
/**
 * Template Name: Thank You Page
 */
?>

<?php
    wp_enqueue_style("iu-coreg-css", get_stylesheet_directory_uri() . "/dist/styles/coreg.css");
    wp_enqueue_script('iu-coreg-js', get_template_directory_uri() . '/dist/scripts/coreg.min.js#asyncload', ['jquery'], true);
?>
<?php while (have_posts()) : the_post(); ?>
<main>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col col-lg-8">
                <article>
                    <?php the_content(); ?>
                </article>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col col-lg-8">
            <div class="quiz-content">
      <p>You’ve answered <span id="answers">X</span> out of 10 questions correctly. This gives you an IU IQ
score of <span id="score">XX</span>...</p>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-00.jpg" id="0-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-01.jpg" id="1-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-02.jpg" id="2-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-03.jpg" id="3-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-04.jpg" id="4-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-05.jpg" id="5-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-06.jpg" id="6-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-07.jpg" id="7-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-08.jpg" id="8-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-09.jpg" id="9-image" style="display:none;"/>
<img src="<?php bloginfo('template_directory'); ?>/assets/images/iu-iq-quiz-score-10.jpg" id="10-image" style="display:none;"/>
<p>This was just a small sampling of questions and there’s always room to
improve!</p>
<p>By continuing to acquire new knowledge, you can become a better investor.</p>
<p>There are many resources out there but not all are created equal. Based on
your results, we’ve included some of the best e-letters to consider below.</p>
<p>If you’d like to sign up for all of the best investment newsletters, simply
enter your email address in the space below then click “Sign Me Up!”</p>
<p>Otherwise, simply uncheck the free e-letters that you do not wish to receive,
then enter your email address and click “Sign Me Up!” You will receive only
the e-letters that are checked.</p>
    </div>
            </div>
        </div>
    </div>

    <div class="container sticky-top email-container">
        <div class="row justify-content-center">
            <form class="input-group py-3 col-12 col-md-8" style="border-bottom: 1px solid #ddd" id="form">
                <input class="form-control email" id="Email" name="Email" type="email"
                    placeholder="Enter Email Address">
                <div class="input-group-append">
                    <button type="submit" class="coreg-submit btn btn-primary">Sign Me Up!</button>
                </div>
                <p style="margin-top: 1em !important; margin-bottom: 0em !important; font-size: 0.85em;">By submitting
                    your email address, you will receive a free subscription to any of the services you select below,
                    and offers from us and our affiliates that we think might interest you. You can unsubscribe at any
                    time. | <a href="https://investmentu.com/privacy-policy-2/">Privacy Policy</a></p>
            </form>
        </div>
        <div class="row justify-content-center">

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="my-2 col-md-8">
            <div class="submit-message"></div>
        </div>
    </div>
    </div>
    </section>
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="col col-lg-8">
                <article>
                    <p class="h5 mb-4"><strong>Select the boxes of the Newsletters you wish to receive</strong></p>
                    <section id="Liberty Through Wealth" class="newsletter-section">
                        <input type="checkbox" class="coreg-check" name="LIBWEALT" data-adv-id="LIBWEALT"
                            data-domain="signup.oxfordclub.com" data-coreg-id="253342" data-sourceid="X300Y210">
                        <label>
                            <strong style="color: #3b5964;">Liberty Through Wealth</strong>
                        </label>
                        <div>
                            <img class="coreg-headshot float-right mt-0 ml-2"
                                src="https://s3.amazonaws.com/assets.investmentu.com/images/coreg/LIBWEALT.png"
                                alt="Liberty Through Wealth" loading="lazy" />
                            <p>In <em>Liberty Through Wealth</em>, <strong>the legendary investing guru Alexander
                                    Green</strong> delivers his time-tested, practical advice on how to achieve total
                                financial independence. Green will show you exactly how to protect and grow what you
                                already have, manage risk and keep your money away from the taxman. If you&rsquo;re
                                looking to free yourself from money worries and thrive financially for good, <em>Liberty
                                    Through Wealth</em> is the publication for you. | <a
                                    href="https://libertythroughwealth.com/privacy-policy/">Privacy Policy</a></p>
                        </div>
                    </section>
                    <hr>
                    <section id="Profit Trends" class="newsletter-section">
                        <input type="checkbox" class="coreg-check" name="PROFTRND" data-adv-id="PROFTRND"
                            data-domain="signup.oxfordclub.com" data-coreg-id="253436" data-sourceid="X301Y260">
                        <label>
                            <strong style="color: #00b0a7;">Profit Trends</strong>
                        </label>
                        <div>
                            <img class="coreg-headshot float-right mt-0 ml-2"
                                src="https://s3.amazonaws.com/assets.investmentu.com/images/coreg/PROFTRND.png"
                                alt="Profit Trends" loading="lazy" />
                            <p>In <em>Profit Trends</em>, <strong>master of financial trends Matthew Carr</strong> will
                                be your essential guide to the market&rsquo;s emerging, breakthrough and disruptive
                                trends. Carr will help you find blockbuster trends &ndash; from 5G to pot stocks to
                                cutting-edge technologies &ndash; that could hand you gains far greater than anything
                                else in the market. | <a href="https://profittrends.com/privacy-policy/">Privacy
                                    Policy</a></p>
                        </div>
                    </section>
                    <hr>
                    <section id="Wealthy Retirement" class="newsletter-section">
                        <input type="checkbox" class="coreg-check" name="WEALTHRE" data-adv-id="WEALTHRE"
                            data-domain="signup.oxfordclub.com" data-coreg-id="253323" data-sourceid="X302Y280">
                        <label>
                            <strong style="color: #17331b;">Wealthy Retirement</strong>
                        </label>
                        <div>
                            <img class="coreg-headshot float-right mt-0 ml-2"
                                src="https://s3.amazonaws.com/assets.investmentu.com/images/coreg/WEALTHRE.png"
                                alt="Wealthy Retirement" loading="lazy" />
                            <p>At <em>Wealthy Retirement</em>, <strong>income investing expert Marc Lichtenfeld</strong>
                                will show you income-generating strategies you won&rsquo;t find in any other financial
                                publication. Don&rsquo;t be fooled by the &ldquo;conservative&rdquo; approach:
                                Lichtenfeld&rsquo;s income-generating system could be the most sustainable method of
                                protecting and <em>building</em> a wealthy retirement in existence. | <a
                                    href="https://wealthyretirement.com/privacy/">Privacy Policy</a></p>
                        </div>
                    </section>
                    <hr>
                    <section id="Manward Digest" class="newsletter-section">
                        <input type="checkbox" class="coreg-check" name="MANDIGES" data-adv-id="MANDIGES"
                            data-domain="signup.manwardpress.com" data-coreg-id="253444" data-sourceid="X320Y217">
                        <label>
                            <strong style="color: #3d9ab0;">Manward Digest</strong>
                        </label>
                        <div>
                            <img class="coreg-headshot float-right mt-0 ml-2"
                                src="https://s3.amazonaws.com/assets.investmentu.com/images/coreg/MANDIGES.png"
                                alt="Manward Digest" loading="lazy" />
                            <p><em>Manward Digest</em> is your premier source for unfiltered, unorthodox views on money
                                and what it means for a free society. In this one-of-a-kind newsletter, <b>Andy
                                    Snyder</b> exposes the &ldquo;facts behind the facade&rdquo; to show readers
                                what&rsquo;s REALLY moving the markets and the best ways to build wealth. Every day
                                you'll get the unvarnished truth about the forces that impact your money... and your
                                freedom. | <a href="https://manwardpress.com/privacy-policy/">Privacy Policy</a></p>
                        </div>
                    </section>
                    <hr>
                    <section id="Trade of the Day" class="newsletter-section">
                        <input type="checkbox" class="coreg-check" name="TRADEDAY" data-adv-id="TRADEDAY"
                            data-domain="signup.monumenttradersalliance.com" data-coreg-id="253462"
                            data-sourceid="X325Y2BJ">
                        <label>
                            <strong style="color: #fa9225;">Trade of the Day</strong>
                        </label>
                        <div>
                            <img class="coreg-headshot float-right mt-0 ml-2"
                                src="https://s3.amazonaws.com/assets.investmentu.com/images/coreg/TRADEDAY.png"
                                alt="Trade of the Day" loading="lazy" />
                            <p>Signing up for our free <em>Trade of the Day</em> e-letter is the first step toward
                                achieving trading success. At 5 p.m. ET, Monday through Friday, you&rsquo;ll receive a
                                quick recap of one of the most important trades our tacticians &ndash; <b>Bryan
                                    Bottarelli</b> and <b>Karim Rahemtulla</b> &ndash; are tracking. These are often the
                                trades that could lead to substantial wealth creation &ndash; and you&rsquo;ll know
                                about them well before anyone else. | <a
                                    href="https://mtatradeoftheday.com/privacyPolicy/">Privacy Policy</a></p>
                        </div>
                    </section>
                    <hr>
                    <section id="Investment U" class="newsletter-section">
                        <input type="checkbox" class="coreg-check" name="INVESTME" data-adv-id="INVESTME"
                            data-domain="signup.oxfordclub.com" data-coreg-id="274702" data-sourceid="X300W7BY">
                        <label>
                            <strong style="color: #2f83bf;">Investment U</strong>
                        </label>
                        <div>
                            <img class="coreg-headshot float-right mt-0 ml-2"
                                src="https://s3.amazonaws.com/assets.investmentu.com/images/coreg/INVESTME.png"
                                alt="Trade of the Day" loading="lazy" />
                            <p><em>Investment U</em> had an exciting relaunch in August of 2019. And we're better than
                                ever at providing you the best insights from the world's top finance minds.
                                <em>Investment U</em> features financial gurus like <b>Alexander "The Millionaire Maker"
                                    Green</b>, <b>Marc Lichtenfeld</b>, <b>Matthew Carr</b> and more. All in one place.
                                It is is your one stop shop to from financial literacy to complete financial freedom.
                                Sign up today, tuition free. | <a
                                    href="https://investmentu.com/privacy-policy-2/">Privacy Policy</a>
                            </p>
                        </div>
                    </section>
                    <hr>
                    <input type="checkbox" id="select-all" class="coreg-check">
                    <label><strong>Select All</strong></label>

                    <label class="sr-only" for="Email">Email Address</label>

                </article>
            </div>
        </div>
    </div>
</main>
<section class="iframe"></section>
<?php endwhile; ?>
