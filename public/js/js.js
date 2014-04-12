// JS DOCUMENT

$(document).ready(function(){

    $('#registerWrapper').hide();
     $('.sign-up').on('click', function () {
        $('.userforms').toggle();  
    });
	
	$('.user_header_list').hide();
    $('.user_header_nav').on('click', function() {
   		 $(this).find('li').slideToggle();
	}); 
	 
	$('.sidebar').hide();
    $('#sidebarbutt').on('click', function() {
        $('.sidebar').toggle(); 
 
		}); 
		
			
    $('.header_parent h5').click(function () {
        $(this).next('.header_child').slideToggle();

        $(this).parent().siblings().children().next().slideUp();
        return false;
    });

	   $('.titletoggle').on('click', function () {
         $(this).next('.brief').slideToggle();
    });
	

		
		 $('.nav_parent h5').on('click mouseover', function () {
        		$(this).next('.nav_child').slideToggle();
        		$(this).parent().siblings().children().next().slideUp();
       		 	return false;
			});
			
			$('.nav_parent').on('mouseleave', function () {
			$(this).children('.nav_child').stop(true, true).slideUp();
			return false;
		});
		
//		$('.buttonslist').hide();
	//	 $('.navbutton li').on('click ', function () {
      //  		$(this).next('.buttonslist').slideToggle();
       	//	 	return false;
			//});
		
		
		
	// form label helper

    $('.form-control').bind('blur', function () {
        $(this).parent().next('li').find('.form_helper').hide();
    }).bind('focus', function () {
        $(this).parent().next('li').find('.form_helper').show();
    });
//datepicker 

 $(function() {
			$('.timepick').timepicker({ 'minTime': '09:00am', 'maxTime': '05:30pm', 'step':15, 'showDuration': true });

		  });
		  
	

}); // end js
