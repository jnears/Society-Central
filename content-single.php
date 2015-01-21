<?php
/**
 * @package societycentral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content entry-content-single">
		

		<div class="standfirst"><?php the_field('standfirst'); ?></div>

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

		<div id="embed-modal-primary" >
			<textarea wrap="soft" rows="6" cols="18" id="embed-text-primary" name="embed-link-primary" value="<?php echo get_permalink(); ?>" readonly="readonly"/><?php echo get_permalink(); ?>
			</textarea>
		</div>
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


