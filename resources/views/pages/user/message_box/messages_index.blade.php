@extends('layouts.app')

@section('content')
<h5 class="text-center">hogehoge送信メッセージ一覧</h5>

<ul class="nav nav-tabs" id="myTab" role="tablist">
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
        <table class="table table-borderless table-hover mt-4">
            <tbody>
                <tr>
                    <th scope="row">あががが</th>
                    <td>ささささ</td>
                    <td>2月13日</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="memberList" role="tabpanel" aria-labelledby="memberList-tab">...</div>
    <div class="tab-pane fade" id="sendMessage" role="tabpanel" aria-labelledby="sendMessage-tab">...</div>
</div>
@endsection

@section('script')

@endsection
