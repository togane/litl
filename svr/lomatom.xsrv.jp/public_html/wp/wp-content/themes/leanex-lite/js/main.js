( function($) {
    'use strict';

    /* Scroll on the page sections */
    $('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 40
                }, 900);
                return false;
            }
        }
    });

    /* Nav on Scroll */
	if ($(window).width() > 767) {
    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 650;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('on');
        } else {
            $('.navbar-default').removeClass('on');
        }
    });
	}

    $('body').scrollspy({
        target: '.navbar-default',
        offset: 80
    });
	
	/* Nav Mobile */
	if ($(window).width() < 767) {
            $('.navbar-default').addClass('on');
    } else {
            $('.navbar-default').removeClass('on');
    }
			
	/**
	 * Test if an iOS device.
	 */
	function checkiOS() {
		return /iPad|iPhone|iPod/.test(navigator.userAgent) && ! window.MSStream;
	}
	
	/*
	 * Test if background-attachment: fixed is supported.
	 * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
	 */
	function supportsFixedBackground() {
		var el = document.createElement('div'),
			isSupported;

		try {
			if ( ! ( 'backgroundAttachment' in el.style ) || checkiOS() ) {
				return false;
			}
			el.style.backgroundAttachment = 'fixed';
			isSupported = ( 'fixed' === el.style.backgroundAttachment );
			return isSupported;
		}
		catch (e) {
			return false;
		}
	}
	
	// Fire on document ready.
	$( document ).ready( function() {
		if ( true === supportsFixedBackground() ) {
			document.documentElement.className += ' background-fixed-supported';
		}
	});
	
	/* Nav Mobile */
	if ($(window).width() < 767) {
            $('.navbar-default').addClass('on');
    } else {
            $('.navbar-default').removeClass('on');
    }

    /* Isotope Filter */
    $(window).load(function(){
    var $container2 = $('#blog-masonry');
      $container2.isotope({
          itemSelector: '.post-box'
      });
    });
    $(window).load(function() {
        var $container = $('#lightbox');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    });
    $(window).load(function() {
        var $container = $('#portfolio-masonry');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.portfolio-cat.filterable a').click(function() {
            $('.portfolio-cat.filterable .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    });
	
	/*
	 * To prevent the bug of the menu toggle for iPhone
	 */
	$('a.dropdown-toggle, .dropdown-menu a').on('touchstart', function(e) {
		e.stopPropagation();
	});

})(jQuery);