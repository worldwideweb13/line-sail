@extends('layouts.app')

@section('content')
{{-- バリデーションエラーの表示 --}}
@if($errors->any())
    <div class="row">
        <div class="alert alert-danger col-sm-10">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<h5 class="text-center">チャンネル新規登録</h5>
<form class="mt-4" action="{{ route('user.lineChannel.update', $lineChannel->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="channelName">チャネル名</label>
        <input type="text" class="form-control" name="line_channel_name" id="channelName" placeholder="チャンネル基本設定を参照" value="{{ $lineChannel->line_channel_name }}">
    </div>
    <div class="form-group">
        <label for="channelSecret">チャネルシークレット</label>
        <input type="text" class="form-control" name="line_channel_secret" id="channelSecret" placeholder="チャンネル基本設定を参照" value="{{ $lineChannel->line_channel_secret }}">
    </div>
    <div class="form-group">
        <label for="channelAccessToken">チャネルアクセストークン</label>
        <input type="text" class="form-control" name="line_access_token" id="channelAccessToken" placeholder="MessagingAPIを参照" value="{{ $lineChannel->line_access_token }}">
    </div>
    <div class="form-group">
        <div class="text-right">
            <button type="button" class="btn btn-outline-secondary" onclick="history.back(-1)">戻る</button>
            <button type="submit" class="btn btn-success">登録</button>
        </div>
    </div>
</form>
@endsection
