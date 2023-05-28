<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Func;

/**
 * ?
 */
class Post
{
    public $postInfos = array();
    public $getbot;
    public $postFeilds = array();
    public $todiscord = array();
    public $rows;

    public function getPostInfo($new_status, $old_status, $post)
    {
        $this->getbot = new Bot();
        if ($new_status != 'publish' || $old_status == 'publish') return;
        $discordoptions = get_option('a2d_discord');
        $id = $post->ID;
        $this->postInfos['title'] = $post->post_title;
        $this->postInfos['url'] = get_permalink($id);
        $this->postInfos['timestamp'] = date("Y-m-d\TH:i:sO");
        $this->postInfos['color'] = hexdec("0xA3A3A3");
        $this->postInfos['footer']['text'] = $discordoptions['footer_text'] . " " . get_the_author_meta('display_name', $post->post_author);
        $this->postInfos['footer']['icon_url'] = get_avatar_url($post->post_author);
        $this->postInfos['image']['url'] = (get_the_post_thumbnail_url($id)) ? get_the_post_thumbnail_url($id) : $discordoptions['no_image_url'];
        $this->postInfos['author']['name'] = $discordoptions['author_name'];
        $this->postInfos['author']['url'] = $discordoptions['author_url'];
        add_action('acf/save_post', array($this, 'getPostFields'));
    }

    public function getPostFields($id)
    {
        $discordoptions = get_option('a2d_discord');
        $options = get_option('a2d_settings');
        $webhookURL = $discordoptions['discord_webhook_url'];
        if ($webhookURL == null) return;
        $this->postFeilds = [
            [
                "name"    => "Server Name",
                "inline"  => true
            ],
            [
                "name"    => "Type",
                "inline"  => true
            ],
            [
                "name"    => "DL",
                "inline"  => true
            ]
        ];
        $post_type = get_post_type($id);
        if ($post_type == 'post') {
            if (get_field("wp2discord", $id) == FALSE) return;
            if (!$options["anime_episodes"]) return;
            if (have_rows('softsub_and_hardsub', $id)) {
                $this->rows = get_field('softsub_and_hardsub');
                $serverNs = [];
                $urls = [];
                $labels = [];
                $arrUrls = [];
                $prevslabel = '';
                while (have_rows('softsub_and_hardsub', $id)) {
                    the_row();
                    $value = get_sub_field('banner');
                    $label = get_sub_field_object('banner')['choices'][$value];
                    if ($label == 'بدون بانر') {
                        $label = $prevslabel;
                    }
                    while (have_rows('server', $id)) {
                        the_row();
                        $labels[] = $label;
                        $serverNs[] = get_sub_field('server_name');
                        $urls[] = get_sub_field('dl_url');
                    }
                    $subUrls[] = get_sub_field('sub_url');
                    $prevslabel = $label;
                }
                $serverN = implode("\n", $serverNs);
                $label = implode("\n", $labels);
                foreach ($urls as $url) {
                    $arrUrls[] = "[Link]($url)";
                }
                $url = implode("\n", $arrUrls);
                if ($subUrls && $options["Download_Links_checkbox"] && $options["Links_checkbox"]) {
                    $this->postFeilds[0]['value'] = "$serverN\nG.Drive";
                    $this->postFeilds[1]['value'] = "$label\nSub";
                    $this->postFeilds[2]['value'] = "$url\n[Link]($subUrls[0])";
                } elseif ($options["Download_Links_checkbox"]) {
                    $this->postFeilds[0]['value'] = "$serverN";
                    $this->postFeilds[1]['value'] = "$label";
                    $this->postFeilds[2]['value'] = "$url";
                } elseif ($subUrls && $options["Links_checkbox"]) {
                    $this->postFeilds[0]['value'] = "DLL";
                    $this->postFeilds[1]['value'] = "Sub";
                    $this->postFeilds[2]['value'] = "[Link]($subUrls[0])";
                } else {
                    $this->postFeilds = [];
                }
            }
        } elseif ($post_type == 'chapter') {
            if (!$options["manga_chapters"]) return;
            $manga_download = get_field('manga_download', $id);
            $grant = $manga_download["wp2discord"];
            $serverN = $manga_download['manga_server_name'];
            $url = $manga_download['manga_dl_url'];
            if ($manga_download) {
                if ($grant == FALSE) return;
                $this->postFeilds[0]['value'] = $serverN;
                $this->postFeilds[1]['value'] = 'zip';
                $this->postFeilds[2]['value'] = "[Link]($url)";
            }
        } else {
            return;
        }
        $this->postInfos = array_merge($this->postInfos, ['fields' => $this->postFeilds]);
        $this->todiscord = array_merge($this->getbot->getBotInfo(), ['embeds' => [$this->postInfos]]);
        SendDiscord::postToDiscord($this->todiscord);
    }
}
