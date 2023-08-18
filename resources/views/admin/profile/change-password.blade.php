@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10  mt-5">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Change Your Password</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('admin-new-password')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Your Old Password</label>
                                <input type="password" class="form-control" placeholder="Old Password" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Your New Password</label>
                                <input type="password" class="form-control" placeholder="New Password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Your Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            </div>
                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update Password</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
