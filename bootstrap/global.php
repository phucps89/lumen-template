<?php
if (!function_exists('trans')) {
    function trans($id, array $parameters = [], $domain = 'messages', $locale = null)
    {
        return app('translator')->trans($id, $parameters, $domain, $locale);
    }
}

if (!function_exists('setLang')) {
    function setLang($locale)
    {
        return app('translator')->setLocale($locale);
    }
}

if (!function_exists('public_path')) {
    /**
     * Return the path to public dir
     *
     * @param null $path
     *
     * @return string
     */
    function public_path($path = null)
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}

if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('app_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app()->basePath() . '/app' . ($path ? '/' . $path : $path);
    }
}
