<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Requests\Admin\Category\RestoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('admin.category.index');

    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('admin.category.show', compact('category'));

    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');

    }

    public function restore()
    {
        return view('admin.category.restore');
    }

    public function restorestore(RestoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::withTrashed()->find($data['id']);

        $category->restore();

        return redirect()->route('admin.category.index');
    }
}

