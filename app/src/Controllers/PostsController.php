<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;

class PostsController {
  protected $posts;

  // CREATE method
  public function __construct (ContainerInterface $container) {
    $this->posts = $container->get('db')->table('posts');
  }

  // READ method
  public function create (Request $request, Response $response) {
    $id = $this->posts->insertGetId($request->getParsedBody());

    return $response = $response->withJson(['inserted-id' => $id]);
  }

  // UPDATE method
  public function read (Request $request, Response $response, $args) {
    $id = $args['id'] ?? false;

    $data = $id
      ? $this->posts->find($id)
      : $this->posts->get();

    return $response = $response->withJson($data);
  }

  // DELETE method
  public function update (Request $request, Response $response, $args) {
    $this->posts->where('id', $args['id'])->update($request->getParsedBody());

    return $response = $response->withJson(['updated-id' => $args['id']]);
  }

  public function delete (Request $request, Response $response, $args) {
    $this->posts->where('id', $args['id'])->delete();

    return $response = $response->withJson(['deleted-id' => $args['id']]);
  }
};