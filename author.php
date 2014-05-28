<?php get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!-- This sets the $curauth variable -->
<?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h1 class="entry-title"><?php printf( __( 'About %s %s <span>%s</span>', 'societycentral' ), $curauth->first_name, $curauth->last_name, $curauth->jobtitle ); ?><span><?php get_the_author_meta( 'jobtitle' ) ?></span></h1>
    
    
    <div class="colgroup-4">

<div class="span1">
    <figure>
    <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
    </figure>
</div>
<div class="span3">
   <?php echo $curauth->user_description; ?>
    <!-- <dl>
        <dt>Website</dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
		
		<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
        <dt>Twitter</dt>
        <dd><?php the_author_meta( 'twitter' ); ?>
		</dd>
		<?php } // End check for twitter ?>

		<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
        <dt>Facebook</dt>
        <dd><?php the_author_meta( 'facebook' ); ?>
		</dd>
		<?php } // End check for facebook ?>


		<?php if ( get_the_author_meta( 'email' ) ) { ?>
        <dt>Email</dt>
        <dd><?php the_author_meta( 'email' ); ?>
		</dd>
		<?php } // End check for email ?>   
    </dl> -->

 </div>

</div>
<hr>
    <h3>Recent posts by <?php echo $curauth->first_name; ?></h3>

    <ul>

	<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>
  			<!--  <div class="entry-meta"><span class="posted-on"><time class="entry-date published" datetime="%1$s"><?php the_time('d M Y'); ?></time></span> in <?php the_category(' ');?></div> -->
  		</li>

    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>

	<!-- End Loop -->

    	</ul>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>