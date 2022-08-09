<?php

namespace App\Http\Controllers\Admin\Post;

use App\Service\PostService;

class BaseController
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
