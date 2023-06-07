<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use Cloudinary;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, Profile $profile): View
    {
        $profiles=Profile::where('user_id',auth()->id())->orderBy('created_at','desc')->take(1)->get();
        
        return view('profile.edit',compact('profiles'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    public function store(Request $request,Profile $profile)
    {
        $user = Auth::user();
        $id = Auth::id();
        $input =
        [
            'user_id'=>$user->id,
            'fav_band' => $request->fav_band,
            'fav_song' => $request->fav_song,
            //'image'=>$request->image_url,
        ];
        if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        }
        
        $profile->fill($input)->save();
        return back()->with('message', '保存しました');
    }
    
    public function index(Profile $profile, Post $post, User $user)
    {
        /*$user = Auth::user();
        $id = Auth::id();
        
        $profiles=Profile::where('user_id',$user->id)->orderBy('created_at','desc')->take(1)->get();*/
        
        /*$posts=Post::where('user_id',auth()->id())->orderBy("created_at","desc")->paginate(5);*/
        
        return view('profile.partials.my_profile')->with(['profile'=>$profile, 'post'=>$post, 'user'=>$user]);//->with(['profile'=>$profile->get()]);
        //return view('partials.my_profile')->with(['profiles'=>$profile]);
    }
    
    public function other_index(Profile $profile, Post $post)
    {
        
    }
    
    public function profile_update(Request $request, Profile $profile)
    {
        //$profiles=Profile::where('user_id',auth()->id())->get();
        $user = Auth::user();
        $id = Auth::id();
        $input_profile =  
        [
            'user_id'=>$user->id,
            'fav_band' => $request->fav_band,
            'fav_song' => $request->fav_song,
        ];
        if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input_profile += ['image_url' => $image_url];
        }
        $profile->fill($input_profile)->save();
    
        return back()->with('message','更新しました');
    }
}
