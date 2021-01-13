<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',PresidentMiddleware::class,AdminMiddleware::class]);
    }

    public function index()
    {
        $i = 1;
        $incomes = auth()->user()->cooperative->income;
        return view('income.index', compact('incomes', 'i'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'why' => 'required|max:250',
            'details' => 'required|min:10'
        ]);
        $request['cooperative_id']=auth()->user()->cooperative->id;
        Income::create($request->all());
        session()->flash('success','Income of amount of '.$request->income.' created successfully!');
        return redirect()->back();
    }


    public function show(Income $income)
    {
        return view('ajax.income', compact('income'));
    }


}
