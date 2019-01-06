<?php
/**
 * Header functions
 *
 * @package Emp
 */


/**
 * Header type check
 */
 function emp_header_check() {
	$front_header = get_theme_mod('front_header_type' ,'has-slider');
  // $site_header  = get_theme_mod('site_header_type', 'has-image');

	if ( is_front_page() ) {
		return $front_header;
	} else {
    return null;
	}
}


/**
 * Header hero area
 */
function emp_header_hero() {
	$header_type = emp_header_check();
	$sliderspeed = get_theme_mod('slider_speed', '6000');
  $sliderarrows = get_theme_mod('slider_arrows');
  $sliderdots = get_theme_mod('slider_dots');
  ?>

        <?php
	if ( $header_type == 'has-slider' ) {
		echo '<header class="slider">';
		echo 	'<div class="main-slider" data-sliderspeed="' . absint($sliderspeed) . '" data-sliderarrows="' . ($sliderarrows) . '" data-sliderdots="' . ($sliderdots) . '">';

			for ($c = 1; $c <= 3; $c++) {

				$slide_title 	 = get_theme_mod('slide_title_' . $c);
				$slide_subtitle  = get_theme_mod('slide_subtitle_' . $c);
				$slide_btn_title = get_theme_mod('slide_btn_title_' . $c);

				$slide_image 	 = get_theme_mod('slide_image_' . $c, get_template_directory_uri() . '/assets/img/slider_' . $c . '.jpg');
				if ( !function_exists('pll_register_string') ) {
					$slide_title 	 = get_theme_mod('slide_title_' . $c);
					$slide_subtitle  = get_theme_mod('slide_subtitle_' . $c);
					$slide_btn_title = get_theme_mod('slide_btn_title_' . $c);
				} else {
					$slide_title 	 = pll__(get_theme_mod('slide_title_' . $c));
					$slide_subtitle  = pll__(get_theme_mod('slide_subtitle_' . $c));
					$slide_btn_title = pll__(get_theme_mod('slide_btn_title_' . $c));
				}
				$slide_btn_url 	 = get_theme_mod('slide_btn_url_' . $c);

				if ( $slide_image ) { ?>
					<div class="slider-item">
						<?php if ( $c != 1 ) : ?>
            <div class="slider-img" style="background-image: url(<?php echo $slide_image ?>);"></div>
						<?php else : ?>
            <div class="slider-img" style="background-image: url(<?php echo $slide_image ?>);"></div>
						<?php endif; ?>
						<div class="main-slider-caption">
							<div class="caption-txt">
								<h1><?php echo esc_html($slide_title); ?></h1>
								<p><?php echo esc_html($slide_subtitle); ?></p>
								<?php if ( $slide_btn_url ) : ?>
                <div class="caption-btn">
                <a class="btn btn-emp btn-emp-lg" href="<?php echo esc_url($slide_btn_url); ?>"><?php echo esc_html($slide_btn_title); ?></a>
                </div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php }
			}
		echo 	'</div>';
    ?>
    <div class="enter-content">
      <div class="enter">
        <a class="txt-enter" id="enter" href="#present"><i class="fas fa-compact-disc"></i></a>
        <span>enter</span>
      </div>
    </div>
    <?php
		echo '</header>';



	} elseif ( $header_type == 'has-image' ) {
    $img_image 	 = get_theme_mod('img_image', get_template_directory_uri() . '/assets/img/sound.jpg');
    $slidertxtspeed = get_theme_mod('slide_texte_speed', '6000');
    ?>
    <header class="header-image">
      <div class="bg-illu" style="background-image: url(<?php echo $img_image ?>);">
      <?php
    echo 	'<div class="slider-txt" data-slidertxtspeed="' . absint($slidertxtspeed) . '">';
    echo 	'<div class="sliding">';

      for ($c = 1; $c <= 3; $c++) {
        $slide_texte_title 	 = get_theme_mod('slide_texte_title_' . $c);
        $slide_texte_txt  = get_theme_mod('slide_texte_txt_' . $c);
        $slide_texte_btn_title = get_theme_mod('slide_texte_btn_title_' . $c);
        $slide_texte_btn_url 	 = get_theme_mod('slide_texte_btn_url_' . $c);

        if ( $slide_texte_title ) { ?>
          <div class="slider-item">
            <div class="main-slider-caption">
                <h1><?php echo esc_html($slide_texte_title); ?></h1>
                <p><?php echo esc_html($slide_texte_txt); ?></p>
                <?php if ( $slide_texte_btn_url ) : ?>
                  <div class="caption-btn">
                  <a class="btn btn-emp btn-emp-lg" href="<?php echo esc_url($slide_texte_btn_url); ?>"><?php echo esc_html($slide_texte_btn_title); ?></a>
                  </div>
                <?php endif; ?>
            </div>
          </div>
        <?php }
      }

    echo 	'</div>';
    echo '</div>';
    ?>
    </div>
    <div class="enter-content">
      <div class="enter">
        <a class="txt-enter" id="enter" href="#present"><i class="fas fa-compact-disc"></i></a>
        <span>enter</span>
      </div>
    </div>
  </header>
	<?php }

}
add_action( 'emp_after_header', 'emp_header_hero', 9);
