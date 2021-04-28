<?php
/**
 * Plugin Name: HD Block Based 404 Editor
 * Plugin URI: https://404.com
 * Description: 404 page editor
 * Version: 0.1
 * Author: Olusola Glory
 * Author URI: https://site.me
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * WC requires at least: 3.0.0
 * WC tested up to: 5.7
 * Text Domain: domain
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Required minimums and constants
 */
define( 'HD_BLOCK_404', __FILE__ );
define( 'HD_BLOCK_404_LOCATION_URL', plugins_url( '', __FILE__ ) );

require_once  dirname( __FILE__ ) . '/includes/loader.php';