<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿一覧') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/create">投稿する！</a>
        </x-primary-button>
    </div>
    <!--投稿検索機能-->
    <div class="max-w-7xl mx-auto px-6">
        <form action= '/posts/index'method="GET" >
            @csrf
        　　<input type="text" name="keyword" value="{{ $keyword }}" placeholder="投稿を検索…">
            <x-primary-button class="mt-4 ml-4 mb-4">検索</x-primary-button>
        </form>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <h1 class = "text-xl text-gray-800">---投稿一覧（新しい順）---</h1>
          @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                <a href="/posts/{{ $post->id }}">{{$post->title}}</a>
            </h1><hr class="w-full">
            
            <p class="mt-4 p-4">
                {{$post->body}}
            </p>
            <hr class="w-full">
            <div class="p-4 text-sm font-semibold">
                <p>
                    <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
                    ----{{$post->created_at}}/
                    <a href="{{route('profile.index',$post->user->profile->id)}}">{{$post->user->name}}</a>
                </p>
            </div>
        </div>
        @endforeach        
        <div class='mb-4'>
            {{ $posts->appends(request()->input())->links() }}
        </div>
        
    </div>
</x-app-layout>