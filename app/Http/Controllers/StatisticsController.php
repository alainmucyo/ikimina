<?php

namespace App\Http\Controllers;

use App\Charts\BarChart;
use App\Charts\MainChart;
use App\Contribution;
use App\Expenses;
use App\Http\Middleware\AccountantMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PresidentMiddleware;
use App\Income;
use App\Loans;
use App\members;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', AdminMiddleware::class]);
    }

    public function test()
    {
        $this->middleware(AccountantMiddleware::class);
        $chart_contrib = new MainChart('contributions', 'Contributions');

        $data1 = auth()->user()->cooperative->members->where('gender', 'Male')->count();
        $data2 = auth()->user()->cooperative->members->where('gender', 'Female')->count();
        $gender = new BarChart($data1, $data2, "Male", "Female", 'Gender');

        $chart_loan = new MainChart('loans', 'Loans');
        $chart_income = new MainChart('incomes', 'Income');
        $chart_expense = new MainChart('expenses', 'Expenses');
        $chart_profit = new BarChart(auth()->user()->cooperative->expenses->sum('amount'),
            auth()->user()->cooperative->income->sum('amount'), "Expenses", "Income", "Expenses/Income");
        $loan_payment = new MainChart("payments", 'Loan Payments');
        $loan_status = new BarChart(auth()->user()->cooperative->loans->where("status", 1)->count(),
            auth()->user()->cooperative->loans->where('status', 0)->count(),
            'Payed Loans', 'Not Yet Paid', 'Loans');
        $members = auth()->user()->cooperative->members->where("status", 1);
        $loans = auth()->user()->cooperative->loans;
        $expenses = auth()->user()->cooperative->expenses;
        $income = auth()->user()->cooperative->income;
        $contributions = auth()->user()->cooperative->contributions;
        return view('statistics.index', compact('members', 'income', 'expenses', 'loans',
            'contributions', 'gender', 'chart_contrib', 'chart_loan', 'chart_income', 'chart_expense', 'chart_profit', 'loan_payment', 'loan_status', 'layout'));
    }

    public function accountant()
    {
        $this->middleware(PresidentMiddleware::class);

        $chart_contrib = new MainChart('contributions', 'Contributions');

        $data1 = auth()->user()->cooperative->members->where('gender', 'Male')->count();
        $data2 = auth()->user()->cooperative->members->where('gender', 'Female')->count();
        $gender = new BarChart($data1, $data2, "Male", "Female", 'Gender');

        $chart_loan = new MainChart('loans', 'Loans');
        $chart_income = new MainChart('incomes', 'Income');
        $chart_expense = new MainChart('expenses', 'Expenses');
        $chart_profit = new BarChart(auth()->user()->cooperative->expenses->sum('amount'),
            auth()->user()->cooperative->income->sum('amount'), "Expenses", "Income", "Expenses/Income");
        $loan_payment = new MainChart("payments", 'Loan Payments');
        $loan_status = new BarChart(auth()->user()->cooperative->loans->where("status", 1)->count(),
            auth()->user()->cooperative->loans->where('status', 0)->count(),
            'Payed Loans', 'Not Yet Paid', 'Loans');
        $members = auth()->user()->cooperative->members->where("status", 1);
        $loans = auth()->user()->cooperative->loans;
        $expenses = auth()->user()->cooperative->expenses;
        $income = auth()->user()->cooperative->income;
        $contributions = auth()->user()->cooperative->contributions;
        return view('statistics.accountant', compact('members', 'income', 'expenses', 'loans',
            'contributions', 'gender', 'chart_contrib', 'chart_loan', 'chart_income', 'chart_expense', 'chart_profit', 'loan_payment', 'loan_status', 'layout'));
    }
}
