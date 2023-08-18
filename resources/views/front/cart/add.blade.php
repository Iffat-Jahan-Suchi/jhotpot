@extends('master.front.master')
@section('body')
    @include('master.front.masterheader')

    <section class="best_seller_product"  style="padding-bottom: 10px;background-color:#F7F8FA;padding-top: 0;" id="main_content_area">

        <div class="container-fluid-full" style="    background: #F9F9F9;">
            <div class="container" style="padding-top:15px">
                <div class="row" style="margin-right: 0">




                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 5px;padding-right: 5px;padding-top: 20px">
                        <div class="panel panel-info" >
                            <div class="panel-heading" style="background: ghostwhite"><strong style="font-size: 16px;color: #3c763d;"><i class="fa fa-info-circle" style="color: #3c763d"> </i> Order Product Information </strong></div>
                            <div class="panel-body" style="padding: 0">



                                <div class="shopping-cart section">
                                    <div class="container">
                                        <div class="cart-list-head">
                                            <p class="text-center text-success">{{Session::get('message')}}</p>
                                            <div class="cart-list-title">
                                                <div class="row">
                                                    <div class="col-lg-1 col-md-1 col-12">
                                                    </div>
                                                    <div class="col-lg-4 col-md-3 col-12">
                                                        <p>Product Name</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>Quantity</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>Unit Price</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>Subtotal</p>
                                                    </div>
                                                    <div class="col-lg-1 col-md-2 col-12">
                                                        <p>Remove</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @php($sum = 0)
                                            @foreach($items as $item)
                                                <div class="cart-single-list">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-1 col-md-1 col-12">
                                                            <a href="{{route('product-detail',['id'=>$item->id])}}"><img src="{{asset($item->attributes->image)}}" alt="#"></a>
                                                        </div>
                                                        <div class="col-lg-4 col-md-3 col-12">
                                                            <h5 class="product-name"><a href="{{route('product-detail',['id'=>$item->id])}}">
                                                                    {{$item->name}}</a></h5>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-12">
                                                            <div class="count-input">
                                                                <form action="{{route('update-cart-product', ['id' => $item->id])}}" method="POST">
                                                                    @csrf
                                                                    <div class="input-group mb-3">
                                                                        <input type="number" min="1" name="qty" class="form-control" value="{{$item->quantity}}"/>
                                                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-12">
                                                            <p>{{$item->price}}</p>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-12">
                                                            <p>{{$item->quantity * $item->price}}</p>
                                                        </div>
                                                        <div class="col-lg-1 col-md-2 col-12">
                                                            <a href="{{route('delete-cart-item',['id'=>$item->id])}}" onclick="return confirm('Are you sure to delete this..')"><i style="font-size:24px" class="fa">&#xf00d;</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php($sum = $sum + ($item->quantity * $item->price))
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="total-amount">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-6 col-12">
                                                            <div class="left">
                                                                <div class="coupon">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12">
                                                            <div class="right">
                                                                <h2 class="text-success">Grand Total</h2>

                                                                <ul>
                                                                    <li class="form-control border-info">Cart Subtotal:<span>TK.  {{number_format($sum)}}</span></li>
                                                                    @php($tax = round(($sum * 15)/100))
                                                                    <li class="form-control">Tax Amount :<span>TK. {{$tax}}</span></li>
                                                                    <li class="form-control">Shipping:<span>TK. {{$shipping = 50}}</span></li>
                                                                    <li class="last form-control">Total Payable:<span>TK. {{number_format($sum+$tax+$shipping)}}</span></li>
                                                                    @php(Session::put('order_total',($sum+$tax+$shipping)))
                                                                    @php(Session::put('tax_total',($tax)))
                                                                    @php(Session::put('shipping_cost',($shipping)))

                                                                </ul>
                                                                <div class="button border-2">
                                                                    <a href="{{route('checkout')}}" class="btn btn-info mx-auto my-auto tfas fa-angle-rightext-center text-primary form-control"><b>Checkout</b></a>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>







                </div>
            </div>
        </div>


          </section>
@endsection
