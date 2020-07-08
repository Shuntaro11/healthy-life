@auth
    <div class="nav-bar">
        <a href="/"><i class="fas fa-home"></i></a>
        <a href="/posts/create"><i class="far fa-plus-square"></i></a>
        <a href="/"><i class="far fa-heart"></i></a>
        <a href="/users/{{Auth::user()->id}}"><i class="far fa-user"></i></a>
    </div>
@endauth