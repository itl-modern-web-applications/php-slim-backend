<?php

namespace App\Services;

use Psr\Container\ContainerInterface as Container;

class Posts {
  protected $posts;

  public function __construct (Container $container) {
    $this->posts = $container->get('db')->table('posts');
  }
};
