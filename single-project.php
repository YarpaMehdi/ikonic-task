<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
$options = get_option( 'sample_theme_options' );

get_header();
 // Custom ACF fields
 $project_name = get_field('project_name');
 $project_des = get_field('project_des');
 $project_start_date = get_field('project_sart_date');
 $project_end_date = get_field('project_end_date');
 $project_url = get_field('project_url');
?>
<div class="inner-banner">
    <div class="container">
    <div class="project-details">
                <?php if ($project_name): ?>
                    <h2><?php echo esc_html($project_name); ?></h2>
                <?php endif; ?>

                <?php if ($project_des): ?>
                    <p><?php echo esc_html($project_des); ?></p>
                <?php endif; ?>
                <ul class="d-flex justify-content-center gap-5">
                    <li> <?php if ($project_start_date): ?>
                    <p><strong>Start Date:</strong> <?php echo esc_html($project_start_date); ?></p>
                <?php endif; ?></li>
                    <li> <?php if ($project_end_date): ?>
                    <p><strong>End Date:</strong> <?php echo esc_html($project_end_date); ?></p>
                <?php endif; ?></li>
                </ul>         
                <?php if ($project_url): ?>
                <a href="<?php echo esc_url($project_url); ?>" target="_blank"  class="theme_btn">
                Project URL 
                </a>
                <?php endif; ?>
            </div>
        <!-- <h3><?php the_title(); ?></h3>
        <ul class="breadcumb">
            <li><a href="<?php echo esc_url(get_site_url()); ?>">Home</a></li>
            <li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
            <li><span><?php the_title(); ?></span></li>
        </ul> -->
    </div>
</div>

<div class="single_service">
    <div class="container">
        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();  
            get_template_part( 'template-parts/content/content-single' );

            if ( is_attachment() ) {
                the_post_navigation(
                    array(
                        'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'ikonictheme' ), '%title' ),
                    )
                );
            }
        endwhile; // End of the loop.
        ?>
    </div>
</div>

<?php
get_footer();
