@extends('layouts.app')
@section('title','Statistics')
@section('active','statistics')
@section('content')

    <div class="card">
        <div class="card-block">
            <h2 class="text-center">{{ $app_name }}</h2>
            <hr>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-c-yellow update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{ $members->count() }} member(s)</h4>
                                    <h6 class="text-white m-b-0">All Members</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>updated
                                : {{  $members->count()>0 ? $members->sortByDesc('updated_at')->first()->updated_at->diffForHumans():'No Data' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-c-green update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{ $loans->count() }} loan(s)</h4>
                                    <h6 class="text-white m-b-0">Loans</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>updated
                                : {{  $loans->count() >0 ? $loans->sortByDesc('updated_at')->first()->updated_at->diffForHumans():'No Data' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-c-pink update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><span class="currency">{{ $contributions->sum('amount') }}</span> Rwf</h4>
                                    <h6 class="text-white m-b-0">Total Contribution</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-3" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>updated

                                : {{  $contributions->count() >0 ? $contributions->sortByDesc('updated_at')->first()->updated_at->diffForHumans():'No Data' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-c-blue update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{ $expenses->count() }} expense(s)</h4>
                                    <h6 class="text-white m-b-0">All Expenses</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-4" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
                                : {{  $expenses->count() >0 ? $expenses->sortByDesc('updated_at')->first()->updated_at->diffForHumans():'No Data' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-c-orenge update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{ $income->count() }} income(s)</h4>
                                    <h6 class="text-white m-b-0">Income</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
                                : {{  $test=$income->count() >0 ? $income->sortByDesc('updated_at')->first()->updated_at->diffForHumans():'No Data' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-c-lite-green update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white"><span class="currency">{{ $contributions->sum('amount') +$income->sum('amount')-$expenses->sum('amount')  }}</span>
                                        Rwf</h4>
                                    <h6 class="text-white m-b-0">(Contributions + Income) - Expenses</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-2" height="50"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <p class="text-white m-b-0">Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <h4><span class="badge badge-primary">Year: {{ Date("Y") }}</span></h4>

                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card" style="overflow-y: scroll">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6" style="overflow-y: scroll">

                    {!! $gender->container() !!}

                </div>
                <div class="col-md-6">
                    {!! $chart_contrib->container() !!}
                </div>
                <div class="col-md-6">
                    {!! $chart_loan->container() !!}
                </div>
                <div class="col-md-6">
                    {!! $chart_income->container() !!}
                </div>
                <div class="col-md-6" style="overflow-y: scroll;">
                    {!! $chart_profit->container() !!}
                </div>
                <div class="col-md-6">
                    {!! $chart_expense->container() !!}
                </div>

                <div class="col-md-6">
                    {!! $loan_payment->container() !!}
                </div>
                <div class="col-md-6" style="overflow-y: scroll;">
                    {!! $loan_status->container() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/echarts-en.min.js') }}" type="text/javascript"></script>
    {!! $gender->script() !!}
    {!! $loan_status->script() !!}
    <script src="{{ asset('js/Chart.min.js') }}" type="text/javascript"></script>
    {!! $chart_contrib->script() !!}
    {!! $chart_loan->script() !!}
    {!! $chart_income->script() !!}
    {!! $chart_expense->script() !!}
    {!! $chart_profit->script() !!}
    {!! $loan_payment->script() !!}
@endsection