@extends('layouts.app')

@section('style')
<link href="{{ asset('css/layouts/user/side-menu.css') }}" rel="stylesheet">
@endsection

@section('content')
@section('side-menu')
@include('parts.user.side-menu')
@endsection
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        このページはユーザーTOP画面です。
    </div>
</div>
@endsection
