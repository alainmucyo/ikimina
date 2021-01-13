@extends('layouts.president')
@section('title','List Of Members')
@section('active','members')
@section('content')


    <div class="card">
        <div class="card-header table-card-header">
            <h5>List Of Members</h5>

        </div>

        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Phone</th>
                        <th>Cell</th>
                        <th>Village</th>
                        <th>Joined</th>
                        <th>Contribution (Rwf)</th>
                        <th>Loan (Rwf)</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->gender }}</td>
                            <td>{{ $member->dob }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->cell }}</td>
                            <td>{{ $member->village }}</td>
                            <td>{{ \Illuminate\Support\Carbon::parse($member->created_at)->format('Y-M-d')  }}</td>
                            <td class="currency">{{ $member->contributions->sum('amount') }} Rwf</td>
                            <td class="{{ $member->loan ? 'text-danger currency':'text-success' }}">{{ $member->loan ? $member->loan->amount." Rwf":'None' }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection