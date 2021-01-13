@extends('layouts.app')
@section('title','Give Loans')
@section('active','loans')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Give {{ $member->name }} Loan</div>
            <div class="card-body">
                <form role="form" action="{{ url('/loan') }}" method="post" id="form" onsubmit="event.preventDefault()"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" value="{{ $member->id }}" id="id" name="members_id">
                        <label for="amount">Amount (Rwf)</label>
                        <input type="number" class="form-control"
                               value="{{ old('amount') }}" required id="amount"
                               name="amount">
                    </div>
                    <div class="form-group">
                        <label for="date">Will Be Paid</label>
                        <input type="date" class="form-control" required value="{{ old('will_be_payed') }}" id="date"
                               name="will_be_payed">
                    </div>
                    <div class="form-group">
                        <label for="">PDF Attachment</label>
                        <input type="file" class="form-control-file" required accept="application/pdf" name="attach"
                               id="" placeholder="" aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">Provide PDF for reasons and more about
                            loan
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Submit">
                    </div>
                </form>
                @include('common.error')
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(function () {
            $("#form").submit(function () {
                var id = $("#id").val();
                var amount = $("#amount").val();
                var will = $("#date").val();

                $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        enctype: 'multipart/form-data',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data === "ok") {
                                $.get("{{ url('/loan/give?id=') }}" + id + "&amount=" + amount + "&will_be_payed=" + will, function () {
                                    window.location = "";
                                });
                            }
                        }
                    }
                );

            });
        });


    </script>
@endsection