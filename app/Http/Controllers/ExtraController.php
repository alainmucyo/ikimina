<?php

namespace App\Http\Controllers;

use App\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtraController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(['amount' => 'required|numeric']);
        $request['cooperative_id'] = Auth::user()->cooperative->id;
        if (Extra::where("contribution_id", $request['contribution_id'])->count() > 0) {
            Extra::where("contribution_id", $request['contribution_id'])->first()->update(['amount' => $request['amount']]);
        } else {
            Extra::create($request->all());
        }
        session()->flash('success', 'Extra money of ' . $request['amount'] . ' created successfully');
        return back();
    }

    public function show(Extra $extra)
    {
        //
    }

    public function edit(Extra $extra)
    {
        //
    }

    public function update(Request $request, Extra $extra)
    {
        //
    }


    public function destroy(Extra $extra)
    {
        //
    }
}
