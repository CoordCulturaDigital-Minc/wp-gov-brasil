<?php
/**
 * The main template file.
 *
 * @package wp-gov-brasil
 */

get_header(); ?>
	
	<div class="container">
		<?php get_sidebar(); ?>

		<section id="main-section" class="content-area col-md-10">
			<a name="acontent" id="acontent"></a>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</section><!-- #main-section -->
	</div>


<?php get_footer(); ?>
