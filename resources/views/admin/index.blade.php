@extends("layouts.admin")
@section('title','Dashboard')
@section('active','dash')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-institution"></i>
                    </div>
                    <div class="mr-5">{{ \App\Cooperative::all()->count() }} Cooperative(s) !</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/admin/accountant') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">{{ \App\User::where('type',2)->count() }} Accountant(s) !</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/admin/accountant') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-user"></i>
                    </div>
                    <div class="mr-5">{{ \App\User::where('type',1)->count() }} President!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/admin/members') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-user-secret"></i>
                    </div>
                    <div class="mr-5">{{ \App\User::where('type',3)->count() }} Admin!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/admin/members') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            Add New Cooperative
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('/admin/cooperative') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" required id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="tel" value="{{ old('contact') }}" required name="contact" id="contact"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">More About Cooperative</label>
                    <textarea name="about" id="about" required cols="30" rows="5" class="form-control"></textarea>
                </div>
                @include('common.error')
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
<div class="card">
    <div class="card-header">List Of Cooperatives</div>
    <div class="card-body">
        <table class="table table-stripped">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Created_at</th>
                <th>About</th>
                <th>Active State <br>
                (Click to change)
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cooperatives as $cooperative)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cooperative->name }}</td>
                    <td>{{ $cooperative->contact }}</td>
                    <td>{{ \Carbon\Carbon::parse($cooperative->created_at)->format('Y-M-d') }}</td>
                    <td>{{ $cooperative->about }}</td>
                    <td><a href="{{ url('admin/cooperative/'.$cooperative->id."/edit") }}" class="{{ $cooperative->active? "text-success":'text-danger' }}">{{ $cooperative->active? "Active":'Inactive' }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection