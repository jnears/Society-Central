<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package societycentral
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php // Get 4 featured posts ?>
<?php

$args = array(
    'posts_per_page' => 4,
    'tax_query' => array(
        array(
            'taxonomy' => 'feature',
            'terms' => array('homepage-feature'),
            'field' => 'slug',
            'operator' => 'IN'
        ),
    )
);


$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<?php
if ( has_post_thumbnail() ) {
?>
<div class="g4">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<figure><div><?php the_post_thumbnail(); ?></div>
<figcaption><?php truncate_title(55); ?><div class="author">by <?php the_author(); ?></div> </figcaption>
</figure>

</a>
</div>
<?php
} // end if loop
endwhile;
wp_reset_query();

?>
		<?php if ( have_posts() ) : ?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page' => 10,
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'feature',
            'terms' => array('homepage-feature'),
            'field' => 'slug',
            'operator' => 'NOT IN'
        ),
    )
);
query_posts($args);
?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<div class="home-featured noprint">


				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php societycentral_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
