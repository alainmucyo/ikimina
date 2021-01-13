<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function store(Request $request)
    {
        $request->validate(["amount"=>"required|numeric"]);
        $request['cooperative_id']=auth()->user()->cooperative->id;
         Payment::create($request->all());
        session()->flash('success',$request->amount." Rwf paid successfully ");
        return "ok";
    }



}
