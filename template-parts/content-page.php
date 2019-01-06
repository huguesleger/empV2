<?php
/**
 * Template part for page
 *
 * @package emp
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-fluid">
		<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'emp' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</div>

</article>
