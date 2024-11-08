<?php

// Custom API Endpoint:
function register_projects_api_endpoint() {
    register_rest_route('custom-api/v1', '/projects', array(
        'methods' => 'GET',
        'callback' => 'get_projects_data',
        'permission_callback' => '__return_true',  // Make sure this is secure if your data needs permissions.
    ));
}
add_action('rest_api_init', 'register_projects_api_endpoint');



function get_projects_data() {
    // Set up the query arguments to fetch 'project' post type
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1, // Retrieve all projects
    );

    // Perform the query
    $projects_query = new WP_Query($args);

    // Array to hold project data
    $projects_data = array();

    // Check if we have projects
    if ($projects_query->have_posts()) {
        while ($projects_query->have_posts()) {
            $projects_query->the_post();

            // Get ACF fields or custom fields if manually added
            $project_start_date = get_field('project_sart_date');
            $project_end_date = get_field('project_end_date');
            $project_url = get_field('project_url');

            // Append project details to the array
            $projects_data[] = array(
                'title' => get_the_title(),
                'url' => get_permalink(),
                'start_date' => $project_start_date,
                'end_date' => $project_end_date,
            );
        }
        wp_reset_postdata();
    }

    // Return the data as JSON
    return rest_ensure_response($projects_data);
}




?>