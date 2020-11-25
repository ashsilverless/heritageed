//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function($) {
	
	var navHeight = $('nav').height();
	
	$('.hero .container').css('padding-top', navHeight);
	
	$('html')
		.delay(300)
		.queue(function(next) {
			$(this).addClass('loaded');
			next();
		});

	$('.read-more.expand').click(function(e) {
		e.preventDefault();
		$(this).closest('.upper').siblings('.lower').find('.more').slideDown();
		$(this).fadeOut();
	});

	$('.read-more.remove').click(function(e) {
		e.preventDefault();
		$(this).closest('.intro-text.more').slideUp();
		$(this).closest('.lower').siblings('.upper').find('.read-more').fadeIn();
	});

	$('.vertical-tabs__tabs').find('.heading').first().addClass('active');
	$('.vertical-tabs__content').find('.item').first().show();
	
	$('.vertical-tabs__tabs .heading').click(function(e) {
		e.preventDefault();	
		$(this).siblings('.heading').removeClass('active');
		$(this).addClass('active');
		var targetContent = '.' + $(this).attr('id');
		$(this).closest('.vertical-tabs__tabs').siblings('.vertical-tabs__content').find('.item').slideUp();
		$(this).closest('.vertical-tabs__tabs').siblings('.vertical-tabs__content').find(targetContent).slideDown();
	});
	
	$('.toggle-faq .item .question').click(function(e) {
		$('.toggle-faq .item .answer').slideUp();
		$(this).closest('.item').find('.answer').slideDown();
	});
	
	$('.process-carousel').owlCarousel({
		center: true,
		items:3,
		loop:false,
		margin:40,
		responsive:{
			600:{
				items:3
			}
		}
	});

	$('.testimonial-carousel').owlCarousel({
		items: 1,
		loop:true,
		margin:40,
		responsive:{
			600:{
				items:1
			}
		}
	});
	
	
	$("nav a, footer a, .book-now-cta").on('click', function(e) {
		if (this.hash !== "") {
		  e.preventDefault();
		  var hash = this.hash;
		  if (hash == '#what') {
			  $('.vertical-tabs__tabs .heading').removeClass('active');
			  $('.vertical-tabs__tabs #tab5').addClass('active');
			  $('.vertical-tabs__content .item').slideUp();
			  $('.vertical-tabs__content .tab5').slideDown();
		  } else {
			  //
		  }
		  var desiredHeight = $('.nav-overlay nav').height() + 40;
		  $('html, body').animate({
			scrollTop: $(hash).offset().top - desiredHeight
		  }, 800, function(){
			//window.location.hash = hash;
			$('.nav-overlay').removeClass('active');
		  });
		}
	  });
	  
	$(window).scroll(function(){
		if ($(this).scrollTop() > navHeight) {
		   $('body').addClass('scrolled');
		} else {
		   $('body').removeClass('scrolled');
		}
	});
	
	$(".nav-trigger").on('click', function(e) {
		e.preventDefault();
		$('.nav-overlay').toggleClass('active');
	});
	
	$('.wpcf7-form-control').on('input', function() {
		if ($(this).val()) {
			$(this)
				.parents('.form-field')
				.addClass('contains-content');
		} else {
			$(this)
				.parents('.form-field')
				.removeClass('contains-content');
		}
	});
	
}); //Don't remove ---- end of jQuery wrapper
