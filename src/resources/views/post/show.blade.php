@extends('template')
    <body>
        @include("header")
        <div class="page-title">レシピ</div>
  
        <div class="post-form-container post-show-container">
            @auth
                <div class="post-edit-link">
                    @if($post->user_id === Auth::user()->id)
                        <a href="/posts/{{$post->id}}/edit">
                            <div class="delete-link">このレシピを編集する</div>
                        </a>
                        <form method="post" action="/posts/{{$post->id}}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field()}}
                            <button type="submit" class="delete-link">このレシピを削除する</button>
                        </form>
                    @endif
                </div>
            @endauth
            <div class="recipe-top-bar">

                <div class="user-info">
                    <a href="/users/{{$post->user->id}}"><div class="image-wrapper user-image-wrapper">
                        <img class="inside-image" src="{{ asset('/storage/img/'.$post->user->user_image) }}" onerror="this.src='/noicon.png'">
                    </div></a>
                    <a href="/users/{{$post->user->id}}"><div class="user-name">{{ $post->user->name }}</div></a>
                </div>

                @auth
                    <like
                        :post-id="{{ json_encode($post->id) }}"
                        :user-id="{{ json_encode(Auth::user()->id) }}"
                        :default-Liked="{{ json_encode($defaultLiked) }}"
                        :default-Count="{{ json_encode($defaultCount) }}"
                    ></like>
                @else
                    <div class="like-box">
                        <p class="like-btn-wrapper"><i class="fas fa-heart like-button un-like-button"></i></p>
                        <p class="like-count">{{ $post->likes->count() }} 件</p>
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
                </div>
            @endauth
            <div class="comment-index">
                <div class="comment-index-title">コメント一覧</div>
                @foreach($post->comments as $comment)
                    <p class="comment-user-name">{{ $comment->user->name }}</p>
                    <div class="comment-content">{{ $comment->comment }}</div>
                    @if($comment->user_id === Auth::user()->id)
                        <form method="post" action="/comments/{{$comment->id}}">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field()}}
                            <button type="submit" class="delete-link">コメントを削除する</button>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>
        
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>