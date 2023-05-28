<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Base;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    public function enqueue()
    {
        wp_enqueue_style('main.css', $this->plugin_url . "assets/css/main.css");
        wp_enqueue_style('all.min.css', $this->plugin_url . "assets/css/all.min.css");
        wp_enqueue_script('main.js', $this->plugin_url . "assets/js/main.js");
    }
}
