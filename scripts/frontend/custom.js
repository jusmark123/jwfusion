// JavaScript Document
(function($) {
	$(document).ready(function(e) {
		
		$('area[data-type="tooltip"]').first().parent().css('background-color', '#000');
		
		$('.trigger').on('click', showMenu );		
		
		function showMenu() {
			$('.mobile-navigation').animate({
				left: '1%',	
			}, 500);
			$('.trigger').off('click').on('click', hideMenu);
		}
		
		function hideMenu() {
			$('.mobile-navigation').animate({
				left: '-1500px',	
			}, 500);	
			$('.trigger').off('click').on('click', showMenu);		
		}
		$('area').hover(function(e) {
			if( $(this).attr('title') == "Medium Canyoneering Rope Bag") {
				$('.mapster_tooltip').addClass('tt-important');
			}
		});
		
		$('.home-button').button();		
			
		$('.frame-right').on('mouseover', function() {
			$('#blurred, .controls').fadeIn().css('display', 'block');
		}).on('mouseleave', function() {
			$('#blurred, .controls').fadeOut();
		});
				
		//$('html').height(screen.height);
		//$('.site-main').css('height', screen.height * .63 + 'px');
		
		/*$( '.site-main' ).on( 'scroll', function() {
			if( $(this).scrollTop() > 5 ) {
				$( '.site-footer' ).animate({
					position: 'relative',
				},300,'swing', function() {
					
					
				});
			} else if( $(this).scrollTop() < 5 ) {
				$( '.site-footer').animate({
					position: 'fixed',
				}, 300, 'swing', function() {
					
				});
			}
		});
		
		$( '.site-footer' )*/
		console.log( $('.site-header').height());
		console.log( 'site-main height = ' + $('.site-main').height() );
		console.log( 'window height = ' + $(document).height() );
		console.log( 'threshold = ' + $( document ).height() * .66 );
		console.log( 'window width = ' + $(document).width() );
		
		if( $(window).width() > 786 ) {
			$('.site-main').css( 'height', $(document).height() * .60 ).css('margin-top',$('.site-header').height());
			$('.site-header').css( 'height', $(document).height() * .20); 
			$('.site-footer').css('height', $(document).height() * .20);
		}
		if( $(window).width() > 1440 ) {
			$('.site-footer').height( 155 );	
			$('.made-here img').css('bottom', '40%' );
		}
		
		/*if( $( '.site-main' ).height() < $( window ).height() * .66 ) {
			$( '.site-header' ).css( 'position', 'relative' );
			$( '.site-footer' ).css( 'position', 'fixed' ).css( 'bottom', 0 ).css('width', '85%');
		} else {
			$( '.site-main' ).css( 'margin-top', '15%' );
			$( '.site-header' ).css( 'position', 'fixed' ).css( 'top', 0 ).css('width', '85%');
			$( '.site-footer' ).css( 'position', 'relative');	
		}*/
	});
	
})(jQuery);