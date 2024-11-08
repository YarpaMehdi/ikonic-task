
<?php /* Template Name: Blog Page */ 

get_header(); 
$options = get_option( 'sample_theme_options' ); ?>

	
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
	
	<div class="blog-posts">
		<div class="container">
			<div class="row">
			
				<?php  		
					$args = array('post_type' => 'post' ); 
					$loop = new WP_Query( $args );
					while( $loop->have_posts()): $loop->the_post(); 
					$url=wp_get_attachment_url( get_post_thumbnail_id(get_the_id()),'thumbnail');
				?>
					<div class="col-lg-4 col-md-6 col-sm-6 col-12">
						<div class="blog-post">
							<div class="blog-thumbnail">
								<img src="<?php echo $url ?>" alt="">
							</div>
							<div class="blog-info">
								<small><?php echo get_the_date() ?>	</small>
								<h2 class="blog-title"><a href="<?php the_permalink(); ?>" title=""><?php echo wp_trim_words( get_the_title(), 5, '...' ); ?></a></h2>
								<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?> </p>
								<a href="<?php the_permalink(); ?>" title="" class="lnk-default2">View more <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div><!--blog-post end-->
					</div>

				<?php endwhile; ?>
				
			</div>
		</div>
	</div>
	
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile;
	?>
	

<?php get_footer(); ?>