<?php
/**
 * The main template file
 *
 * @package BioNeoMed
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php
        if (have_posts()):
            while (have_posts()): the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;

            the_posts_navigation();
        else:
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>

    <?php if (is_active_sidebar('sidebar-1')): ?>
        <aside id="secondary" class="widget-area">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
    <?php endif; ?>
</div>

<?php
get_footer();
