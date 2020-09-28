<?php

namespace Core;


/**
 * Class Router
 * @package Core
 */
class Router
{
    /**
     * @var array
     */
    public static $routes = array('get' => array(), 'post' => array());

    /**
     * Register new GET route
     *
     * @param string $path - Route path (@example "/home")
     * @param string $controller_action - Controller and Action str (@example "HomeController@main")
     * @return void
     */
    static function get($path, $controller_action)
    {
        self::add_to_routes('get', $path, $controller_action);
    }

    /**
     * Register new POST route
     *
     * @param string $path - Route path (@example "/home")
     * @param string $controller_action - Controller and Action str (@example "HomeController@main")
     * @return void
     */
    static function post($path, $controller_action)
    {
        self::add_to_routes('post', $path, $controller_action);
    }

    /**
     * Add route to array by key ('get'|'post')
     *
     * @param string $key
     * @param string $path
     * @param string $controller_action
     * @return void
     */
    private static function add_to_routes($key, $path, $controller_action)
    {
        self::$routes[$key][$path] = $controller_action;
    }
}