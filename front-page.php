<?php
/**
 * Front page
 *
 * @package emp
 */
get_header();
?>
<div class="sections-content">
  <?php
 do_action( 'emp_frontpage_before_section_parts' );

if ( ! has_action( 'emp_frontpage_section_parts' ) ) {

$sections = apply_filters (
'emp_frontpage_sections_order',
array(
    'presentation',
    'music',
    'services',
    'contact'


      )
);

foreach ( $sections as $section ){
        // If  section not disable
        if ( ! get_theme_mod( $section.'_disable' ) ) {
            /**
             * Hook before section
             */
            do_action('emp_before_section_' . $section);
            do_action('emp_before_section_part', $section);

            /**
             * Load section template part
             */
            get_template_part('section-parts/section', $section);

            /**
             * Hook after section
             */
            do_action('emp_after_section_part', $section);
            do_action('emp_after_section_' . $section);
        }

}

} else {
do_action( 'emp_frontpage_section_parts' );
}

do_action( 'emp_frontpage_after_section_parts' );
?>
</div>
<?php
get_footer();
