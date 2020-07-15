@extends('template')
    <body>
        @include("header")
        @isset($search_result)
            <div class="page-title">{{ $search_result }}</div>
        @endisset
        <div class="main-container">
            @foreach($posts as $post)
                <div class="each-post">
                    <a href="{{ route('posts.show', $post->id) }}">
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
                        <div class="post-tags">タグ：
                            @foreach($post->tags as $tag)
                                <a href="{{ route('top', ['name' => $tag->name]) }}">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <div class="under-bar">
                            <p class="post-date">{{ $post->created_at->format('Y/m/d H:i:s') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
        @if(isset($name))
            {{ $posts->appends(['name' => $name])->links() }}

        @elseif(isset($search_query))
            {{ $posts->appends(['search' => $search_query])->links() }}

        @else
            {{ $posts->links() }}
        @endif
        </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>