
<div id="footer-widget" class="footer-widget-section bg-light">
		<div class="container pt-4 pb-1 pb-md-3">
			<div class="row mb-2">
				<div class="col-12 col-lg-3 col-xl-3 order-2 order-md-1 d-block d-md-flex d-lg-block justify-content-between align-items-end">
					<section id="block-4" class="border-right widget widget_block">
                        <div class="y-link d-inline-block mt-2">
                            <img decoding="async"  alt="<?php echo $site_data->site_name; ?>"  data-src="<?php echo base_url($site_data->site_logo); ?>" class="w-50 lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img decoding="async" src="<?php echo base_url($site_data->site_logo); ?>" alt="<?php echo $site_data->site_name; ?>" class="w-50" /></noscript>
                            <div class="my-4 d-flex flex-column">
                                <a href="telto:+917303393210" class="d-inline-block text-decoration-none"><?php echo $site_data->site_phone; ?></a>
                                <a href="mailto:<?php echo $site_data->site_email; ?>" class="d-inline-block text-decoration-none"><?php echo $site_data->site_email; ?></a>
                            </div>
                        </div>
                    </section>											
                    <section id="block-7" class="border-right widget widget_block">
                        <div class="row no-gutters mr-2 mr-md-4 align-items-center footer-social-icons">
                            <?php foreach ($social_data as $social) { ?>
                            <div class="col col-sm-2 col-md-2 linked">
                                <a href="<?php echo $social->social_url; ?>" aria-label="<?php echo $social->social_name; ?>" class="footer-social text-reset" target="_".<?php echo $social->social_target; ?>>
                                    <?php echo $social->social_svg; ?>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                    </section>									
                </div>
                <div class="col-12 col-lg-9 col-xl-9 order-1 order-md-4 mt-3 mt-md-0">
                    <section id="nav_menu-5" class="widget widget_nav_menu">
                        <div class="menu-footer-menu-container">
                            <ul id="menu-footer-menu" class="menu">
                                <?php foreach ($footer_data as $footer) { ?>
                                <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-54">
                                    <a><?php echo $footer->navigation_name;?> <i class="npfico-arrow-right" aria-hidden="true"></i></a>
                                    <?php if($footer->navigation_type=='multiple') { ?>
                                    <ul class="sub-menu">
                                        <?php foreach ($multiheader_data as $multiheader) { 
                                            if ($multiheader->navigation_id == $footer->id) { ?>
                                        <li id="menu-item-4719" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4719"><a href="<?php echo base_url($multiheader->multilevel_slug);?>"><?php echo $multiheader->multilevel_name;?></a></li>
                                        <?php } } ?>
                                    </ul>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </section>				
                </div>							
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-9 col-md-12">
                    <section id="block-6" class="widget widget_block"></section>
                </div>
            </div>
        </div>
    </div>
	
        <footer id="colophon" class="site-footer navbar-light" role="contentinfo">
            <div class="container pt-3 pb-3">
                <div class="site-info">                           
                    <section id="block-11" class="widget widget_block">
                    <div class="align-items-center border-bottom d-md-flex global-footer justify-content-between mb-4 pb-4 pt-2 small m-text">
                        <div class="text-left py-0 mb-2 mb-md-0">
                            <div>
                                <?php echo $site_data->copyright_text; ?>
                            </div>
                        </div>
                        <div>
                            <h5 class="font-weight-semibold fs12 text-muted mt-md-0 mt-3 mb-0 text-md-right text-left mb-md-2 mb-0">Opening Hours: <?php echo $site_data->opening_hours; ?></h5>
                            
                        </div>
                    </div>
                </section>                                                     
                <section id="block-8" class="widget widget_block">
                    <div class="text-center m-text small">
                        <a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a>
                    </div>
                </section> 
                                        </div><!-- close .site-info -->
            </div>
        </footer><!-- #colophon -->
</div><!-- #page -->

<!--Amazon AWS CDN Plugin. Powered by WPAdmin.ca 3.0.1--><script>document.addEventListener("DOMContentLoaded", function(event) {
	if(jQuery('.yt-frame').length){
		var offsetIframe = jQuery('.yt-frame').offset().top;
		jQuery(document).on('scroll', function(){ 
		 if(jQuery('html').scrollTop() > (offsetIframe - 1000) && jQuery('.yt-frame').attr('src') == '' || jQuery('body').scrollTop() > (offsetIframe - 1000) && jQuery('.yt-frame').attr('src') == ''){
		  jQuery('.yt-frame').attr('src', jQuery('.yt-frame').attr('data-src'))
		 }
		})
	}
});</script><link rel='stylesheet' id='owl_carousel_css-css' href='<?php echo base_url('assets/wp-content/plugins/slide-anything/owl-carousel/owl.carousel7d13.css?ver=2.2.1.1'); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='owl_theme_css-css' href='<?php echo base_url('assets/wp-content/plugins/slide-anything/owl-carousel/sa-owl-themed5f7.css?ver=2.0'); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='non-critical-css' href='<?php echo base_url('assets/wp-content/themes/wp-bootstrap-starter/combine-noncritical109c.css?ver=6.6.2'); ?>' type='text/css' media='all' />
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/photo-gallery/js/jquery.lazy.min2b93.js?ver=1.8.28'); ?>" id="bwg_lazyload-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/themes/wp-bootstrap-starter/inc/assets/js/bt-bundle.min109c.js?ver=6.6.2'); ?>" id="wp-bt-bundle-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/themes/wp-bootstrap-starter/js/theme-custom.min7788.js?ver=1709212974'); ?>" id="min-script-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/3d-flipbook-dflip-lite/assets/js/dflip.min27d7.js?ver=2.3.32'); ?>" id="dflip-script-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/wp-smushit/app/assets/js/smush-lazy-load-native.min2916.js?ver=3.13.1'); ?>" id="smush-lazy-load-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-includes/js/hoverIntent.min3e5a.js?ver=1.10.2'); ?>" id="hoverIntent-js"></script>
<script type="text/javascript" id="megamenu-js-extra">
/* <![CDATA[ */
var megamenu = {"timeout":"300","interval":"100"};
/* ]]> */
</script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/megamenu/js/maxmegamenu2950.js?ver=3.3.1.2'); ?>" id="megamenu-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/slide-anything/owl-carousel/owl.carousel.min77e6.js?ver=2.2.1'); ?>" id="owl_carousel_js-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/slide-anything/js/jquery.mousewheel.mina9d5.js?ver=3.1.13'); ?>" id="mousewheel_js-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/slide-anything/owl-carousel/owl.carousel2.thumbs.minf23e.js?ver=0.1.8'); ?>" id="owl_thumbs_js-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/wp-logo-showcase/assets/vendor/jquery.actual.min47a7.js?ver=1.4.5'); ?>" id="rt-actual-height-js-js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wp-content/plugins/wp-logo-showcase/assets/js/wplogoshowcase47a7.js?ver=1.4.5'); ?>" id="rt-wls-js"></script>
<script data-cfasync="false"> var dFlipLocation = "wp-content/plugins/3d-flipbook-dflip-lite/assets/index.html"; var dFlipWPGlobal = {"text":{"toggleSound":"Turn on\/off Sound","toggleThumbnails":"Toggle Thumbnails","toggleOutline":"Toggle Outline\/Bookmark","previousPage":"Previous Page","nextPage":"Next Page","toggleFullscreen":"Toggle Fullscreen","zoomIn":"Zoom In","zoomOut":"Zoom Out","toggleHelp":"Toggle Help","singlePageMode":"Single Page Mode","doublePageMode":"Double Page Mode","downloadPDFFile":"Download PDF File","gotoFirstPage":"Goto First Page","gotoLastPage":"Goto Last Page","share":"Share","mailSubject":"I wanted you to see this FlipBook","mailBody":"Check out this site {{url}}","loading":"DearFlip: Loading "},"viewerType":"flipbook","moreControls":"download,pageMode,startPage,endPage,sound","hideControls":"","scrollWheel":"false","backgroundColor":"#777","backgroundImage":"","height":"auto","paddingLeft":"20","paddingRight":"20","controlsPosition":"bottom","duration":800,"soundEnable":"true","enableDownload":"true","showSearchControl":"false","showPrintControl":"false","enableAnnotation":false,"enableAnalytics":"false","webgl":"true","hard":"none","maxTextureSize":"1600","rangeChunkSize":"524288","zoomRatio":1.5,"stiffness":3,"pageMode":"0","singlePageMode":"0","pageSize":"0","autoPlay":"false","autoPlayDuration":5000,"autoPlayStart":"false","linkTarget":"2","sharePrefix":"flipbook-"};</script>

<!-- Modal -->
<!--end-->
</body>


<!-- Mirrored from www.meritto.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Jan 2025 07:20:15 GMT -->
</html>