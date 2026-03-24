<?php
/**
 * BioNeoMed Theme Functions
 * 
 * @package BioNeoMed
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme constants
define('BIONEOMED_VERSION', '1.0.0');
define('BIONEOMED_THEME_DIR', get_template_directory());
define('BIONEOMED_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function bioneomed_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('bioneomed', BIONEOMED_THEME_DIR . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Set custom thumbnail sizes
    add_image_size('research-thumbnail', 400, 300, true);
    add_image_size('blog-thumbnail', 600, 400, true);
    add_image_size('hero-image', 1920, 800, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bioneomed'),
        'footer'  => __('Footer Menu', 'bioneomed'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'bioneomed_theme_setup');

/**
 * Set the content width in pixels
 */
function bioneomed_content_width() {
    $GLOBALS['content_width'] = apply_filters('bioneomed_content_width', 1200);
}
add_action('after_setup_theme', 'bioneomed_content_width', 0);

/**
 * Register widget areas
 */
function bioneomed_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'bioneomed'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'bioneomed'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 1', 'bioneomed'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'bioneomed'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'bioneomed'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'bioneomed'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 3', 'bioneomed'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'bioneomed'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bioneomed_widgets_init');

/**
 * Enqueue scripts and styles
 */
function bioneomed_scripts() {
    // Main stylesheet
    wp_enqueue_style('bioneomed-style', get_stylesheet_uri(), array(), BIONEOMED_VERSION);
    
    // Responsive stylesheet
    wp_enqueue_style('bioneomed-responsive', BIONEOMED_THEME_URI . '/assets/css/responsive.css', array('bioneomed-style'), BIONEOMED_VERSION);

    // Main JavaScript file
    wp_enqueue_script('bioneomed-main', BIONEOMED_THEME_URI . '/assets/js/main.js', array(), BIONEOMED_VERSION, true);
    
    // Donation form JavaScript
    if (is_page('get-involved') || is_page('donate')) {
        wp_enqueue_script('bioneomed-donation', BIONEOMED_THEME_URI . '/assets/js/donation.js', array('bioneomed-main'), BIONEOMED_VERSION, true);
    }

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Localize script for AJAX
    wp_localize_script('bioneomed-main', 'bioneomed_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('bioneomed_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'bioneomed_scripts');

/**
 * Include custom files
 */
require_once BIONEOMED_THEME_DIR . '/inc/custom-post-types.php';
require_once BIONEOMED_THEME_DIR . '/inc/api-endpoints.php';
require_once BIONEOMED_THEME_DIR . '/inc/customizer.php';
require_once BIONEOMED_THEME_DIR . '/inc/template-functions.php';

/**
 * Security: Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Security: Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Security: Remove RSD link
 */
remove_action('wp_head', 'rsd_link');

/**
 * Security: Remove Windows Live Writer link
 */
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Performance: Defer JavaScript loading
 */
function bioneomed_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('bioneomed-main', 'bioneomed-donation');
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'bioneomed_defer_scripts', 10, 3);

/**
 * Accessibility: Add skip link
 */
function bioneomed_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#main">' . __('Skip to content', 'bioneomed') . '</a>';
}
add_action('wp_body_open', 'bioneomed_skip_link', 5);

/**
 * Custom excerpt length
 */
function bioneomed_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'bioneomed_excerpt_length');

/**
 * Custom excerpt more link
 */
function bioneomed_excerpt_more($more) {
    return '... <a class="read-more" href="' . get_permalink() . '">' . __('Read More', 'bioneomed') . '</a>';
}
add_filter('excerpt_more', 'bioneomed_excerpt_more');

/**
 * Add custom classes to body
 */
function bioneomed_body_classes($classes) {
    // Add class if sidebar is active
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }
    
    // Add class for page template
    if (is_page_template()) {
        $template = str_replace('.php', '', basename(get_page_template()));
        $classes[] = 'template-' . $template;
    }
    
    return $classes;
}
add_filter('body_class', 'bioneomed_body_classes');

/**
 * Add Google Analytics
 */
function bioneomed_google_analytics() {
    $ga_id = get_theme_mod('google_analytics_id');
    
    if (empty($ga_id)) {
        return;
    }
    ?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_js($ga_id); ?>');
    </script>
    <?php
}
add_action('wp_head', 'bioneomed_google_analytics');

/**
 * Allow SVG uploads
 */
function bioneomed_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'bioneomed_mime_types');

/**
 * Admin enhancements
 */
function bioneomed_admin_styles() {
    echo '<style>
        .bioneomed-admin-notice {
            background: #2E75B6;
            color: #fff;
            padding: 15px;
            border-radius: 4px;
        }
        .bioneomed-admin-notice a {
            color: #fff;
            text-decoration: underline;
        }
    </style>';
}
add_action('admin_head', 'bioneomed_admin_styles');

/**
 * Custom admin notice
 */
function bioneomed_admin_notice() {
    $screen = get_current_screen();
    
    if ($screen->id !== 'themes' && $screen->id !== 'dashboard') {
        return;
    }
    
    // Check if BioNeoMed Core plugin is active
    if (!is_plugin_active('bioneomed-core/bioneomed-core.php')) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>BioNeoMed Theme:</strong> The BioNeoMed Core plugin is required for full functionality. <a href="<?php echo admin_url('plugins.php'); ?>">Activate it now</a>.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'bioneomed_admin_notice');
