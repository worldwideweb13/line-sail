<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (auth()->user()->role ?? '') {
            case 'admin':
                return view('pages.admin.home');
            case 'super_admin':
                return view('pages.admin.home');
            case 'user':
                return view('pages.user.home');
            default:
                abort(403);
        }
    }
}