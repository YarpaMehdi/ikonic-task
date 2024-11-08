<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<!-- <?php the_post_thumbnail(); ?> -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<h1>Footer</h1>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
