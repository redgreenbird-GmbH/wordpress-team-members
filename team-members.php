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

$teamMemberManager = new TeamMemberManager();

class TeamMemberManager
{
    private const TEXT_DOMAIN = 'team-members';
    private const SINGLE_NAME = 'Team Member';
    private const PLURAL_NAME = 'Team Members';
    private const DASH_CASE_NAME = 'team-members';

    function __construct()
    {
        if (is_admin()) {
            add_action('init', [$this, 'custom_post_type']);
            add_action('admin_menu', [$this, 'set_option_page']);
        }
    }

    function set_option_page()
    {
        add_options_page('Team Member List', 'Team Members', 'manage_options', self::TEXT_DOMAIN, [$this, 'settings_page']);
    }

    function settings_page()
    {
        echo 'Hi';
    }

    function custom_post_type()
    {
        $text_domain = self::TEXT_DOMAIN;
        $single_name = self::SINGLE_NAME;
        $plural_name =  self::PLURAL_NAME;
        $dash_case_name = self::DASH_CASE_NAME;

        $labels = array(
            'name'                  => _x($plural_name, $text_domain),
            'singular_name'         => _x($single_name, $text_domain),
            'menu_name'             => __($plural_name, $text_domain),
            'name_admin_bar'        => __($single_name, $text_domain),
            'archives'              => __("{$single_name} Archives", $text_domain),
            'attributes'            => __("{$single_name} Attributes", $text_domain),
            'parent_item_colon'     => __("Parent {$single_name}", $text_domain),
            'all_items'             => __("All {$plural_name}", $text_domain),
            'add_new_item'          => __("Add new {$single_name}", $text_domain),
            'add_new'               => __('Add new', $text_domain),
            'new_item'              => __("New {$single_name}", $text_domain),
            'edit_item'             => __("Edit {$single_name}", $text_domain),
            'update_item'           => __("Update {$single_name}", $text_domain),
            'view_item'             => __("View {$single_name}", $text_domain),
            'view_items'            => __("View {$single_name}", $text_domain),
            'search_items'          => __("Search {$single_name}", $text_domain),
            'not_found'             => __('Not found', $text_domain),
            'not_found_in_trash'    => __('Not found in Trash', $text_domain),
            'featured_image'        => __('Featured Image', $text_domain),
            'set_featured_image'    => __('Set featured image', $text_domain),
            'remove_featured_image' => __('Remove featured image', $text_domain),
            'use_featured_image'    => __('Use as featured image', $text_domain),
            'insert_into_item'      => __("Insert into {$single_name}", $text_domain),
            'uploaded_to_this_item' => __("Uploaded to this {$single_name}", $text_domain),
            'items_list'            => __("{$single_name} list", $text_domain),
            'items_list_navigation' => __("{$single_name} list navigation", $text_domain),
            'filter_items_list'     => __("Filter {$single_name} list", $text_domain),
        );
        $args = array(
            'label'                 => __($plural_name, $text_domain),
            'description'           => __("{$single_name} Description", $text_domain),
            'labels'                => $labels,
            'supports'              => false,
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('team_members', $args);
    }
}
