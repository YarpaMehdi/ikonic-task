<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

 */
$options = get_option( 'sample_theme_options' );
get_header();
?>

<?php if ( !is_front_page() ) : ?>
<div class="inner-banner">
	<div class="container">
		<h3><?php the_title(); ?></h3>
		<ul class="breadcumb">
			<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
			<li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
			<li><span><?php the_title(); ?></span></li>
		</ul><!-- /.breadcumb -->
	</div><!-- /.container -->
</div>
<?php endif; ?>

<div class="inner-page">
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
?>
</div>
<?php
get_footer();
