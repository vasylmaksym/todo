<?php

namespace Core;

/**
 * Class App
 * @package Core
 */
class App
{
    /**
     * Parse url and check if register with Router class
     * if exists -> run method
     * else print error in dev mode (404 page on prod)
     *
     */
    public static function run()
    {
        try {
            $path = $_SERVER['REQUEST_URI'];
            $method = strtolower($_SERVER['REQUEST_METHOD']);

            if (!empty($routes = Router::$routes[$method]) && !empty($controller_action_str = $routes[$path])) {
                [$controller_name, $action_name] = explode('@', $controller_action_str);

                if (!empty($controller_name) && !empty($action_name)) {
                    $controller = "Controllers\\{$controller_name}";

                    if (class_exists($controller)) {
                        $objController = new $controller();

                        if (method_exists($objController, $action_name)) {
                            $objController->$action_name();
                        } else {
                            throw new \Exception("Class {$controller} has no method {$action_name}");
                        }

                    } else {
                        throw new \Exception("Class {$controller} not found");
                    }
                } else {
                    throw new \Exception('Invalid route param');
                }

            } else {
                self::not_found();
            }
        } catch (\Exception $e) {
            #if dev mode
            exit($e->getMessage());
            #else
            #self::not_found();
        }
    }

    /**
     * Return 404 error
     */
    public static function not_found()
    {
        header("HTTP/1.0 404 Not Found");
        die();
    }
}