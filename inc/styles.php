<?php
/**
 * Emp Theme Customizer.
 *
 * @package Emp
 */

function emp_custom_styles($custom) {

	$defaults 	= emp_customizer_defaults();

	/**
	* color mode
	*/

	//body
	$txt_body_color					= get_theme_mod('txt_body_color', $defaults['txt_body_color']);

	//nav
	$color_nav 							= get_theme_mod('alpha_color_setting');
	$txt_nav_color					= get_theme_mod('txt_nav_color', $defaults['txt_nav_color']);

	// color section music block
	$music_title_color      = get_theme_mod('music_title_color', $defaults['music_title_color']);
	$color_section_music  	= get_theme_mod('color_section_music', $defaults['color_section_music']);
	$color_section_music_bottom  = get_theme_mod('color_section_music_bottom', $defaults['$color_section_music_bottom']);
	$color_txt_name_artist	= get_theme_mod('color_txt_name_artist', $defaults['color_txt_name_artist']);

	//color primary
	$color_primary					= get_theme_mod('color_primary', $defaults['color_primary']);

	//Build CSS
	$custom 	= '';


	/**
	* styles applied sure element html
	*/

	// color body
	$custom .= "body {color:" . esc_attr($txt_body_color) . ";}"."\n";

	//color nav
	$custom .= ".main-header  {background-color:" . esc_attr($color_nav) . ";}"."\n";
	$custom .= ".main-navigation  {color:" . esc_attr($txt_nav_color) . ";}"."\n";

	//color section music block
	$custom .= ".music-title {color:" . esc_attr($music_title_color) . ";}"."\n";
	$custom .= ".music-row.music-color {background-color:" . esc_attr($color_section_music_bottom) . ";}"."\n";
	$custom .= ".section-music {background-color:" . esc_attr($color_section_music) . ";}"."\n";
	$custom .= "#reccord .jp-artist {color:" . esc_attr($color_txt_name_artist) . ";}"."\n";



	//color primary
	$custom .= ".site-title  {color:" . esc_attr($txt_nav_color) . ";}"."\n";
	$custom .= "#logo svg  {fill:" . esc_attr($txt_nav_color) . ";}"."\n";
	#logo svg
	$custom .= ".menu-item.current-menu-item a  {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".menu-item.current-menu-item a  {border-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".menu-item a:hover  {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".slick-prev:before, .slick-next:before  {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".btn-emp  {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".btn-emp  {border-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".btn-emp:hover  {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".btn-emp-white:hover  {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".slick-dots li.slick-active button:before  {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".slick-dots li button:before {border-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".present-wrap-left {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".service-baiseline h4::before {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".service-list-title {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".service-list-caption {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".contact-bg-color {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".gotop {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".dev {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".contact-content {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".header-page-no-img {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".present-wrap-img {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".music-link-single {background-color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= "#timeline .jp-play-bar {background:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= "#playingBar .jp-play-bar {background:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= "#playingBar .jp-time-holder {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= "#playingBar .jp-volume-controls button::before {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".close-playing-bar {color:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".apwp-jplayer-design-overide .controller-common:focus {background:" . esc_attr($color_primary) . ";}"."\n";
	$custom .= ".apwp-jplayer-design-overide .jp-state-playing .jp-play:focus {background:" . esc_attr($color_primary) . ";}"."\n";






	//Output all the styles
	wp_add_inline_style( 'emp-style', $custom );
}
add_action( 'wp_enqueue_scripts', 'emp_custom_styles' );
