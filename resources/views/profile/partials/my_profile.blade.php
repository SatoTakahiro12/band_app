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
        <x-primary-button class="mt-4 ml-4 mb-4">
            <a href="/profile/edit">プロフィールを編集する</a>
        </x-primary-button>
    </div>
    <div></div>

    <div class="mx-auto px-6">
         @foreach($profiles as $profile)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <hr class="w-full">
            <div>
                <img src="{{$profile->image_url}}"　alt="画像が読み込めません" style="width: 150px; height: 100px;"/>
            </div>
            <hr class="w-full">
            <h1 class="p-4 text-lg font-semibold">
                 {{ Auth::user()->name }}
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
        @endforeach
    </div>
    <div class="mx-auto px-6">
            <h1 class="p-6 text-lg font-semibold">
                {{ __('---あなたの投稿---') }}
            </h1>
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                {{$post->title}}
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
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/index">戻る</a>
        </x-primary-button>
    </div>
</x-app-layout>