<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Base;

class BaseController
{
    public $plugin_base_name;
    public $plugin_path;
    public $plugin_url;
    public $managers = array();
    public $discordinfos = array();

    function __construct()
    {
        $plugin = plugin_basename(dirname(__FILE__, 3));
        $this->plugin_base_name = $plugin . "/" . $plugin . ".php";
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->managers = [
            'anime_episodes' => 'Publish Anime Episodes',
            'manga_chapters' => 'Publish Manga Chapters',
            'Download_Links_checkbox' => 'Show Download Links',
            'Links_checkbox' => 'Show Subtitle Link'
        ];

        $this->discordinfos = [
            'content' => 'Content',
            'username' => 'Username',
            'avatar_url' => 'Avatar Url',
            'footer_text' => 'Footer Text',
            'no_image_url' => 'No Image Url',
            'author_name' => 'Author Name',
            'author_url' => 'Author Url',
            'discord_webhook_url' => 'Webhook Url'
        ];
    }
}
