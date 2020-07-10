@extends('template')
  <body>
        @include("header")
        <div class="top-title-text">いいねしたレシピ一覧</div>
        <div class="user-post-index">
            @foreach($posts as $post)
                <a href="/">
                    <div class="image-wrapper user-post-image-wrapper">
                        <img class="inside-image" src="{{ asset('/storage/img/'.$post[0]->image) }}">
                        <div class="hover-wrap">
                            <div class="hover-post-title">{{$post[0]->title}}</div>
                            <div>
                                @foreach($post[0]->tags as $tag)
                                    <p class="hover-tag">#{{$tag->name}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        @include("nav-bar")
        @include("footer")
        </div>
  </body>
</html>