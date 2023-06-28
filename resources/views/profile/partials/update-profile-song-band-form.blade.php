<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('好きなバンド・好きな曲') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("好きなバンドと曲をたくさん書いてください！") }}
        </p>
    </header>

    @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
         @foreach($profiles as $profile)
          <div class="mt-8">
                <div class="w-full flex flex-col">
                    <lavel for="fav_band" class="font-semibold mt-4">好きなバンド</lavel>
                    <p class="title__error text-sm text-red-600 space-y-1">{{ $errors->first('fav_band') }}</p>
                    <input type="text" name="fav_band" class="w-auto py-2 border border-gray-300 rounded-md" id="fav_band" value="{{$profile->fav_band}}">
                </div>
            </div>
             <div class="mt-8">
                <div class="w-full flex flex-col">
                    <lavel for="fev_song" class="font-semibold mt-4">好きな曲</lavel>
                    <p class="title__error text-sm text-red-600 space-y-1">{{ $errors->first('fav_song') }}</p>
                    <input type="text" name="fav_song" class="w-auto py-2 border border-gray-300 rounded-md" id="fav_song" value="{{$profile->fav_song}}">
                </div>
            </div>
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <lavel for="image" class="font-semibold mt-4">アイコンの設定</lavel>
                    <p class="image__error text-sm text-red-600 space-y-1">{{ $errors->first('image') }}</p>
                    <input type="file" name="image"class="w-auto py-2 border border-gray-300 rounded-md" id="image"> 
                        <div>
                            <img src="{{$profile->image_url}}"　alt="画像が読み込めません" style="width: 250px; height: 200px;"/>
                        </div>
                </div>
            </div>
            @endforeach
        <x-primary-button class="mt-4">
            更新
        </x-primary-button>
    </form>
</section>