/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {
  /**** Site title ****/
  wp.customize( 'blogname', function( value ) {
    value.bind( function( to ) {
    $( '.site-title a' ).text( to );
    });
  });

  /**** Site description ****/
  wp.customize( 'blogdescription', function( value ) {
    value.bind( function( to ) {
    $( '.site-description' ).text( to );
    });
  });

  /**** body bakground-color ****/
  wp.customize( 'background_color', function( value ) {
    value.bind( function( to ) {
    $( 'body' ).css('background-color', to );
    });
  });

  /**** body font-color ****/
  wp.customize( 'txt_body_color', function( value ) {
    value.bind( function( to ) {
    $( 'body' ).css('color', to );
    });
  });

  /**** navigation background-color ****/
  wp.customize( 'alpha_color_setting', function( value ) {
    value.bind( function( to ) {
    $( '.main-header' ).css('background-color', to );
    });
  });

  /**** navigation color ****/
  wp.customize( 'txt_nav_color', function( value ) {
    value.bind( function( to ) {
    $( '.main-navigation' ).css('color', to );
    });
  });

  /**** logo color ****/
  wp.customize( 'txt_nav_color', function( value ) {
    value.bind( function( to ) {
    $( '#logo svg' ).css('fill', to );
    });
  });

  /**** titre logo color ****/
  wp.customize( 'txt_nav_color', function( value ) {
    value.bind( function( to ) {
    $( '.site-title' ).css('color', to );
    });
  });

  /**** color section music block top ****/
  wp.customize( 'color_section_music', function( value ) {
    value.bind( function( to ) {
    $( '.section-music' ).css('background-color', to );
    });
  });

  /**** color titre section music ****/
  wp.customize( 'music_title_color', function( value ) {
    value.bind( function( to ) {
    $( '.music-title' ).css('color', to );
    });
  });

  /**** color txt artist section music ****/
  wp.customize( 'color_txt_name_artist', function( value ) {
    value.bind( function( to ) {
    $( '#reccord.jp-artist' ).css('color', to );
    });
  });


  /**
  * color primary of theme
  */

  /**** txt nav is active ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.menu-item.current-menu-item a' ).css('color', to );
    });
  });

  /**** border txt nav is active ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.menu-item.current-menu-item a' ).css('border-color', to );
    });
  });

  /**** btn bg ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.btn-emp' ).css('background-color', to );
    });
  });

  /**** btn border ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.btn-emp' ).css('border-color', to );
    });
  });

  /**** bg img section presentation ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.present-wrap-left' ).css('background-color', to );
    });
  });

  /**** bg section music block top ****/
  wp.customize( 'color_section_music', function( value ) {
    value.bind( function( to ) {
    $( '.section-music' ).css('background-color', to );
    });
  });

  /**** bg section music block bottom ****/
  wp.customize( 'color_section_music_bottom', function( value ) {
    value.bind( function( to ) {
    $( '.music-row.music-color' ).css('background-color', to );
    });
  });

  /**** bg title section services style list ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.service-list-title' ).css('background-color', to );
    });
  });

  /**** bg caption section services style list ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.service-list-caption' ).css('background-color', to );
    });
  });

  /**** bg section contact style no-img ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.contact-bg-color' ).css('background-color', to );
    });
  });

  /**** bg gotop ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.gotop' ).css('background-color', to );
    });
  });

  /**** txt-credit dev footer ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.dev' ).css('color', to );
    });
  });

  /**** bg form contact ****/
  wp.customize( 'color_primary', function( value ) {
    value.bind( function( to ) {
    $( '.contact-content' ).css('background-color', to );
    });
   });

   /**** page header no img ****/
   wp.customize( 'color_primary', function( value ) {
     value.bind( function( to ) {
     $( '.header-page-no-img' ).css('background-color', to );
     });
    });

  } )( jQuery );
