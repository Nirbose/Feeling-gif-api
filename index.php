<?php

require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    var_dump(file_get_contents("https://enzia.toile-libre.org/cdn/feeling/script.php"));
});

$router->get('/random', "Api\Api@random");

$router->get('/hug', "Api\Api@hug");
$router->get('/hug/(\d+)', "Api\Api@hug");

$router->get('/kiss', "Api\Api@kiss");
$router->get('/kiss/(\d+)', "Api\Api@kiss");

$router->get('/pat', "Api\Api@pat");
$router->get('/pat/(\d+)', "Api\Api@pat");

$router->get('/cry', "Api\Api@cry");
$router->get('/cry/(\d+)', "Api\Api@cry");

$router->get('/eat', "Api\Api@eat");
$router->get('/eat/(\d+)', "Api\Api@eat");


$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $json['success'] = 404;
    $json['err'] = "The file was not found";

    echo json_encode($json);
});

$router->run();