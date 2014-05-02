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
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php if ( have_posts() ) : ?>
<h1 class="page-title"><?php
echo $term->name;
// printf( __( 'Headline: %s', 'essexuni' ), '<span>' . $term_name . '</span>' );
?></h1>

<!-- show taxonomy term description if it exists -->
<?php if ('' != $term_descr ) {
echo "<p>$term_descr</p>\n";
} ?>

<?php
$category_description = category_description();
if ( ! empty( $category_description ) )
echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

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