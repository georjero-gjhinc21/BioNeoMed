<?php
if (!defined('ABSPATH')) exit;

class BioNeoMed_API_Endpoints {

    public static function init() {
        add_action('rest_api_init', array(__CLASS__, 'register_routes'));
    }

    public static function register_routes() {
        register_rest_route('bioneomed/v1', '/donations', array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => array(__CLASS__, 'get_donations_stats'),
            'permission_callback' => '__return_true',
        ));

        register_rest_route('bioneomed/v1', '/research', array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => array(__CLASS__, 'get_research'),
            'permission_callback' => '__return_true',
        ));
    }

    public static function get_donations_stats($request) {
        return rest_ensure_response(array(
            'total_donations' => get_option('total_donations', 0),
            'total_donors' => get_option('total_donors', 0),
            'research_funded' => get_option('research_funded', 0),
        ));
    }

    public static function get_research($request) {
        $posts = get_posts(array(
            'post_type' => 'research',
            'numberposts' => 10,
            'post_status' => 'publish',
        ));

        $data = array_map(function($post) {
            return array(
                'id' => $post->ID,
                'title' => $post->post_title,
                'excerpt' => $post->post_excerpt,
                'date' => $post->post_date,
            );
        }, $posts);

        return rest_ensure_response($data);
    }
}
