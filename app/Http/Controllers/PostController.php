<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class PostController extends Controller
{
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' =>$category->get()]);
    }
 
   public function store(PostRequest $request, Post $post)
     {
        $user = Auth::user();
        $id = Auth::id();   
        
        $input = array_merge($request['post'], array('user_id'=>$user->id));
        //$input = ['user_id' => $request->user()->id];
        //$input = array_merge($input, array('category_id'=>$request->category_id));
        $post->fill($input)->save();
       
        return back()->with('message', '保存しました');
    }
    
    /*public function temporary_store(PostRequest $request, Post $post)
     {
        $user = Auth::user();
        $id = Auth::id();   
        
        $input = array_merge($request['post'], array('user_id'=>$user->id));
        //$input = ['user_id' => $request->user()->id];
        //$input = array_merge($input, array('category_id'=>$request->category_id));
        $post->fill($input)->save();
       
        return back()->with('message', '保存しました');
    }*/
    
    public function index(Post $post, Request $request, User $user) 
    {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        //$posts = $query;
        $posts= $query->orderBy("created_at","desc")->paginate(5);
        return view('posts/index',compact('keyword','posts','user',));//->with(['keyword'=>$keyword, 'posts'=> $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post, Comment $comment, User $user)
    {
        $user = Auth::user();
        $id = Auth::id();
        
        $like=Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        //dd($like);
         //return view('posts/show', compact('post', 'like'));
        return view('posts/show')->with(['comments'=>$comment->get(),'post' => $post, 'like'=>$like, 'user'=>$user]);
    }
    
    public function delete(Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('message','削除しました');
        return redirect()->route('index');
    }
    
    public function edit(Post $post,Category $category)
    {
        return view('posts/post_edit')->with(['post' => $post,'categories' =>$category->get()]);
    }
    
    public function update(PostRequest $request, Post $post)
     {
        $user = Auth::user();
        $id = Auth::id();   
        
        $input_post = array_merge($request['post'], array('user_id'=>$user->id));
        //$input = ['user_id' => $request->user()->id];
        //$input = array_merge($input, array('category_id'=>$request->category_id));
        $post->fill($input_post)->save();
       
        return redirect('/posts/index')->with('message', '保存しました');
    }
}
