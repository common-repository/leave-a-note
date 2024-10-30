jQuery(document).ready(function($){
								
	var notes = $('li.notes');
	var oldLeft;
	var oldTop;
	var showhidebutton = '<button type="button" id="leaveanote_showhide_button">Show/Hide Comments</button>';
	$(showhidebutton).insertAfter("#commentform");
	var showHide = $('#leaveanote_showhide_button');
	
	notes.hover(
		function(e){
			span = $(this).children('span');
			span.css({'opacity':'1', 'cursor':'move'});
			span.preventDefault();
			
		}, function(e){
		
			span = $(this).children('span');
			span.animate({
				'opacity':'0'
			}, 150);
			span.css({'cursor':'default'});
			span.preventDefault();
		}
		);	
	
	notes.mousedown(function(){
		oldLeft = $(this).css('left');
		oldTop = $(this).css('top');
		
		notes.css({
			'z-index' : 5
		});
		$(this).css({
			'z-index': 10
		});
	});
	
	notes.mouseup(function(){
		
		posLeft = $(this).css('left');
		posTop = $(this).css('top');
		
		message = $(this).text();	
		var data_up = "oldLeft="+oldLeft+"&oldTop="+oldTop+"&posLeft="+posLeft+"&posTop="+posTop;
		$.ajax({
   			type: "POST",
   			url: pluginRoot+"/js/ajax.php",
   			data: data_up,
   			success: function(msg){
				
   			}
 		});
	});

	notes.draggable({ containment: 'body' });
	notes.each(function(){
		span = $(this).children("span");
		span.css({'bottom': String($(this).height()+10)+'px'});
		span.css({'opacity':'0'});
	});
	
	showHide.mouseup(function(){
		if (notes.css('display') == 'block'){
			notes.css({'display':'none'})
		} else if (notes.css('display') == 'none'){
			notes.css({'display':'block'})
		}
	});
});



