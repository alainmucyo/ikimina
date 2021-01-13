<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use App\Loans;
use App\members;
use App\Rules\PdfValidator;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class LoansController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', PresidentMiddleware::class, AdminMiddleware::class]);
    }

    public function index()
    {
        $i = 1;

        $status = \request()->status;
        if ($status == 'unpayed')
            $nu_status = 0;
        else
            $nu_status = 1;
        $loans = auth()->user()->cooperative->loans->where('status', $nu_status);
        return view('loans.index', compact('loans', 'i', 'nu_status'));
    }


    public function create()
    {
        $loan = Loans::find(\request()->id);
        $member = $loan->members;
        $amount = \request()->amount;
        $total = $loan->amount - $amount;
        if ($total <= 0) {
            $total = "Inguzanyo Yishyuwe Neza";
        } else
            $total = $total . " Rwf";
        $pdf = PDF::loadView('invoice.loan', compact('member', 'amount', 'total'));
        return $pdf->download($member->name . ' Loan invoice.pdf');
        // return view('invoice.loan',compact('member','amount','total'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required | numeric',
            'will_be_payed' => 'required',
            'attach' => ['required', new PdfValidator]
        ]);

        if (members::find($request->members_id)->loan) {
            return redirect()->back()->withErrors("This member already has loan");
        }


        Loans::create([
            'members_id' => $request->members_id,
            'amount' => $request->amount,
            'attach' => $request->attach->store('/public/attaches'),
            'will_be_payed' => $request->will_be_payed,
            'cooperative_id'=>auth()->user()->cooperative->id
        ]);
        session()->flash('success', 'Loan of ' . $request->amount . ' Rwf created successfully!');
        return "ok";
        //  return redirect('/loan');

    }

    public function show(Loans $loan)
    {
        if ($loan->status == 1) {
            return redirect('/loan?status=payed');
        }

        $payments = $loan->payments->sortByDesc("created_at");
        return view('loans.show', compact('loan', 'payments'));
    }

    public function edit($member)
    {
        $member = members::find($member);
        if ($member->loan) {
            $i = 1;
            $loans = Loans::where('status', 0)->get();
            return redirect("/loan");
            // return view('loans.index', compact('loans', 'i'));
        } else {
            return view('loans.create', compact('member'));
        }
    }


    public function update(Request $request, Loans $loan)
    {

        $loan->update($request->all());
        session()->flash('success', 'Update done created successfully!');
        return redirect('/loan?status=payed');
    }


    public function give()
    {

        $member = members::find(\request()->id);
        $amount = \request()->amount;
        $will_be_payed = \request()->will_be_payed;
        $pdf = PDF::loadView('invoice.give', compact('member', 'amount', 'will_be_payed'));
        return $pdf->download($member->name . ' Loan given.pdf');
        // return view('invoice.loan',compact('member','amount','total'));
    }
}
