<?php
use Slim\App;

return function (App $app) {
  // POSTS routes
  $app->post('/posts', 'PostsController:create');
  $app->get('/posts[/{id}]', 'PostsController:read');
  $app->patch('/posts/{id}', 'PostsController:update');
  $app->delete('/posts/{id}', 'PostsController:delete');
};
