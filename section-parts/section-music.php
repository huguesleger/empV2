<?php
/**
 * Section music
 *
 * @package emp
 */
?>
<?php
$music_title = get_theme_mod( 'music_title' );
$music_text = get_theme_mod( 'music_text' );
$music_btn_url = get_theme_mod( 'music_texte_btn_url' );
$music_btn_txt = get_theme_mod( 'music_texte_btn_title' );
$spotify = get_theme_mod( 'music_texte_btn_url_spotify' );
$soundcloud = get_theme_mod( 'music_texte_btn_url_soundcloud' );
$itunes = get_theme_mod( 'music_texte_btn_url_itunes' );
$hide = get_theme_mod('music_disable_playing');
 ?>
 <section id="music" class="section-music">
<div class="music-content">
  <div class="music-row">
    <div class="container">
      <?php if ( $music_title ) { ?>
        <h3 class="music-title"><?php echo esc_html( $music_title ); ?></h3>
      <?php } else { ?>
              <h3 class="music-title">Nouvelle prod</h3>
      <?php
      } ?>
      <div id="reccord"></div>
      <div class="album-txt">
      <?php if ( $music_text ) { ?><p><?php echo esc_html( $music_text ); ?></p><?php } ?>
      </div>
    </div>
  </div>
  <div class="music-row music-color">
    <div class="wrap-album">
      <div class="last-album">
        <?php echo do_shortcode("[apwp_player_grid limit='1']"); ?>
      </div>
    </div>
    <?php
        if ( $spotify || $soundcloud || $itunes && $music_btn_url && $music_btn_txt) { ?>
    <div class="music-player">
      <div class="music-link">
      <?php if ( $music_btn_url ) { ?><a class="btn btn-emp-white btn-emp-md" href="<?php echo esc_url($music_btn_url); ?>"><i class="fas fa-compact-disc"></i><?php echo esc_html($music_btn_txt); ?></a><?php } ?>
      </div>
      <p>disponible sur:</p>
      <?php if ( $spotify ) { ?><a class="btn btn-emp-white btn-emp-md" href="<?php echo esc_url($spotify); ?>"><i class="fab fa-spotify"></i>Spotify</a><?php } ?>
      <?php if ( $soundcloud ) { ?><a class="btn btn-emp-white btn-emp-md" href="<?php echo esc_url($soundcloud); ?>"><i class="fab fa-soundcloud"></i>SoundClound</a><?php } ?>
      <?php if ( $itunes ) { ?><a class="btn btn-emp-white btn-emp-md" href="<?php echo esc_url($itunes); ?>"><i class="fab fa-apple"></i>iTunes</a><?php } ?>
    </div>
    <?php
} else { ?>
  <div class="music-player player-single">
    <div class="music-link-single">
    <a class="btn btn-emp-white btn-emp-lg" href="<?php echo esc_url($music_btn_url); ?>"><i class="fas fa-compact-disc"></i><?php echo esc_html($music_btn_txt); ?></a>
    </div>
  </div>
  <?php
} ?>
  </div>
<?php if ( $hide ) {
} else { ?>
  <div class="now-playing-bar">
    <div id="playingBar" class="playing-type">
      <div class="apwp-medium-2 apwp-columns"></div>
      <div class="close-playing-bar">
        <i class="far fa-times-circle"></i>
      </div>
    </div>
  </div>
  <?php
} ?>
</div>
 </section>
