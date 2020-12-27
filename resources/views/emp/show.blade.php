@extends('emp.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2> Employee Details</h2>
            </div>
            <div class="pull-right">
                <br>
                <a class="btn btn-primary" href="{{ route('formlist') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image</strong>
                <image src="{{{ URL::asset('upload/'.$user->image)}}}" height="150px" width="150px">
            </div>
        </div>
    </div>
@endsection