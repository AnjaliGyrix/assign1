@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Member List</h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="home/add"  style="float: right;"><button class="btn-sm btn-primary">Add Member</button></a>
                    </div>  
                </div>            
                <table id="table_id" class="table table-active table-bordered ">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>    
                            <th>Username</th>
                            <th>Email</th>
                            <th>Profession</th>
                            <th>Date of birth</th>
                            <th>Operations</th>
                        <tr>
                    </thead>
                    <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>    
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['profession']}}</td>
                        <td>{{$user['dob']}}</td>
                        <td>
                        @if (Auth::user() && (Auth::user()->id == $user['id']))
                            <button class="btn btn-sm btn-dark disabled" aria-disabled="true">Delete</button>
                            @else 
                            <a href="delete/{{$user['id']}}"><button class="btn-sm btn-dark">Delete</button>
                        @endif
                        <a href="update/{{$user['id']}}"><button class="btn-sm btn-dark">Update</button></a>
                        </td>

                    <tr>
                @endforeach
                </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
