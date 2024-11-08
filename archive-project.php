<?php /* Template Name: Project Page */

get_header();
$options = get_option('sample_theme_options');
?>


<div class="inner-banner">
	<div class="container">
		<h3>Projects</h3>
	</div>
</div>

<div class="blog-posts">
	<div class="container">
		<div class="searchForm">
			<div class="searchFrm">
				<a href="javascript:;" class="clseBtn"></a>
				<?php get_search_form() ?>
			</div>
		</div>
		<div class="row">

			<?php
			$args = array('post_type' => 'project');
			$loop = new WP_Query($args);
			while ($loop->have_posts()):
				$loop->the_post();
				$url = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()), 'thumbnail');
				// Get ACF fields for the slide
				$project_name = get_field('project_name');
				$project_des = get_field('project_des');
				$project_sart_date = get_field('project_sart_date');
				$project_end_date = get_field('project_end_date');
				$project_url = get_field('project_url');
				?>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="blog-post">
						<div class="blog-thumbnail">
							<img src="<?php echo $url ?>" alt="">
						</div>
						<div class="blog-info">
							<small>Start Date:<?php echo esc_html($project_sart_date) ?> </small>
							<small>End Date:<?php echo esc_html($project_end_date) ?> </small>
							<a href="<?php echo esc_url($project_url); ?>" title="">
								<h3><?php echo esc_html($project_name); ?></h3>
							</a>
							<p><?php echo esc_html($project_des) ?> </p>
							<a href="<?php echo esc_url($project_url); ?>" title="" class="lnk-default2">Read more <i
									class="fa fa-angle-double-right"></i></a>
						</div>
					</div><!--blog-post end-->
				</div>

			<?php endwhile; ?>

		</div>
	</div>
</div>

<?php
while (have_posts()):
	the_post();
	get_template_part('template-parts/content', 'page');
endwhile;
?>


<?php get_footer(); ?>