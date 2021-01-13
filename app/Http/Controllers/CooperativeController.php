<?php

namespace App\Http\Controllers;

use App\Cooperative;
use App\Http\Middleware\AccountantMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',AccountantMiddleware::class,PresidentMiddleware::class]);
    }

    public function store(Request $request)
    {
        Cooperative::create($request->all());
        return redirect()->back();
    }

    public function edit(Cooperative $cooperative){
      $status=$cooperative->active? 0:1;
        $cooperative->update(['active'=>$status]);
        return back();
    }

}
