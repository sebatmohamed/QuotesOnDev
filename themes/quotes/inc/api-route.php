<?php

function quotesAPI() {
    register_rest_route('quotes/v1', 'post', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'quotesResults'
    ));
}

add_action( 'rest_api_init', 'quotesAPI');

//callback function to get posts and create custom JSON

function quotesResults($data) {
    $results = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1
    ));

    $resultsArr = array();

    while($results->have_posts()) :
        $results->the_post();
        array_push($resultsArr, array(
            'title' => get_the_title(),
            'content' => get_the_content(),
            'quotesURL' => get_field('quote_url'),
            'quotesSource' => get_field('quote_source'),
            'permalink' => get_the_permalink()
        ));

    endwhile;

    return $resultsArr;
}
