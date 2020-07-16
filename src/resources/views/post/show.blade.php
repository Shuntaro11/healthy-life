@extends('template')
    <body>
        @include("header")
        <div class="page-title">レシピ</div>
        
        <div class="post-form-container post-show-container">
            <div class="recipe-top-bar">

                <div class="user-info">
                    <a href="/users/{{$post->user->id}}"><div class="image-wrapper user-image-wrapper">
                        <img class="inside-image" src="{{ asset('/storage/img/'.$post->user->user_image) }}" onerror="this.src='/noicon.png'">
                    </div></a>
                    <a href="/users/{{$post->user->id}}"><div class="user-name">{{ $post->user->name }}</div></a>
                </div>

                @auth
                    <div class="like-box">
                        <like
                            :post-id="{{ json_encode($post->id) }}"
                            :user-id="{{ json_encode(Auth::user()->id) }}"
                            :default-Liked="{{ json_encode($defaultLiked) }}"
                            :default-Count="{{ json_encode($defaultCount) }}"
                        ></like>
                    </div>
                @endauth
            </div>
            
            <div class="recipe-show-title">{{ $post->title }}</div>

            <div class="image-wrapper post-show-image-wrapper">
                <img class="inside-image" src="{{ asset('/storage/img/'.$post->image) }}">
            </div>

            <div class="recipe-show-content">{!! nl2br(e($post->content)) !!}</div>

            <div class="post-tags post-tags-show-page">タグ：
                @foreach($post->tags as $tag)
                    <a href="{{ route('top', ['name' => $tag->name]) }}">#{{ $tag->name }}</a>
                @endforeach
            </div>

            <p class="recipe-date">公開日：{{ $post->created_at->format('Y/m/d H:i:s') }}</p>

        </div>

        <div class="comment-container">
            @auth
                <form action="/comments" method="post" enctype="multipart/form-data" class="comment-form">
                {{ csrf_field() }}
                    <div><textarea name="comment" class="comment-input" rows="2" placeholder="コメントを追加"></textarea></div>
                    <input name="post_id" type="hidden" value="{{$post->id}}">
                    <button type="submit" class="comment-btn">投稿する</button>
                </form>
            @else
                <div class="comment-form">
                    <div><p class="comment-input comment-input-guest">ログイン後コメントができます</p></div>
                    <button class="comment-btn">・・・</button>
                </div>
            @endauth
            <div class="comment-index">
                <div class="comment-index-title">コメント一覧</div>
                @foreach($post->comments as $comment)
                    <div class="comment-user-name">{{ $comment->user->name }}</div>
                    <div class="comment-content">{{ $comment->comment }}</div>
                @endforeach
            </div>
        </div>
        
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>