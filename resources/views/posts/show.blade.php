<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('個別投稿表示') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/create">投稿する！</a>
        </x-primary-button>
    </div>

    <div class="mx-auto px-6">
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
        <span>
            <img src="https://biz.addisteria.com/wp-content/uploads/2021/02/nicebutton.png" width="30px">
            <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
            @if($like)
            <!-- 「いいね」取消用ボタンを表示 -->
            	<a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">
            		いいね
            		<!-- 「いいね」の数を表示 -->
            		<span class="badge">
            			{{ $post->likes->count() }}
            		</span>
            	</a>
            @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
            	<a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
            		いいね
            		<!-- 「いいね」の数を表示 -->
            		<span class="badge">
            			{{ $post->likes->count() }}
            		</span>
            	</a>
            @endif
        </span>
    </div>
    <!--コメント機能-->
    {{--<div class="mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="post" action="/posts/{$post->id}}/comment_store">
            @csrf
        <div class="w-full flex flex-col">
            <lavel for="body" class="font-semibold mt-4">コメント</lavel>
            <p class="text__error text-sm text-red-600 space-y-1">{ $errors->first'comment.body') }}</p>
            <textarea name="comment[body]" placeholder="コメント" class="w-auto py-2 border border-gray-300 rounded-md" id="comment" cols="30" row="5">{old'body')}}</textarea>
        </div>
        <x-primary-button class="mt-4">
            送信
        </x-primary-button>
        </form>
    </div>--}}
    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/index">戻る</a>
        </x-primary-button>
    </div>
</x-app-layout>