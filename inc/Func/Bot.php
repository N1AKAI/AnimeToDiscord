<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Func;

/**
 * Store all the bot infos inside an arrary
 * @return array
 */
class Bot
{
    public $botInfos = array();

    public function getBotInfo()
    {
        $this->botInfos['content'] =  get_option("mention_type") == 0 ? "@here" : "@everyone";
        $this->botInfos['username'] =  get_option("bot_username");
        $this->botInfos['avatar_url'] =  get_option("avatar_url");
        return $this->botInfos;
    }
}
