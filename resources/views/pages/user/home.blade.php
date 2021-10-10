@extends('layouts.app')

@section('style')
<link href="{{ asset('css/layouts/user/side-menu.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-3">
            <ul id="accordion_menu">
                <li>
                    <a data-toggle="collapse" href="#menu01" aria-controls="#menu01" aria-expanded="false">リンクメニュー１</a>
                </li>
                <ul id="menu01" class="collapse" data-parent="#accordion_menu">
                    <li><a href="#">リンクサブメニュー1-1</a></li>
                    <li><a href="#">リンクサブメニュー1-2</a></li>
                    <li><a href="#">リンクサブメニュー1-3</a></li>
                </ul>
                <li>
                    <a data-toggle="collapse" href="#menu02" aria-controls="#menu02" aria-expanded="false">リンクメニュー２</a>
                </li>
                <ul id="menu02" class="collapse" data-parent="#accordion_menu">
                    <li><a href="#">リンクサブメニュー2-1</a></li>
                    <li><a href="#">リンクサブメニュー2-2</a></li>
                    <li><a href="#">リンクサブメニュー2-3</a></li>
                </ul>
                <li>
                    <a data-toggle="collapse" href="#menu03" aria-controls="#menu03" aria-expanded="false">リンクメニュー３</a>
                </li>
                <ul id="menu03" class="collapse" data-parent="#accordion_menu">
                    <li><a href="#">リンクサブメニュー3-1</a></li>
                    <li><a href="#">リンクサブメニュー3-2</a></li>
                    <li><a href="#">リンクサブメニュー3-3</a></li>
                </ul>
            </ul>
        </div>
        <div class="col-md-9">
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
        </div>
    </div>
</div>
@endsection
