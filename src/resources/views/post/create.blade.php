@extends('template')
    <body>
        @include("header")
            <div>
                <form action="/posts" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div>
                        <div><input type="file" name="image"></div>
                        <div><textarea name="content" cols="30" rows="10" placeholder="300字以内で入力"></textarea></div>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="submit">投稿</button>
                    </div>
                    @if($errors->first('post'))
                        <p>※{{$errors->first('post')}}</p>
                    @endif
                </form>
            </div>
        </div>
        @include("footer")
    </body>
</html>