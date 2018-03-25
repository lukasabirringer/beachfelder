
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

/**
 * Algolia Search
 */


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// window.Vue = require('vue');

// Vue.component('favorite', require('./components/Favorite.vue'));
// const app = new Vue({
//     el: '#app'
// });


/////// STUFF MADE BY FABS //////

$(document).ready(function(){
  var owlFrontpage = $('.owl-carousel--frontpage');
	var owlDetailpage = $('.owl-carousel--detailpage');

  owlFrontpage.owlCarousel({
  	margin: 100,
  	nav: false,
  	loop: true,
  	center: true,
  	autowidth: true,
  	responsive: {
  		0: {
  			items: 1
  		},
  		500: {
  			items: 2
  		},
  		1000: {
  			items: 2
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

	$('.list-beachcourt__icon').click(function() {
		$(this).parent('.list-beachcourt__item').hide();

		return false;
	});

  $('.trigger-flyout').click(function() {
    $('.flyout').removeClass('flyout--open');
    $('body').removeClass('-overflow--hidden');

    $(this).next($('.flyout')).addClass('flyout--open');
    $('body').addClass('-overflow--hidden');

    return false;
  });

  //closes modals on search page with new value
  $('.button__accept').click(function() {
    $(this).parent('.flyout').removeClass('flyout--open');
  });

  //initialize the datepicker
  $('.input__field--date').datepicker({
    language: 'de',
    autoClose: true
  });

  $('.page-login__half').click(function() {

    if($('.page-login__half').hasClass('page-login__half--active')) {

      $('.page-login__half').removeClass('page-login__half--active');
      $(this).addClass('page-login__half--active');
      $('.page-login__overlay').addClass('page-login__overlay--open');
    }
    else {

      $(this).addClass('page-login__half--active');
      $('.page-login__overlay').addClass('page-login__overlay--open');
    }
  });

  $('.page-login__title').click(function() {
    $(this).next($('.page-login__content')).toggleClass('page-login__content--open');
  });

  //show tooltip how we rate at beachcourt item
  $('.beachcourt-item__info-icon').click(function() {
    $(this).next($('.flyout')).addClass('flyout--open');
  });

  //dropzone
  Dropzone.autoDiscover = false;
  $('#user-profile-image-upload').dropzone({
    url: '/file/post',
    acceptedFiles: '.jpg, .png',
    addRemoveLinks: true,
    dictResponseError: 'Leider gab es einen Server-Fehler.',
    dictRemoveFile: 'Bild entfernen',
    dictCancelUpload: 'Upload abbrechen'
  });

  $('.profile-edit__link').on('click', function(e){
    var href = $(this).attr('href');

    $('html, body').animate({
      scrollTop:$(href).offset().top
    },'slow');

    e.preventDefault();
  });

  //scroll to top at the rating form
  $('#nextBtn, #prevBtn').click(function(){
    $('html, body').animate({ scrollTop: 200 }, 600);
    return false;
  });

    
  $('.profile-edit__button').hide();

  $('input').on('keyup', function() {
      $('.profile-edit__button').fadeIn();
  });

  $('input').on('change', function() {
      $('.profile-edit__button').fadeIn();
  });

  //tabs navigation
  $('.accordion__content').hide();
  $('.accordion__content').first().show();

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

//removes active class from login page half
$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    $('.page-login__half').removeClass('page-login__half--active');
  }
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


//grab the values of input slider
var rangeSlider = function(){
  var slider = $('.input-range'),
      range = $('.input-range__field'),
      value = $('.input-range__value');
    
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
  
      $(this).html(value);
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
    });
  });
};

rangeSlider();


//toggle password
var input = document.querySelector('.input__field--password'),
    eye = document.querySelector('.input__icon--eye'),
    eyeOff = document.querySelector('.input__icon--eye-off');

// Toggle Password Field
function togglePassword() {
    if (input.type === 'password') {
        input.type = 'text';
        eye.classList.add('input__icon--not-visible');
        eyeOff.classList.remove('input__icon--not-visible');
    } else {
        input.type = 'password';
        eye.classList.remove('input__icon--not-visible');
        eyeOff.classList.add('input__icon--not-visible');
    }
};

