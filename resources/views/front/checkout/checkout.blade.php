@extends('master.front.master')
@section('body')
    @include('master.front.masterheader')

    <section class="best_seller_product"  style="padding-bottom: 10px;background-color:#F7F8FA;padding-top: 0;" id="main_content_area">

        <div class="container-fluid-full" style="    background: #F9F9F9;">
            <div class="containe
r" style="padding-top:15px">
                <div class="row" style="margin-right: 0">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 5px;padding-right: 5px">
                        <div class="panel panel-info">
                            <div class="panel-heading" style="background:ghostwhite"><strong style="font-size: 16px;color: #3c763d"><i class="fa fa-user" style="color: #3c763d"> </i> Customer Information</strong></div>
                            <div class="panel-body" style="padding-left: 30px;padding-right: 30px">

                                <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-lg-8 col-md-8  col-sm-8 col-xs-12" >
                                    <form action="{{route('new-order')}}" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return  ButtonChange()">
                                        @csrf


                                        <div class="form-group" style="padding-bottom: 15px">

                                            @if($customer)
                                            <input style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="name" value="{{$customer->name}}" required type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
                                            @else
                                                <input style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="name" required type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
                                            @endif

                                        </div>

                                        <div class="form-group" style="padding-bottom: 15px">
                                            @if($customer)
                                            <input style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="mobile"  required type="text" class="form-control" placeholder="mobile" value="{{$customer->mobile}}" maxlength="" minlength="">
                                            @else
                                            <input style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="mobile"  required type="text" class="form-control" placeholder="mobile" maxlength="" minlength="">
                                                @endif

                                        </div>


                                        <div class="form-group" style="padding-bottom: 15px">
                                            @if($customer)

                                            <input type="email" style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="email" value="{{$customer->email}}" class="form-control" placeholder="Email">
                                            @else
                                            <input type="email" style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="email" class="form-control" placeholder="Email">
                                            @endif
                                        </div>

                                        <div class="form-group" style="padding-bottom: 15px">
                                            <textarea style="width: 100% !important;border: 1px solid #bce8f1;padding-left: 10px" name="delivery_address"   type="text" class="form-control" placeholder="Delivery Address" ></textarea>

                                        </div>


                                            <div class="form-group" style="padding-bottom: 15px">
                                                <h5><b class="text-success">Payment Method</b></h5>
                                                <select name="payment_method"  class="form-control" style="border: 1px solid #bce8f1">

                                                    <option value="1" selected>&nbsp;Cash On delivery</option>
                                                    <option value="2">&nbsp;Online payment</option>
                                                </select>
                                            </div>


                                        <div class="form-group" style="padding-bottom: 15px">
                                            <input id="submitBTN" type="submit" class="btn btn-success btn-block" value="Confirm Order" style="width:100% !important;background: #1D8CE6;color:#fff;font-weight:bolder ">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
