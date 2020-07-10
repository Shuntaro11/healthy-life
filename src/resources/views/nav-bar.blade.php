@auth
    <div class="nav-bar">
        <a href="{{ route('top') }}"><i class="far fa-clipboard"></i><p>レシピ一覧</p></a>
        <a href="/posts/create"><i class="far fa-edit"></i><p>レシピ投稿</p></a>
        <a href="/likes"><i class="far fa-heart"></i><p>いいねしたレシピ</p></a>
        <a href="/users/{{Auth::user()->id}}"><i class="far fa-user"></i><p>マイページ</p></a>
    </div>
@endauth