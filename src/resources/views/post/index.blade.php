@extends('template')
    <body>
        @include("header")

        @foreach($posts as $post)
            <div class="each-post">
                <a href="/posts/{{$post->id}}">
                    <div class="image-wrapper post-image-wrapper">
                        <img class="inside-image" src="{{ asset('/storage/img/'.$post->image) }}">
                    </div>
                </a>
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
                    <div class="post-title">{{ $post->title }}</div>
                    <div class="post-content">{!! nl2br(e($post->content)) !!}</div>
                    <div class="post-tags">
                        @foreach($post->tags as $tag)
                            <a href="/">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <div class="under-bar">
                        <div class="like-bar">
                            <a href="/" ><i class="far fa-heart like-button"></i></a>
                            <p class="post-date">{{ $post->created_at->format('Y/m/d H:i:s') }}</p>
                        </div>
                        <div>
                            @auth
                                <form class="comment-form" action="">
                                    <input type="text" class="comment-input" placeholder="コメントを追加">
                                    <button class="comment-btn">投稿する</button>
                                </form>
                            @else
                                <div class="comment-form">
                                    <p class="comment-input comment-input-guest">ログインするといいねやコメントができます</p>
                                    <button class="comment-btn">・・・</button>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>
        @include("nav-bar")
        @include("footer")
    </body>
</html>