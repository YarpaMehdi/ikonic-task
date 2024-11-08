<?php 
/*==== PROJECTS POST CODE START======*/
function project_posttype() {
	register_post_type( 'project',
		array( 
			'labels' => array( 'name' => __( 'Our Projects' ), 'singular_name' => __( 'project' ) ), 'show_in_rest' => true,
			'public' => true, 'has_archive' => true, 'rewrite' => array('slug' => 'project'), 'taxonomies' => array( 'category' ),
		)
	);
}
add_action( 'init', 'project_posttype' );
function project_post_type() {
	$args = array(
        'supports' => array( 'title', 'thumbnail', 'excerpt' ),  'has_archive' => "project", 'taxonomies' => array( 'category' ),
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'project_post_type', 0 );


/*==== projectS POST CODE SHORTCODE STARTS======*/
function project_section(){ 
	
	$string ='<div class="blog-items row">';
		$args = array('post_type' => 'project', 'posts_per_page' => '8');
		$loop = new WP_Query( $args );
		while( $loop->have_posts()) {
		$loop->the_post();			
		$url=wp_get_attachment_url( get_post_thumbnail_id(get_the_id()),'thumbnail');
		$the_title = get_the_title();
		$the_permalink = get_the_permalink();
		$content = get_the_content();
		$the_content = substr($content, 0, 115);
		$the_excerpt = get_the_excerpt();
		$string .= '
             <div class="col-md-4 single-item">
                <div class="item">
                    <div class="thumb"><a href="#"><img src="' . esc_url($url) . '" alt="entry image"/></a></div>
                    <div class="info">
                        <h4><a href="' . esc_url($the_permalink) . '">' . esc_html($the_title) . '</a></h4>
                        <p>' . esc_html($the_content) . '...</p>
                        <a class="btn btn-theme border btn-sm" href="' . esc_url($the_permalink) . '">Read More</a>
                    </div>
                </div>
            </div>';
		
	} $string .= '</div>';
 
return $string; } 
add_shortcode('project_shortcode','project_section'); 
/*==== NEW POST CODE END ======*/
?>