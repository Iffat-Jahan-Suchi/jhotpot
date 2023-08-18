@extends('master.front.master')

@section('body')
    @include('master.front.masterheader')
    <div class="container" style="padding-right:0px;margin-top: 30px;">
        <div class="row" >

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile-padding-left-15px" >


                <div class="panel panel-info " style="border:0;box-shadow:none;border-radius: 20px !important;">

                    <div class="panel-body mobile-padding-zero mobile-padding-product" style="padding:30px 15px">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12  " style="padding:0">
                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 details_whole"  style="padding-left: 0px">

                                    <div class="tab-design-product mobile-padding-zero mobile-padding-10px col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0;">


                                        <img   src="{{asset($detailProduct->image)}}" alt="potapot"/>





                                    </div>

                                    <div class="mobile-margin-left-zero mobile-margin-bottom-45 col-lg-6 col-md-6 col-sm-6 col-xs-12  right" style="padding:0;min-height: 300px">
                                        <div class="col-sm-12" id="P_UserOrderForm160" style="padding:0">


                                            <h4 class="modal-title" id="gridSystemModalLabel" style="font-size:18px;font-weight: 700;color: #2c3e50;margin-bottom: .5rem; line-height: 1.2;justify-content: space-between;-webkit-font-smoothing: antialiased;">{{$detailProduct->name}}                   </h4>

                                            <p style="font-size: 16px; color: #2c3e50; display: inline-block;padding:0; ">{{$detailProduct->code}}</p>

                                            <hr style="margin-top: 0;border-bottom-width: 1px;border-width: 1px;border-style: solid;border-color: #eee;box-sizing: content-box; height: 0;  overflow: visible;">





                                            <div class="col-xs-12 col-sm-12 col-md-12 " style="padding: 0px;">

                                                <p style="font-weight:700;margin: 10px 0;color: #00255f;font-size: 24px">      <strong style="color:#212121"> ৳ {{number_format($detailProduct->selling_price)}} </strong></p>


                                                <hr style="margin-top: 0;border-bottom-width: 1px;border-width: 1px;border-style: solid;border-color: #eee;box-sizing: content-box; height: 0;  overflow: visible;">
                                            </div>





                                            <p style="font-weight: bold; font-size: 18px; color: #2c3e50;margin-top: 10px;"  >Delivery Charge: Inside Dhaka - 50 Tk. / Outside Dhaka - 100 Tk.</p>





                                            <div class="col-xs-12 col-sm-12  col-md-12 " style="padding: 0px;margin-top: 20px;    margin-bottom: 20px;">




 <span style="width: 100%;display: inline-block; text-align: left; align-items: flex-start;">

    <!--<span  onclick="AssignModel('')" class=" text-center" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">-->
     <!--   Buy Now
     </span>-->


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class=" text-center" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">

        <form action="{{route('add-to-cart',['id'=>$detailProduct->id])}}" method="post">
             @csrf
            <input type="hidden" value="890" name="product_price">
            <input type="hidden" value="160" name="product_id">





            {{--<input type="submit" style="background: transparent;border: none;margin: 0;padding: 0 5px">--}}
            <button type="submit" style="margin-top: 20.8px;" class="btn btn-default mt-5"><b>Buy Now</b></button>
             <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <input type="number" class="form-control" name="qty" value="1" min="1"/>
                                    </div>
                                </div>

        </form>

    </div>
            </div>
        </div>
    </div>



