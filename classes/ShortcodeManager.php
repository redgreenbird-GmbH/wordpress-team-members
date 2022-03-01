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
        $atts = \shortcode_atts(
            [
                'case' => 'lowercase',
            ],
            $params
        );

        if ($atts['case'] == 'lowercase') {
            $content = strtolower($content);
        }

        return "<h1>{$content}</h1>";
    }
}
