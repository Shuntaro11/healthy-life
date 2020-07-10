@extends('template')
    <body>
        @include("header")
        <div>プロフィール編集</div>
        <form action="/users" method="post" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label>ユーザーネーム</label>
                <div><input type="text" name="name" value="{{ $auth->name }}"></div>
                <label>アイコン画像</label>
                <div><input type="file" name="user_image"></div>
                <button type="submit">更新</button>
            </div>
        </form>
        </div>
    </body>
</html>