@extends('template')
    <body>
        @include("header")
        @auth
            <like
                :post-id="{{ json_encode($post->id) }}"
                :user-id="{{ json_encode(Auth::user()->id) }}"
                :default-Liked="{{ json_encode($defaultLiked) }}"
                :default-Count="{{ json_encode($defaultCount) }}"
            ></like>
        @endauth
        <div class="each-post">
            <div class="image-wrapper post-image-wrapper">
                <img class="inside-image" src="{{ asset('/storage/img/'.$post->image) }}">
            </div>
            <div class="right-box">
                <div class="top-bar">
                    <div class="user-info">
                        <div class="image-wrapper user-image-wrapper">
                            <img class="inside-image" src="{{ asset('/storage/img/'.$post->user->user_image) }}" onerror="this.src='/noicon.png'">
                        </div>
                    <div class="user-name">{{ $post->user->name }}</div>
                    </div>
                    <a href="/users/{{$post->user->id}}" class="user-link"><i class="fas fa-user"></i></a>
                </div>
                <div class="post-content">{!! $post->content !!}</div>
                
            </div>
        </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>