<?php
 /* Template Name: Productions
  */
 ?>
<?php
 get_header();?>
 	<div id="content-productions">
 		<?php if (have_posts()) : ?>

 			<div class="prod">
 			<div class="container">
 				<?php while ( have_posts() ) : the_post(); ?>

 				<?php get_template_part( 'template-parts/content', 'productions' ); ?>

 				<?php endwhile; ?>
 			</div>
 			</div>

 <?php the_posts_pagination( array( 'mid_size' => 5 ) ); ?>

 		<?php else : ?>

 			<?php get_template_part( 'template-parts/content', 'none' ); ?>

 		<?php endif; ?>

 	</div><!-- #content-productions -->


 <?php get_footer(); ?>
