<?php

/**
 * @package AnimetoDiscord
 */

namespace Inc\Func;

/**
 * Class to log.
 */
class Log
{
    public static function log_message($log)
    {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }
}
