<?php
/**
 * The footer for our theme
 *
 * @package BioNeoMed
 */

if (!defined('ABSPATH')) exit;
?>

    </main><!-- #main -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-columns">
                <?php if (is_active_sidebar('footer-1')): ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-2')): ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-3')): ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'bioneomed'); ?></p>
                <p><?php _e('501(c)(3) Tax-Exempt Nonprofit Organization | EIN: 83-2326718', 'bioneomed'); ?></p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => 'nav',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ));
                ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
