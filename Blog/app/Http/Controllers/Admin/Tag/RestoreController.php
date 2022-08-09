<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;

class RestoreController extends Controller
{
    public function __invoke()
    {
        return view('admin.tag.restore');
    }

}
