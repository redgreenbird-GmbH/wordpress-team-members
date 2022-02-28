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
 * Text Domain:       team-members
 * Domain Path:       /languages
 */

$teamMember = new TeamMember();

class TeamMember
{
    function __construct()
    {
        add_action('init', [$this, 'setup']);
    }

    function setup()
    {
        if (is_admin()) {
        }
    }
}
