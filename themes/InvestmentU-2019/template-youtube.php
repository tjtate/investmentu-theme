<?php

/**
 * Template Name: Youtube Channels
 */
?>

<style>
  a.video-link {
    color: black;
  }

  a.video-link:hover,
  a.video-link:active {
    color: #1f82c5;
  }

  iframe {
    border: none;
    width: 540px;
    height: 303px;
  }

  @media screen and (max-width: 1198px) {
    iframe {
      width: 465px;
      height: 260px;
    }
  }

  @media screen and (max-width: 990px) {
    iframe {
      width: 345px;
      height: 193px;
    }
  }

  @media screen and (max-width: 768px) {
    iframe {
      width: 705px;
      height: 396px;
    }
  }

  @media screen and (max-width: 766px) {
    iframe {
      width: 384px;
      height: 216px;
    }
  }

  @media screen and (max-width: 375px) {
    iframe {
      width: 345px;
      height: 194px;
    }
  }

  @media screen and (max-width: 360px) {
    iframe {
      width: 330px;
      height: 186px;
    }
  }

  @media screen and (max-width: 320px) {
    iframe {
      width: 290px;
      height: 163px;
    }
  }
</style>

<main class="container">
  <section class="row my-4 row-eq-height">
    <div class="col-12">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  </section>
  <section class="row my-4 row-eq-height">
    <div class="col-12 alt-bg">
      <h2 class="mb-3">The Oxford Club | <a class="readmore" href="https://www.youtube.com/channel/UCWKO8FnDj6i6A_aZkppmSOg" target="_blank">Go to Channel &raquo;</a></h2>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="oc0-embed" src=""></iframe>
      <h3 id="oc0-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h3>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="oc1-embed" src=""></iframe>
      <h4 id="oc1-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h4>
    </div>
  </section>
  <hr>
  <section class="row my-4 row-eq-height">
    <div class="col-12 alt-bg">
      <h2 class="mb-3">Wealthy Retirement | <a class="readmore" href="https://www.youtube.com/channel/UC_irNFjFEhWJcDaiXg_DItQ" target="_blank">Go to Channel &raquo;</a></h2>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="wr0-embed" src=""></iframe>
      <h3 id="wr0-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h3>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="wr1-embed" src=""></iframe>
      <h4 id="wr1-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h4>
    </div>
  </section>
  <hr>
  <section class="row my-4 row-eq-height">
    <div class="col-12 alt-bg">
      <h2 class="mb-3">Profit Trends | <a class="readmore" href="https://www.youtube.com/channel/UCRtwSDJeF9jZq-jcaA9Wx1w" target="_blank">Go to Channel &raquo;</a></h2>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="pt0-embed" src=""></iframe>
      <h3 id="pt0-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h3>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="pt1-embed" src=""></iframe>
      <h4 id="pt1-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h4>
    </div>
  </section>
  <hr>
  <section class="row my-4 row-eq-height">
    <div class="col-12 alt-bg">
      <h2 class="mb-3">Your Trade of the Day | <a class="readmore" href="https://www.youtube.com/channel/UCb4MpxFN6j1MGby2WPKJuOg" target="_blank">Go to Channel &raquo;</a></h2>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="ytotd0-embed" src=""></iframe>
      <h3 id="ytotd0-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h3>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="ytotd1-embed" src=""></iframe>
      <h4 id="ytotd1-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h4>
    </div>
  </section>
  <hr>
  <section class="row my-t row-eq-height">
    <div class="col-12 alt-bg">
      <h2 class="mb-3">Manward Press | <a class="readmore" href="https://www.youtube.com/channel/UCRtwSDJeF9jZq-jcaA9Wx1w" target="_blank">Go to Channel &raquo;</a></h2>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="manward0-embed" src=""></iframe>
      <h3 id="manward0-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h3>
    </div>
    <div class="col-12 col-lg-6">
      <iframe id="manward1-embed" src=""></iframe>
      <h4 id="manward1-link" class="small-title my-3 mb-lg-0" href="" target="_blank"></h4>
    </div>
  </section>
  <div class="row">
    <div class="col-12">
      <!-- Bottom Ad --><?php get_template_part('partials/category-bottom-ad'); ?>
    </div>
  </div>
</main>

<script>
  $(function() {
    function addToScreen(type, number, title, id) {
      $("#" + type + number + "-link").html('<a class="video-link m-0" href="https://www.youtube.com/watch?v=' + id + '?controls=0&autoplay=0">' + title + '<i class="far fa-external-link ml-2"></i></a>')
      $("#" + type + number + "-embed").attr('src', "https://youtube.com/embed/" + id + "?controls=0&autoplay=0")
    }

    function getData(channel, short) {
      $.ajax({
        url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=5&playlistId=" + channel + "&key=AIzaSyDp2gR0DTwu4spYOGa6UTnEC4NXfrVRDnM",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          for (var i = 0; i < res.items.length; i++) {
            addToScreen(short, i, res.items[i].snippet.title, res.items[i].contentDetails.videoId)
          }
        }
      });
    }

    $(document).ready(function() {
      var channelInfo = [{
          channel: 'UUWKO8FnDj6i6A_aZkppmSOg',
          short: 'oc'
        },
        {
          channel: 'UU_irNFjFEhWJcDaiXg_DItQ',
          short: 'wr'
        },
        {
          channel: 'UURtwSDJeF9jZq-jcaA9Wx1w',
          short: 'pt'
        },
        {
          channel: 'UUb4MpxFN6j1MGby2WPKJuOg',
          short: 'ytotd'
        },
        {
          channel: 'UUR31oX_u-FrJMKmbweAdj5Q',
          short: 'manward'
        }
      ]

      $.each(channelInfo, function(index, value) {
        getData(value.channel, value.short)
      });
    });
  });
</script>
