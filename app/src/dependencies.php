<?php
use Slim\App;

return function (App $app) {
  $container = $app->getContainer();

  // DB dependency (Laravel illuminate/database)
  $container['db'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;

    $capsule->addConnection($c->get('settings')['db']);
    $capsule->setAsGlobal();

    return $capsule;
  };
};
