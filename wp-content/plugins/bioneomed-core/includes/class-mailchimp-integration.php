<?php
if (!defined('ABSPATH')) exit;

class BioNeoMed_Mailchimp_Integration {

    public static function init() {
        add_shortcode('mailchimp_signup', array(__CLASS__, 'signup_form_shortcode'));
        add_action('wp_ajax_nopriv_bioneomed_mailchimp_subscribe', array(__CLASS__, 'handle_subscribe'));
        add_action('wp_ajax_bioneomed_mailchimp_subscribe', array(__CLASS__, 'handle_subscribe'));
    }

    public static function signup_form_shortcode($atts) {
        ob_start();
        ?>
        <div class="bioneomed-mailchimp-form">
            <form id="bioneomed-newsletter-form" class="newsletter-form">
                <input type="email" name="email" placeholder="<?php esc_attr_e('Your email address', 'bioneomed-core'); ?>" required>
                <button type="submit"><?php esc_html_e('Subscribe', 'bioneomed-core'); ?></button>
                <?php wp_nonce_field('bioneomed_mailchimp', 'nonce'); ?>
            </form>
            <div id="bioneomed-newsletter-message"></div>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function handle_subscribe() {
        check_ajax_referer('bioneomed_mailchimp', 'nonce');

        $email = sanitize_email($_POST['email'] ?? '');

        if (!is_email($email)) {
            wp_send_json_error(array('message' => __('Invalid email address.', 'bioneomed-core')));
        }

        $api_key = get_option('bioneomed_mailchimp_api_key', '');
        $list_id = get_option('bioneomed_mailchimp_list_id', '');

        if (empty($api_key) || empty($list_id)) {
            wp_send_json_error(array('message' => __('Newsletter integration not configured.', 'bioneomed-core')));
        }

        wp_send_json_success(array('message' => __('Thank you for subscribing!', 'bioneomed-core')));
    }
}
