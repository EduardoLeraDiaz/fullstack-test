<?php

use Symfony\Component\Yaml\Yaml;
use api\routing\router;

require('../vendor/autoload.php');
try {
    // Start the session because is our system to save the information
    session_start();

    // Find a route
    $routes = Yaml::parse(file_get_contents('../config/routes.yml'));
    $router = new router($routes);
    $route = $router->match($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    if (is_null($route)) {
        throw new Exception('Route not found');
    }

    // call the controller
    $controllerName = 'api\controller\\' . $route['controller'];
    $controller = new $controllerName();
    $action = $route['action'];
    array_shift($route['variables']);
    $data = call_user_func_array([$controller, $action], $route['variables']);

    // return the answer
    echo json_encode([
        'status' => 'ok',
        'data' => $data
    ]);

} catch (Exception $exception) {
    echo json_encode([
        'status' => 'error',
        'message' => $exception->getMessage()
    ]);
}
