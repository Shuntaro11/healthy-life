@extends('template')
    <body>
        @include("header")
            <div class="page-title">プロフィール編集</div>
            <div class="post-form-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/users" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div>
                        <p class="form-label">ユーザーネーム</p>
                        <div><input type="text" name="name" value="{{ $auth->name }}" class="post-input"></div>
                        <p class="form-label">アイコン画像</p>
                        <div><input type="file" name="user_image" id="userEditImage" accept="image/*"></div>
                                <div class="preview-wrapper user-image-preview">
                                    変更後のイメージを選択してください
                                    <br>
                                    円形にリサイズされます
                                <img class="inside-image" id="userEditImagePreview"></div>
                        <button type="submit" class="form-button">更新</button>
                    </div>
                </form>
            </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{ asset('/js/image.js') }}"></script>
    </body>
</html>