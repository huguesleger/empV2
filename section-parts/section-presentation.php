<?php
/**
 * Section presentation
 *
 * @package emp
 */
 ?>

<?php
$texte = get_theme_mod( 'presentation_texte' );
$subtitle = get_theme_mod( 'presentation_subtitle' );
?>
<section id="present" class="section-present">
  <div class="present-content">
    <div class="present-wrap-left">
      <div class="present-img"></div>
      </div>
    <div class="present-wrap-right">
      <div class="present-txt">
        <h1> Easy Music Project </h1>
        <div class="present-subtitle">
          <?php if ( $subtitle ) { ?>
            <h3><?php echo esc_html( $subtitle ); ?></h3>
          <?php } ?>
        </div>
        <?php if ( $texte ) { ?>
          <p><?php echo esc_html( $texte ); ?></p>
        <?php } ?>
      </div>
    </div>
    <!--mobile/tablette-->
    <div id="present-responsive">
      <div class="present-title">
        <h1> Easy Music Project </h1>
      </div>
      <div class="present-subtitle">
        <?php if ( $subtitle ) { ?>
          <h3><?php echo esc_html( $subtitle ); ?></h3>
        <?php } ?>
      </div>
      <div class="present-wrap-img">
        <div class="img-center">
        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/headphone_men.png">
        </div>
      </div>
      <div class="present-txt">
        <?php if ( $texte ) { ?>
          <p><?php echo esc_html( $texte ); ?></p>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
