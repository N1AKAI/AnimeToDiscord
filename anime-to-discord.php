<?php

/**
 * @package AnimetoDiscord
 */

/*
 * Plugin Name: Anime to Discord
 * Description: Publishing bot.
 * Version: 1.0
 * Author: N1 AKAI
*/

use Inc\Base\Activate;
use Inc\Base\Deactivate;

// if this file is called firectly, abort!!!
if (!defined("ABSPATH")) {
  die;
}

// Require one the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate_anime_to_discord_plugin()
{
  Activate::activate();
}

function deactivate_anime_to_discord_plugin()
{
  Deactivate::deactivate();
}

register_activation_hook(__FILE__, "activate_anime_to_discord_plugin");
register_deactivation_hook(__FILE__, "deactivate_anime_to_discord_plugin");

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
  Inc\Init::register_services();
}
