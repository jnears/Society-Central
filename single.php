<?php
/**
 * The Template for displaying all single posts.
 *
 * @package societycentral
 */

get_header(); ?>

	

		<?php while ( have_posts() ) : the_post(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main single-post" role="main">
			<?php get_template_part( 'content', 'single' ); ?>
			
			<?php  

// $taxo_text = "";  

// $os_list = get_the_term_list( $post->ID, 'headline', '<strong>Headlines:</strong> ', ', ', '' ); 


// if ( '' != $os_list ) {  
// $taxo_text .= "$os_list<br />\n";  
// }  

// if ( '' != $taxo_text ) {  
?>  
<div class="entry-utility">  
<?php  
// echo $taxo_text;  
?>  
</div>  
<?  
// } // endif  
?>  

			 <?//php societycentral_post_nav(); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
			comments_template( '', true );
			?>

	</main><!-- #main -->
	</div><!-- #primary -->
	<div id="secondary" role="complementary">
		<aside id="meta">
		<div class="entry-meta"><?php societycentral_posted_on(); ?></div> 
		<a title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>">Share on twitter</a>

<a title="Share on facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">Share on faceboook</a>
<a title="Email this link" href="mailto:?subject=<?php echo ( get_the_title() ) ?>&amp;body=<?php echo urlencode( get_permalink() ); ?>">Email this</a>
<a id="embed-link" title="Embed link"  onclick="select_all(this)" href="#">Embed</a>
<div id="embed-modal" ><textarea wrap="soft" rows="3" cols="25" id="embed-text" name="embed-link" value="<?php echo get_permalink(); ?>" readonly="readonly"/><?php echo get_permalink(); ?></textarea>
</div>
</aside>
</div>
		<?php endwhile; // end of the loop. ?>

	
<?php get_footer(); ?>