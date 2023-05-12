<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return $post->get();
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' =>$category->get()]);
    }
 
   public function store(PostRequest $request, Post $post)
     {
        $user = Auth::user();
        $id = Auth::id();   
        
        $input = array_merge($request['post'], array('user_id'=>$user->id));
       // $input = array_merge($input, array('category_id'=>$request->category_id));
        $post->fill($input)->save();
       
        return back()->with('message', '保存しました');
    }
    
}
