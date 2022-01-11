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
    
});
