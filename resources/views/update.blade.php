@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Update') }}</strong></div>

                <div class="card-body">
                    <form action="/update" class="form-group" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data['id']}}"/>
                        <label for="username">Username </label>
                        <input type="text" class="form-control" name="name" placeholder="Username" value="{{$data['name']}}"/>
                        <br>
                        <label for="email">Email </label> 
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$data['email']}}"/>
                        <br>
                        <label for="dob"> Date of Birth </label> 
                        <input type="date" class="form-control" name="dob" value="{{$data['dob']}}"/>
                        <br>
                        <label for="profession"> Profession </label> 
                        <input type="profession" class="form-control" name="profession" value="{{$data['profession']}}"/>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit"> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
