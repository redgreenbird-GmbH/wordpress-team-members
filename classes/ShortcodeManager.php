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

        // Container
        echo '<div class="container">';
        echo '<div class="row">';

        foreach ($posts as $post) {
            // var_dump($post);
            $name = $post->post_title;
            $profile = $post->post_content;
            $thumbnail =
                wp_get_attachment_image_src(
                    get_post_thumbnail_id($post->ID),
                    'single-post-thumbnail'
                )[0];

            include(\PLUGIN_PATH . 'includes/team-member-box.php');
        }

        echo '</div>';
        echo '</div>';

        return $return;
    }
}