</span>









                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>







                <div class=" col-lg-12 col-sm-12 brand text-center product-d" style="padding: 0">


                    <div id="my-tab-content" class="tab-content" style="padding-left: 0px;padding-right: 0px; ">
                        <!-- top category tab -->


                        <div class="tab-content panel-body" style="padding: 20px;  border-radius: 20px !important;background:#fff">

                                         <span style="display: block;
    background: #fff;
    font-size: 2.5rem;
    padding: 0 5px;text-align: left;font-weight: inherit;"> Description </span>

                            <div class="col-sm-12 col-xs-12" style="padding:0; background-color: #fff;">



                                <div  id="ListStyle1"  class="col-sm-12 col-xs-12 text-left product-dynamic-details" style="padding:20px 0 10px 0; background-color: #fff;margin-bottom: 20px;" >
                                    <p>{!! $detailProduct->long_description !!}</p>
                                    <br>



                                    @foreach($detailProduct->subImage as $subImage )
                                    <img  src="{{asset($subImage->image)}}" alt="potapot"/><br>
                                    @endforeach







                                </div>







                            </div>
                        </div>

                        <!-- top category tab -->





                    </div>

                </div>






                <!--Similar Product-->
                <div class="panel panel-info " style="background:#F7F8FA; border:0;margin-top:15px">

                    <div class="panel-body mobile-padding-zero" style="padding: 10px 0;">
                        <div class="col-lg-12 col-md-12 col-sm-12 " style="background:#fff;padding: 20px;margin-bottom: 20px;  border-right:0;border-bottom:0;margin-top: 20px;
    border-radius: 20px;display: contents;" id="Product_AjaxRelated">
                            <h4 class="modal-title" id="gridSystemModalLabel" style="font-size:2.5rem;font-weight: inherit;color: #313131;line-height: 1.4; padding-left:10px">
                                Related Products
                            </h4>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  m-gri" style="display: grid; grid-template-columns: repeat(auto-fill,minmax(200px,1fr));  grid-gap: 2vw; gap: 2vw;">


                                @foreach($reated_products as $realted_product)
                                    <div class="   " style="background: #fff;padding: 10px;box-shadow: rgb(0 0 0 / 5%) 0px 2px 5px 0px;border-radius: 10px;">
                                        <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 0">


                                            <a  style="padding: 0px;max-height: 235px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="{{route('product-detail',['id'=>$realted_product->id])}}"  id="160" >
                                                <img class="img-responsive zoomEffect" style="width: 100%;margin: 0 auto;padding:5px" src="{{asset($realted_product->image)}}" alt="D116 Smart Bluetooth Watch">
                                            </a>


                                            <div class="col-sm-12 col-xs-12" style="padding:0;background: #fff;margin-top: 10px;">
                                                <span id="productName160" class="col-sm-12 font-custom" style="-webkit-line-clamp: 2; -webkit-box-orient: vertical;  display: -webkit-box; white-space: pre-wrap; line-height: 18px;  width: 100%; font-size: 14px; height: 36px;text-overflow: ellipsis;overflow: hidden;text-align: center;font-weight: 600;">{{$realted_product->name}}</span>

                                                <span id="productPrice160" class="col-sm-12  col-xs-12  font-custom" style="width: 100%; font-size: 16px; font-weight: 700; line-height: 19px; text-align: center;color: #323e46;padding: 1rem; ">
                            {{$realted_product->price}}                       </span>

                                                <span style="width: 100%;display: inline-block; text-align: center; align-items: flex-start;">

                        <!--<span  onclick="AssignModel('')" class=" text-center" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">-->
                                                    <!--   Buy Now-->
                                                    <!--</span>-->

                         <div class=" text-center" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">

        <form action="{{route('add-to-cart',['id'=>$realted_product->id])}}" method="post">
            @csrf
              <input type="hidden" value="890" name="product_price">
            <input type="hidden" value="160" name="product_id">
            <input id="product_buy_item_quantity-value160"  type="hidden" name="qty" value="1">
            {{--<input type="submit" style="background: transparent;border: none;margin: 0;padding: 0 5px">--}}
            <button type="submit"   style="background: transparent;border: none;margin: 0;padding: 0 5px">Buy Now</button>
        </form>
    </div>

      </span>


                                            </div>


                                        </div>
                                    </div>
                                @endforeach





                            </div>


                        </div>






                    </div>
                </div>
                <!--Similar Product End-->





            </div>
        </div>
    </div>
@endsection
