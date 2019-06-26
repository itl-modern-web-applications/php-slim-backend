<?php

use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/src/settings.php';
$dependencies = require __DIR__ . '/src/dependencies.php';
$routes = require __DIR__ . '/src/routes.php';

$app = new App($settings);
$dependencies($app);
$routes($app);

return $app;
