jQuery(function($) {

/*--------------------------------------------
    fixed navbar
---------------------------------------------*/
function fixedNavbar(){
  var offset = 40;
  $(window).on('scroll', function(){
    if( $(window).scrollTop()>=offset ){
      $('.main-header').addClass('__fixed');
    } else {
      $('.main-header').removeClass('__fixed');
    }
  });
}

/*--------------------------------------------
    slider mdoe
---------------------------------------------*/
function slider(){
  $('.main-slider').slick({
    dots: $('.main-slider').data('sliderdots'),
    rtl: false,
    arrows: $('.main-slider').data('sliderarrows'),
    adaptiveHeight: false,
    autoplay: true,
    autoplaySpeed: $('.main-slider').data('sliderspeed'),
    pauseOnHover: false,
    lazyLoad: 'progressive',
    useCSS: true,
  });
}

function sliderImgFix(){
  $('.sliding').slick({
    dots: true,
    rtl: false,
    arrows: false,
    adaptiveHeight: false,
    autoplay: true,
    autoplaySpeed: $('.slider-txt').data('slidertxtspeed'),
    pauseOnHover: false,
    useCSS: true,
  });
}

function showSliderTxt(){
  setTimeout(function(){
    $('.slider-txt').addClass('__slider-txt-show');
    $('.slider .caption-txt').addClass('__slider-show');
  },500);
}


/*--------------------------------------------
    enter content home page
---------------------------------------------*/
function enterContentHome(){
  $('#enter').on('click', function(){
		$('html, body').animate({scrollTop: $(this.hash).offset().top -60}, 800);
		return false;
	});
}


/*--------------------------------------------
    overide style Players home page
---------------------------------------------*/
function playerHome(){
  $('.last-album .jp-title').appendTo('#reccord');
  $('.last-album .jp-artist').appendTo('#reccord');
  $('.last-album .apwp-medium-7.apwp-columns').prependTo('#playingBar');
  $('.last-album .jp-volume-controls').appendTo('#playingBar .apwp-medium-2.apwp-columns');
  $('#playingBar .jp-toggles').remove();
}

function showPlayingBar(){
  $('.last-album .jp-play').on('click', function(){
    $('.now-playing-bar').addClass('__is-play');
    if($('#apwpultimate-jplayer-1-cntrl').hasClass('jp-state-playing')){
      $('.last-album .jp-type-single').removeClass('__is-play');
    } else {
      $('.last-album .jp-type-single').addClass('__is-play');
    }
  });
}

function hidePlayingBar(){
  $('.close-playing-bar').on('click', function(){
  $('.now-playing-bar').removeClass('__is-play');
  });
}


/*--------------------------------------------
    services disposition
---------------------------------------------*/
function serviceStyle(){
  $('.wrap-services').each(function(i){
    var service = $('.wrap-services:nth-child(2n+0) .service-row');
    var titleRight = $('.wrap-services:nth-child(2n+0) .title-service div');
    service.addClass('row-reverse');
    titleRight.removeClass('title-service-right').addClass('title-service-left');
  });
}



/*--------------------------------------------
    go to top
---------------------------------------------*/
function goTop(){
  $('.gotop').on('click', function (e) {
    var scrollTop = $(window).scrollTop();
     e.preventDefault();
     $('html,body').animate({
         scrollTop: 0
     }, 700);
    });
}

/*--------------------------------------------
    load function
---------------------------------------------*/
$(window).load(function(){
  fixedNavbar();
  slider();
  sliderImgFix();
  showSliderTxt();
  enterContentHome();
  playerHome();
  showPlayingBar();
  hidePlayingBar();
  serviceStyle();
  goTop();
  });

}); //end jquery function
