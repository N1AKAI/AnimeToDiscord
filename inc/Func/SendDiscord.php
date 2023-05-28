<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Func;

/**
 * Send to Discord.
 */
class SendDiscord
{
    public static function postToDiscord(array $array)
    {
        $webhookURL = get_option('discord_webhook_url');
        $json_data = json_encode($array, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $curl = curl_init($webhookURL);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($curl);
        $errors = curl_error($curl);
        Log::log_message($errors);
        Log::log_message($response);
    }
}
