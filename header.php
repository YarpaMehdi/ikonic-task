<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 */
$options = get_option('sample_theme_options');
?>
<!doctype html>
<html>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php $options = get_option('sample_theme_options'); ?>

	<header class="main_header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-3">
					<div class="logo">
						<?php $logo = get_header_image(); ?>
						<a href="<?php echo get_site_url(); ?>/">
							<img src="<?php echo $logo; ?>" alt="">
						</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="main-menu-desktop">
						<?php
						$defaults = array(
							'theme_location' => '',
							'menu' => 'main_menu',
							'container' => '',
							'container_class' => '',
							'container_id' => '',
							'menu_class' => '',
							'menu_id' => '',
							'echo' => true,
							'fallback_cb' => '',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul>%3$s</ul>',
							'depth' => 5,
							'walker' => ''
						);
						wp_nav_menu($defaults);
						?>
					</div>
				</div>
				<div class="col-sm-3 text-end">
					<a class="theme_btn">Contact us</a>
				</div>
			</div>
		</div>
	</header>
	<div class="mobileheader">
		<div class="container-fluid">
			<div class="branding-logo">
				<a href="<?php echo get_site_url(); ?>/">
					<img src="<?php echo $logo; ?>" alt="">
				</a>
			</div>
			<div class="menu-btn">
				<a href="#" class="responsive-menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</div>
		</div>
		<div class="mobilemenu">
			<a href="#" class="m-close-btn">
				<i class="fa fa-times" aria-hidden="true"></i>
			</a>
			<div class="main-menu">
				<?php
				$defaults = array(
					'theme_location' => '',
					'menu' => 'main_menu',
					'container' => '',
					'container_class' => '',
					'container_id' => '',
					'menu_class' => '',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => '',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul>%3$s</ul>',
					'depth' => 5,
					'walker' => ''
				);
				wp_nav_menu($defaults);
				?>
			</div>
		</div>
	</div>
	<?php if (is_home() || is_front_page()) { ?>



	<?php } else { ?>


	<?php } ?>