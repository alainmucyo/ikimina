<?php

namespace App\Http\Controllers;

use App\Amount;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use App\members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',PresidentMiddleware::class,AdminMiddleware::class]);

    }

    public function index()
    {

        if (\App\Amount::where('year', Date('y'))->where('cooperative_id',auth()->user()->cooperative->id)->count() == 0) {
            \App\Amount::create([
                'cooperative_id'=>auth()->user()->cooperative->id,
                'year' => Date('y'),
                'amount' => 50000
            ]);
        }
        $members =auth()->user()->cooperative->members->where('status', 1);
        $i = 1;
        $amount =auth()->user()->cooperative->amount->where('year', Date('y'))->first();
        return view('members.index', compact('members', 'i', 'amount'));
    }

    public function create()
    {
        return view('members.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'cell' => 'required',
            'village' => 'required'
        ]);

        $request['gender'] = $request['gender'] == 1 ? 'Female' : 'Male';
        $request['cooperative_id']=auth()->user()->cooperative->id;
        members::create($request->all());
        session()->flash('success', 'Member ' . $request->name . ' created successfully!');
        return redirect()->back();
    }


    public function show(members $member)
    {

        $toggle = false;
        $contributions = $member->contributions->where("year", Date('y'));
        $i = 0;
        $amount=auth()->user()->cooperative->amount->where('year',Date('y'))->first();
        $months=['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];
        return view('members.show', compact('member', 'contributions', 'toggle', 'i','amount','months'));
    }


    public function edit(members $member)
    {
        return view('members.ajax_update', compact('member'));
    }


    public function update(Request $request, members $member)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'cell' => 'required',
            'village' => 'required'
        ]);

        $request['gender'] = $request['gender'] == 1 ? 'Female' : 'Male';
        $member->update($request->all());
        session()->flash('success', 'Member ' . $request->name . ' updated successfully!');
        return redirect("/members/" . $member->id);
    }


    public function destroy(members $member)
    {

        $member->update([
            'status' => 0
        ]);
        session()->flash('success', 'Member ' . $member->name . ' deleted successfully!');
        return redirect('/members');
    }
}
