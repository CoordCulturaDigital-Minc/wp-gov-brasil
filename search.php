<?php
/**
 * The template for displaying search results pages.
 *
 * @package wp-gov-brasil
 */

get_header(); ?>
	
	<div class="container">
		<?php get_sidebar(); ?>

		<section id="main-section" class="content-area col-md-10">
			<a name="acontent" id="acontent"></a>

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp-gov-brasil' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</section><!-- #main-section -->
	</div>
	
<?php get_footer(); ?>
