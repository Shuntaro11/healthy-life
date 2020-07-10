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
        <div class="top-title">Healthy Life</div>
    </div>