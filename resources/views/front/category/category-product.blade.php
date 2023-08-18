@extends('master.front.master')
@section('body')
    @include('master.front.masterheader')

    <section class="best_seller_product"  style="padding-bottom: 10px;background-color:#F7F8FA;padding-top: 0;" id="main_content_area">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding:0;padding-top:50px;">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding:0; margin-bottom: 2.5rem; ">

           <span class="text-left font-custom" style="padding-left: 10px;font-weight: bold;    font-size: 1.5rem;  ">
               {{$category->name}}         </span>



            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-gri" style="display: grid; grid-template-columns: repeat(auto-fill,minmax(200px,1fr));  grid-gap: 2vw; gap: 2vw;">
                @foreach($products as $product)


                <div class="   " style="background: #fff;padding: 10px;box-shadow: rgb(0 0 0 / 5%) 0px 2px 5px 0px;border-radius: 10px;">

                    <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 0">


                        <a  style="padding: 0px;max-height: 235px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="{{route('product-detail',['id'=>$product->id])}}"  id="160" >
                            <img class="img-responsive zoomEffect" style="width: 100%;margin: 0 auto;padding:5px" src="{{asset($product->image)}}" alt="D116 Smart Bluetooth Watch">
                        </a>


                        <div class="col-sm-12 col-xs-12" style="padding:0;background: #fff;margin-top: 10px;">
                            <span id="productName160" class="col-sm-12 font-custom" style="-webkit-line-clamp: 2; -webkit-box-orient: vertical;  display: -webkit-box; white-space: pre-wrap; line-height: 18px;  width: 100%; font-size: 14px; height: 36px;text-overflow: ellipsis;overflow: hidden;text-align: center;font-weight: 600;">{{$product->name}}</span>

                            <span id="productPrice160" class="col-sm-12  col-xs-12  font-custom" style="width: 100%; font-size: 16px; font-weight: 700; line-height: 19px; text-align: center;color: #323e46;padding: 1rem; ">
                            ৳  {{number_format($product->selling_price)}}                       </span>

                            <span style="width: 100%;display: inline-block; text-align: center; align-items: flex-start;">

                        <!--<span  onclick="AssignModel('')" class=" text-center" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">-->
                                <!--   Buy Now-->
                                <!--</span>-->

 <div class=" text-center" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">

        <form action="{{route('add-to-cart',['id'=>$product->id])}}" method="post">
            @csrf
            <input type="hidden" value="890" name="product_price">
            <input type="hidden" value="160" name="product_id">
            <input id="product_buy_item_quantity-value160"  type="hidden" name="qty" value="1">
            {{--<input type="submit" style="background: transparent;border: none;margin: 0;padding: 0 5px">--}}
            <button type="submit" class="btn btn-default" ><b>Buy Now</b> </button>
        </form>
    </div>

      </span>


                        </div>


                    </div>
                </div>





@endforeach



            </div>
        </div>



    </section>



@endsection




