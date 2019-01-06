<?php
/**
 * Template part for page content in template-contact
 *
 * @package emp
 */
?>
<?php
$contact_city = get_theme_mod('contact_city');
$contact_phone = get_theme_mod('contact_phone');
$contact_email = get_theme_mod('contact_email');
?>

  <div class="container">
<div class="contact-content">
  <div class="wrap-contact-title">
    <div class="title-page">
    <h1><?php echo the_title();?></h1>
    </div>
  </div>
  <div class="content-form">
    <div class="row">
      <div class="col-md-8">
        <?php the_content(); ?>
      </div>
      <div class="col-md-4">
        <div class="content-infos">
          <div class="title-infos">
            <h3>Adresse & Infos</h3>
          </div>
          <ul class="infos-list">
            <?php if ( $contact_city ) { ?>
              <li><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $contact_city ); ?></li>
            <?php } ?>
            <?php if ( $contact_phone ) { ?>
            <li><i class="fas fa-mobile-alt"></i><?php echo esc_html( $contact_phone ); ?></li>
            <?php } ?>
            <?php if ( $contact_email ) { ?>
            <li><i class="fas fa-envelope-open"></i><a class="mail-global-menu" href="mailto:<?php echo esc_html( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
