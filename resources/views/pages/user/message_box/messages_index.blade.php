@extends('layouts.app')

@section('content')
<h5 class="text-center">hogehoge送信メッセージ一覧</h5>

<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="messageList-tab" data-toggle="tab" href="#messageList" role="tab" aria-controls="messageList" aria-selected="true">送信メッセージ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="memberList-tab" data-toggle="tab" href="#memberList" role="tab" aria-controls="memberList" aria-selected="true">チェンネルメンバー</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="sendMessage-tab" data-toggle="tab" href="#sendMessage" role="tab" aria-controls="sendMessage" aria-selected="false">新規メッセージ作成</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="messageList" role="tabpanel" aria-labelledby="messageList-tab">
        <div class="row mt-3">
            <div class="col-12">
                <div class="list-group list-group-flush" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action bg-light" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                        <div class="d-flex justify-content-between">
                            <p class="mb-1">テキストメッセージ見出し</p>
                            <small>3 days ago</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="memberList" role="tabpanel" aria-labelledby="memberList-tab">
        <div class="row mt-3">
            <div class="col-12">
                <div class="list-group list-group-flush" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action bg-light" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                        <div class="d-flex justify-content-between">
                            <p class="mb-1">ogasawara@13</p>
                            <small>3 days ago</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="sendMessage" role="tabpanel" aria-labelledby="sendMessage-tab">
        <div class="form-group row mt-3">
            <label for="textArea" class="col-sm-2 col-form-label">メッセージ本文</label>
            <div class="col-sm-8">
                <textarea type="email" class="form-control" id="textArea" rows="3"></textarea>
            </div>
            <div class="col-10 text-right mt-3">
                <button type="submit" class="btn btn-success btn-submit" data-toggle="modal" data-target="#submitModal" data-action-url="">投稿する</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="submitModalLabel">送信しますか?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        チャンネルメンバーにメッセージが送信されます。送信されたメッセージは取り消しができませんのでご注意下さい。
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">キャンセル</button>
                        <form id="submit-form" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">送信</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="module">
    $('.btn-submit').click(function (e) {
        console.log('ok');
        $('#submit-form').attr('action', $(this).data('action-url'));
    });
</script>
@endsection
