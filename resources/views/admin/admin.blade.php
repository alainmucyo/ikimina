@extends("layouts.admin")
@section('title','Admins')
@section('active','admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Names</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td><a href="{{ url('/admin/delete/'.$admin->id) }}" onclick="return confirm('Delete this user?')" class="text-danger"><span class="fa fa-trash fa-lg"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <hr>
        <div class="col-md-6">
            <form method="post" action="{{ url('/admin/admin') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Names</label>
                    <input type="text" name="name" required id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ old('email') }}" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" required name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Password Confirmation</label>
                    <input type="password" name="password_confirmation" required class="form-control">
                </div>
                <div class="form-group">

                    <input type="submit" value="Submit" class="btn btn-primary btn-block">
                </div>
            </form>
            @include('common.error')
        </div>
    </div>
@endsection