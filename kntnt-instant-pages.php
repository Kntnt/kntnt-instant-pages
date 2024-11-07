<?php
/**
 * Plugin Name: Kntnt Instant Pages
 * Plugin URI: https://github.com/Kntnt/kntnt-instant-pages
 * Description: Implements instant.page preloading for faster page navigation.
 * Version: 1.0.3
 * Requires at least: 5.0
 * Requires PHP: 8.0
 * Author: Thomas Barregren
 * Author URI: https://www.kntnt.se/
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Kntnt_Instant_Pages
 */

declare(strict_types=1);

namespace Kntnt\Instant_Pages;

defined( 'ABSPATH' ) || die;

require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin.php';

new Plugin( __FILE__ );
