<?php
/**
 * @package societycentral
 */
?>

<!-- set a different class if the post has an image thumbnail (to prevent a big white space on left hand side.) -->

<?php if  (has_post_thumbnail()): ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt image'); ?> >
<?php else: ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt'); ?> >
<?php endif; ?>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'essexuni' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		
		<?php if ( 'post' == get_post_type()  or 'essexuni_news' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php societycentral_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>	
		
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'societycentral' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<?php 
		if (has_post_thumbnail()) {
			echo "<figure class=\"thumb\">";
			the_post_thumbnail('thumbnail'); 
			echo "</figure>";
		}
		?><!-- .thumb-image -->


	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'societycentral' ) );
				if ( $categories_list && societycentral_categorized_blog() ) :
			?>
			<!-- <span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'societycentral' ), $categories_list ); ?>
			</span> -->
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'societycentral' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'societycentral' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>


		<?php edit_post_link( __( 'Edit', 'societycentral' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
