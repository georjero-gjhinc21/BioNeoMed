<?php
if (!defined('ABSPATH')) exit;

function bioneomed_customize_register($wp_customize) {
    $wp_customize->add_section('bioneomed_general', array(
        'title' => __('BioNeoMed General', 'bioneomed'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('google_analytics_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('google_analytics_id', array(
        'label' => __('Google Analytics ID', 'bioneomed'),
        'section' => 'bioneomed_general',
        'type' => 'text',
    ));
}
add_action('customize_register', 'bioneomed_customize_register');
