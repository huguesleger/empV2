<?php
/**
 * logo functions
 *
 * @package Emp
 */

 /**
  * Site title, logo and menu bar
  */
 function emp_header_bar() {
 ?>
 		<div class="main-header">
 			<div class="container">
 						<?php emp_site_branding(); ?>
           <nav id="site-navigation" class="main-navigation" role="navigation">
             <?php wp_nav_menu( array( 'theme_location' => 'primary',
                                       'container' => false) ); ?>
           </nav>
 			</div>
 		</div>

 <?php
 }
 add_action( 'emp_header', 'emp_header_bar', 9);

/**
 * Site branding
 */
function emp_site_branding() {
  ?>
<div class="site-branding">
<?php
if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
  ?>
  <div id="logo">
  <?php
  the_custom_logo();
  ?>
  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
</div>
<?php
} else {
  if ( get_bloginfo( 'name' ) ) : ?>
    <div id="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    </div>
  <?php else : ?>
    <div id="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
    </div>
  <?php
  endif;

  $description = get_bloginfo( 'description', 'display' );
  if ( $description || is_customize_preview() ) : ?>
    <p class="site-description"><?php echo $description; ?></p>
  <?php endif;
}
?>
</div>
<?php
}
