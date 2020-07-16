@extends('template')
    <body>
        @include("header")
        <div class="page-title">食事管理</div>
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
                    <button class="form-button" type="submit">登録</button>
                </div>
            </form>
        </div>
        <p class="container-title">栄養素の摂取量(直近１週間)</p>
        <div class="ate-table">
            <div class="ate-table-row first-row">
                <div class="ate-table-cell left-cell"></div>
                <div class="ate-table-cell">カロリー(kcal)</div>
                <div class="ate-table-cell">タンパク質(g)</div>
                <div class="ate-table-cell">脂質(g)</div>
                <div class="ate-table-cell">炭水化物(g)</div>
                <div class="ate-table-cell">ビタミンB1(mg)</div>
                <div class="ate-table-cell">ビタミンC(mg)</div>
                <div class="ate-table-cell">食塩(g)</div>
                <div class="ate-table-cell">食物繊維(g)</div>
                <div class="ate-table-cell">カルシウム(mg)</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">今日</div>
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
                <div class="ate-table-cell left-cell">昨日</div>
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
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">２日前</div>
                <div class="ate-table-cell">{{ $twoDaysAgoEnergy }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoProtein }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoFat }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoCarbon }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoVitaminc }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoSalt }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $twoDaysAgoCalcium }}</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">３日前</div>
                <div class="ate-table-cell">{{ $threeDaysAgoEnergy }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoProtein }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoFat }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoCarbon }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoVitaminc }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoSalt }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $threeDaysAgoCalcium }}</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">４日前</div>
                <div class="ate-table-cell">{{ $fourDaysAgoEnergy }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoProtein }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoFat }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoCarbon }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoVitaminc }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoSalt }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $fourDaysAgoCalcium }}</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">５日前</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoEnergy }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoProtein }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoFat }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoCarbon }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoVitaminc }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoSalt }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $fiveDaysAgoCalcium }}</div>
            </div>
            <div class="ate-table-row">
                <div class="ate-table-cell left-cell">６日前</div>
                <div class="ate-table-cell">{{ $sixDaysAgoEnergy }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoProtein }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoFat }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoCarbon }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoVitaminb1 }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoVitaminc }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoSalt }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoDietaryFiber }}</div>
                <div class="ate-table-cell">{{ $sixDaysAgoCalcium }}</div>
            </div>
        </div>
        <p class="container-title">最近食べたもの</p>
        <div class="ate-index-row ate-index-row-first">
            <div class="ate-table-cell ate-table-cell-left">カロリー(kcal)</div>
            <div class="ate-table-cell">タンパク質(g)</div>
            <div class="ate-table-cell">脂質(g)</div>
            <div class="ate-table-cell">炭水化物(g)</div>
            <div class="ate-table-cell">ビタミンB1(mg)</div>
            <div class="ate-table-cell">ビタミンC(mg)</div>
            <div class="ate-table-cell">食塩(g)</div>
            <div class="ate-table-cell">食物繊維(g)</div>
            <div class="ate-table-cell">カルシウム(mg)</div>
        </div>
        <div class="ate-index">
            @foreach($meals as $meal)
                <div class="ate-food-name-container">
                    <div class="ate-food-name">
                        ［{{ $meal->ate_at }}］
                        {{ $meal->food_ingredient->food_name }}
                        ［{{ $meal->quantity }}g］
                    </div>
                    <form method="post" action="/meals/{{$meal->id}}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field()}}
                        <button type="submit" class="delete-link">削除</button>
                    </form>

                </div>
                <div class="ate-index-row">
                    <div class="ate-table-cell ate-table-cell-left">{{ ($meal->food_ingredient->energy_kcal) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->protein) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->fat) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->carbon) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->vitamin_b1) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->vitamin_c) * ($meal->quantity / 100)}}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->salt) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->dietary_fiber) * ($meal->quantity / 100) }}</div>
                    <div class="ate-table-cell">{{ ($meal->food_ingredient->calcium) * ($meal->quantity / 100) }}</div>
                </div>
            @endforeach
        </div>
        @include("nav-bar")
        @include("footer")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>