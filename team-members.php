<?php

namespace RGBTeamMembers;

/**
 * @copyright         2022 redgreenbird GmbH
 * Plugin Name:       Team Members
 * Plugin URI:        https://redgreenbird.com
 * Description:       This Plugin handles all Team Members. 
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            redgreenbird GmbH
 * Author URI:        https://redgreenbird.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://redgreenbird.com
 * Text Domain:      $text_domain * Domain Path:       /languages
 */

// Define File Path
define('PLUGIN_PATH', dirname(__FILE__) . "/");

// Import all classes
foreach (glob(PLUGIN_PATH . "classes/*.php") as $filename) {
    include($filename);
}

// Initialize the Plugin
$team_member_manager = new TeamMemberManager();
$team_member_shortcode_manager = new TeamMemberShortcodeManager();
