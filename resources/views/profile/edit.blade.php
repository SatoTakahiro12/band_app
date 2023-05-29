<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール編集') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
         <x-primary-button class="mt-4 ml-4 mb-4">
            <a href = "/profile">プロフィール画面へ戻る</a>
        </x-primary-button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @php
                        $user_id = auth()->user()->profile->user_id ?? null; // ログインユーザーのプロフィールテーブルからuser_idを取得
                    @endphp
                    @if ($user_id === null)
                        @include('profile.partials.store-song-band-form') {{-- user_id が null の場合は store-song-band.blade.php を表示 --}}
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @else
                        @include('profile.partials.update-profile-song-band-form') {{-- user_id が null でない場合は update-pofile-song-band.blade.php を表示 --}}
                    @endif
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
