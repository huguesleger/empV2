<?php
/**
 * @package emp
 */

 /**
  * Excerpt length
  */
 function emp_excerpt_length( $length ) {
   $excerpt = get_theme_mod('exc_length', '20');
   return $excerpt;
 }
 add_filter( 'excerpt_length', 'emp_excerpt_length', 999 );

 /**
  * Excerpt read more
  */
 function emp_custom_excerpt( $more ) {
  $more = get_theme_mod('custom_read_more');
   if ($more == '') {
     return '&nbsp;[&hellip;]';
  } else {
    return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . esc_html($more) . '</a>';
  }
 }
 add_filter( 'excerpt_more', 'emp_custom_excerpt' );

 /**
  * Remove archive labels
  */
 function emp_archive_labels($title) {
     if ( is_category() ) {
         $title = single_cat_title( '', false );
     } elseif ( is_tag() ) {
         $title = single_tag_title( '', false );
     } elseif ( is_author() ) {
         $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  }
     return $title;
 }
 add_filter( 'get_the_archive_title', 'emp_archive_labels');

 /**
  * Blog layout
  */
 function emp_blog_layout() {
   $layout = get_theme_mod('blog_layout','list');
   return $layout;
 }
