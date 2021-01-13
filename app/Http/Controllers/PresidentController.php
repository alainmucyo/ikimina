<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresidentController extends Controller
{
    public function late()
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        $i = 1;
        $this_month = Date('m');
        $amount = auth()->user()->cooperative->amount->where('year', Date('y'))->first()->amount;
        $contributions = DB::table('contributions')
            ->where("cooperative_id", auth()->user()->cooperative->id)
            ->where("month", "<", $this_month)
            ->whereRaw("amount < $amount*shares")->get();

        return view('president.late', compact('months', 'i', 'contributions', 'amount'));

    }
}
