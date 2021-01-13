@extends('layouts.app')
@section('title',' Members')
@section('active','members')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Member: {{ $member->name }} </h3>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 card card-body" style="margin-bottom: 4%">
                    <div><b>Cell:</b> {{ $member->cell }}</div>
                    <div><b>Village:</b> {{ $member->village }}</div>
                    <div><b>Gender:</b> {{ $member->gender }}</div>
                    <div><b>Phone Number: </b> {{ $member->phone }}</div>
                    <div><b>Date Of Birth:</b> {{ $member->dob }}</div>
                    <br><br>
                    <p>
                        <a href="{{ url('/members/'.$member->id."/delete") }}"
                           onclick="return confirm('Delete this member?')" class="text-danger">Delete?</a>
                        <a class="text text-success float-right" id="update" href="#" member_id="{{ $member->id }}"
                           data-toggle="modal" data-target="#modelId">
                            Edit?
                        </a>
                    </p>
                    <div>
                        @php
                            $toggle=$member->loan==null || $member->loan->where('status',0)->count()==0 ? false:true;
                        @endphp
                        @if($toggle)
                            @php($time_diff=\Illuminate\Support\Carbon::parse($member->loan->will_be_payed)->diffInDays(now()))
                            @if($member->loan->will_be_payed > now())
                                <div class="alert alert-primary border-primary">
                                    {{ $member->name }} has loan of <span
                                            class="currency"> {{ $member->loan->amount }}</span> Rwf
                                    taken {{ \Illuminate\Support\Carbon::parse($member->loan->created_at)->format('Y-M-d') }}
                                    to be paid
                                    at {{ \Illuminate\Support\Carbon::parse($member->loan->will_be_payed)->format('Y-M-d') }}
                                    ({{ $time_diff }} day(s) remains)
                                </div>
                            @else
                                <div class="alert alert-danger border-danger">
                                    {{ $member->name }} has loan of <span
                                            class="currency">{{ $member->loan->amount }}</span> Rwf
                                    taken {{ \Illuminate\Support\Carbon::parse($member->loan->created_at)->format('Y-M-d') }}
                                    which was
                                    to be paid
                                    at {{ \Illuminate\Support\Carbon::parse($member->loan->will_be_payed)->format('Y-M-d') }}
                                    ({{ $time_diff }} day(s) exceeded)
                                </div>
                            @endif
                        @else
                            <a href="{{ url('/loan/'.$member->id.'/edit') }}" class="btn btn-block btn-primary">Give
                                Loan</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-7" style="margin-bottom: 4%">
                    <h5>Contributions: (Required: <span class="currency"> {{ $amount->amount }} </span> Rwf / month) <a
                                href="#"
                                class="float-right btn btn-primary btn-raised btn-sm"
                                data-toggle="modal"
                                data-target="#modelId2">Add</a>
                    </h5>
                    <br>
                    <ul class="list-group" style="overflow-y: scroll; height: 50%;">

                        @foreach($contributions as $contribution)
                            @php($total=$contribution->extra? $amount->amount*$contribution->shares-$contribution->amount+$contribution->extra->amount
                           : $amount->amount*$contribution->shares-$contribution->amount)


                            <li class="list-group-item {{ $total<=0? 'list-group-item-success':'' }}">
                                <label class="badge badge-danger badge-lg">{{ $months[$i++] }}</label>.
                                {!!  $contribution->amount?
                                 "Paid <span class='currency'> ".$contribution->amount."</span> Rwf of <span class='currency'>".
                                  ($amount->amount*$contribution->shares+($contribution->extra?$contribution->extra->amount  : 0))
                                  ."</span> Rwf remains(<span class='currency'> ".$total. "</span> Rwf )"
                                :"Not yet given" !!}
                                {!!  $total<=0? '<span style="font-size:25px" class="feather icon-check" style="margin-left: 5%"></span>':
                                '<span class="fa fa-times" style="margin-left: 5%"></span>'  !!}
                                {!! $contribution->extra ? ' <label class="badge badge-info" title="Uwaciwe Amande">&nbsp;</label>':'' !!}

                            </li>
                        @endforeach
                    </ul>

                    <hr>
                    <h4><b>Total: </b><span class="currency"> {{ $contributions->sum('amount') }}</span> Rwf</h4>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Update member modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update {{ $member->name }}</h5>
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

    <!-- Add Contribution modal -->
    <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add contribution to {{ $member->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" action="{{ url('/contribution') }}" method="post" id="form"
                          onsubmit="event.preventDefault()">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" value="{{ $member->id }}" name="members_id">
                            <div class="form-group">
                                <label for="shares">Select Shares</label>
                                <select name="shares" class="form-control" required id="shares">
                                    <optgroup label="Select Shares">
                                        @for($a=1;$a<=10;$a++)
                                            <option value="{{ $a }}">{{ $a }}</option>
                                        @endfor

                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="month">Select Month</label>
                                <select name="month" class="form-control" required id="month">
                                    <optgroup label="Select Month">
                                        @for($a=1;$a<=12;$a++)
                                            <option value="{{ $a }}">{{ $a }}</option>
                                        @endfor

                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount (Rwf)</label>
                                <input type="number" class="form-control "
                                       required id="amount" name="amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>
                    </form>
                    @include('common.error')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(function () {
                $("#update").click(function () {
                    $.get('{{ url("members/".$member->id."/edit") }}', function (data) {
                        $("#main").html(data)
                    });
                });
                $("#form").submit(function () {

                    var id = $("#id").val();
                    var amount = $("#amount").val();
                    var month = $("#month").val();
                    $.post("{{ url('/contribution') }}", $(this).serialize(), function (data) {
                        console.log(data);
                        if (data === "ok") {
                            $.get("{{ url('/contribution/1?id=') }}" + id + "&amount=" + amount + "&month=" + month, function () {
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
