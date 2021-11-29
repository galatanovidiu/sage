<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

use function Roots\bundle;

/**
 * Register the `.brand` selector to the blogname.
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize): void {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Register the customizer assets.
 */
add_action('customize_preview_init', function (): void {
    bundle('customizer')->enqueueJs(true, ['customize-preview']);
});
