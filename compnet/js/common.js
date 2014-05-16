

//Set global variables
// Use global objects as pseudo-namespaces
var mobile = {};
var table = {};
var wp_images = {};

//Initializing function
$(function(){

	//Binding functions
	mobile.bind_responsive_toggle();
	table.even_odd();
	wp_images.make_responsive();

	//Event functions

});

// Table Methods
table.even_odd = function(){
	$('table tr:odd').addClass('odd');
	$('table tr:even').addClass('even');
}

// Image methods
wp_images.make_responsive = function(){
	// Note: Make sure right margin does not appear when looking at
	// small sizes.
	$('.wp-caption.alignone, .wp-caption.alignnone').each(function(){
		$(this).removeAttr('style');
		$(this).attr('style', 'margin:0px 0px 20px 0px;');
		// $(this).attr('style', 'width:100%');
		// $(this).attr('width','100%');
	});

	$('.wp-caption-image img').each(function(){
		$(this).removeAttr('width');
		$(this).removeAttr('height');
		$(this).attr('style', 'height:auto; margin:0px auto; width:auto;');
		// $(this).attr('height','auto');
		// $(this).attr('width','100%');
		// $(this).attr('width','auto');
	});
}

// Mobile Methods
mobile.bind_responsive_toggle = function(){
	$('a.responsive').on('click', function(){
		var cookie = $.cookie('responsive');
		if( cookie == null || cookie == 'true' ){
			$.cookie('responsive', 'false', { expires: 7, path: '/' });
		}else{
			$.cookie('responsive', 'true', { expires: 7, path: '/' });
		}
		document.location.reload(true);
		return false;
	});
}

mobile.bind_scroll = function(){

	// Smooth scrolling horizontally based on vertical page scroll
	// $('nav .device').css({'left':106+780*($(window).scrollTop()/$(document).height())});

	// $(window).scroll(function(){
	// 	var magicnumber = $(window).scrollTop()/($(document).height());

	$(window).on('scroll', function(){
		var top = $(window).scrollTop();
		var total_height = $(document).height();
		var window_height = $(window).height();
		// console.log(top, total_height, window_height, top/total_height);
	});

}

mobile.bind_window_resize = function(){

	$(window).on('change', function(){
	
	});

}

mobile.image_max_width = function(){

	$('div.content')
		.find('img')
		.each(function(e){

			var div = $('<div>')
						.attr('class', 'content_image_wrapper ' + $(this).attr('class'))
						.css('max-width', '100%')
						.css('width', $(this).css('width'))
						.css('overflow', 'auto');

			$(this)
				.css('max-width', '100%')
				.wrap(div);

		});

}

function init_filetree() {
	
	$('li.ft-directory').each(function(e){
		
		//Hide Empty Directories
		if( $(this).find('ul').length == 0){
			$(this).hide();
		}
		
		//Set Click Toggle
		$(this).find('a').unbind('click').bind('click', function(){
			if( $(this).next('ul').is(':hidden') ){ $(this).next('ul').show(); }
			else{ $(this).next('ul').hide(); }
			
			if( $(this).hasClass('file') ){ return true; }
			else{ return false; }
		});
		
		//Set Initial State
		if( $(this).parent().hasClass('closed') ){
			$(this).find('ul').hide();
		}
		
	});
	
}
