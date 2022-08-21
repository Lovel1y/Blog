<?php

namespace App\Http\Controllers\Personal\Main;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class PersonalController
{
    public function index(){
        return view('personal.main.index');
    }

}
