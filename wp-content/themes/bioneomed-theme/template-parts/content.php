<?php
if (!defined('ABSPATH')) exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more-link"><?php esc_html_e('Read More', 'bioneomed'); ?></a>
    </footer>
</article>
