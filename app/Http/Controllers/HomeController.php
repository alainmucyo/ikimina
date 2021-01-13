<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AccountantMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth',AccountantMiddleware::class,AdminMiddleware::class]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $members=Auth::user()->cooperative->members;
        $i=1;
        return view('home',compact('members','i'));

    }
}
