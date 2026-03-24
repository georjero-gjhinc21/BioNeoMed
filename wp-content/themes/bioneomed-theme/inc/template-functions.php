<?php
if (!defined('ABSPATH')) exit;

function bioneomed_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );
    echo '<span class="posted-on">' . $time_string . '</span>';
}

function bioneomed_posted_by() {
    echo '<span class="byline"> ' . __('by', 'bioneomed') . ' <span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span></span>';
}
