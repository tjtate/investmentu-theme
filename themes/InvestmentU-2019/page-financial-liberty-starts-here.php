<?php while (have_posts()) : the_post(); ?>
  <?php
  $source_code = isset($_GET['code']) ? htmlentities(strip_tags($_GET['code'])) : 'X300W5HY';

  wp_enqueue_style("investmentu-financial-liberty-starts-here-style", get_stylesheet_directory_uri() . "/dist/styles/financial-liberty-starts-here.css");
  ?>
  <main>
    <header class="container-fluid py-2 py-lg-4" id="pageHeader">
      <div class="row">
        <div class="col"><img alt="Investment U - the educational arm of the oxford club" class="logo" src="https://investmentu.com/wp-content/themes/InvestmentU-2019/assets/images/logo.png" loading="eager" /></div>
      </div>
    </header>
    <section class="container-fluid py-2 py-lg-4 pattern-bg" id="topSignUp">
      <div class="row">
        <div class="container py-1 py-md-2 py-lg-4">
          <div class="row">
            <div class="col py-1 py-md-2 py-lg-4">
              <h1 class="white-text text-center" style="font-size: 1.25em;">Your Journey to Financial Liberty Starts Here</h1>
              <h2 class="white-text text-center">Sign up for our free <em>Investment U</em> e-letter today!</h2>
              <form action="https://signupapp2.com/signupapp/signups/process" class="sign-up-form col-md-12 col-lg-8 col-xl-6 pt-2 pt-lg-4 mx-auto" id="LeadGen" method="post" name="SimpleSignUp">
                <input name="signup.sourceId" type="hidden" value="<?php echo $source_code; ?>">
                <input name="signup.listCode" type="hidden" value="INVESTME">
                <input name="coRegSignups[0].checked" type="hidden" value="true">
                <input name="coRegSignups[0].listCode" type="hidden" value="IUDED">
                <input name="coRegSignups[0].sourceId" type="hidden" value="<?php echo $source_code; ?>">
                <input id="redirect" name="signup.redirectUrl" type="hidden" value="https://investmentu.com/welcome-to-investment-u/">
                <div class="form-group mb-0">
                  <label class="sr-only" for="email">Email address</label>
                  <input class="form-control form-control-lg my-2 my-lg-4 p-3" id="emailAddress" name="signup.emailAddress" type="email" placeholder="Enter email..." required />
                  <input class="btn btn-submit orange-button btn-block p-3" id="submit_id" name="submit_button" type="submit" value="Sign Me Up!" />
                </div>
                <footer>
                  <nav>
                    <ul class="nav justify-content-center">
                      <li class="nav-item"><a class="nav-link" href="https://investmentu.com/privacy-policy-2/" target="_blank" rel="noopener noreferrer">Privacy Policy</a></li>
                      <li class="nav-item"><a class="nav-link" href="https://investmentu.com/disclaimer/" target="_blank" rel="noopener noreferrer">Disclaimer</a></li>
                    </ul>
                  </nav>
                </footer>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid py-2 py-lg-4" id="feature">
      <div class="row">
        <div class="container py-1 py-md-2 py-lg-4">
          <div class="row justify-content-center">
            <div class="col col-md-12 col-xl-9">
              <h2 class="text-center">We&rsquo;re here to help you invest like the pros and unlock your wealth!</h2>
              <p class="text-center">If you want to achieve financial freedom, pay close attention...</p>
              <div class="row justify-content-center">
                <blockquote class="col py-1 py-md-2 py-lg-4">
                  <p class="text-center px-4 py-2">The essential truth of modern economic life is that money gives you choices. Chief among these is the opportunity to do what you want, where you want, with whom you want. That&rsquo;s what financial freedom is all about.</p>
                  <footer>
                    <p class="m-0 text-center"><cite class="teal-text">&ndash; Chief Investment Strategist Alexander Green</cite></p>
                  </footer>
                </blockquote>
              </div>
              <p class="text-center">Our daily <em>Investment U</em> e-letter is all about helping you grow and build your wealth.</p>
              <p class="text-center"><a class="orange-text" href="#bottomSignUp"><b>Sign up for our free <em>Investment U</em> e-letter today!</b> </a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid py-2 py-lg-4 grey-bg" id="cards">
      <div class="row">
        <div class="container py-1 py-md-2 py-lg-4">
          <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3 px-md-2 d-flex">
              <div class="card"><img alt="Light Bulb with Brain, Representing Idea" class="card-img-top p-1 p-md-3" src="https://s3.amazonaws.com/assets.investmentu.com/leadgen/fin-lib/img/insight.svg" />
                <div class="card-body h-100">
                  <p class="card-text text-center">Insights from some of America&rsquo;s top investors</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 px-md-2 d-flex">
              <div class="card"><img alt="Email in Inbox" class="card-img-top p-1 p-md-3" src="https://s3.amazonaws.com/assets.investmentu.com/leadgen/fin-lib/img/eletter.svg" />
                <div class="card-body h-100">
                  <p class="card-text text-center">Free daily e-letter</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 px-md-2 mt-2 mt-md-0 d-flex">
              <div class="card"><img alt="Chart in Presentation" class="card-img-top p-1 p-md-3" src="https://s3.amazonaws.com/assets.investmentu.com/leadgen/fin-lib/img/trend.svg" />
                <div class="card-body h-100">
                  <p class="card-text text-center">Trending stocks and research</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 px-md-2 mt-2 mt-md-0 d-flex">
              <div class="card"><img alt="Long Report of Charts" class="card-img-top p-1 p-md-3" src="https://s3.amazonaws.com/assets.investmentu.com/leadgen/fin-lib/img/proven.svg" />
                <div class="card-body h-100">
                  <p class="card-text text-center">Proven, easy-to-master systems for wealth building</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid py-2 py-lg-4 blue-bg" id="bottomSignUp">
      <div class="row">
        <div class="container py-2 py-lg-4">
          <div class="row">
            <div class="col py-2 py-lg-4 d-flex flex-column justify-content-center">
              <h2 class="white-text text-center">Don&rsquo;t Miss Out!</h2>
              <h3 class="white-text text-center">Sign up for our free e-letter today!</h3>
              <form action="https://signupapp2.com/signupapp/signups/process" class="sign-up-form col-md-12 col-lg-8 col-xl-6 pt-2 pt-lg-4 mx-auto" id="LeadGen" method="post" name="SimpleSignUp">
                <input name="signup.sourceId" type="hidden" value="<?php echo $source_code; ?>">
                <input name="signup.listCode" type="hidden" value="INVESTME">
                <input name="coRegSignups[0].checked" type="hidden" value="true">
                <input name="coRegSignups[0].listCode" type="hidden" value="IUDED">
                <input name="coRegSignups[0].sourceId" type="hidden" value="<?php echo $source_code; ?>">
                <input id="redirect" name="signup.redirectUrl" type="hidden" value="https://investmentu.com/welcome-to-investment-u/">
                <div class="form-group mb-0">
                  <label class="sr-only" for="email">Email address</label>
                  <input class="form-control form-control-lg my-2 my-lg-4 p-3" id="emailAddress" name="signup.emailAddress" type="email" placeholder="Enter email..." required />
                  <input class="btn btn-submit orange-button btn-block p-3" id="submit_id" name="submit_button" type="submit" value="Sign Me Up!" />
                </div>
                <footer>
                  <nav>
                    <ul class="nav justify-content-center">
                      <li class="nav-item"><a class="nav-link" href="https://investmentu.com/privacy-policy-2/" target="_blank" rel="noopener noreferrer">Privacy Policy</a></li>
                      <li class="nav-item"><a class="nav-link" href="https://investmentu.com/disclaimer/" target="_blank" rel="noopener noreferrer">Disclaimer</a></li>
                    </ul>
                  </nav>
                </footer>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php endwhile; ?>
