<?php
if (!defined('ABSPATH')) exit;

class BioNeoMed_Admin {

    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'add_admin_menu'));
    }

    public static function add_admin_menu() {
        add_menu_page(
            __('BioNeoMed', 'bioneomed-core'),
            __('BioNeoMed', 'bioneomed-core'),
            'manage_options',
            'bioneomed-dashboard',
            array(__CLASS__, 'render_dashboard'),
            'dashicons-heart',
            30
        );
    }

    public static function render_dashboard() {
        $stats = bioneomed_get_donation_stats();
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('BioNeoMed Dashboard', 'bioneomed-core'); ?></h1>
            <div class="bioneomed-stats">
                <div class="stat-card">
                    <h3><?php esc_html_e('Total Donations', 'bioneomed-core'); ?></h3>
                    <p><?php echo esc_html(bioneomed_format_currency($stats['total_donations'])); ?></p>
                </div>
                <div class="stat-card">
                    <h3><?php esc_html_e('Total Donors', 'bioneomed-core'); ?></h3>
                    <p><?php echo esc_html($stats['total_donors']); ?></p>
                </div>
                <div class="stat-card">
                    <h3><?php esc_html_e('Research Projects Funded', 'bioneomed-core'); ?></h3>
                    <p><?php echo esc_html($stats['research_funded']); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}

BioNeoMed_Admin::init();
