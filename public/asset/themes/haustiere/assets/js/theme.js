(function($){
"use strict"; // Start of use strict
$(function() {
	//Filter Price
	if($('.range-filter').length>0){
		$('.range-filter').each(function(){
			var self = $(this);
			var symbol = self.find( ".price-range" ).attr('data-symbol');
			var min_price = self.find( 'input[name="min_price"]' ).data( 'min' );
			var max_price = self.find( 'input[name="max_price"]' ).data( 'max' );
			var current_min_price = self.find( 'input[name="min_price"]' ).val();
			var current_max_price = self.find( 'input[name="max_price"]' ).val();
			self.find( ".price-range" ).slider({
				range: true,
				min: min_price,
				max: max_price,
				values: [ current_min_price, current_max_price ],
				slide: function( event, ui ) {
					self.find( ".min-price" ).text( symbol + ui.values[ 0 ]);
					self.find( ".max-price" ).text( symbol + ui.values[ 1 ]);
					self.parent().find( 'input[name="min_price"]' ).val( ui.values[0] );
					self.parent().find( 'input[name="max_price"]' ).val( ui.values[1] );
				}
			});
			self.find( ".min-price" ).appendTo(self.find('.ui-slider-handle').first()).text( symbol + self.find( ".price-range" ).slider( "values", 0 ));
			self.find( ".max-price" ).appendTo(self.find('.ui-slider-handle').last()).text( symbol + self.find( ".price-range" ).slider( "values", 1 ));
		});
	}
	//Tag Toggle
	if($('.toggle-tab').length>0){
		$('.toggle-tab').each(function(){
			$(this).find('.toggle-tab-title').on('click',function(event){
				if($(this).next().length>0){
					event.preventDefault();
					var self = $(this);
					self.parent().siblings().removeClass('active');
					self.parent().toggleClass('active');
					self.parents('.toggle-tab').find('.toggle-tab-content').slideUp();
					self.next().stop(true,false).slideToggle();
				}
			});
		});
	}
});

//Document Ready
jQuery(document).ready(function(){
	//Circle Arc Text
	$('#titleCircleSlider').arctext({radius: 300})
	//Custom Circle Slider
	if($('.custom-circle-slider').length > 0){
		$('.custom-circle-slider').each(function(){
			var self = $(this);
			var num = parseInt(self.attr('data-show'),10);
			var max = self.find('.circle-slider .item').length-1;
			var min = max - num;
			var check = self.find('.circle-slider .item').length;
			self.append('<div class="circle-carousel"></div>');
			if(check>num){
				self.append('<div class="circle-control"><a href="#" class="prev"><i class="icon ion-ios-arrow-up"></i></a><a href="#" class="next"><i class="icon ion-ios-arrow-down"></i></a></div>');
			}
			for(var i=0;i<=max;i++){
				self.find('.circle-slider .item').eq(i).attr("data-item",i);
			}
			var start = self.find('.circle-slider .item.start').index();
			var active = self.find('.circle-slider .item.active').index();
			var stop = start + num-1;
			self.find('.circle-slider .item').eq(stop).addClass('stop');
			
			self.find('.circle-carousel').empty();
			for(var i=0;i<num;i++){
				var item = i+start;
				var index = item+1;
				var img = self.find('.circle-slider .item').eq(item).find('img').attr('src');
				self.find('.circle-carousel').append('<div class="item item-'+i+'" data-item="'+item+'"><a href="#"><img src="'+img+'" alt="" /></a><span class="index">'+index+'</span></div>');
			}
			var data = self.find('.circle-slider .item.active').attr('data-item');
			self.find('.circle-carousel .item').each(function(){
				var data_check = $(this).attr('data-item');
				if(data_check == data){
					$(this).addClass('active');
				}
			});
			self.on('click','.circle-carousel .item a',function(event){
				event.preventDefault();
				var index = $(this).parent().attr('data-item');
				$(this).parent().siblings().removeClass('active');
				$(this).parent().addClass('active');
				self.find('.circle-slider .item').removeClass('active');
				self.find('.circle-slider .item').eq(index).addClass('active');
			});
			self.find('.circle-control .next').on('click',function(event){
				event.preventDefault();
				var active = self.find('.circle-slider .item.active').index();
				if(active == max){
					active = 0;
				}else{
					active = active + 1;
				}
				self.find('.circle-slider .item').removeClass('active');
				self.find('.circle-slider .item').eq(active).addClass('active');
				self.find('.circle-carousel').empty();
				var start = self.find('.circle-slider .item.start').index();
				var stop = start + num;
				if(stop > max){
					start = 0;
					stop = start + num - 1;
				}else{
					start = start + 1;
					stop = start + num - 1;
				}
				self.find('.circle-slider .item').removeClass('start');
				self.find('.circle-slider .item').eq(start).addClass('start');
				self.find('.circle-slider .item').removeClass('stop');
				self.find('.circle-slider .item').eq(stop).addClass('stop');
				for(var i=0;i<num;i++){
					var item = i+start;
					var index = item+1;
					var img = self.find('.circle-slider .item').eq(item).find('img').attr('src');
					self.find('.circle-carousel').append('<div class="item item-'+i+'" data-item="'+item+'"><a href="#"><img src="'+img+'" alt="" /></a><span class="index">'+index+'</span></div>');
				}
				var data = self.find('.circle-slider .item.active').attr('data-item');
				self.find('.circle-carousel .item').each(function(){
					var data_check = $(this).attr('data-item');
					if(data_check == data){
						$(this).addClass('active');
					}
				});
			});
			self.find('.circle-control .prev').on('click',function(event){
				event.preventDefault();
				var active = self.find('.circle-slider .item.active').index();
				if(active == 0){
					active = max;
				}else{
					active = active - 1;
				}
				self.find('.circle-slider .item').removeClass('active');
				self.find('.circle-slider .item').eq(active).addClass('active');
				
				self.find('.circle-carousel').empty();
				var start = self.find('.circle-slider .item.start').index();
				var stop = start + num;
				if(start < 1){
					start = min;
					stop = start + num - 1;
				}else{
					start = start - 1;
					stop = start + num - 1;
				}
				self.find('.circle-slider .item').removeClass('start');
				self.find('.circle-slider .item').eq(start).addClass('start');
				self.find('.circle-slider .item').removeClass('stop');
				self.find('.circle-slider .item').eq(stop).addClass('stop');
				for(var i=0;i<num;i++){
					var item = i+start;
					var index = item+1;
					var img = self.find('.circle-slider .item').eq(item).find('img').attr('src');
					self.find('.circle-carousel').append('<div class="item item-'+i+'" data-item="'+item+'"><a href="#"><img src="'+img+'" alt="" /></a><span class="index">'+index+'</span></div>');
				}
				var data = self.find('.circle-slider .item.active').attr('data-item');
				self.find('.circle-carousel .item').each(function(){
					var data_check = $(this).attr('data-item');
					if(data_check == data){
						$(this).addClass('active');
					}
				});
			});
		});
	}
	//Toggle Adv
	if($('.wrap-adv-toggle').length>0){
		$('.wrap-adv-toggle .close-adv').on('click',function(event){
			event.preventDefault(); 
			var self = $(this);
			self.parent().slideUp();
		});	 
	}
	//Fancy Box
	if($('.fancybox').length>0){
		$('.fancybox').fancybox();	
	}
	if($('.fancybox-media').length>0){
		$('.fancybox-media').attr('rel', 'media-gallery').fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',
			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});
	}
});
//Window Load
jQuery(window).on('load',function(){ 
	//Count Down
	if($('.final-countdown').length>0){
		$('.final-countdown').each(function(){
			var self = $(this);
			var finalDate = self.data('countdown');
			self.countdown(finalDate, function(event) {
				self.html(event.strftime(''
					+'<div class="clock day"><strong class="number">%D</strong><span class="text">Days</span></div>'
					+'<div class="clock hour"><strong class="number">%H</strong><span class="text">Hours</span></div>'
					+'<div class="clock min"><strong class="number">%M</strong><span class="text">Minutes</span></div>'
					+'<div class="clock sec"><strong class="number">%S</strong><span class="text">Seconds</span></div>'
				));
			});
		});
	}
});
//Window Resize
jQuery(window).on('resize',function(){

});
//Window Scroll
jQuery(window).on('scroll',function(){
	
});
})(jQuery); // End of use strict