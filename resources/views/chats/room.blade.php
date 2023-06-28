<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('語ろう！') }}
        </h2>
</x-slot>

<head>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div class="max-w-7xl mx-auto px-6">
        <div class="chat-area">
            <div class="card">
                <div class="card-body chat-card p-4 text-lg font-semibold">
                    <div id="chat-data"></div>
                </div>
            </div>
        </div>
    <form method="POST" action="{{route('store_messages',['profile_user'=>$profile_user])}}">
        @csrf
        <div class="comment-container row justify-content-center">
            <div class="input-group comment-area">
                <textarea class="form-control" id="chat_message" type="text" name="chat" placeholder="メッセージを入力…" aria-label="With textarea"></textarea>
                <x-primary-button type="submit" class="btn btn-outline-primary comment-btn">送信</x-primary-button>
            </div>
        </div>
    </form>

    <script>
        /*global $*/
        $(function() {
            get_messages();
        });
        
        function get_messages() {
            $.ajax({
                url: "/result/ajax",
                dataType: "json",
                success: data => {
                    $("#chat-data")
                        .find(".chat-visible")
                        .remove();
                
                    for (var i = 0; i < data.chats.length; i++) {
                        var html = `
                                    <div class="media chat-visible">
                                        <div class="media-body chat-body">
                                            <div class="row">
                                                <span class="chat-body-user" id="name">${data.chats[i].name}</span>
                                                <span class="chat-body-time" id="created_at">${data.chats[i].created_at}</span>
                                            </div>
                                            <span class="chat-body-content" id="chat">${data.chats[i].chat}</span>
                                        </div>
                                    </div>
                                `;
                
                        $("#chat-data").append(html);
                    }
                },
            });
        
            setTimeout("get_messages()", 5000);
        }
    </script>
</x-app-layout>