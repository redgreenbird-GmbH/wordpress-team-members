<?php

namespace RGBTeamMembers;

class PostTypeManager
{
    function __construct()
    {
        \add_action('init', [$this, 'custom_post_type']);
        \add_action('add_meta_boxes', [$this, 'add_custom_data']);
        \add_action('save_post', [$this, 'on_save']);

        add_action('add_meta_boxes',  function () {
            add_meta_box('profile', 'Profile', [$this, 'my_output_function']);
        });
    }

    function custom_post_type()
    {
        $text_domain = TeamMemberManager::TEXT_DOMAIN;
        $single_name = TeamMemberManager::SINGLE_NAME;
        $plural_name =  TeamMemberManager::PLURAL_NAME;
        $dash_case_name = TeamMemberManager::DASH_CASE_NAME;

        $labels = [
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
        ];

        $supports = [
            'title',
            // 'editor',
            // 'thumbnail',
            // 'custom-fields',
            // 'revisions',
        ];

        $args = [
            'label'                 => __($plural_name, $text_domain),
            'description'           => __("{$single_name} Description", $text_domain),
            'labels'                => $labels,
            'supports'              => $supports,
            'taxonomies'            => ['category', 'post_tag'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-groups',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        ];

        \register_post_type('team-members', $args);
    }

    // Meta Boxes - Custom Data
    function add_custom_data()
    {
        \add_meta_box(
            'team-members',
            'Team Member Information',
            [$this, 'generate_meta_fields'],
            'team-members'
        );
    }

    function generate_meta_fields()
    {
        include(\PLUGIN_PATH . "html/meta-box-form.html");
    }

    // Handle on Save Event
    function on_save($post_id)
    {
        /* global $post;

        \add_post_meta(
            $post->ID,
            'name',
            'Name',
            false,
        );

        \update_post_meta(
            $post->ID,
            'name',
            \sanitize_text_field($_POST['name']),
        ); */
    }

    function my_output_function($post)
    {
        $text = get_post_meta($post, 'SMTH_METANAME', true);

        wp_editor(htmlspecialchars($text), 'mettaabox_ID', $settings = array('textarea_name' => 'MyInputNAME'));
    }
}
