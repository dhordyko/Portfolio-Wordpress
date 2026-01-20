<?php
/**
 * Plugin Name:       Blocks Portfolio
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blocks-portfolio
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define( 'BLOCKS_PORTFOLIO_PATH', plugin_dir_path(__FILE__));
function create_block_blocks_portfolio_block_init() {
		register_block_type(__DIR__ . '/build/block-hero' );
	register_block_type(__DIR__ . '/build/block-contact' );
}
add_action( 'init', 'create_block_blocks_portfolio_block_init' );
