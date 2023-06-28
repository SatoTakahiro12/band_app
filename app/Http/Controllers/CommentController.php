<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

class Commentcontroller extends Controller
{
  /* public function comment_store(Request $request, Comment $comment,$post)
    {
        $comment->user_id = Auth::id();
        $comment->post_id = $post;
        $input = $request['post'];
        $comment->body = $input['body'];
        //$comment->body = $request['post'];
        $comment->save();
        //$user = Auth::user();
        //$id = Auth::id();   
        
        //$input = array_merge($request['comment'], array('user_id'=>$user->id));
        //$comment->fill($input)->save();
        return back()->with('message', 'コメントしました');
    }*/
    
    public function comment_store(CommentRequest $request, Comment $comment)
    {
        $savedata = [
            'user_id' =>$request->user_id = Auth::id(),
            'post_id' => $request->post_id,
            'body' => $request->body,
            ];
 
        $comment = new Comment;
        $comment->fill($savedata)->save();
 
        return back()->with('commentstatus','コメントを投稿しました');
    }
    
    //public function comment_index(Comment $comment)
    //{
      //  return view('posts/show')->with(['comments' => $comment->get()]);  
    //}
}
