<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallBacks extends BaseController
{
    public function CheckBoxValid($input)
    {
        $output = array();
        foreach ($this->managers as $id => $title) {
            $output[$id] = isset($input[$id]) ? true : false;
        }
        return $output;
    }

    public function TextValid($input)
    {
        $output = array();
        foreach ($this->discordinfos as $id => $title) {
            $output[$id] = isset($input[$id]) ? $input[$id] : false;
        }
        return $output;
    }

    public function CheckBoxList()
    {
        echo 'Plguin Features';
    }

    public function DiscordInfos()
    {
        echo 'Fill in The Fields';
    }

    public function CheckBoxField($args)
    {
        $class = $args['class'];
        $label = $args['label_for'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        $checked = isset($checkbox[$label]) ? ($checkbox[$label] ? true : false) : false;
        echo '<input type="checkbox" id="' . $label . '" name="' . $option_name . '[' . $label . ']' . '" class="' . $class . '"value="1"' . ($checked ? 'checked' : '') . '>';
    }

    public function InputField($args)
    {
        $class = $args['class'];
        $label = $args['label_for'];
        $option_name = $args['option_name'];
        $option = get_option($option_name);
        $inputtext = isset($option[$label]) ? $option[$label] : false;
        echo '<input type="text" id="' . $label . '" name="' . $option_name . '[' . $label . ']' . '" class="' . $class . '"value="' . $inputtext . '" required>';
    }
}
