@extends('layouts.president')
@section('title',' Contributions')
@section('active','contribution')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h5>Unpayed Contributions</h5>
                </div>
                <div class="card-block">

                    <div class="row m-b-30">
                        <div class="col-lg-12 col-xl-12">
                            <div class="dt-responsive table-responsive">
                                <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Names</th>
                                        <th>Paid (Rwf)</th>
                                        <th>Remains (Rwf)</th>
                                        <th>Month</th>
                                        <th>Required (Rwf)</th>
                                        <th>Shares</th>
                                        <th>Extra</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contributions as $contribution)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ \App\members::find($contribution->members_id)->name }}</td>
                                            <td class="currency">{{ $contribution->amount }}</td>
                                            <td class="currency">{{ $amount*$contribution->shares - $contribution->amount }}</td>
                                            <td>{{ $months[$contribution->month-1] }}</td>
                                            <td class="currency">{{ $amount*$contribution->shares }}</td>
                                            <td>{{ $contribution->shares }}</td>
                                            <td>{!!  \App\Extra::where("contribution_id",$contribution->id)->count() ==0?'Create':'<span class="currency">'.
                                                   \App\Extra::where("contribution_id",$contribution->id)->first()->amount."</span>" !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection