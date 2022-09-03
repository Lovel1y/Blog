<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        return redirect()->route('post.index');
    }

}
