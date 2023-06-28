<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('編集画面') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="post" action="/posts/{{$post->id}}">
            @csrf
            @method('put')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <lavel for="title" class="font-semibold mt-4">タイトル</lavel>
                    <p class="title__error text-sm text-red-600 space-y-1">{{ $errors->first('post.title') }}</p>
                    <input type="text" name="post[title]" placeholder="タイトル" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ $post->title }}">
                </div>
            </div>
        
        <div class="w-full flex flex-col">
            <lavel for="body" class="font-semibold mt-4">本文</lavel>
            <p class="body__error text-sm text-red-600 space-y-1">{{ $errors->first('post.body') }}</p>
            <textarea name="post[body]" placeholder="例：〇〇のライブサイコーだった！" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" row="5">{{old('body',$post->body)}}</textarea>
        </div>
        <div class="mt-8">
             <lavel for="category" class="font-semibold mt-4">カテゴリー</lavel>
             <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
             </select>
        </div>
        
        <x-primary-button class="mt-4">
            送信
        </x-primary-button>
        </form>
        <x-primary-button class="mt-4">
            <a href="/posts/index">投稿を見る！</a>
        </x-primary-button>
    </div>
</x-app-layout>