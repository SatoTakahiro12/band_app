<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\User;
use App\Models\Profile;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function chat_index(User $user, Chat $chat, $myuser)
    {
        if($myuser == (auth()->id())){
            $chats = Chat::get();
            return view('chats.room', ['chats' => $chats, 'profile_user'=>$user]);
        }
        
        return  redirect()->route('index');
    }
    
    public function store_messages(Request $request, Chat $chat, User $user)
    {
        $chat = $request->input('chat');
        $this_user = User::where('id',$request->profile_user)->first();
        Chat::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $this_user->id,
            'name' => \Auth::user()->name,
            'chat' => $chat
        ]);
         return back();
    }
    
    public function get_messages()
    {
        $chats = Chat::orderBy('created_at', 'asc')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }

}
