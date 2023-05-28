<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();
        if (!get_option('a2d_settings')) {
            $default = array(
                'anime_episodes' => true,
                'Download_Links_checkbox' => true,
                'manga_chapters' => true
            );
            update_option('a2d_settings', $default);
        }
        if (!get_option('a2d_discord')) {
            $default = array(
                'content' => '@here',
                'username' => 'Celestial Dragons',
                'avatar_url' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiJdzH_BA5ateBrprs7fEu4G7_XzxOe8sKi5g0lao5eUQSri5uzZMUpki7Q-jCBOsitfAkTPVL-Ln6jjHUgDUdMtQxz3JEvFkAA20XC6ugdVZWNtYQ5YVVylrmKVFTj0Y7cBJG1dkvODGJzA7Z1M9uKe_QH4XzUAQ-fmqepzLWyBVf_wSdzL-HM7aSE/s1600/5seslB4o_400x400.jpg',
                'footer_text' => 'Published By',
                'no_image_url' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguIggPPVBRz6vx_mxqZ9Ro9_Sw_hNZi9cDBcRMCyHdezSgOXuiFvUr0NK3FJTm5PSx9gJq7aFq0wTWHP5_ipjjBxIfi8MrGKEzbot-vq4obYlclYBaQ0ZjMs9GJzH21yRwGrVxbbjPTz7Hy1BBbOIOMBYJVfjnkOvHhm7-JQjsKhFfdAE7_DrY3yKl/s1600/no_image.jpg',
                'author_name' => 'Celestial Dragons',
                'author_url' => 'https://twitter.com/Celestial_Ryu0'
            );
            update_option('a2d_discord', $default);
        }
    }
}
