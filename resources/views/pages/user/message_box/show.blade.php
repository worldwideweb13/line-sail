@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        送信メッセージ
    </div>
    <div class="card-body">
        <div class="text-right">投稿日時 : {{ \Carbon\Carbon::parse($pushMessage->created_at)->format('Y.m.d h:m') }}</div>
        <h5 class="card-title">送信先</h5>
        <p class="card-text">{{ $pushMessage->message_text }}</p>
        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item {{ $pushMessage->prev() ? '' : 'disabled' }}">
                        @if(!empty($pushMessage->prev()))
                            <a href="{{ route('user.pushMessage.show', $pushMessage->prev()->id) }}" class="page-link">前へ</a>
                        @else
                            <span class="page-link">前へ</span>
                        @endif
                    </li>
                    <li class="page-item">
                        <a href="{{ route('user.pushMessage.index', $pushMessage->line_channel_id) }}" class="page-link">一覧に戻る</a>
                    </li>
                    <li class="page-item {{ $pushMessage->next() ? '' : 'disabled' }}">
                        @if(!empty($pushMessage->next()))
                            <a href="{{ route('user.pushMessage.show', $pushMessage->next()->id) }}" class="page-link">次へ</a>
                        @else
                            <span class="page-link">次へ</span>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
@endsection

@section('script')

@endsection
