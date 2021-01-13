@extends('layouts.app')
@section('title','List Of Members')
@section('active','members')
@section('content')


    <div class="card">
        <div class="card-header table-card-header">
            <h5>List Of Members</h5>
            <a href="#" class="float-right btn btn-outline-primary" data-toggle="modal" data-target="#modelId">This year
                contribution
                per month.</a>
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
                        <th>More</th>
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
                            <td><a href=" {{ url('/members/'.$member->id)}} " class="btn btn-link">More...</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Amount For {{ Date('Y') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/amount') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="amount">Amount (Rwf)</label>
                            <input type="number" class="form-control" required
                                   id="amount" name="amount" value="{{ $amount->amount }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection