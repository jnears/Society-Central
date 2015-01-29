<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package societycentral
 */
?>
<div id="secondary" class="widget-area" role="complementary">

	<?php if ( is_home() ) : // show events listing on homepage?>
		<aside id="site-overview" class="widget">
			<p class="lead">
	  	<?php  the_author_meta('excerpt',8); ?></p>
		</aside>
	<?php endif;  ?>

	<!-- Dont show navigation on single page -->
	<?php if ( ! is_single() ){?>
	 	<aside id="headlines" class="widget">
			<?php echo headline_list(10); ?>
		</aside>
	<?php }?>

	<!-- Show author meta on single pages only -->
	<?php if ( is_single() ){?>
	
			<!-- meta information -->
			
			<div class="entry-meta">
				<?php societycentral_post_meta_multiline(); ?>
				<?php societycentral_posted_date(); ?>
			</div>

			<!-- social buttons -->
				<div class="social-wrapper">
					<ul>
						<li>
							<a title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a title="Share on facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="email" title="Email this link" href="mailto:?subject=<?php echo ( get_the_title() ) ?>&amp;body=<?php echo urlencode( get_permalink() ); ?>">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="embed" id="embed-link-sidebar" title="Embed link"  onclick="select_all(this)" href="#">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-code fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
					</ul>
				</div>
			<div id="embed-modal-sidebar" >
				<textarea wrap="soft" rows="6" cols="18" id="embed-text-sidebar" name="embed-link-sidebar" value="<?php echo get_permalink(); ?>" readonly="readonly"/><?php echo get_permalink(); ?>
				</textarea>
			</div>
		<hr>
	<?php }?>

	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
	<?php endif; // end sidebar widget area ?>

	<?php if ( is_home() ) : // show events listing on homepage?>
		<aside id="events-list" class="widget">
			<?php the_widget('TribeEventsListWidget'); ?>
		</aside>
	<?php endif;  ?>

</div><!-- #secondary -->
