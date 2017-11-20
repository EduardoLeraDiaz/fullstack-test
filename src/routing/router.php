<?php
namespace api\routing;

class router {
    private $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    /**
     * @param $uri
     * @param $method
     * @return $array|null
     */
    public function match($uri, $method) {
        foreach($this->routes as $route) {
            preg_match('~'.$route['pattern'].'~', $uri, $matches);
            if (!empty($matches) && $route['method'] === $method) {
                $route['variables'] = $matches;
                return $route;
            }
        }

        return null;
    }
}