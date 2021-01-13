@extends("layouts.admin")
@section('title','Presidents')
@section('active','president')
@section('content')
    <div class="card">
        <div class="card-header">Add Cooperative President</div>
        <div class="card-body">
            <form method="post" action="{{ url('/admin/president') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Names</label>
                    <input type="text" name="name" required id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ old('email') }}" required name="email" id="email"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="cooperative">Select Cooperative</label>
                    <select name="cooperative_id" id="cooperative" class="form-control" required>
                        @foreach($cooperatives as $cooperative)
                            <option value="{{ $cooperative->id }}">{{ $cooperative->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" required name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Password Confirmation</label>
                    <input type="password" name="password_confirmation" required class="form-control">
                </div>
                @include('common.error')
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary btn-block">
                </div>
            </form>

        </div>
    </div>
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>No</th>
            <th>Names</th>
            <th>Email</th>
            <th>Cooperative</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($presidents as $president)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $president->name }}</td>
                <td>{{ $president->email }}</td>
                <td>{{ $president->cooperative->name }}</td>
                <td><a href="{{ url('/admin/delete/'.$president->id) }}"
                       onclick="return confirm('Delete this user?')" class="text-danger"><span
                                class="fa fa-trash fa-lg"></span></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection