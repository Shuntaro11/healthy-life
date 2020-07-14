@extends('template')
    <body>
        @include("header")
        <div class="page-title">食事管理</div>
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
        <div class="ate-table">
            <div class="ate-table-row first-row">
                <div class="ate-table-cell left-cell"></div>
                <div class="ate-table-cell">カロリー</div>
                <div class="ate-table-cell">タンパク質</div>
                <div class="ate-table-cell">脂質</div>
                <div class="ate-table-cell">炭水化物</div>
                <div class="ate-table-cell">ビタミンB1</div>
                <div class="ate-table-cell">ビタミンC</div>
                <div class="ate-table-cell">食塩</div>
                <div class="ate-table-cell">食物繊維</div>
                <div class="ate-table-cell">カルシウム</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">今日摂取した栄養素</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">今日摂取した栄養素</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">１日の平均摂取量(過去２週間)</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
                <div class="ate-table-cell">200</div>
            </div>
        </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>