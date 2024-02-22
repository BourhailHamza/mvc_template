<?php

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require_once(ROOT . 'app/Model.php');
require_once(ROOT . 'app/Controller.php');

$params = explode('/', $_GET['p']);

if($params[0] != "") {
    $controller = ucfirst($params[0]);

    $action = !empty($params[1]) ? $params[1] : 'index';

    // Check if root controller exist
    if(!file_exists(ROOT . 'controllers/' . $controller . '.php')) {
        header('Location: ./views/error/404.php');
        exit();
    }

    require_once(ROOT . 'controllers/' . $controller . '.php');

    $controller = new $controller();

    // Check if method controller exist
    if(!method_exists($controller, $action)) {
        header('Location: ./../views/error/404.php');
        exit();
    }

    $controller->$action();
}
