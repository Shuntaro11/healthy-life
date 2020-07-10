@extends('template')
  <body>
        @include("header")
        <div class="top-title-text">いいねしたレシピ一覧</div>
        <div class="user-post-index">
            @foreach($posts as $post)
                <a href="/">
                    <div class="image-wrapper user-post-image-wrapper">
                        <img class="inside-image" src="{{ asset('/storage/img/'.$post[0]->image) }}">
                    </div>
                </a>
            @endforeach
        </div>

        @include("nav-bar")
        @include("footer")
        </div>
  </body>
</html>