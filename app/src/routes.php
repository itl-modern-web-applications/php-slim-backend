<?php

use App\Services\PostsService;
use Slim\App;
use Slim\Http\Request as Req;
use Slim\Http\Response as Res;

return function (App $app) {
  $container = $app->getContainer();

  $app->group('/posts', function (App $app) use ($container) {
    $p_service = new PostsService($container);

    $app->post('', function (Req $request, Res $response) use ($p_service) {
      $p_service->createPost($request);
      return $response = $response->withStatus(201);
    });

    $app->get('[/{id}]', function (Req $request, Res $response, array $args) use ($p_service) {
      $data = $p_service->readPosts($args);
      return $response = $response->withJson($data);
    });

    $app->patch('/{id}', function (Req $request, Res $response, array $args) use ($p_service) {
      $p_service->updatePost($request, $args);
      return $response = $response->withStatus(200);
    });

    $app->delete('/{id}', function (Req $request, Res $response, array $args) use ($p_service) {
      $p_service->deletePost($args);
      return $response = $response->withStatus(200);
    });
  });
};
