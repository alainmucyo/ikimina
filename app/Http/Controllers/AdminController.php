<?php

namespace App\Http\Controllers;

use App\Cooperative;
use App\Http\Middleware\AccountantMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
         $this->middleware(['auth',AccountantMiddleware::class,PresidentMiddleware::class]);
    }

    public function index()
    {

        //$presidents = User::where('type', 1)->get();
        $cooperatives = Cooperative::all();
        $i = 1;
        return view('admin.index', compact('cooperatives', 'i'));
    }

    public function storePresident(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6'
        ]);
        $request['type'] = 1;
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        session()->flash('success', 'President ' . $request->name . ' created successfully!');
        return redirect()->back();
    }

    public function accountant()
    {
        $accountants = User::where("type", 2)->get();
        $i = 1;
        $cooperatives = Cooperative::all();
        return view('admin.accountant', compact('accountants', 'i','cooperatives'));
    }

    public function storeAccountant(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6'
        ]);
        unset($request['type']);
        $request['type'] = 2;
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        session()->flash('success', 'Accountant ' . $request->name . ' created successfully!');
        return redirect()->back();
    }

    public function delete(User $user)
    {
        $user->delete();
        session()->flash('success', $user->name . ' deleted successfully!');
        return redirect()->back();
    }

    public function admin()
    {
        $admins = User::where("type", 3)->get();
        $i = 1;
        return view('admin.admin', compact('admins', 'i'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6'
        ]);
        unset($request['type']);
        $request['type'] = 3;
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        session()->flash('success', 'Admin ' . $request->name . ' created successfully!');
        return redirect()->back();
    }

    public function president()
    {
        $presidents = User::where('type', 1)->get();
        $cooperatives = Cooperative::all();
        $i = 1;
        return view('admin.president', compact('presidents', 'cooperatives', 'i'));
    }

}
