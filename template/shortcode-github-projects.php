<?php
function ghp_display_github_repos_shortcode( $atts, $content = null  ) {

    global $ghp_options;
    $ghp_column = $ghp_options['projects_per_row'];
    $ghp_total_repos = $ghp_options['number_of_projects'];

    if($ghp_column == 3) {
        $ghp_col_count = 4;
    } elseif($ghp_column == 4) {
        $ghp_col_count = 3;
    } else {
        $ghp_col_count = 2;
    }

    extract( shortcode_atts( array(
        'order' => 'date',
        'orderby' => 'DESC',
    ), $atts ) );

    $options = [
        'post_type' => 'repo',
        'order' => 'date',
        'orderby' => 'DESC',
        'posts_per_page' => $ghp_total_repos,
    ];

    $query = new WP_Query( $options );

    if( $query->have_posts() ) :
        $markup = '<div class="ghp-repo-wrapper">';
        $markup .= '<div class="row">';
        $counter = 1;
        while( $query->have_posts() ) : $query->the_post();
            $markup .= '<div class="col-md-'.$ghp_column.'">';
            $markup .= '<a href="'. get_post_meta(get_the_ID(), 'html_url', true) .'" class="single-repo-item" target="_blank">';
            $markup .= '<img src="' . GHP_PLUGIN_DIR . 'assets/public/img/github-logo.png" alt="github logo">';
            $markup .= '<h3 class="repo-title">' . get_the_title() . '</h3>';
            $markup .= '</a></div>';
            $markup .= ($counter % $ghp_col_count) == 0 ? ($ghp_total_repos == $counter) ? '</div>' : '</div><div class="row">' : '';
            $counter++;
        endwhile;
        $markup .= '</div>';
    endif;
    return $markup;
}   
add_shortcode('ghp_github_repos', 'ghp_display_github_repos_shortcode');