@auth
    <div class="nav-bar">
        <a href="{{ route('top') }}"><i class="far fa-clipboard"></i><p>新着レシピ</p></a>
        <a href="/posts/create"><i class="far fa-edit"></i><p>レシピを投稿する</p></a>
        <a href="/likes"><i class="far fa-heart"></i><p>お気に入りレシピ</p></a>
        <a href="/users/{{Auth::user()->id}}"><i class="fas fa-user-circle"></i><p>マイページ</p></a>
        <a href="/meals/create"><i class="fas fa-chart-bar"></i><p>食べたもの管理</p></a>
    </div>
@endauth