@extends('emp.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
            <h2>Edit Employee</h2>
        </div>
        <div class="pull-right">
            <br>
            <a class="btn btn-primary" href="{{ route('formlist') }}"> Back</a>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{route('modify',['id'=>$getdetails->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $getdetails->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="email" value="{{ $getdetails->email }}" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <image src="{{{ URL::asset('upload/'.$getdetails->image)}}}" height="50px" width="50px"></img> 
                <div class="form-group">
                    <strong>Image</strong>
                    <input type="file" name="image" class="form-control" value="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>


  </form>


  @endsection