@extends('template')
    <body>
        @include("header")

        <div class="show-user-name">{{ $user->name }}</div>
        <div class="image-wrapper show-user-image-wrapper">
            <img class="inside-image" src="{{ asset('/storage/img/'.$user->user_image) }}" onerror="this.src='/noicon.png'">
        </div>
        @auth
            @if($user->id === Auth::user()->id)
            <a href="/users/{{$user->id}}/edit">
                <div class="user-edit-link">プロフィール編集</div>
            </a>
            @endif
        @endauth

        <div class="user-post-index">
            @foreach($user_posts as $post)
                <a href="/posts/{{$post->id}}">
                    <div class="image-wrapper user-post-image-wrapper">
                        <img class="inside-image" src="{{ asset('/storage/img/'.$post->image) }}">
                    </div>
                </a>
            @endforeach
        </div>

        @include("nav-bar")
        @include("footer")
    </body>
</html>