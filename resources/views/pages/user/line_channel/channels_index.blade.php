@extends('layouts.app')

@section('style')
<link href="{{ asset('css/layouts/user/side-menu.css') }}" rel="stylesheet">
@endsection


@section('content')
@section('side-menu')
@include('parts.user.side-menu')
@endsection
<h5 class="text-center">登録チャンネル一覧</h5>
@endsection
