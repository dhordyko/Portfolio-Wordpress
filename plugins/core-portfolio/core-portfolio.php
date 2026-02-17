<?php

/**
 * Plugin Name: Core Portfolio Functions
 * Description: Core Functions for Portfolio Site
 * Version: 1.0
 * Author: Daria

 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: core-portflio-funcions
 * Domain Path: /languages
 */
define('CORE_PORTFOLIO_PATH', plugin_dir_path(__FILE__));
define('CORE_PORTFOLIO_URL', plugin_dir_url(__FILE__));
function bp_related_posts_shortcode($atts)
{
    $atts = shortcode_atts(
        [
            'count'     => 5,
            'title'     => '',
            'show_date' => 0,
        ],
        $atts,
        'related_posts'
    );

    if (! is_singular('post')) {
        return ''; // Only show on single blog posts
    }

    $current_post_id = get_the_ID();
    $count = max(1, (int) $atts['count']);

    // 1) Try tags first
    $tag_ids = wp_get_post_tags($current_post_id, ['fields' => 'ids']);

    $args = [
        'post_type'           => 'post',
        'posts_per_page'      => $count,
        'post__not_in'        => [$current_post_id],
        'ignore_sticky_posts' => true,
    ];

    if (! empty($tag_ids)) {
        $args['tag__in'] = $tag_ids;
    } else {
        // 2) Fallback to categories
        $cat_ids = wp_get_post_categories($current_post_id);
        if (! empty($cat_ids)) {
            $args['category__in'] = $cat_ids;
        } else {
            // 3) If no tags/categories, fallback to latest posts
            $args['orderby'] = 'date';
            $args['order']   = 'DESC';
        }
    }

    $q = new WP_Query($args);

    if (! $q->have_posts()) {
        wp_reset_postdata();
        return '';
    }

    ob_start();

    echo '<div class="bp-related-posts-shortcode">';
    if (! empty($atts['title'])) {
        echo '<div class="bp-related-posts-title">' . esc_html($atts['title']) . '</div>';
    }
    echo '<ul class="bp-related-posts-list">';

    while ($q->have_posts()) {
        $q->the_post();

        echo '<li class="bp-related-post-item">';
        echo '<a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a>';

        if ((int) $atts['show_date'] === 1) {
            echo ' <span class="bp-related-post-date">(' . esc_html(get_the_date()) . ')</span>';
        }

        echo '</li>';
    }

    echo '</ul>';
    echo '</div>';

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('related_posts', 'bp_related_posts_shortcode');
