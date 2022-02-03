function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show2");
};

$(document).ready(function(){
 $('.hamburgler').click(function(e){
		e.preventDefault();
		$(this).toggleClass('no-hamburgler');
	});
    $('.hamburgler').click(function(){
        $('.mobile-menu').toggleClass('show');
    });  

    jQuery(function($) {
  var $navbar = $('.navbar'),
      navheight = $navbar.outerHeight(),
      $window = $(window);
  
  function toggleNavBar() {
    var scroll = $window.scrollTop();
    
    if (scroll >=60) {
      if (!$navbar.hasClass('navbar-fixed-top')) {
        $navbar.addClass('navbar-fixed-top');
        $navbar.css('margin-top', -navheight);
        $navbar.animate({ marginTop: 0 }, 500, function() {
          $window.one('scroll', toggleNavBar);
        });
      } else {
        $window.one('scroll', toggleNavBar);
      }
    } else {
      if ($navbar.hasClass('navbar-fixed-top')) {
        $navbar.removeClass('navbar-fixed-top');
      }
      
      $window.one('scroll', toggleNavBar);
    }
  }
  
  $window.one('scroll', toggleNavBar);
});        
    
    
    $('.time-option').click(function(e){
		$(this).toggleClass('border-choice');   
    });
          $('.time-option').click(function(){
                      if ($('.time-option').hasClass('border-choice')){
                           $('.time-option').removeClass('border-choice');  
                           $(this).toggleClass('border-choice');
                        }
                        else if ($(this).hasClass('border-choice')){
                          $(this).toggleClass('border-choice');
                        }
            });
    
    
     $('.close-pop-up').click(function(e){
		$('#myPopup').removeClass('show2');   
    }); 
    
    
    $('.edit-email-icon').click(function(e){
		$('.edit-email-div').addClass('show2');   
    }); 
    $('.close-edit-pop').click(function(e){
		$('.edit-email-div').removeClass('show2');   
    });
    
    
    $('.edit-psw-btn').click(function(e){
		$('.edit-psw-div').addClass('show2');   
    }); 
    $('.close-edit-pop').click(function(e){
		$('.edit-psw-div').removeClass('show2');   
    });

    
    $('.edit-info-icon').click(function(e){
		$('.edit-info-div').addClass('show2');   
    }); 
    $('.close-edit-pop').click(function(e){
		$('.edit-info-div').removeClass('show2');   
    });

    
    
      
});
    
//});
