<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wp-gov-brasil
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Navegação dos posts', 'wp-gov-brasil' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( esc_html__( 'Posts mais antigos', 'wp-gov-brasil' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Posts mais novos', 'wp-gov-brasil' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Navegação dos posts', 'wp-gov-brasil' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wp_gov_brasil_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wp_gov_brasil_posted_on() {

	$time_string = '<a href="%1$s"><time class="entry-date published updated" datetime="%2$s">%3$s</time></a>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<a href="%1$s"><time class="entry-date published" datetime="%2$s">%3$s</time></a>, atualizado <a href="%4$s"><time class="updated" datetime="%5$s">%6$s</time></a>';
	}

	$time_string = sprintf( $time_string,
		esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('d/m/Y\, G\hi') ),
		esc_url( get_day_link( get_the_modified_time( 'Y' ), get_the_modified_time( 'm' ), get_the_modified_time( 'd' ) ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( 'd/m/Y\, G\hi' ) )
	);

	$posted_on = sprintf( _x( 'publicado %s', 'post date', 'wp-gov-brasil' ), $time_string );

	$byline = sprintf(
		_x( 'por %s', 'post author', 'wp-gov-brasil' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span> — <span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'wp_gov_brasil_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wp_gov_brasil_entry_footer() {

	// Hide category and tag text for pages.
	// if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'wp-gov-brasil' ) );

		if ( $categories_list && wp_gov_brasil_categorized_blog() ) {
			printf( '<div class="line"><span class="cat-links">' . esc_html__( 'Registrado em %1$s', 'wp-gov-brasil' ) . '</span></div>', $categories_list ); // WPCS: XSS OK
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wp-gov-brasil' ) );
		if ( $tags_list ) {
			printf( '<div class="line"><span class="tags-links">' . esc_html__( 'Assuntos(s): %1$s', 'wp-gov-brasil' ) . '</span></div>', $tags_list ); // WPCS: XSS OK
		}
	// }

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Deixe um comentário', 'wp-gov-brasil' ), esc_html__( '1 Comentário', 'wp-gov-brasil' ), esc_html__( '% Comments', 'wp-gov-brasil' ) );
		echo '</span>';
	}

	
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'wp-gov-brasil' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'wp-gov-brasil' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'wp-gov-brasil' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'wp-gov-brasil' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'wp-gov-brasil' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'wp-gov-brasil' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'wp-gov-brasil' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'wp-gov-brasil' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'wp-gov-brasil' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galerias', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Imagens', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Vídeos', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'wp-gov-brasil' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'wp-gov-brasil' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Arquivos: %s', 'wp-gov-brasil' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'wp-gov-brasil' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Arquivos', 'wp-gov-brasil' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wp_gov_brasil_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wp_gov_brasil_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wp_gov_brasil_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wp_gov_brasil_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wp_gov_brasil_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wp_gov_brasil_categorized_blog.
 */
function wp_gov_brasil_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wp_gov_brasil_categories' );
}
add_action( 'edit_category', 'wp_gov_brasil_category_transient_flusher' );
add_action( 'save_post',     'wp_gov_brasil_category_transient_flusher' );
