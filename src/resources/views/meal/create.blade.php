@extends('template')
    <body>
        @include("header")
        <div class="page-title">食事管理</div>
        <div class="post-form-container">
            <form action="/meals" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div>
                    <p class="container-title">食べたものを登録する</p>
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
        <p class="container-title">栄養素の摂取量</p>
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
                <div class="ate-table-cell left-cell">今日 ({{ $today }})</div>
                <div class="ate-table-cell">{{ $todaysEnergy }}</div>
                <div class="ate-table-cell">{{ $todaysProtein }}</div>
                <div class="ate-table-cell">{{ $todaysFat }}</div>
                <div class="ate-table-cell">{{ $todaysCarbon }}</div>
                <div class="ate-table-cell">{{ $todaysVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $todaysVitaminc }}</div>
                <div class="ate-table-cell">{{ $todaysSalt }}</div>
                <div class="ate-table-cell">{{ $todaysDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $todaysCalcium }}</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">昨日 ({{ $yesterday }})</div>
                <div class="ate-table-cell">{{ $yesterdaysEnergy }}</div>
                <div class="ate-table-cell">{{ $yesterdaysProtein }}</div>
                <div class="ate-table-cell">{{ $yesterdaysFat }}</div>
                <div class="ate-table-cell">{{ $yesterdaysCarbon }}</div>
                <div class="ate-table-cell">{{ $yesterdaysVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $yesterdaysVitaminc }}</div>
                <div class="ate-table-cell">{{ $yesterdaysSalt }}</div>
                <div class="ate-table-cell">{{ $yesterdaysDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $yesterdaysCalcium }}</div>
            </div>
        </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>