<?php

namespace App\Services;

use App\Services\Posts;
use Slim\Http\Request as Req;
use Slim\Http\Response as Res;

class PostsService extends Posts {
  public function createPost (Req $request) {
    $this->posts->insert($request->getParsedBody());
  }

  public function readPosts (array $args) {
    $id = $args['id'] ?? null;

    return $id
      ? $this->posts->find($args['id'])
      : $this->posts->get();
  }

  public function updatePost (Req $request, array $args) {
    $this->posts->where('id', $args['id'])->update($request->getParsedBody());
  }

  public function deletePost (array $args) {
    $this->posts->where('id', $args['id'])->delete();
  }
};
