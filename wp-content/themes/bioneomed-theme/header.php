<?php
/**
 * The header for our theme
 *
 * @package BioNeoMed
 */

if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php _e('Skip to content', 'bioneomed'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-inner">
                <div class="site-branding">
                    <?php if (has_custom_logo()): ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else: ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php endif; ?>
                </div>

                <nav id="site-navigation" class="main-navigation" aria-label="<?php _e('Main Navigation', 'bioneomed'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                    <a href="<?php echo esc_url(home_url('/get-involved')); ?>" class="donate-button"><?php _e('Donate Now', 'bioneomed'); ?></a>
                </nav>

                <button class="mobile-menu-toggle" aria-label="<?php _e('Toggle menu', 'bioneomed'); ?>" aria-expanded="false">
                    <span class="menu-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main id="main" class="site-main">
