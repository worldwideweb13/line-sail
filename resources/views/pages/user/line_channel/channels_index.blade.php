@extends('layouts.app')

@section('style')
<link href="{{ asset('css/layouts/user/side-menu.css') }}" rel="stylesheet">
@endsection


@section('content')
@section('side-menu')
@include('parts.user.side-menu')
@endsection
<h5 class="text-center">登録チャンネル一覧</h5>
<div class=" mt-3 list-group list-group-flush">
    <table class="table table-borderless table-hover">
        <thead>
            <tr style="border-bottom: 1.4px solid; border-color: #ced1d3;">
                <th scope="col" class="font-weight-normal">No</th>
                <th scope="col" class="font-weight-normal">チャンネル名</th>
                <th scope="col" class="font-weight-normal">作成日</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $lineChannels as $lineChannel )
                <tr>
                    <th scope="row">{{ $lineChannel->id }}</th>
                    <td>{{ $lineChannel->line_channel_name }}</td>
                    <td>{{ $lineChannel->created_at->format('Y.m.d') }}</td>
                    <td>
                        <a class="btn btn btn-outline-success" href="{{ route('user.lineChannel.edit', $lineChannel->id) }}">編集</a>
                        <button type="button" class="btn btn-outline-danger">削除</button>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>
    <div class="mt-3 d-flex justify-content-center">
        {{ $lineChannels->links() }}
    </div>
</div>

@endsection
