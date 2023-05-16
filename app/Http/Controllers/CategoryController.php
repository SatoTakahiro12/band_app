<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;




class CategoryController extends Controller
{
    public function index(Category $category)
    {
        //$posts = Post::where('category_id', 1)->get();
        return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
}