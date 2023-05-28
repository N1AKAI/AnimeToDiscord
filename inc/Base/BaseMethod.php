<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Base;

use \Inc\Func\Post;

class BaseMethod extends Post
{
    public $todiscord;

    public function register()
    {
        add_action('transition_post_status', array($this, 'getPostInfo'), 10, 3);
    }
}
