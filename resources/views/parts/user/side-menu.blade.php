<div class="col-md-3">
    <ul id="accordion_menu">
        <li>
            <a data-toggle="collapse" href="#menu01" aria-controls="#menu01" aria-expanded="false">Lineチャンネル</a>
        </li>
        <ul id="menu01" class="collapse" data-parent="#accordion_menu">
            <li><a href="{{ route('user.LineChannelController.index') }}">チャンネル一覧</a></li>
            <li><a href="{{ route('user.LineChannelController.create') }}">チャンネル登録</a></li>
        </ul>
        <li>
            <a data-toggle="collapse" href="#menu02" aria-controls="#menu02" aria-expanded="false">ユーザー情報</a>
        </li>
        <ul id="menu02" class="collapse" data-parent="#accordion_menu">
            <li><a href="#">プロフィール情報</a></li>
            <li><a href="#">パスワード変更</a></li>
        </ul>
    </ul>
</div>
