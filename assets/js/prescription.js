$(window).load(function() {
	
        $(".loader").fadeOut("slow");
});

$(function () {
  $(document).scroll(function () {
	  var nav = $(".scroll-top-background");
	  nav.toggleClass('scrolled', $(this).scrollTop() > nav.height());
	});
});
window.scr = ScrollReveal();

scr.reveal('.left-animation',{
	origin: 'left',
	duration: 1000,
	distance: '25rem',
	delay: 300,
	
});
scr.reveal('.right-animation',{
	origin: 'right',
	duration: 1000,
	distance: '25rem',
	delay: 600,
	
});


$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});


$(document).ready(function(){
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		dots:false,
		nav:true,
		mouseDrag:false,
		autoplay:true,
		animateOut: 'fadeOut',
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

});

$('.register').each(function(i){
  $(this).click(function(){
  $('.registerform').addClass('registerform-active');
  $('.login').css('color','grey');
  $('.register').css('color','#24c9a7');
   $('.login-heading').css('display','none');
   $('.signup-heading').css('display','block');
  });
});
$('.login').each(function(i){
  $(this).click(function(){
  $('.registerform').removeClass('registerform-active');
  $('.login').css('color','#24c9a7');
   $('.register').css('color','grey');
   $('.signup-heading').css('display','none');
   $('.login-heading').css('display','block');
  });
});

 function remove_prescription(id) {
	if(confirm('Are You Sure You Want To Remove This?')) {
		$.ajax({
			type: 'post',
			url: 'delete.php',
			data: 'id=' + id,
			success: function(data){
				$('.deleted'+id).hide('slow');
			}
		});
	}
} 
function use_drug(id) {
		$.ajax({
			type: 'post',
			url: 'used.php',
			data: 'id=' + id,
			success: function(data){
				$('.marked'+id).addClass('used');
				$('.used-d-btn'+id).attr('disabled','true');
				$('.used-d-btn'+id).text("USED");
			}
		});
} 
 $(document).ready(function(){
	$('.add-presc-btn').click(function(event){
		event.preventDefault();
		//$('#from').prop("required", true);
		var loading = $('.modal-content .loader');
		
		if($('#name').val() == "")  {  
			alert("Drug name is required");  
		}
		else if($('select[name=quantity]').val() == 'drug quantity')  {  
			alert("Quantity is required");  
			$('input[name=quantity]').attr("required", true); 
		} 
		 
		else if($('#picker').val() == "")  {  
			alert("Date is required");  
		} 
		else if($('#topicker').val() == "")  {  
			alert("Time is required");  
		} 
		else if($('select[name=duration]').val() == 'drug duration')  {  
			alert("Duration is required");  
			$('input[name=duration]').attr("required", true); 
		}
		
		
		else {
			loading.fadeIn();
			$.ajax({
				method: 'post',
				url: 'post.php',
				data: $('.add-presc form').serialize(),
				
				success: function(data) {
					$('.prescription-container').html(data);
					$('.presc-form')[0].reset();
					loading.hide();
					$('#add-prescription-modal').modal('hide');
					window.location.reload();
				}
			});
		}
	});
}); 
