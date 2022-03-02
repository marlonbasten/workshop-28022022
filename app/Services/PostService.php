<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    private Post $model;

    public function __construct()
    {
        $this->model = new Post;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getAllPostsWithUsers()
    {
        return $this->model->whereNotNull('user_id')->get();
    }
}