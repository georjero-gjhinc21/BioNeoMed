<?php
if (!defined('ABSPATH')) exit;

class BioNeoMed_Custom_Post_Types {

    public static function init() {
        add_action('init', array(__CLASS__, 'register_post_types'));
        add_action('init', array(__CLASS__, 'register_taxonomies'));
    }

    public static function register_post_types() {
        register_post_type('research', array(
            'labels' => array(
                'name' => __('Research Projects', 'bioneomed-core'),
                'singular_name' => __('Research Project', 'bioneomed-core'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-microscope',
            'rewrite' => array('slug' => 'research'),
        ));

        register_post_type('testimonial', array(
            'labels' => array(
                'name' => __('Testimonials', 'bioneomed-core'),
                'singular_name' => __('Testimonial', 'bioneomed-core'),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-format-quote',
            'rewrite' => array('slug' => 'testimonials'),
        ));
    }

    public static function register_taxonomies() {
        register_taxonomy('research_category', 'research', array(
            'labels' => array(
                'name' => __('Research Categories', 'bioneomed-core'),
                'singular_name' => __('Research Category', 'bioneomed-core'),
            ),
            'hierarchical' => true,
            'public' => true,
            'rewrite' => array('slug' => 'research-category'),
        ));
    }
}
