<?php
if (!defined('ABSPATH')) exit;

/**
 * BioNeoMed helper functions
 */

function bioneomed_get_donation_stats() {
    return array(
        'total_donations' => get_option('total_donations', 0),
        'total_donors' => get_option('total_donors', 0),
        'research_funded' => get_option('research_funded', 0),
    );
}

function bioneomed_format_currency($amount, $currency = 'USD') {
    return '$' . number_format(floatval($amount), 2);
}

function bioneomed_get_research_posts($limit = 6) {
    return get_posts(array(
        'post_type' => 'research',
        'numberposts' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));
}

function bioneomed_get_testimonials($limit = 6) {
    return get_posts(array(
        'post_type' => 'testimonial',
        'numberposts' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));
}
