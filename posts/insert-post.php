<?php
/**
 * Insert the github projects into our 'repo' custom post type with meta info
 */
if ( !function_exists('ghp_insert_github_posts')) {
    function ghp_insert_github_posts() {
        global $pagenow, $ghp_options;
        $github_projects_url = 'https://api.github.com/users/' . $ghp_options['author_name'] . '/repos?sort=updated&direction=desc';

        if( ($pagenow == 'admin.php') && ($_GET['page'] == 'ghp-update-repos') ) {

            do_action('ghp_before_post_inserted');

            $response = wp_remote_get( $github_projects_url );

            if ( is_array( $response ) ) {
                $header = $response['headers']; // array of http header lines
                $body = $response['body']; // use the content
        
                $retrived_repos_array = json_decode($body, true);
        
                foreach($retrived_repos_array as $repo) {
                    $description = $repo['description'] == '' ? 'No Description' : $repo['description'];
                    $projects_array = [
                        'post_title' => $repo['name'],
                        'post_content' => $description,
                        'post_type' => 'repo',
                        'post_status' => 'publish',
                        'meta_input' => [
                            'html_url' => $repo['html_url']
                        ],
                        'post_author' => 1
                    ];

                    wp_insert_post( $projects_array );
                }
            }
        }
    }
    add_action('init', 'ghp_insert_github_posts');
}

/**
 * Deletes all posts from "repo" custom post type.
 */
function ghp_delete_all_repos() {
    $myrepos = get_posts( array( 'post_type' => 'repo', 'posts_per_page' => -1) );
 
    foreach ( $myrepos as $myrepo ) {
        // Delete all products.
        wp_delete_post( $myrepo->ID, true); // Set to False if you want to send them to Trash.
        delete_post_meta($myrepo->ID, 'html_url');
    } 
}
add_action( 'ghp_before_post_inserted', 'ghp_delete_all_repos' );