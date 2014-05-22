<?php
/**
 * @package societycentral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		

		<!-- <div class="entry-meta"> -->
			
			<?//php echo get_avatar( get_the_author_meta( 'user_email' ), 32 ); ?>
	
			

			<?php

// print out the taxomomy term and apply dynamic class (used for coloured lozenge)

// $taxonomy = 'content_types';
// $terms = get_the_terms( $post->ID , $taxonomy );

// if ( !empty( $terms ) ) :
// 	foreach ( $terms as $term ) {
// 		$link = get_term_link( $term, $taxonomy );
// 		if ( !is_wp_error( $link ) )
// 			echo ' | <i class="tag ' . $term->slug. '"><a href="' . $link . '" rel="tag">' . $term->name . '</a></i>';
// 	}
// endif;
?>

		<!-- </div>.entry-meta -->
	<h1 class="entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->

	<div class="entry-content entry-content-single">

		<?php
			if ( has_post_thumbnail() ) {
				echo "<figure>";
				the_post_thumbnail('large');
				$caption = get_post(get_post_thumbnail_id())->post_excerpt;
			if($caption != "")
			{
				echo "<figcaption>" . $caption . "</figcaption>";
			}
				echo "</figure>";
			} 
		?><!-- insert featured image -->

		<?php the_content(); ?>

		<?php
			// wp_link_pages( array(
				// 'before' => '<div class="page-links">' . __( 'Pages:', 'societycentral' ),
				// 'after'  => '</div>',
			// ) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'societycentral' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'societycentral' ) );

			if ( ! societycentral_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'societycentral' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'societycentral' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				// if ( '' != $tag_list ) {
				// 	$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'societycentral' );
				// } else {
				// 	$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'societycentral' );
				// }

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0')
			);
		?>

		<?php edit_post_link( __( 'Edit', 'societycentral' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
