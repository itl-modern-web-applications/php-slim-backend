<?php

use Slim\App;
use Illuminate\Database\Capsule\Manager;

return function (App $app) {
  $container = $app->getContainer();

  $container['db'] = function ($c) {
    $capsule = new Manager;

    $capsule->addConnection($c->get('settings')['db']);
    $capsule->setAsGlobal();

    return $capsule;
  };
};
