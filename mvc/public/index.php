<?php
    require_once "../vendor/autoload.php";
    $router = new \App\Router;
    $router->run($router->get_url());
?>