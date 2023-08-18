@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Edit User</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('update-user',['id'=>$user->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">User Name</label>
                                <input type="text" class="form-control" placeholder=" Name" name="name" value="{{$user->name}}">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">User Email</label>
                                <input type="email" placeholder="Email" name="email" class="form-control" value="{{$user->email}}">
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Old Password</label>
                                <input type="password" placeholder="Password"  name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">New Password</label>
                                <input type="password" placeholder="Confirm_Password"  name="confirm_password" class="form-control">
                            </div>
                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update User</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
