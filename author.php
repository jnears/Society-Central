<?php get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <!-- This sets the $curauth variable -->
        <?php
            $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        ?>

            <h1 class="entry-title"><?php printf( __( 'About %s %s %s <span>%s</span>', 'societycentral' ), $curauth->title, $curauth->first_name, $curauth->last_name, $curauth->jobtitle ); ?><span><?php get_the_author_meta( 'jobtitle' ) ?></span></h1>
            
            <div class="colgroup-4">
                
                <div class="span1">
                    <figure>
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                    </figure>
                </div>
                
                <div class="span3">
                    <?php echo $curauth->user_description; ?>
                </div>

            </div>
        
            <hr>
            
            <h3>Recent posts by <?php echo $curauth->title; ?> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h3>

            <ul>
            	<!-- The Loop -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                        <?php the_title(); ?></a>
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