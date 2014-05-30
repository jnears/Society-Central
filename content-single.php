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
		<div class="meta-container">
			<!-- meta information -->
			
			<div class="entry-meta"><?php societycentral_posted_on(); ?></div>

			<!-- social buttons -->
				<div class="social-wrapper">
					<ul>
						<li>
							<a class="circ-border" title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-twitter"></i></a>
						</li>
						<li><a class="circ-border" title="Share on facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a class="circ-border" title="Email this link" href="mailto:?subject=<?php echo ( get_the_title() ) ?>&amp;body=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-envelope-o"></i></a></li>
						<li><a class="circ-border" id="embed-link" title="Embed link"  onclick="select_all(this)" href="#"><i class="fa fa-code"></i></a></li>
					</ul>
				</div>
			<div id="embed-modal" >
				<textarea wrap="soft" rows="6" cols="18" id="embed-text" name="embed-link" value="<?php echo get_permalink(); ?>" readonly="readonly"/><?php echo get_permalink(); ?>
				</textarea>
			</div>
		</div>

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
		<!-- social buttons -->
			<div class="social-wrapper">
				<ul>
					<li>
						<a class="circ-border" title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-twitter"></i></a>
					</li>
					<li><a class="circ-border" title="Share on facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a class="circ-border" title="Email this link" href="mailto:?subject=<?php echo ( get_the_title() ) ?>&amp;body=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-envelope-o"></a></i></li>
					<li><a class="circ-border" id="embed-link" title="Embed link"  onclick="select_all(this)" href="#"><i class="fa fa-code"></i></a></li>
				</ul>
			</div>
			<div id="embed-modal" >
				<textarea wrap="soft" rows="3" cols="25" id="embed-text" name="embed-link" value="<?php echo get_permalink(); ?>" readonly="readonly"/><?php echo get_permalink(); ?>
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


