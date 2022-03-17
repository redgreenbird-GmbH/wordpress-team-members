<?php

namespace RGBTeamMembers;

class TeamMemberManager
{
    public const TEXT_DOMAIN = 'team-members';
    public const SINGLE_NAME = 'Team Member';
    public const PLURAL_NAME = 'Team Members';
    public const DASH_CASE_NAME = 'team-members';

    function __construct()
    {
        if (is_admin()) {
            // Initialize Actions
            // \add_action('admin_menu', [$this, 'set_option_page']);
        }
    }

    function set_option_page()
    {
        \add_options_page('Team Member List', 'Team Members', 'manage_options', self::TEXT_DOMAIN, [$this, 'settings_page']);
    }

    function settings_page()
    {
        echo 'Hi';
    }
}
