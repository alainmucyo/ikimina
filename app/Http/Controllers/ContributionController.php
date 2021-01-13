<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use App\members;

use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContributionController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth', PresidentMiddleware::class, AdminMiddleware::class]);
    }

    public function index()
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        $i = 1;
       $this_month=Date('m');
        $amount = auth()->user()->cooperative->amount->where('year', Date('y'))->first()->amount;
        $contributions = DB::table('contributions')
            ->where("cooperative_id", auth()->user()->cooperative->id)
            ->where("month","<",$this_month)
            ->whereRaw("amount < $amount*shares")->get();

        return view('contribution.index', compact('months', 'i', 'contributions', 'amount'));
    }

    public function store(Request $request)
    {
        $member = members::find($request->members_id);

        if ($member->contributions->where('year', Date('y'))->count() > 0) {

            $contribution = Contribution::where('members_id', $request['members_id'])
                ->where('year', Date('y'))
                ->where('month', $request->month)
                ->first();
            $amount = $contribution->amount + $request->amount;
            $contribution->update(['amount' => $amount, 'shares' => $request['shares']]);

        } else {
            for ($i = 1; $i <= 12; $i++) {
                Contribution::create(['members_id' => $request['members_id'], 'month' => $i,
                    'year' => Date('y'), 'cooperative_id' => auth()->user()->cooperative->id]);
            }
            $contribution = Contribution::where('members_id', $request['members_id'])
                ->where('year', Date('y'))
                ->where('month', $request->month)
                ->first();
            $contribution->update(['amount' => $request->amount]);

        }
        session()->flash("success", 'Contribution of ' . $request->amount . " Rwf created successfully!");
        return "ok";

    }


    public function show(Contribution $contribution)
    {

        $member = members::find(\request()->id);
        $amount = \request()->amount;
        $total = $amount + $member->contributions->where("year", Date('y'))->sum('amount');
        $month = \request()->month;
        $pdf = PDF::loadView('invoice.contribution', compact('member', 'amount', 'total', 'month'));
        return $pdf->download($member->name . ' contribution invoice.pdf');

    }

    public function edit($contribution){

        if (Contribution::find($contribution)->extra){
             $old=Contribution::find($contribution)->extra->amount;
        }
        else{
            $old=0;
        }

        return view('ajax.extra',compact('contribution','old'));
    }

}
