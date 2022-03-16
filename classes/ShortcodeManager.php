<?php

namespace RGBTeamMembers;

class ShortcodeManager
{
    function __construct()
    {
        // Initialize Shortcodes
        \add_shortcode('team_member_list', [$this, 'team_member_list_shortcode']);
    }

    function team_member_list_shortcode($params, $content = "")
    {
        $return = '';

        // Handle Attributes
        $atts = \shortcode_atts(
            [
                'case' => 'lowercase',
            ],
            $params
        );

        // Get all Posts
        $posts = get_posts([
            'post_type' => 'team-members',
            'post_status' => 'publish',
            'numberposts' => -1
            // 'order'    => 'ASC'
        ]);

        include(\PLUGIN_PATH . 'includes/team-member-list-template.php');

        return $return;
    }
}
