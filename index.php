<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			
			<?php the_post(); ?>
			<h1>Index Page</h1>

		<?php endwhile; ?>
	<?php endif; ?>
		
<?php get_footer(); ?>