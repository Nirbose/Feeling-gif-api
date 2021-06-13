<?php

require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    var_dump($_SERVER);
});

$router->get('/hug', "Api\Api@hug");
$router->get('/kiss', "Api\Api@kiss");

$router->run();