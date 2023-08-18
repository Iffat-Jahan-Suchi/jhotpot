@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Add User</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('add-new-user')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">User Name</label>
                                <input type="text" class="form-control" placeholder=" Name" name="name">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">User Email</label>
                                <input type="email" placeholder="Email" name="email" class="form-control">
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">User Password</label>
                                <input type="password" placeholder="Password"  name="password" class="form-control">
                            </div>

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Create New User</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
