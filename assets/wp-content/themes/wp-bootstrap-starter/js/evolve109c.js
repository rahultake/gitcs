jQuery(document).ready(function(){
	jQuery('#evolve-past-chapter').owlCarousel({
		loop:false,
		margin:10,
		dots: false,
		nav: true,
        onInitialized: setNavAccessibility,
        onChanged: setNavAccessibility,
		responsive:{
			0:{
				items:1,
				nav: true,

			},
			600:{
				items:3,
				stagePadding: 15
			},
			1000:{
				items:4,
				margin:20,
				stagePadding: 80
			},
			1200:{
				items:5,
				margin:20,
				stagePadding: 80
			}
		}
	});
	jQuery( ".owl-prev").attr({'aria-label': 'Previous Slide'}).removeAttr('role').html('<i class="fa fa-arrow-left" aria-hidden="true"></i>');
	jQuery( ".owl-next").attr({'aria-label': 'Next Slide'}).removeAttr('role').html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');


	jQuery('#evolve-upcoming-chapter').owlCarousel({
		loop:false,
		dots: false,
		nav: true,
		mouseDrag: false,
        onInitialized: setNavAccessibility,
        onChanged: setNavAccessibility,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
    jQuery( ".owl-prev").attr({'aria-label': 'Previous Slide'}).removeAttr('role').html('<i class="fa fa-arrow-left" aria-hidden="true"></i>');
	jQuery( ".owl-next").attr({'aria-label': 'Next Slide'}).removeAttr('role').html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');


	jQuery('.toggle-btn').each(function () {
        let isLarge = true;

        jQuery(this).on('click keydown', function (event) {
            if (event.type === 'keydown' && event.key !== 'Enter') {
                return;
            }
    
            const bgSection = jQuery(this).closest('.bg-image');
    
            if (isLarge) {
                bgSection.removeClass('expend');
            } else {
                bgSection.addClass('expend');
            }
    
            isLarge = !isLarge;
    
            if (event.type === 'keydown') {
                event.preventDefault();
            }
        });
    });

	function updateCountdown() {
		jQuery('.upcoming-chapter').each(function () {
		var eventDate = jQuery(this).data('date');
		var eventTime = jQuery(this).data('time');
		var eventDateTime = new Date(eventDate + ' ' + eventTime);

		var now = new Date();
		
		var timeDifference = eventDateTime - now;

		var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
		var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

		jQuery(this).find('.days div:first-child').text(days);
		jQuery(this).find('.hours div:first-child').text(hours);
		jQuery(this).find('.minutes div:first-child').text(minutes);
		jQuery(this).find('.seconds div:first-child').text(seconds);

		if (timeDifference < 0) {
			jQuery(this).find('.days div:first-child').text('0');
			jQuery(this).find('.hours div:first-child').text('0');
			jQuery(this).find('.minutes div:first-child').text('0');
			jQuery(this).find('.seconds div:first-child').text('0');
			
			if (!jQuery(this).find('.live-bagde').length) {
				jQuery(this).append('<div class="live-bagde"><span class="blink-circle blink"></span>Event is Live Now</div>');
			}
		}
		});
	}

	setInterval(updateCountdown, 1000);

    jQuery('.tab-btn').on('click', function () {
        const targetId = jQuery(this).data('target');
        const $targetPane = jQuery(targetId);
        const sliderId = $targetPane.data('slider-id');
        const $placeholder = $targetPane.find('.slider-placeholder');

        const $loader = jQuery('.slider-loader');
        
        $loader.removeClass('d-none');

        if (!$targetPane.hasClass('loaded')) {
            $placeholder.html('');
            
            jQuery.ajax({
                url: ajax_object.ajax_url,
                method: 'GET',
                data: {
                    action: 'load_sa_slider',
                    slider_id: sliderId
                },
                success: function (response) {
                    $placeholder.html(response);
                    $targetPane.addClass('loaded');

                    const $owlCarousel = $targetPane.find('.owl-carousel');
                    if ($owlCarousel.length) {
                        $owlCarousel.owlCarousel({
                            items: 1,
                            nav: true,
                            dots: false,
                            onInitialized: setNavAccessibility,
                            onChanged: setNavAccessibility,
                        });

                        $targetPane.find('.owl-prev').attr('aria-label', 'Previous Slide').removeAttr('role').html('<i class="fa fa-arrow-left" aria-hidden="true"></i>');
                        $targetPane.find('.owl-next').attr('aria-label', 'Next Slide').removeAttr('role').html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
                    }
                },
                error: function () {
                    $placeholder.html('Failed to load content.');
                },
                complete: function () {
                    setTimeout(() => {
                        $loader.addClass('d-none');
                    }, 100);
                }
            });
        }else {
            setTimeout(() => {
                $loader.addClass('d-none');
            }, 1000);
        }
    });
    jQuery('.tab-btn.active').trigger('click');
    
	
	const mobileMediaQuery = window.matchMedia("(max-width: 567px)");

    function applyMobileClass() {
        if (mobileMediaQuery.matches) {
            jQuery('#horizonsSlider,#insightSlider').addClass('owl-carousel');

            jQuery('#horizonsSlider, #insightSlider').owlCarousel({
                loop:false,
                dots: false,
                margin:10,
                nav: true,
                mouseDrag: false,
                onInitialized: setNavAccessibility,
                onChanged: setNavAccessibility,
                responsive:{
                    0:{
                        items:1,
                    },
                    600:{
                        items:1
                    }
                }
            });
			jQuery( ".owl-prev").attr('aria-label', 'Previous Slide').html('<i class="fa fa-arrow-left" aria-hidden="true"></i>');
			jQuery( ".owl-next").attr('aria-label', 'Next Slide').html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');

        } else {
            jQuery('#horizonsSlider,#insightSlider').removeClass('owl-carousel');
        }
    }

    applyMobileClass();

    mobileMediaQuery.addEventListener('change', applyMobileClass);

    function setNavAccessibility() {
        jQuery('.owl-prev, .owl-next').each(function () {
        if (jQuery(this).hasClass('disabled')) {
            jQuery(this).attr('tabindex', '-1').attr('aria-disabled', 'true');
        } else {
            jQuery(this).attr('tabindex', '0').attr('aria-disabled', 'false');
        }
        });
    }

});