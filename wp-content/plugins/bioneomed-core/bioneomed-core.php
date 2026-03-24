<?php
/**
 * Plugin Name: BioNeoMed Core
 * Plugin URI: https://bioneomed.org
 * Description: Core functionality for BioNeoMed Research Foundation website. Handles donations, custom post types, REST API, and third-party integrations.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.1
 * Author: GJH INC
 * Author URI: https://gjhinc.com
 * License: Proprietary
 * Text Domain: bioneomed-core
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Plugin constants
define('BIONEOMED_CORE_VERSION', '1.0.0');
define('BIONEOMED_CORE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BIONEOMED_CORE_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Main Plugin Class
 */
class BioNeoMed_Core {
    
    /**
     * Instance of this class
     */
    private static $instance = null;

    /**
     * Get the instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        $this->load_dependencies();
        $this->define_hooks();
    }

    /**
     * Load required dependencies
     */
    private function load_dependencies() {
        require_once BIONEOMED_CORE_PLUGIN_DIR . 'includes/class-custom-post-types.php';
        require_once BIONEOMED_CORE_PLUGIN_DIR . 'includes/class-api-endpoints.php';
        require_once BIONEOMED_CORE_PLUGIN_DIR . 'includes/class-zeffy-integration.php';
        require_once BIONEOMED_CORE_PLUGIN_DIR . 'includes/class-mailchimp-integration.php';
        require_once BIONEOMED_CORE_PLUGIN_DIR . 'includes/class-database.php';
        require_once BIONEOMED_CORE_PLUGIN_DIR . 'includes/functions.php';
        
        if (is_admin()) {
            require_once BIONEOMED_CORE_PLUGIN_DIR . 'admin/class-admin.php';
        }
    }

    /**
     * Define WordPress hooks
     */
    private function define_hooks() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        
        add_action('init', array($this, 'init'));
        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }

    /**
     * Plugin activation
     */
    public function activate() {
        // Create custom database tables
        BioNeoMed_Database::create_tables();
        
        // Flush rewrite rules
        flush_rewrite_rules();
        
        // Set default options
        $this->set_default_options();
    }

    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }

    /**
     * Initialize plugin
     */
    public function init() {
        // Initialize custom post types
        BioNeoMed_Custom_Post_Types::init();
        
        // Initialize API endpoints
        BioNeoMed_API_Endpoints::init();
        
        // Initialize integrations
        BioNeoMed_Zeffy_Integration::init();
        BioNeoMed_Mailchimp_Integration::init();
    }

    /**
     * Load plugin textdomain
     */
    public function load_textdomain() {
        load_plugin_textdomain(
            'bioneomed-core',
            false,
            dirname(plugin_basename(__FILE__)) . '/languages'
        );
    }

    /**
     * Set default options
     */
    private function set_default_options() {
        $defaults = array(
            'total_donations' => 0,
            'total_donors' => 0,
            'research_funded' => 0,
        );

        foreach ($defaults as $key => $value) {
            if (false === get_option($key)) {
                add_option($key, $value);
            }
        }
    }
}

// Initialize the plugin
BioNeoMed_Core::get_instance();
