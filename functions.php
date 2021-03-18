<?php

function get_frontend_origin() {
    return 'http://localhost:3000';
}

add_action(
    'rest_api_init',
    function () {
        remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
        add_filter(
            'rest_pre_serve_request',
            function ( $value ) {
                header( 'Access-Control-Allow-Origin: ' . get_frontend_origin() );
                header( 'Access-Control-Allow-Methods: GET' );
                header( 'Access-Control-Allow-Credentials: true' );
                return $value;
            }
        );
    },
    15
);

add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));