@extends('layouts.app')
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
                                            <td><a data-toggle="modal"
                                                   url="{{ url('/contribution/'.$contribution->id.'/edit') }}"
                                                   data-target="#exampleModal" class=" more btn btn-link"
                                                   href="#">{!!  \App\Extra::where("contribution_id",$contribution->id)->count() ==0?'Create':'<span class="currency">'.
                                                   \App\Extra::where("contribution_id",$contribution->id)->first()->amount."</span>" !!}</a>
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
    <script type="text/javascript">
        $(function () {
            $(".more").click(function () {
                var url = $(this).attr('url');
                $.get(url, function (data) {
                    $("#main").html(data);
                });
            });

        });
    </script>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Extra</h5>
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
