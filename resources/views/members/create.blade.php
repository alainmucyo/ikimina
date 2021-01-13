@extends('layouts.app')
@section('title','Create A Member')
@section('active','create')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create A Member</div>
            <div class="card-body">
        <form action="{{  url('/members') }}" method="post">
            <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-md-8 ">
                    <label for="name">Member Names</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                           aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Full Names Are Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="1">Female</option>
                        <option value="2">Male</option>
                    </select>
                    <small id="helpId" class="form-text text-muted">Gender Is Required</small>
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control mob_no" data-mask value="{{ old('phone') }}" name="phone" id="phone"
                           aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Telephone Contacts is required</small>
                </div>
                <div class="form-group col-md-5">
                    <label for="date">Date Of Birth</label>
                    <input type="date" class="form-control" value="{{ old('dob') }}" name="dob" id="date"
                           aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Date Of Birth Is Required</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="cell">Cell</label>
                    <input type="text" class="form-control" value="{{ old('cell') }}" name="cell" id="cell"
                           aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Cell Name is required</small>
                </div>
                <div class="form-group col-md-5">
                    <label for="village">Village</label>
                    <input type="text" class="form-control" value="{{ old('village') }}" name="village" id="village"
                           aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Village Name Is Required Is Required</small>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Create A Member</button>
            </div>
        </form>
        @include('common.error')
    </div>
        </div>
    </div>
@endsection