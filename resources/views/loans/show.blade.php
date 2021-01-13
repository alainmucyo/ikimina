@extends('layouts.app')
@section('title','Loans')
@section('active','loans')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Member: {{ $loan->members->name }} </h3>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4" style="margin-bottom: 4%">
                    <div>

                        @php($time_diff=\Illuminate\Support\Carbon::parse($loan->will_be_payed)->diffInDays(now()))
                        @if($loan->will_be_payed > now())
                            <div class="alert alert-primary">
                                {{ $loan->members->name }} has loan of <span class="currency"> {{ $loan->amount }}</span> Rwf
                                taken {{ \Illuminate\Support\Carbon::parse($loan->created_at)->format('Y-M-d') }}
                                to be paid
                                at {{ \Illuminate\Support\Carbon::parse($loan->will_be_payed)->format('Y-M-d') }}
                                ({{ $time_diff }} day(s) remains)
                            </div>
                        @else
                            <div class="alert alert-danger">
                                {{ $loan->members->name }} has loan of<span class="currency"> {{ $loan->amount }}</span> Rwf
                                taken {{ \Illuminate\Support\Carbon::parse($loan->created_at)->format('Y-M-d') }} which
                                was
                                to be paid
                                at {{ \Illuminate\Support\Carbon::parse($loan->will_be_payed)->format('Y-M-d') }}
                                ({{ $time_diff }} day(s) exceeded)
                            </div>
                        @endif
                        <h3>Remaining Payment: <br>
                            <label class="badge badge-primary currency">
                            {{ $loan->amount-$payments->sum('amount') }}
                            </label>
                            Rwf
                            <br>

                        </h3>

                        @if($loan->amount-$payments->sum('amount')<=0)
                            <form action="{{ url('/loan/'.$loan->id)  }}" method="post">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="btn btn-success btn-block"><span class="feather icon-check"></span> All Payed </button>
                            </form>
                        @endif


                    </div>
                </div>
                <div class="col-md-4" style="margin-bottom: 4%">
                    <h4>Loan Payments:</h4>
                    <ul class="list-group" style="overflow-y: scroll; height: 80%;">
                        @foreach($payments as $payment)
                            <li class="list-group-item">Paid <span class="currency"> {{ $payment->amount }}</span> Rwf
                                at {{ \Illuminate\Support\Carbon::parse($payment->created_at)->format('Y-M-d') }}</li>
                        @endforeach
                    </ul>
                    <hr>
                    <h4><b>Total: </b><span class="currency"> {{ $payments->sum('amount') }}</span> Rwf</h4>
                </div>
                <br><br><br>
                <div class="col-md-4"><br><br>
                    <h4>Add Payment To Loan</h4>
                    <form role="form" action="{{ url('/payment') }}" method="post" id="form" onsubmit="event.preventDefault()">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" value="{{ $loan->id }}" name="loans_id">
                            <label for="amount">Amount (Rwf)</label>
                            <input type="number" class="form-control" required id="amount" name="amount">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
    <script type="text/javascript">
        $(function () {
            $("#form").submit(function () {
                var id = $("#id").val();
                var amount = $("#amount").val();
                $.post("{{ url('/payment') }}", $(this).serialize(), function (data) {
                    console.log(data);
                    if (data === "ok") {
                        $.get("{{ url('/loan/create?id=') }}" + id + "&amount=" + amount, function () {
                            window.location = "";
                        });
                    }
                    else
                        alert("Network Error");
                });
            });

        });
    </script>
@endsection