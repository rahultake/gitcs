<section class="main-banner-section my-md-5 mt-sm-4 py-5">
  <?php if(!empty($banner_data)) { ?>
  <section class="banner-section pb-5 mb-4">
      <div class="container">
        <div class="row text-center align-items-center">
          <div class="col-sm-12 col-md-10 mx-auto">
            <div class="hero-content">
              <div class="hero-content">
                <h1><?php echo $banner_data->component_heading;?></h1>
                <p class="text-muted"><?php echo $banner_data->component_sub;?></p>
                <a class="main-action btn btn-action-btn btn-fill mt-2 mb-3" href="javascript:void(0)"> Schedule a demo </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <?php } ?>
  <?php if(!empty($block_data1)) { ?>
  <section class="solution-thumbs text-center">
    <div class="container">
      <div class="row justify-content-center bg-white position-relative">
        <?php foreach ($block_data1 as $blocks_data1) { ?>
        <div class="col-4 col-sm-2">
          <div>
              <img decoding="async"  width="70" alt="<?php echo $blocks_data1->name;?>" data-src="<?php echo base_url($blocks_data1->detail_image);?>" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img decoding="async" src="<?php echo base_url($blocks_data1->detail_image);?>" width="70" alt="<?php echo $blocks_data1->name;?>" /></noscript>
          </div>
          <p class="text-muted"><?php echo $blocks_data1->name;?></p>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
  <?php if(!empty($block_data2)) { ?>
  <section class="position-relative mt-5">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-4">
              <div class='white' style='background:rgba(0,0,0,0); border:solid 0px rgba(0,0,0,0); border-radius:0px; padding:0px 0px 0px 0px;'>
                <div id='slider_25319' class='owl-carousel sa_owl_theme autohide-arrows' data-slider-id='slider_25319' style='visibility:hidden;'>
                  <?php foreach ($block_data2 as $blocks_data2) { ?>  
                  <div id='slider_25319_slide01' class='sa_hover_container' style='padding:0% 0%; margin:0px 0%; '>
                    <img decoding="async"   alt="g20 logo" data-src="<?php echo base_url($blocks_data2->detail_image);?>" class="img-fluid lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img decoding="async" class="img-fluid" src="<?php echo base_url($blocks_data2->detail_image);?>"></noscript>
                  </div>
                  <?php } ?>
                </div>
              </div>
            <script type='text/javascript'>
              jQuery(document).ready(function() {
                jQuery('#slider_25319').owlCarousel({
                  items : 1,
                  smartSpeed : 200,
                  autoplay : true,
                  autoplayTimeout : 1500,
                  autoplayHoverPause : true,
                  smartSpeed : 200,
                  fluidSpeed : 200,
                  autoplaySpeed : 200,
                  navSpeed : 200,
                  dotsSpeed : 200,
                  loop : true,
                  nav : false,
                  navText : ['Previous','Next'],
                  dots : false,
                  responsiveRefreshRate : 200,
                  slideBy : 1,
                  mergeFit : true,
                  autoHeight : false,
                  mouseDrag : true,
                  touchDrag : true
                });
                jQuery('#slider_25319').css('visibility', 'visible');
                sa_resize_slider_25319();
                window.addEventListener('resize', sa_resize_slider_25319);
                function sa_resize_slider_25319() {
                  var min_height = '10';
                  var win_width = jQuery(window).width();
                  var slider_width = jQuery('#slider_25319').width();
                  if (win_width < 480) {
                    var slide_width = slider_width / 1;
                  } else if (win_width < 768) {
                    var slide_width = slider_width / 1;
                  } else if (win_width < 980) {
                    var slide_width = slider_width / 1;
                  } else if (win_width < 1200) {
                    var slide_width = slider_width / 1;
                  } else if (win_width < 1500) {
                    var slide_width = slider_width / 1;
                  } else {
                    var slide_width = slider_width / 1;
                  }
                  slide_width = Math.round(slide_width);
                  var slide_height = '0';
                  if (min_height == 'aspect43') {
                    slide_height = (slide_width / 4) * 3;				slide_height = Math.round(slide_height);
                  } else if (min_height == 'aspect169') {
                    slide_height = (slide_width / 16) * 9;				slide_height = Math.round(slide_height);
                  } else {
                    slide_height = (slide_width / 100) * min_height;				slide_height = Math.round(slide_height);
                  }
                  jQuery('#slider_25319 .owl-item .sa_hover_container').css('min-height', slide_height+'px');
                }
                var owl_goto = jQuery('#slider_25319');
                jQuery('.slider_25319_goto1').click(function(event){
                  owl_goto.trigger('to.owl.carousel', 0);
                });
                jQuery('.slider_25319_goto2').click(function(event){
                  owl_goto.trigger('to.owl.carousel', 1);
                });
                jQuery('.slider_25319_goto3').click(function(event){
                  owl_goto.trigger('to.owl.carousel', 2);
                });
                jQuery('.slider_25319_goto4').click(function(event){
                  owl_goto.trigger('to.owl.carousel', 3);
                });
                var resize_25319 = jQuery('.owl-carousel');
                resize_25319.on('initialized.owl.carousel', function(e) {
                  if (typeof(Event) === 'function') {
                    window.dispatchEvent(new Event('resize'));
                  } else {
                    var evt = window.document.createEvent('UIEvents');
                    evt.initUIEvent('resize', true, false, window, 0);
                    window.dispatchEvent(evt);
                  }
                });
              });
            </script>
          </div>
        </div>
          <p class="fs18 mb-0 text-center"><?php echo $block_data2[0]->component_heading;?></p>
    </div>
  </section>
  <?php } ?>
</section>
<?php if(!empty($block_data3)) { ?>
<section class="bgblue mt-5">
  <div class="services-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 text-md-center">
          <h2 class="service-heading fs26"><?php echo $block_data3[0]->component_heading;?></h2>
          <p class="service-content"><?php echo $block_data3[0]->component_sub;?></p>
        </div>
        <?php foreach ($block_data3 as $blocks_data3) { ?>
        <div class="col-12 col-sm-12 col-md-4">
          <div class="service-card service-card1 bg-white">
            <div class="s-card-header">
              <h3 class="">
                <img decoding="async"  alt="" data-src="<?php echo base_url($blocks_data3->detail_image);?>" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img decoding="async" src="<?php echo base_url($blocks_data3->detail_image);?>" alt=""></noscript>
                <?php echo $blocks_data3->name;?>
              </h3>
              <p class=""><?php echo $blocks_data3->description;?></p>
            </div>
            <div class="s-card-content">
              <?php echo $blocks_data3->long_description;?>
              <a href="#" class="btn btn-outline-warning btn-sm  px-3 py-1 mt-4">Schedule a Demo </a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php if(!empty($block_data4)) { ?>
<section>
  <div class="agile-productive">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-md-center">
          <h3 class="fs26"><?php echo $block_data4[0]->component_heading;?></h3>
        </div>
        <?php foreach ($block_data4 as $blocks_data4) { ?>
        <div class="col-sm-12 col-md-4 text-md-center">
          <div class="agile-productive-item have-line-effect">
            <div class="align-items-center d-md-block d-flex justify-content-start row">
              <div class="col col-auto col-md-12 mb-0 mb-md-1 pr-0">
                <img decoding="async"  alt="<?php echo $blocks_data4->name;?>"  data-src="<?php echo base_url($blocks_data4->detail_image);?>" class="agile-productive-icon lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img decoding="async" src="<?php echo base_url($blocks_data4->detail_image);?>" alt="<?php echo $blocks_data4->name;?>" class="agile-productive-icon"></noscript>
              </div>
              <div class="col col-md-12">
                <h4 class="mb-0"><?php echo $blocks_data4->name;?></h4>
              </div>
            </div>
            <p class="mt-md-0 mt-2"><?php echo $blocks_data4->description;?></p>
            <a href="#" class="btn btn-action-btn btn-sm px-3">Learn More</a>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php if(!empty($clients)) { ?>
<section>
  <div class="logo-slide">
    <div class="container">
      <h2 class="text-md-center fs26"><?php echo $clients[0]->component_heading;?></h2>
      <p class="text-md-center"><?php echo $clients[0]->component_sub;?></p>
      <div class="logo-slide-wrapper">
        <div class="row">
          <div class="col-12 px-3 logo-by-misc">
            <div class="rt-container-fluid rt-wpls" id="rt-container-2493715314" data-sc-id="14876">
              <div class="rt-row grid-layout">
                <?php foreach ($clients as $client) { ?>
                <div class='rt-col-md-2 rt-col-sm-6 rt-col-xs-6'>
                  <div>
                    <div class='single-logo-container'>
                      <img decoding="async" width="250" height="100"   alt="" title="" data-src="<?php echo base_url($client->detail_image);?>" class="wls-logo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img decoding="async" width="250" height="100" src="<?php echo base_url($client->detail_image);?>" class="wls-logo" alt="" title="" /></noscript>
                    </div>
                  </div>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
</div><!-- .entry-content -->
</article><!-- #post-## -->
</main><!-- #main -->
</section><!-- #primary -->
</div><!-- #content -->
<?php if(!empty($faqs)) { ?>
<section class="py-0 mb-md-5 mb-0 position-relative faqContainer">
  <div class="container pt-3 pb-3 pt-md-5 pb-md-5 bgblue">
    <div class="schema-faq schema-faq-accordion py-3" id="faqListing">
      <div class="faq-heading pb-3 text-md-center">
        <h2 class="font-weight-bold mb-0 fs26 pb-0"><?php echo $faqs[0]->component_heading;?></h2>
        <p><small class="text-md-center fs16 mb-3 d-block"><?php echo $faqs[0]->component_sub;?></small>
      </div>
      <?php foreach ($faqs as $faq) { ?>
      <div class="faq-block">
        <div id="heading_npf">
          <h2 class="faq-title mb-0"><a href="#" data-toggle="collapse" data-target="#ans_npf<?php echo $faq->id;?>" aria-expanded="false" aria-controls="ans_npf" class="collapsed"><span class="mark-question mr-2">✅</span><?php echo $faq->name;?></a></h2>
        </div>
        <div id="ans_npf<?php echo $faq->id;?>" class="faq-content collapse" aria-labelledby="heading_npf" data-parent="#faqListing">
          <div class="faq-a"><?php echo $faq->long_description;?></div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
<?php if(!empty($schedule)) { ?>
<section class='form-section bluebgbtm ctaBanner py-5 mt-4'>
  <div class='container'>
    <div class='row eds-on-scroll eds-scroll-visible animated fadeInDown duration1 align-items-center justify-content-center'>
        <div class='col-xs-12 col-md-9 seprator'>
            <div class='title mb-3'><?php echo $schedule->component_heading;?></div>
            <p class='fs-custom mt-2 mb-0'>
              <?php echo $schedule->component_sub;?>
            </p>
        </div>
        <div class='col-xs-12 col-md-3 text-center'>
          <a class="main-action btn btn-action-btn btn-fill mt-2 mb-3" href="javascript:void(0)"> Schedule a demo </a>
        </div>
    </div>
  </div>
</section>
<?php } ?>