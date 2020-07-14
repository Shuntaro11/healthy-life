@extends('template')
    <body>
        @include("header")
            <div class="post-form-container">
                <form action="/posts" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div>
                        <p class="form-title">レシピ投稿</p>
                        <p class="form-label">レシピタイトル</p>
                        <p class="post-form-notice">料理名を30文字以内で入力してください</p>
                        <div class="post-title-wrapper"><input type="text" name="title" placeholder="料理名" class="post-input" size="30"></div>
                        <p class="form-label">料理の写真</p>
                        <div><input type="file" name="image"></div>
                        <p class="form-label">作り方</p>
                        <p class="post-form-notice">料理概要を2000文字以内で自由に入力してください</p>
                        <div class="post-info-wrapper">
<textarea class="post-info-input" name="content" cols="100" rows="20" placeholder="300字以内で入力">
[説明]

[材料]
・
・
・
・
[作り方]
１ 
２ 
３ 
４ 
５ 
[タグ]

</textarea></div>
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
        @include("nav-bar")
        @include("footer")
        </div>
    </body>
</html>