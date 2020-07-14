@extends('template')
    <body>
        @include("header")
        <div class="page-title">食べたもの管理</div>
        <div class="post-form-container">
            <form action="/meals" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div>
                    <p class="form-title">食べたものを登録する</p>
                    <p class="form-label">日付</p>
                    <div><input type="date" name="ate_at" value={{$today}} class="post-input input-date"></div>
                    <p class="form-label">食材</p>
                    <food-name-search></food-name-search>
                    <p class="form-label">量(g)</p>
                    <div><input type="number" name="quantity" class="post-input input-quantity"></div>
                    <button type="submit">登録</button>
                </div>
            </form>
        </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>