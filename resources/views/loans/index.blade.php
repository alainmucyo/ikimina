@extends('layouts.app')
@section('title','Loans')
@section('active','loans')
@section('content')

    <div class="card">
        <div class="card-header table-card-header">
            <h3>{{ $nu_status ? 'Payed Loans': 'Unpayed Loans' }}</h3>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Member Names</th>
                        <th>Amount (Rwf)</th>
                        <th>Taken At</th>
                        <th>To Be Payed At</th>
                        <th>Attach</th>
                        <th>{{ $nu_status ? 'Payed At': '' }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loans as $loan)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $loan->members->name }}</td>
                            <td class="currency">{{ $loan->amount }} Rwf</td>
                            <td>{{ \Carbon\Carbon::parse($loan->created_at)->format('Y-M-d') }}</td>
                            <td>{{ $loan->will_be_payed }}</td>
                            <td><a href="{{ Storage::url($loan->attach) }}">Download</a></td>
                            <td>{!!  $loan->status ? \Carbon\Carbon::parse($loan->updated_at)->format('Y-M-d'): '<a href="'. url('/loan/'.$loan->id).'">More...</a>' !!}</td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection