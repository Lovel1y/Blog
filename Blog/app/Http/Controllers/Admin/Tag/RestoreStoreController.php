<?php

namespace App\Http\Controllers\Admin\Tag;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\RestoreRequest;
use App\Models\Tag;

class RestoreStoreController extends Controller
{
    public function __invoke(RestoreRequest $request)
    {
        $data = $request->validated();

        $tag = Tag::withTrashed()->find($data['id']);

        $tag->restore();

        return redirect()->route('admin.tag.index');

    }


}
