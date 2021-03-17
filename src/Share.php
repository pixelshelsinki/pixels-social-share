<?php
/**
 * Social share methods
 *
 * @package PixelsSocialShare
 */

namespace Pixels\Components\SocialShare;

/**
 * Get share links for various social medias
 */
class Share
{

    /**
     * Get facebook share link
     *
     * @param mixed $url to be shared.
     * @return string $link to be used in href.
     */
    public static function facebook(?string $url = null)
    {

        $url  = $url ?? self::get_current_url();
        $link = 'https://www.facebook.com/sharer.php?u=' . $url;

        return $link;
    }

    /**
     * Get twitter share link
     *
     * @param mixed $url to be shared.
     * @param mixed $message to append.
     * @return string $link to be used in href.
     */
    public static function twitter(?string $url = null, ?string $message = '')
    {

        $url  = $url ?? self::get_current_url();
        $link = 'https://twitter.com/share?url=' . $url . '&text=' . $message;

        return $link;
    }

    /**
     * Get linkedin share link
     *
     * @param mixed $url to be shared.
     * @param mixed $message to append.
     * @return string $link to be used in href.
     */
    public static function linkedin(?string $url = null, ?string $message = '')
    {

        $url  = $url ?? self::get_current_url();
        $link =
        'https://linkedin.com/shareArticle?url=' . $url . '&title=Linkedin';

        return $link;
    }

    /**
     * Get whatsapp share link
     *
     * @param mixed $url to be shared.
     * @return string $link to be used in href.
     * @since 1.0
     */
    public static function whatsapp($url = null)
    {

        $url  = $url ?? self::get_current_url();
        $link =
        'whatsapp://send?text=' . $url;

        return $link;
    }

    /**
     * Get current url
     *
     * @return string $url of current page.
     */
    public static function get_current_url() : string
    {

        $server_var = wp_unslash($_SERVER);

        $url = ( isset($server_var['HTTPS']) && ( ! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ) ? 'https' : 'http' ) . "://$server_var[HTTP_HOST]$server_var[REQUEST_URI]";

        return $url;
    }
}
