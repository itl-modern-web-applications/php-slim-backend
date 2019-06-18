<?php
// Load Slim framework
require __DIR__ . '/../vendor/autoload.php';

// Load settings and instantiate application
$settings = require __DIR__ . '/src/settings.php';
$app = new Slim\App($settings);

// Load and push dependencies to app instance
$dependencies = require __DIR__ . '/src/dependencies.php';
$dependencies($app);

// Load and push routes to app instance
$routes = require __DIR__ . '/src/routes.php';
$routes($app);

// Return app instance
return $app;
