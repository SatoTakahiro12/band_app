<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/create">投稿する！</a>
        </x-primary-button>
        
        @if($profile->user_id === \Auth::user()->id)
        <x-primary-button class="mt-4 ml-4 mb-4">
            <a href="/profile/edit">プロフィールを編集する</a>
        </x-primary-button>
        @endif
        
        <!--フォロー機能-->
        
            <!-- もし$followがあれば＝ユーザーが「フォロー」をしていたら -->
            @if($follow)
            <!-- 「フォロー」取消用ボタンを表示 -->
            <x-primary-button class="mt-4 ml-4 mb-4">
            	<a href="{{ route('unfollow', ['user'=>$profile]) }}">
            		フォローを解除
            	</a>
            </x-primary-button>
            @else
            <!-- まだユーザーが「フォロー」をしていなければ、「フォロー」ボタンを表示 -->
            <x-primary-button class="mt-4 ml-4 mb-4">
            	<a href="{{ route('follow', ['user'=>$profile]) }}">
            		フォロー
            	</a>
            </x-primary-button>
            @endif
            
            @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        
        <!--チャット機能-->
        <x-primary-button class="mt-4 ml-4 mb-4">
        	<a href="{{ route('users.room', ['user'=>$profile, 'myuser'=>Auth::id()]) }}">
        	    二人で語る！
        	</a>
        </x-primary-button>
        
    </div>
    

    <div class="max-w-7xl mx-auto px-6">
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <hr class="w-full">
            <div>
                <img src="{{$profile->image_url}}"　alt="画像が読み込めません" style="width: 150px; height: 100px;"/>
            </div>
            <hr class="w-full">
            <h1 class="p-4 text-lg font-semibold">
                 {{$profile->user->name}}
            </h1>
        </div>
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                {{ __('好きなバンド') }}
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$profile->fav_band}}
            </p>
            <hr class="w-full">
        </div>
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                {{ __('好きな曲') }}
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$profile->fav_song}}
            </p>
            <hr class="w-full">
        </div>
    </div>
    {{--<div class="mx-auto px-6">
            <h1 class="p-6 text-lg font-semibold">
                {{ __('---あなたの投稿---') }}
            </h1>
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                <a href="/posts/{{ $post->id }}">{{$post->title}}</a>
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$post->body}}
            </p>
            <hr class="w-full">
            <div class="p-4 text-sm font-semibold">
                <p>
                    <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>----{{$post->created_at}}/{{$post->user->name}}
                </p>
            </div>
        </div>
    </div>--}}
    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/index">戻る</a>
        </x-primary-button>
    </div>
</x-app-layout>