<?php
    require_once(__DIR__ . '../config/config.php');
    require_once(__DIR__ . '/router.php');

    $router = new Router();
    $router->run()


?>