<?php

namespace App\Http\Controllers\Auth;

use App\Amount;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/';


    public function __construct()
    {
        if (Amount::where('year',Date('y'))->count()==0){

        }
        $this->middleware('guest')->except('logout');
    }
}
