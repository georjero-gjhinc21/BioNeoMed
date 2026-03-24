<?php
if (!defined('ABSPATH')) exit;

class BioNeoMed_Zeffy_Integration {

    public static function init() {
        add_action('rest_api_init', array(__CLASS__, 'register_webhook'));
        add_shortcode('zeffy_donation_form', array(__CLASS__, 'donation_form_shortcode'));
    }

    public static function register_webhook() {
        register_rest_route('bioneomed/v1', '/zeffy-webhook', array(
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => array(__CLASS__, 'handle_webhook'),
            'permission_callback' => '__return_true',
        ));
    }

    public static function handle_webhook($request) {
        $data = $request->get_json_params();

        if (empty($data)) {
            return new WP_Error('invalid_data', 'No data received', array('status' => 400));
        }

        $donation_data = array(
            'donor_email' => sanitize_email($data['email'] ?? ''),
            'donor_name' => sanitize_text_field($data['name'] ?? ''),
            'amount' => floatval($data['amount'] ?? 0),
            'currency' => sanitize_text_field($data['currency'] ?? 'USD'),
            'status' => 'completed',
            'zeffy_donation_id' => sanitize_text_field($data['id'] ?? ''),
            'created_at' => current_time('mysql'),
        );

        BioNeoMed_Database::insert_donation($donation_data);

        return rest_ensure_response(array('success' => true));
    }

    public static function donation_form_shortcode($atts) {
        $atts = shortcode_atts(array(
            'url' => '',
        ), $atts);

        if (empty($atts['url'])) {
            return '<p>' . esc_html__('Please configure a Zeffy donation form URL.', 'bioneomed-core') . '</p>';
        }

        return '<div class="zeffy-donation-form"><iframe src="' . esc_url($atts['url']) . '" frameborder="0" scrolling="yes" height="800px" width="100%"></iframe></div>';
    }
}
