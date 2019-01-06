<?php

 /**
 * @package Emp
 */

if ( ! function_exists( 'emp_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/

function emp_setup() {

  /*
  * Let WordPress manage the document title.
  * By adding theme support, we declare that this theme does not use a
  * hard-coded <title> tag in the document head, and expect WordPress to
  * provide it for us.
  */
  add_theme_support( 'title-tag' );

  /*
  * Enable support for Post Thumbnails on posts and pages.
  *
  * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
  */
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'emp-home-small', 200);
  add_image_size( 'emp-home-large', 280, 280, true );
  add_image_size( 'emp-blog-image', 690 );
  add_image_size( 'emp-full-img', 1920, 1280, true);

  // This theme uses wp_nav_menu()
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'emp' )
  ) );

  /*
  * Switch default core markup for search form, comment form, and comments
  * to output valid HTML5.
  */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'emp_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );


  //Logo support
  add_theme_support( 'custom-logo', array(
    // 'height'      => 55,
    // 'width'       => 300,
    'flex-height' => true,
    'class'       => 'img-responsive',
  ) );


}
endif;
add_action( 'after_setup_theme', 'emp_setup' );

/**
 * Enqueue scripts and styles.
 */
function emp_scripts() {

	// wp_enqueue_style( 'emp-fonts', emp_fonts_url(), array(), null );
  wp_enqueue_style( 'emp-animate', get_template_directory_uri() . '/css/animate/animate.css', array(), true );
  wp_enqueue_style( 'emp-main-style', get_template_directory_uri() . '/assets/css/main.css', array(),'', 'all' );
  wp_enqueue_style( 'emp-style', get_stylesheet_uri() );

/**
 * Scripts : wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer ).
 * =====================================================================
 */
wp_enqueue_script( 'emp-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '', true );
wp_enqueue_script( 'emp-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'emp_scripts');

function custom_enqueue_scripts() {
    if(is_front_page() || is_page_template( 'page-templates/template-productions.php' )){
        wp_enqueue_script('emp-player-options', get_template_directory_uri() . '/assets/js/overidePlayer.js', array( 'apwpultimate-public-script' ), '', true);
}
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts', 101);

/**
 * Enqueue Bootstrap
 */
function emp_enqueue_bootstrap() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'emp_enqueue_bootstrap', 9 );


/**
 * Customizer defaults
 */
if ( !function_exists('emp_customizer_defaults') ) :
function emp_customizer_defaults() {
	$defaults = array(
    $color_red = '#ff5252',
    $color_blue = '#2faaaa',
    $color_vertlight = '#53eab2',
    $color_primary = $color_blue,
		//Colors
     'txt_body_color'         => '#333333',
     'txt_nav_color'          => '#000000',
     'color_primary'          => $color_primary,
     'color_section_music'    => '#eff2f6',
     'color_txt_name_artist'  => '#999999',
     'music_title_color'      => '#333333',
     'color_section_music_bottom'  => $color_primary,
		//Slider
		'slider_speed'			=> '6000',
		'slide_image_1'			=> get_template_directory_uri() . '/assets/img/slider_1.jpg',
		'slide_image_2'			=> get_template_directory_uri() . '/assets/img/slider_2.jpg',
		'slide_image_3'			=> get_template_directory_uri() . '/assets/img/slider_3.jpg',
    'img_image'         => get_template_directory_uri() . '/assets/img/sound.jpg',
    //slider txt
    'slide_texte_speed'			=> '6000',
		//Header type
		'front_header_type'		=> 'has-slider',

	);
	return $defaults;
}
endif;






/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/custom-post-type/services.php';

require get_template_directory() . '/inc/styles.php';


/**
 * Functions
 */
require get_template_directory() . '/inc/functions/loader.php';

require get_template_directory() . '/inc/metabox/functions.php';



/**
* remove version style css/js
*/
 function emp_remove_wp_version_strings($src) {

  global $wp_version;
  parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if(!empty($query['ver']) && $query['ver'] === $wp_version) {
      $src = remove_query_arg('ver',$src);
    }
    return $src;
 }
add_filter('script_loader_src','emp_remove_wp_version_strings');
add_filter('style_loader_src','emp_remove_wp_version_strings');

/**
* remove meta generator version wordpress
*/
function emp_remove_meta_version() {
  return '';
}
add_filter('the_generator','emp_remove_meta_version');

/**
* remove class navigation
*/
add_action( 'nav_menu_css_class', 'menu_item_classes', 10, 3 );
function menu_item_classes( $classes ) {
   $classes = array_intersect( $classes, array(
                              'menu-item',
                              'current-menu-item'
                              ) );
   return $classes;
}

/**
* remove id navigation
*/
add_action( 'nav_menu_item_id', 'menu_item_id', 10, 3 );
function menu_item_id( $id ) {
  return '';
}

/**
* add class body
*/
add_filter( 'body_class','mes_classes_body' );
function mes_classes_body( $classes ) {

    // if ( emp_header_check( 'front_header_type' ,'has-image')) {
    //     $classes[] = 'nom-classe';
    // }

    if ( is_page_template('page-templates/template-productions.php')) {
        $classes[] = 'productions-page';
    }

    if ( is_page_template('page-templates/template-contact.php') && has_post_thumbnail() == null ) {
    $classes[] = 'contact-header-no-img';
  } elseif (is_page('contact')) {
    $classes[] = 'contact-page';
  } else {
    $classes[] = '';
  }

    return $classes;
}

//remove class from pages and page_posts
add_filter( 'body_class', 'adjust_body_class' );
function adjust_body_class( $classes ) {

    foreach ( $classes as $key => $value ) {
        // if ( $value == 'page') unset( $classes[ $key ] );
        if( 0 === strpos( $value, 'postid-' )
          || 0 === strpos( $value, 'page' )
          || 0 === strpos( $value, 'page-' )
          || $value == 'page-template-'  )
          unset($classes[$key]);
    }

    return $classes;
}
