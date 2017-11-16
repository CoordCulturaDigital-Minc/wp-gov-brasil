<?php
/**
 * The template for displaying all pages.
 *
 *
 * @package wp-gov-brasil
 */

get_header(); ?>
	<div class="container">
		<?php get_sidebar(); ?>

		<section id="main-section" class="content-area col-md-10">
			<a name="acontent" id="acontent"></a>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</section><!-- #primary -->
	</div>


<?php get_footer(); ?>