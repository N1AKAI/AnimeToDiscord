<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallBacks;
use \Inc\Api\Callbacks\ManagerCallBacks;

class Dashboard extends BaseController
{
    public $settings;
    public $pages;
    public $subpages;
    public $callbacks;
    public $callbacks_mngr;

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallBacks();
        $this->callbacks_mngr = new ManagerCallBacks();
        $this->setPages();
        $this->setSubPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'A2D Plugin',
                'menu_title' => 'A2D',
                'capability' => 'manage_options',
                'menu_slug' => 'anime_to_discord',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-admin-settings',
                'position' => 90
            ]
        ];
    }

    public function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'anime_to_discord',
                'page_title' => 'A2D Settings',
                'menu_title' => 'Settings',
                'capability' => 'manage_options',
                'menu_slug' => 'a2d_settings',
                'callback' => array($this->callbacks, 'adminSettings')
            ]
        ];
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'a2d_options_setting',
                'option_name' => 'a2d_settings',
                'callback' => array($this->callbacks_mngr, 'CheckBoxValid')
            ),
            array(
                'option_group' => 'discord_setting',
                'option_name' => 'a2d_discord',
                'callback' => array($this->callbacks_mngr, 'TextValid')
            )
        );
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                'id' => 'manager_settings_section',
                'title' => 'Manger Settings',
                'callback' => array($this->callbacks_mngr, 'CheckBoxList'),
                'page' => 'a2d_settings'
            ],
            [
                'id' => 'discord_settings_section',
                'title' => 'Discord Settings',
                'callback' => array($this->callbacks_mngr, 'DiscordInfos'),
                'page' => 'a2d_discord'
            ]
        ];
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array();
        foreach ($this->managers as $id => $title) {
            $args[] = [
                'id' => $id,
                'title' => $title,
                'callback' => array($this->callbacks_mngr, 'CheckBoxField'),
                'page' => 'a2d_settings',
                'section' => 'manager_settings_section',
                'args' => array(
                    'option_name' => 'a2d_settings',
                    'label_for' => $id,
                    'class' => 'ui-toggle'
                )
            ];
        }
        foreach ($this->discordinfos as $id => $title) {
            $args[] = [
                'id' => $id,
                'title' => $title,
                'callback' => array($this->callbacks_mngr, 'InputField'),
                'page' => 'a2d_discord',
                'section' => 'discord_settings_section',
                'args' => array(
                    'option_name' => 'a2d_discord',
                    'label_for' => $id,
                    'class' => 'in'
                )
            ];
        }
        $this->settings->setFields($args);
    }
}
