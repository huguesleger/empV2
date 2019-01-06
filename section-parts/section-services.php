<?php
/**
 * Section service
 *
 * @package emp
 */
 ?>
 <?php


  $style = get_theme_mod('services_style', 'service-style-inline');
  $services_class = get_theme_mod('services_class', 'container-fluid');
  $services_title = get_theme_mod('services_title_section');

 $query = new WP_query(array(
  'post_type'=>'services',
  'posts_per_page'=>10,
  ));
  ?>

<section id="services" class="section-services">
  <div class="container">
  <?php if ( $services_title ) { ?>
      <h3 class="services-title"><?php echo esc_html( $services_title ); ?></h3>
    <?php } else { ?>
      <h3 class="services-title">Services</h3>
        <?php
    } ?>
  </div>
  <?php

  if ($style === 'service-style-inline'){
    echo 	'<div id="'. $style .'">';
    echo '<div class="'. $services_class .'">';
    while($query->have_posts()): $query->the_post(); global $post;
    $post_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'emp-service-img'));
    $baiseline = get_post_meta($post->ID, 'baiseline', true);?>

    <div class="wrap-services">
      <div class="service-row">
      <div class="img-service col-md-6 col-sm-12">
        <div class="bg-image-service">
          <img class="img-responsive" src="<?php echo esc_url( $post_thumb );?>"/>
        </div>
        <div class="title-service">
          <div class="title-service-right">
          <?php the_title('<h3>', '</h3>'); ?>
          </div>
        </div>
      </div>

      <div class="content-service col-md-6 col-sm-12">
          <div class="service-baiseline">
              <h4><?php echo esc_html($baiseline); ?></h4>
          </div>
          <div class="desc-service">
            <div class="entry-content">
              <?php
              the_content( sprintf(
                  /* translators: %s: Name of current post. */
                  wp_kses( esc_html__( 'Continue reading %s', 'emp' ), '<span class="meta-nav">&rarr;</span>' ),
                  the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'emp' ),
                  'after'  => '</div>',
                ) );
               ?>
            </div>
          </div>
      </div>
    </div>

    </div>
    <?php endwhile;

    echo '</div>';
    echo '</div>';
    ?>
    <?php
  } else { ?>
    <?php echo '<div id="'. $style .'">'; ?>

    <?php echo '<div class="'. $services_class .'">'; ?>
        <?php
            while($query->have_posts()): $query->the_post(); global $post;
            $post_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
            $baiseline = get_post_meta($post->ID, 'baiseline', true);
            ?>

        <div class="service-item col-lg-4 col-md-6 col-sm-6">
          <div class="service-list-item">
            <div class="service-list-img">
              <img class="img-responsive" src="<?php echo esc_url( $post_thumb );?>"/>
            </div>
            <div class="service-list-title">
              <?php the_title('<h3>', '</h3>'); ?>
            </div>
          </div>
          <div class="service-list-caption">

            <h4><?php echo esc_html($baiseline); ?></h4>
              <?php
              the_content( sprintf(
                  /* translators: %s: Name of current post. */
                  wp_kses( esc_html__( 'Continue reading %s', 'emp' ), '<span class="meta-nav">&rarr;</span>' ),
                  the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'emp' ),
                  'after'  => '</div>',
                ) );
               ?>
          </div>
      </div>

      <?php endwhile; ?>

  <?php echo '</div>';
        echo '</div>';
     ?>
    <?php
  }
  ?>
</section>
