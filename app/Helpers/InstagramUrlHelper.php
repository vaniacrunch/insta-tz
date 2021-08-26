<?php

namespace App\Helpers;

class InstagramUrlHelper
{
    public static function prepareUrl($url, $json = true)
    {
        $finalUrl = self::addHttp($url).self::addDomain($url).$url;
        return $json ? $finalUrl.self::addJsonIdentifier() : $finalUrl;
    }

    private static function addHttp($url)
    {
        return !str_contains($url, 'https://')
            ? 'https://' : '';
    }

    private static function addDomain($url)
    {
        return !str_contains($url, 'instagram.com/')
            ? 'instagram.com/' : '';
    }

    private static function addJsonIdentifier()
    {
        return '/?__a=1';
    }
}
