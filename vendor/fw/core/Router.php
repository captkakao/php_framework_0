<?php

namespace fw\core;

class Router
{
    /**
     * table of all routes
     * @var array
     */
    protected static $routes = [];

    /**
     * current route
     * @var array
     */
    protected static $route = [];

    /**
     * adds route to table of routes
     *
     * @param string $regexp regular expression of route (url)
     * @param array $route route like ([controller, action, params])
     */
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    /**
     * returns table of all routes
     *
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * returns current route (controller, action, [params])
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * searches url from table of all routes
     *
     * @param string $url incoming url
     * @return bool
     */
    public static function matchRoute($url) {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                // prefix for admin controllers
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                }
                else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Redirects url to proper route
     *
     * @param string $url incoming url
     */
    public static function dispatch($url) {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                }
                else {
                    throw new \Exception("Method <b>$controller::$action</b> not found", 404);
                }
            }
            else {
                throw new \Exception("Controller <b>$controller</b> not found", 404);
            }
        }
        else {
            throw new \Exception("Page not found", 404);
        }
    }

    protected static function upperCamelCase($name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url) {
        if ($url) {
            $params = explode('&', $url, 2);
            if (strpos($params[0], '=') === false) {
                return rtrim($params[0], '/');
            }
            else {
                return '';
            }
        }
    }
}