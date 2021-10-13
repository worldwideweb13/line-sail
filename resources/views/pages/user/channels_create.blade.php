@extends('layouts.app')

@section('style')
<link href="{{ asset('css/layouts/user/side-menu.css') }}" rel="stylesheet">
@endsection


@section('content')
@section('side-menu')
@include('parts.user.side-menu')
@endsection
<div class="col-md-9">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            このページはチャンネル登録画面です
        </div>
    </div>
</div>
@endsection
