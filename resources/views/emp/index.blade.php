@extends('emp.layout')


@section('content')
<div class="topspace">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            	
                <h2>Laravel 5.6</h2>
            </div>
            <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('home') }}">Add New Employee</a>
                 <a class="btn btn-danger" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employ as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            
            <!-- {{$path = public_path('upload/'.$employee->image)}} -->
            <!-- <img src="upload/{{ Session::get('image') }}"> -->
            <td><image src="{{{ URL::asset('upload/'.$employee->image)}}}" height="50px" width="50px"></img> </td>
            <td>
             
                    <a class="btn btn-info" href="{{route('showemployee',['id'=>$employee->id]) }}">Show</a>

                    <a class="btn btn-primary" href="{{route('editemployee',['id'=>$employee->id]) }}">Edit</a>

                     <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('deleteemployee',['id'=>$employee->id]) }}">Delete</a>

                   <!--  <a href="{{route('deleteemployee',['id'=>$employee->id]) }}">
                        <button type="button" class="btn btn-danger">Delete</button> -->

            </td>
        </tr>
        @endforeach
    </table>


    {!! $employ->links() !!}

</div>

@endsection