@extends('template')
    <body>
        @include("header")
        <div class="container">
            <div>ログイン</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div>
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                </div>

                <button type="submit">ログイン</button>

            </form>
        </div>
    </body>
</html>