@extends('master.front.master')

@section('body')
    @include('master.front.masterheader')

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 5px;padding-right: 5px">
        <div class="panel panel-info">
            <div class="panel-heading" style="background:ghostwhite"><strong style="font-size: 16px;color: #3c763d"><i class="fa fa-user" style="color: #3c763d"> </i> Change Password</strong></div>
            <div class="panel-body" style="padding-left: 30px;padding-right: 30px">

                <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-lg-8 col-md-8  col-sm-8 col-xs-12" >
                    <p class="text-center text-danger">{{Session::get('message')}}</p>
                    <form action="{{route('password-mail-send')}}" method="post" class="form-horizontal"onsubmit="return  ButtonChange()">

                        @csrf
                        <div class="form-group" style="padding-bottom: 15px">


                            <input style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="email" required type="email" class="form-control" placeholder="Enter your email " aria-describedby="basic-addon1">

                        </div>

                        <div class="form-group" style="padding-bottom: 15px">
                            <input id="submitBTN" type="submit" class="btn btn-success btn-block" value="SendNotificationToMail" style="width:100% !important;background: #1D8CE6;color:#fff;font-weight:bolder ">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
