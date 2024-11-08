<?php /* Template Name: Home Page */
get_header();
$options = get_option('sample_theme_options');

// Get ACF fields for the slide
$slider1image = get_field('slider1image');  // Image field
$slider1textheading = get_field('slider1textheading');  // Text heading field
$slidertext1 = get_field('slidertext1');  // Text paragraph field
?>

<div class="banner">
	<div class="banner_slide owl-carousel owl-theme">
		<div class="item">
			<div class="banner_details"
				style="background-image: url('<?php echo esc_url($slider1image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
				<div class="container_box">
					<h1><?php echo esc_html($slider1textheading); ?></h1>
					<p><?php echo esc_html($slidertext1); ?></p>
					<a class="theme_btn">Read More</a>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner_details"
				style="background-image: url('<?php echo esc_url($slider1image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
				<div class="container_box">
					<h1><?php echo esc_html($slider1textheading); ?></h1>
					<p><?php echo esc_html($slidertext1); ?></p>
					<a class="theme_btn">Read More</a>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="banner_details"
				style="background-image: url('<?php echo esc_url($slider1image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
				<div class="container_box">
					<h1><?php echo esc_html($slider1textheading); ?></h1>
					<p><?php echo esc_html($slidertext1); ?></p>
					<a class="theme_btn">Read More</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <?php
while (have_posts()):
	the_post();
	get_template_part('template-parts/content', 'page');
endwhile;
?> -->


<?php get_footer(); ?>