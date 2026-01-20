<?php
/**
 * Plugin Name: Portfolio General
 * Description: Core Code for Portfolio Site
 * Version: 1.0
 * Author: dhordyko
 * Author URI: 
 * License: GPL2
 *
 */
// Disable widgets menu item in admin dashboard
add_action('admin_menu', function () {
    remove_submenu_page('themes.php', 'widgets.php');
});

