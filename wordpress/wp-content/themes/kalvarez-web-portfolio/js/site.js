jQuery(document).ready(function($) {
	var stars=800;
	var $stars=$("#stars");
	var r=800;
	for(var i=0;i<stars;i++){
		var $star=$("<div/>").addClass("star");
		$stars.append($star);
	}
	$(".star").each(function(){
		var cur=$(this);
		var s=0.2+(Math.random()*1);
		var curR=r+(Math.random()*300);
		cur.css({ 
		  transformOrigin:"0 0 "+curR+"px",
		  transform:" translate3d(0,0,-"+curR+"px) rotateY("+(Math.random()*360)+"deg) rotateX("+(Math.random()*-50)+"deg) scale("+s+","+s+")"
		   
		});
	});


	var overlayModal = {
		content: 'No content passed',
		// numProp: 4,
		// bProp: true,
		// arrayLiteral: ['value1','value2','value3','value4'],
		// pos:{ //nested object literal
		// 	x: 40,
		// 	y: 300
		// },
		onStart: function(content){ //function
			// console.log(overlayModal.content);
			overlayModal.content = content;
			overlayModal.setUp();
		},
		setUp: function() {
			// console.log(overlayModal.content);
			var modalMarkup = '<div class="modal"><a href="#" id="close">X Close</a><div class="container">';
			modalMarkup += overlayModal.content;
			modalMarkup += '</div></div>';
			$('body').addClass('modal-on').append(modalMarkup);
		},
		kill: function(){
			$('body').removeClass('modal-on');
			$('div.modal').remove();
		}

	};

	//thumbnails
	$('.thumbnail a.trigger').on('click',function(e){
		e.preventDefault();
		var esto = $(this);	
		var content = esto.parent().html();
		overlayModal.onStart(content);
	});

	$('#close').live('click',function(e){
		e.preventDefault();
		overlayModal.kill();
	});

});