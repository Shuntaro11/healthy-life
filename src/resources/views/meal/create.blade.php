@extends('template')
    <body>
        @include("header")
        <form action="/posts" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div>
                        <input name="date" type="date" value={{$today}}>
                        <button type="submit">投稿</button>
                    </div>
                    @if($errors->first('post'))
                        <p>※{{$errors->first('post')}}</p>
                    @endif
                </form>
        @include("nav-bar")
        @include("footer")
        </div>
    </body>
</html>