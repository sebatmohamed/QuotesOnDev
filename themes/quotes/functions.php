<?php

require get_theme_file_path('/inc/api-route.php');

//Add custome fields to JSON API data

function qod_custom_rest() {
    register_rest_field('post', 'quotesSource', array(
        'get_callback' => function(){return get_field('quote_source');}
    ));

    register_rest_field('post', 'quotesURL', array(
        'get_callback' => function(){return get_field('quote_url');}
    ));
}

add_action('rest_api_init', 'qod_custom_rest');

//Adds script and stylesheets
function quotes_files() {
    wp_enqueue_style('quotes_styles', get_stylesheet_uri('/build/css/style.min.css'), NULL, microtime());
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Inconsolata&display=swap");
    wp_enqueue_script('icons', "https://kit.fontawesome.com/2d0ec2a697.js");

    wp_enqueue_script('api_js', get_template_directory_uri() . '/js/api.js', array('jquery'), microtime(), true);

    wp_localize_script('api_js', 'qod_data', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}

//filter posts on front page

function qod_filter_home($query) {
    if ( is_home() && $query->is_main_query() ) :
        $query->set('orderby', 'rand');
        $query->set('posts_per_page', 1);
    endif;
}

add_action('wp_enqueue_scripts', 'quotes_files');


add_action('pre_get_posts', 'qod_filter_home');

//Adds theme support - ex: title tag
function quotes_features() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'quotes_features');


?>