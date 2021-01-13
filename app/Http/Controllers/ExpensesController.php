<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{

    public function index()
    {
        $i = 1;
        $expenses =Auth::user()->cooperative->expenses;
        return view('expenses.index', compact('expenses', 'i'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'why' => 'required|max:250',
            'details' => 'required|min:10'
        ]);
        $request['cooperative_id']=\auth()->user()->cooperative->id;
        Expenses::create($request->all());
        session()->flash('success','Expense of amount of '.$request->amount.' created successfully!');
        return redirect()->back();
    }


    public function show(Expenses $expense)
    {
        return view('ajax.expenses', compact('expense'));
    }



}
