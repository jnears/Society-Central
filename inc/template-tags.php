<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package societycentral
 */

if ( ! function_exists( 'societycentral_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function societycentral_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="visuallyhidden"><?php _e( 'Posts navigation', 'societycentral' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="btn nav-previous"><?php next_posts_link( __( '<i class="fa fa-angle-left"></i> Older posts', 'societycentral' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="btn nav-next"><?php previous_posts_link( __( 'Newer posts <i class="fa fa-angle-right"></i>', 'societycentral' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'societycentral_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function societycentral_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'societycentral' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="btn nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'societycentral' ) );
				next_post_link(     '<div class="btn nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'societycentral' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'societycentral_post_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function societycentral_post_meta() {
	if ( get_the_author_meta( 'title' ) ) { 
		$author_title =  esc_html(get_the_author_meta( 'title' )) ;
	};
	if ( get_the_author_meta( 'jobtitle' ) ) { 
		$author_jobtitle =  ', ' . esc_html(get_the_author_meta( 'jobtitle' )) ;
	};


	printf( __( '<span class="byline">%1$s </span>', 'societycentral' ),
		
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s %3$s %4$s</a>%5$s</span>',
			
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			$author_title,
			esc_html(get_the_author_meta( 'user_firstname' )),
			esc_html(get_the_author_meta( 'user_lastname' )),
			$author_jobtitle
		)
	);
}
endif;

if ( ! function_exists( 'societycentral_post_meta_multiline' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function societycentral_post_meta_multiline() {
	if ( get_the_author_meta( 'title' ) ) { 
		$author_title =  esc_html(get_the_author_meta( 'title' )) ;
	};
	if ( get_the_author_meta( 'jobtitle' ) ) { 
		$author_jobtitle =  '' . esc_html(get_the_author_meta( 'jobtitle' )) ;
	};


	printf( __( '<span class="byline">%1$s </span>', 'societycentral' ),
		
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s %3$s %4$s</a><br>%5$s</span>',
			
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			$author_title,
			esc_html(get_the_author_meta( 'user_firstname' )),
			esc_html(get_the_author_meta( 'user_lastname' )),
			$author_jobtitle
		)
	);
}
endif;





if ( ! function_exists( 'societycentral_posted_date' ) ) :

function societycentral_posted_date() {

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '%1$s', 'societycentral' ),
		
		sprintf( '%1$s',
			
			$time_string
		)
	);

}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function societycentral_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'societycentral_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'societycentral_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so societycentral_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so societycentral_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in societycentral_categorized_blog.
 */
function societycentral_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'societycentral_categories' );
}
add_action( 'edit_category', 'societycentral_category_transient_flusher' );
add_action( 'save_post',     'societycentral_category_transient_flusher' );
