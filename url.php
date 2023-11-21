<?php
/**
 * URL helpers for WordPress
 */

if (!function_exists('url')) {
    /**
     * URL helper, follows Laravel's.
     * (third $secure parameter not supported)
     *
     * @param string|null `home_url()` applied
     * @param array
     * @return string     asbolute URL
     */
    function url(string $path='', array $params=[]): string
    {
        $path = home_url($path);

        return ($params) ? "$path?" . http_build_query($params) : $path;
    }
}
