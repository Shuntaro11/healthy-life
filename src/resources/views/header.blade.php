<div id="app">
    <div class="header-container">
        <div class="auth-nav">
            @auth
                <div class="welcome-message">Login : {{Auth::user()->name}}</div>
                <a class="nav-link" href="/">home</i></a>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <div class="welcome-message">Healthy Lifeへようこそ！</div>
                <a class="nav-link" href="/">home</i></a>
                <a class="nav-link" href="{{ route('login') }}">sign in</a>
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">sign up</a>
                @endif
            @endauth
        </div>
        <img class="header-logo" src="/healthylifelogo.png">
        <form action="{{ route('posts.search') }}" method="get" class="search-form">
            <input type="text" class="search-input" placeholder="レシピ検索" name="search">
            <button class="search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>