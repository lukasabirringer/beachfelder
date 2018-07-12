$(document).ready(function(){
  var owlFrontpage = $('.owl-carousel--frontpage');
  var owlDetailpage = $('.owl-carousel--detailpage');

  owlFrontpage.owlCarousel({
    margin: 10,
    nav: false,
    dots: false,
    loop: true,
    center: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    autowidth: true,
    responsive: {
      0: {
        items: 1
      },
      500: {
        items: 1
      },
      700: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  $('.button-circle--left').click(function() {
      owlFrontpage.trigger('next.owl.carousel');
  })

  $('.button-circle--right').click(function() {
    owlFrontpage.trigger('next.owl.carousel');
  });

  //owl carousel on beachcourt detail page
  owlDetailpage.owlCarousel({
    loop: true,
    autoHeight: false,
    nav: false,
    center: true,
    items: 1,
    lazyLoad: true,
  });

    $('.owl-navigation-item--left').click(function() {
      owlDetailpage.trigger('prev.owl.carousel');
    });

    $('.owl-navigation-item--right').click(function() {
      owlDetailpage.trigger('next.owl.carousel');
    });

  $('.link-logout').click(function() {
    $('.profile-user__flyout').addClass('flyout--open');
    $('body').addClass('-overflow--hidden');
  });

  $('.flyout__icon').click(function() {
    $(this).parent('.flyout').removeClass('flyout--open');
    $('body').removeClass('-overflow--hidden');
  });

  $('.trigger-flyout').click(function() {
    $('.flyout').removeClass('flyout--open');
    $('body').removeClass('-overflow--hidden');

    $(this).next($('.flyout')).addClass('flyout--open');
    $('body').addClass('-overflow--hidden');

    return false;
  });

  //scroll to top at the rating form
  $('#nextBtn, #prevBtn').click(function(){
    $('html, body').animate({ scrollTop: 200 }, 600);
    return false;
  });

  //tabs navigation
  $('.accordion__title').click(function(e){
    e.preventDefault();
      var $this = $(this),
          tabgroup = '#'+$this.parents('.accordion__title-bar').data('tabgroup'),
          target = $this.attr('href');

      $('.accordion__title').removeClass('accordion__title--active');

      $this.addClass('accordion__title--active');

      $(tabgroup).children('.accordion__content').hide();
      $(target).show();
  });
});


//fixed header on scroll
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll >= 50) {
    $('.header').addClass('header--fixed');
    $('.content__header').addClass('content__header--fixed');
  } else {
    $('.header').removeClass('header--fixed');
    $('.content__header').removeClass('content__header--fixed');
  }
});