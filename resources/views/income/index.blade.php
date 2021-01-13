@extends('layouts.app')
@section('title','Income')
@section('active','income')
@section('content')
    <div class="card">
        <div class="card-header">
            Income <h4 class="float-right"> Total: <label class="badge badge-secondary currency">{{ $incomes->sum('amount') }}</label> Rwf </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 card">
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Amount</th>
                            <th>Reason</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incomes as $income)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="currency">{{ $income->amount }}</td>
                                <td><a data-toggle="modal" data-target="#exampleModal" id="more" class="btn btn-link" href="#"
                                       income_id="{{ $income->id }}">{{ $income->why }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                <div class="col-md-5 card">
                    <form method="post" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="amount">Amount (Rwf)</label>
                            <input type="number"  class="form-control" value="{{ old('amount') }}" id="amount"
                                   name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="why">From</label>
                            <input type="text" class="form-control" id="why" value="{{ old('why') }}" name="why"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" cols="20" rows="5"
                                      class="form-control">{{ old('details') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>
                    </form>
                    @include('common.error')
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $("#more").click(function () {
                var id = $(this).attr('income_id');
                $.get("/income/" + id, function (data) {
                    $("#main").html(data);
                });
            });

        });
    </script>


@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="main"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

