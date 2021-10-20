@extends('layouts.app')

@section('content')
<h5 class="text-center">チャンネル新規登録</h5>
<form class="mt-4" action="{{ route('user.lineChannel.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="channelName">チャネル名</label>
        <input type="text" class="form-control" id="channelName" placeholder="チャンネル基本設定を参照" value="{{ $lineChannel->line_channel_name }}">
    </div>
    <div class="form-group">
        <label for="channelSecret">チャネルシークレット</label>
        <input type="text" class="form-control" id="channelSecret" placeholder="チャンネル基本設定を参照" value="{{ $lineChannel->line_channel_secret }}">
    </div>
    <div class="form-group">
        <label for="channelAccessToken">チャネルアクセストークン</label>
        <input type="text" class="form-control" id="channelAccessToken" placeholder="MessagingAPIを参照" value="{{ $lineChannel->line_access_token }}">
    </div>
    <div class="form-group">
        <div class="text-right">
            <button type="button" class="btn btn-outline-secondary" onclick="history.back(-1)">戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
        </div>
    </div>
</form>
@endsection