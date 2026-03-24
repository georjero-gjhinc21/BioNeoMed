<?php
/**
 * Database Management Class
 *
 * @package BioNeoMed_Core
 */

if (!defined('ABSPATH')) exit;

class BioNeoMed_Database {

    /**
     * Create custom database tables
     */
    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        // Donations table
        $donations_table = $wpdb->prefix . 'bioneomed_donations';
        $donations_sql = "CREATE TABLE IF NOT EXISTS {$donations_table} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            donor_email VARCHAR(100) NOT NULL,
            donor_name VARCHAR(200),
            amount DECIMAL(10,2) NOT NULL,
            currency VARCHAR(3) DEFAULT 'USD',
            donation_type ENUM('one-time', 'recurring') DEFAULT 'one-time',
            payment_method VARCHAR(50),
            transaction_id VARCHAR(255),
            status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
            zeffy_donation_id VARCHAR(255),
            metadata TEXT,
            created_at DATETIME NOT NULL,
            updated_at DATETIME,
            PRIMARY KEY (id),
            KEY idx_donor_email (donor_email),
            KEY idx_status (status),
            KEY idx_created_at (created_at)
        ) $charset_collate;";

        // Analytics table
        $analytics_table = $wpdb->prefix . 'bioneomed_analytics';
        $analytics_sql = "CREATE TABLE IF NOT EXISTS {$analytics_table} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            metric_type VARCHAR(50) NOT NULL,
            metric_value VARCHAR(255) NOT NULL,
            metric_date DATE NOT NULL,
            additional_data JSON,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY idx_metric_type (metric_type),
            KEY idx_metric_date (metric_date)
        ) $charset_collate;";

        dbDelta($donations_sql);
        dbDelta($analytics_sql);
    }

    /**
     * Drop custom tables (use with caution)
     */
    public static function drop_tables() {
        global $wpdb;
        
        $tables = array(
            $wpdb->prefix . 'bioneomed_donations',
            $wpdb->prefix . 'bioneomed_analytics',
        );

        foreach ($tables as $table) {
            $wpdb->query("DROP TABLE IF EXISTS {$table}");
        }
    }

    /**
     * Get total donations
     */
    public static function get_total_donations() {
        global $wpdb;
        $table = $wpdb->prefix . 'bioneomed_donations';
        
        $total = $wpdb->get_var(
            "SELECT SUM(amount) FROM {$table} WHERE status = 'completed'"
        );

        return $total ? floatval($total) : 0;
    }

    /**
     * Get total donors
     */
    public static function get_total_donors() {
        global $wpdb;
        $table = $wpdb->prefix . 'bioneomed_donations';
        
        $count = $wpdb->get_var(
            "SELECT COUNT(DISTINCT donor_email) FROM {$table} WHERE status = 'completed'"
        );

        return $count ? intval($count) : 0;
    }

    /**
     * Insert donation record
     */
    public static function insert_donation($data) {
        global $wpdb;
        $table = $wpdb->prefix . 'bioneomed_donations';

        $defaults = array(
            'currency' => 'USD',
            'donation_type' => 'one-time',
            'status' => 'pending',
            'created_at' => current_time('mysql'),
        );

        $data = wp_parse_args($data, $defaults);

        $result = $wpdb->insert($table, $data);

        if ($result) {
            // Update totals
            self::update_totals();
            return $wpdb->insert_id;
        }

        return false;
    }

    /**
     * Update totals in options
     */
    private static function update_totals() {
        update_option('total_donations', self::get_total_donations());
        update_option('total_donors', self::get_total_donors());
    }
}
