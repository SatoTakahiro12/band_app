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
        <!--いいね機能-->
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
    <!---コメント機能--->
    <div class="mx-auto px-6">
        <h1 class = "text-xl text-gray-800 ">---コメント一覧（新しい順）---</h1>
        @foreach($comments as $comment)
            @if($post->id == $comment->post_id)
                <div class="mt-4 p-8 bg-white w-full rounded-2xl">
                    <hr class="w-full">
                    <p class="mt-4 p-4">
                        {{$comment->body}}
                    </p>
                    <hr class="w-full">
                    <div class="p-4 text-sm font-semibold">
                        <p>
                            ----{{$comment->created_at}}/{{$post->user->name}}----
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    <form class="mb-4" method="POST" action="/posts/{$post->id}}/comment_store">
    @csrf
     <input name="post_id" type="hidden" value="{{ $post->id }}">
     <div class="form-group">
 
    <div class="form-group">
     <label for="body">
     本文
     </label>
 
        <textarea id="comment_body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
        @if ($errors->has('body'))
         <div class="invalid-feedback">
         {{ $errors->first('body') }}
         </div>
        @endif
    </div>
 
    <div class="mt-4">
        <x-primary-button class="mt-4">
            コメントする
        </x-primary-button>
    </div>
    </form>
 
    @if (session('commentstatus'))
        <div class="alert alert-success mt-4 mb-4">
         {{ session('commentstatus') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/posts/index">戻る</a>
        </x-primary-button>
    </div>
</x-app-layout>