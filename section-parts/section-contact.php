<?php
/**
 * Section contact
 *
 * @package emp
 */
?>
<?php
$contact_style = get_theme_mod('contact_style');
$contact_img = get_theme_mod('contact_img');
$contact_txt = get_theme_mod('contact_txt');
$contact_btn = get_theme_mod('contact_txt_btn');
$contact_btn_url = get_theme_mod('contact_btn_url');

 ?>
 <section id="contact" class="section-contact">
     <?php
     if($contact_style == 'contact-bg-color') { ?>
       <?php echo 	'<div class="'. $contact_style .'">'; ?>
         <?php
     } else {
       echo 	'<div class="'. $contact_style .'" style="background-image: url('. $contact_img .');">';
     }?>
   <div class="contact-row">
     <div class="container">
         <div class="content-contact">
           <div class="contact-title">
           <h3><?php echo esc_html( $contact_txt ); ?></h3>
         </div>
         <div class="btn-contact">
           <?php
           if($contact_style == 'contact-bg-color') { ?>
            <a class="btn btn-emp-white btn-emp-xl" href="<?php echo esc_url($contact_btn_url); ?>"><?php echo esc_html( $contact_btn ); ?></a>
               <?php
           } else { ?>
            <a class="btn btn-emp btn-emp-xl" href="<?php echo esc_url($contact_btn_url); ?>"><?php echo esc_html( $contact_btn ); ?></a>
            <?php
           }?>
        </div>
        </div>
   </div>
   </div>
 <?php echo '</div>'; ?>
 </section>
