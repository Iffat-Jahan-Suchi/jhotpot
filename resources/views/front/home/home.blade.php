@extends('master.front.master')
@section('body')



    <section style="background-color:#fff">
        <div class="container">
            <div class="row">


                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding-zero">
                    <div style="float: left">
                        <a href="{{route('home')}}"><img src="{{asset('/')}}front/front_asset/image/home.png" style="float: right;" alt="jhotapot" title="jhotapot logo"></a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-left: 0;width: 75%;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-radius: 20px 20px 0 0;padding-top: 8px;padding-left: 0;">
                        <form action="{{route('search-product')}}" method="post" class="form" role="search">
                            <div class="form-group" >
                                <div class="input-group"  style="  border-radius: 4px;">
                                    @csrf
                                    <input type="search" name="product" value="{{request('product')}}" oninput="SearchProduct_byUser(this.value)" class="form-control" placeholder="Search for products..." style="border:0  !important;box-shadow: none !important; background: #f5f5f5;width: 100% !important; height: 100%; padding: 13px 19px;">

                                    <span style="background:#f57224;
                                                  color: #fff;border: 0;border-radius: 0;font-size: 16px;" class="input-group-addon"> &nbsp;<i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 form-group" style="padding: 0">
                    <div class="top-end">
                        @if (Session::get('customer_id'))
                            <div class="user">
                                <i class="fa fa-address-book pr-5" aria-hidden="true"></i>
                                Hello  {{Session::get('customer_name')}}
                            </div>
                        @endif
                        <ul class="user-login">
                            @if(Session::get('customer_id'))
                                <li>
                                    <a href="{{route('customer-dashboard')}}"><b class="text-primary">Dashboard</b></a> |
                                </li>
                                <li>
                                    <a href="{{route('customer-logout')}}"><b class="text-primary">Logout</b></a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('customer-login')}}"><b class="text-primary">Login</b></a> |
                                </li>
                                <li>
                                    <a href="{{route('customer-register')}}"><b class="text-primary">Register</b></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav id="menuBar" class="navbar navbar-default lightHeader mobile-area-on " role="navigation" style="height: auto;top:-1px;background: #fff;box-shadow: none;display:none" >
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo-area" style="padding-top: 5px;padding-bottom: 5px;">
                <div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" style="padding-right: 0;float: left;margin-left: 20px;margin-top: 5px;background-color: transparent; border: 0;box-shadow: none;">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <a href="index.html" style="float: left;  ">
                    <img src="{{assert('/')}}front/front_asset/image/manufacturer_logo/logo.png" class="img-responsive" alt="potapot"  title="potapot" style="width:165px;">
                </a>

                <a style=" border-radius: 6px;padding: 0;padding-left: 8px; "  href="tel:01404877936" title=" 01404877936"   >
                    <img src="{{assert('/')}}front/front_asset/image/call-icon-icon.png" style="width:35px" >
                    <!--<img src="image/call-icon.png"  >-->
                </a>

                <li  class="dropdown" style="list-style-type: none;
    position: absolute;
    z-index: 999;
    top: 5px;
    right: 0;">
                    <a  style="padding: 0;padding-top: 6px;" href="" data-toggle="dropdown" class="user-logs">
                        <img src="{{assert('/')}}front/front_asset/image/login-u.png"   style=" float: right;
    padding-right: 62px;padding-top: 5px;width: 90px;">
                        <!--                                    <i class="fa fa-address-card" style="color:#000;font-size: 25px; float: right;-->
                        <!--padding-right: 62px;padding-top: 5px;"></i>-->
                    </a>

                    <ul class="dropdown-menu" style="margin-top:10px;padding-top: 0;left: -130px;">
                        <li style="padding: 0 !important;">
                            <div style="background:#eee;text-align:left;padding:10px">Login</div>
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >



                                <div class="" style="padding: 10px">
                                    <input style="width: 100% !important;border: 1px solid #eee;padding-left: 10px" name="customer_mobile" required="" type="number" class="form-control" placeholder="Mobile Number .. "  >

                                </div>

                                <div class="" style="padding: 10px">
                                    <input style="width: 100% !important;border: 1px solid #eee;padding-left: 10px" name="customer_password" required="" type="password" class="form-control" placeholder="Password .. "  >

                                </div>


                                <div class="" style="padding-bottom: 15px">
                                    <input id="submitBTN" type="submit" class="btnlogin  btn btn-default" value="Login" style="color:#fff;width:100% !important;background: #000;font-weight: bold">
                                </div>

                                <!--<div class="signup-overlay" style="padding:10px 5px">-->
                                <!--         New customer? <a href="#"  style="display: inline-block;  color: #555555;  font-size: 11px; text-shadow: 0px 0px 0px #ddd;  text-transform: lowercase;width: 50%; text-align: right;" >Signup-->

                                <!--         </a>  </div>-->

                            </form>


                        </li>
                    </ul></li>

                <!--<a  onclick="CartModel()"   href="javascript:void(0)" style="float: right;padding-right: 10px;" class="">-->

                <a href="resistration-information.html" style="float: right;padding-right: 10px;" class="">



                    <div class="cartbtn mobile cart_anchor_m" style="position: fixed;
    top: 0;
    right: 5px;
    z-index: 999;">

                        <div class="items ">
                            <img style="width:40px" class="icon-shopping-bag" src="image/cart.png">
                            <!--<img style="width:40px" class="icon-shopping-bag" src="image/shopping-bag.svg">-->


                            <div class="itemcount item_1" id="MtotalCartItemsBlank2"  style="position: absolute;
    z-index: 999;
    top: 0;
    right: 28px;
    background: orange !important;
    width: 20px;
    border-radius: 20px;
    text-align: center;
    color: #000;
    font-weight: bold;">
                                <span class="itemno" id="MtotalCartItems2"> </span>
                            </div>



                        </div>

                    </div>
                </a>



            </div>




            <!-- Collect the nav links, forms, and other content for toggling -->
         {{--   <div class="collapse navbar-collapse navbar-ex1-collapse" style="position: absolute; width: 8 <!--content area start-->%;">
                <button class="closemenu mobile" data-toggle="collapse" data-target=".navbar-ex1-collapse" style="right: -30px; position: absolute;  background: red; border: 0; color: #fff; font-size: 20px; width: 30px; padding: 0; top: 10px;">x</button>
                <ul class="nav navbar-nav navbar-left" style="height: 100vh;">

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/MEN-FASHION/8.html" >
                                    <span style="font-weight: normal;color: #000">MEN FASHION
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/WOMENS-FASHION/9.html" >
                                    <span style="font-weight: normal;color: #000">WOMENS FASHION
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/ELECTRONICS/13.html" >
                                    <span style="font-weight: normal;color: #000">ELECTRONICS
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/HOME---LIVING/14.html" >
                                    <span style="font-weight: normal;color: #000">HOME & LIVING
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/BEAUTY---HEALTH/15.html" >
                                    <span style="font-weight: normal;color: #000">BEAUTY & HEALTH
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/BABY-KIDS---TOYS/16.html" >
                                    <span style="font-weight: normal;color: #000">BABY-KIDS & TOYS
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/Gift/19.html" >
                                    <span style="font-weight: normal;color: #000">Gift
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/mobile-and-phone-accessories/20.html" >
                                    <span style="font-weight: normal;color: #000">mobile and phone accessories
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/Security-products/21.html" >
                                    <span style="font-weight: normal;color: #000">Security products
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/kitchen---dining/22.html" >
                                    <span style="font-weight: normal;color: #000">kitchen & dining
                                    </span>
                        </a>
                    </li>

                    <li style="padding-left: 10px;" class=" dropdown megaDropMenu color-2" >
                        <a href="category/-Winter-Collection/23.html" >
                                    <span style="font-weight: normal;color: #000"> Winter Collection
                                    </span>
                        </a>
                    </li>

                </ul>
            </div>--}}
            <!--mobile menu end-->

        </div>
    </nav>
    <!--content area start-->

    <section class="best_seller_product"  style="padding-bottom: 10px;background-color:#F7F8FA;padding-top: 0;" id="main_content_area">
        <style>
            .category-singel{
                cursor:pointer;
                padding:20px;color:#000;
                background-color: #FF5023;
                margin-top: 20px;
                height:56px;
                padding-bottom: 10px;
                display: block;
                box-shadow: 0 2px 10px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.26);
                -webkit-box-shadow: 0 2px 10px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.26);
                -moz-box-shadow: 0 2px 10px 0 rgba(0,0,0,.16),0 2px 5px 0 rgba(0,0,0,.26);
                transition-duration: .5s;
                padding:10px;
            }
            .category-singel h2{
                font-size:20px;
                color:#000;
                margin:0px;
            }
            .category-singel p{
                margin:0px;
            }

            .category-singel:hover {
                -webkit-box-shadow: 0 25px 55px 0 rgba(0,0,0,.21), 0 16px 28px 0 rgba(80,0,0,.22);
                -moz-box-shadow: 0 25px 55px 0 rgba(0,0,0,.21),0 16px 28px 0 rgba(0,0,0,.22);
                box-shadow: 0 25px 55px 0 rgba(0,0,0,.21), 0 16px 28px 0 rgba(0,0,0,.22);
                background-color: #fff;
                color:#000 !important;
                transition-duration: .5s;
                -webkit-transition-property: box-shadow;
                -ms-transition-property: box-shadow;
                -moz-transition-property: box-shadow;
                -o-transition-property: box-shadow;
                transition-property: box-shadow;
            }
            .top-cat-img:hover{
                background-color: #F9B4A4;
                transition: all 1s;

            }
            .percentage-span-new {
                width: 30px;
                height: 26px;
                background: #FF5023;
                position: absolute;
                z-index: 9;
                right: 0;
                color:#000;
            }
            .percentage-span-new:before {
                content: "";
                position: absolute;
                right: 100%;
                top: 0;
                width: 0;
                height: 0;
                border-top: 13px solid transparent;
                border-right: 10px solid  #FF5023;
                border-bottom: 13px solid transparent;
            }


            .percentage-span-new2 {

                background: #FF5023;
                position: absolute;
                z-index: 9;
                right: 10px;
                padding: 5px 2px;
            }
            .percentage-span-new2:before {
                content: "";
                position: absolute;
                left: 100%;
                top: 0;
                width: 0;
                height: 0;
                border-top: 13px solid transparent;
                border-left: 10px solid  #FF5023;
                border-bottom: 13px solid transparent;
            }
            li ul li a:hover{
                font-weight:900;
                color:#000;
            }
            li ul li a{
                font-weight:bold;
                transition: all .5s;
            }
        </style>

        <style>
            .owl-next{
                display: none;
            }
            .owl-prev{
                display: none;
            }
            @media screen and (max-width: 767px) {
                .owl-nav{
                    display: none;
                }
                .price-text {

                    font-weight: 600;
                    display: inline-block;
                    font-size: 10px !important;
                    color: #fff;
                    position: absolute;
                    bottom: 2px!important;
                    float: left;
                    background-color: #000;
                    height: 16px !important;
                    border-top-right-radius: 60px;
                    border-bottom-right-radius: 60px;
                    width: 38px !important;
                    text-align: center;
                    left: 0;
                }
                .percentage-span-new {

                    background-repeat: no-repeat;
                    width: 35px !important;
                    height: 35px !important;
                    position: absolute !important;
                    top: 0 !important;
                    right: 1px !important;
                    background-size: 34px 34px !important;
                    text-align: center !important;
                    color: #fff !important;
                    font-weight: 500 !important;
                    font-size: 10px !important;
                    z-index: 2;
                }
                .percentage-amount-new {
                    font-size: 11px !important;;
                    font-weight: 500;
                    padding-left: 8px !important;;
                    padding-top: 2px !important;;
                    line-height: 1;
                    display: inline;
                }
                .percentage-sign-new {
                    font-size: 9px !important;;
                    padding-top: 2px !important;;
                }
                .percentage-discount-amount-new {
                    display: inline;
                    width: 100%;
                    font-size: 8px !important;;
                    padding: 0 !important;
                    margin: 0 !important;
                    line-height: 5px ;
                }
            }
            .owl-next{
                outline: none;
            }
            .owl-prev{
                display: none;
            }
            .product {
                border: 1px solid #e80a0a;
            }
            .owl-nav {
                position: absolute;
                top: 39%;
                height: 0;
                font-size: 29px;
                width: 100%;
            }

            .owl-next{
                position: absolute;
                right: -30px
            }
            .percentage-span-new {
                /*background-image: url(/image/flash-deal-percentage.png);*/
                background-repeat: no-repeat;
                width: 40px;
                height: 26px;
                position: absolute;
                top: 0;
                right: 1px;
                background-size: 44px 44px;
                text-align: center;
                color: #fff;
                font-weight: 700;
                font-size: 11px;
                z-index: 2;
            }
            .percentage-amount-new, .percentage-discount-amount-new, .percentage-sign-new {
                font-family: SolaimanLipi,Helvetica,Verdana,'Noto Sans Bengali';
                color: #fff;
                float: left;
            }

            .percentage-amount-new {
                font-size: 15px;
                font-weight: 700;
                padding-left: 11px;
                padding-top: 2px;
                line-height: 1;
                display: inline;
            }
            .percentage-sign-new {
                font-size: 11px;
                padding-top: 2px;
            }
            .percentage-discount-amount-new {
                display: inline;
                width: 100%;
                font-size: 10px;
                padding: 0 !important;
                margin: 0 !important;
                line-height: 7px;
            }
            .price-text {
                font-weight: 600;
                display: inline-block;
                font-size: 16px;
                color: #fff;
                position: absolute;
                bottom: 10px;
                float: left;
                background-color: #000;
                height: 23px !important;
                border-top-right-radius: 60px;
                border-bottom-right-radius: 60px;
                width: 60px;
                text-align: center;
                left: 0;
            }
            .product-ca a:hover {
                background: #08c !important;
                border-color: #08c !important;
                color: #ffffff !important;
            }
        </style>
        <link rel="stylesheet" href="slider-asset/css/owl.carousel.min.css">

        <!--banner area start-->
        <section class="slider_area slider-area-bg" id="slider_area"  style="background-color: #F7F8FA ;">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 menu mobile-area-off" style="padding: 0px;background: #fff;" >

                        <div class="menu">
                            <ul class="rubel" style="height:446.63px;">
                                @foreach($categories as $category)
                                <li class="op main-category">
                                    <a href="{{route('category-product',['id'=>$category->id])}}" style="padding: 7px;font-family: -webkit-pictograph;font-size: 12px;font-weight: 400">
                                        <span>
                                          {{$category->name}}                                      </span>


                                    </a>

                                </li>

                                @endforeach
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " style="padding: 0px;padding-left: 20px;">
                        <div id="wrapper">


                            <div class="slider-wrapper theme-default">


                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators" >
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                    </ol>

                                    <!-- Wrapper for slides -->

                                    <div class="carousel-inner" role="listbox">

                                        <div data-myval="#F7F8FA" class="item

                                             ">
                                            <a href="category/WOMENS-FASHION/9.html">
                                                <img style="width: 100%;border-radius: 20px;max-height: 282px;" src="image/banner/17352358_612855788910816_1938701404048210561_n2.jpg" alt="potapot">
                                            </a>
                                        </div>


                                        <div data-myval="#F7F8FA" class="item
                                        active
                                             ">
                                            <a href="category/ELECTRONICS/13.html">
                                                <img style="width: 100%;border-radius: 20px;max-height: 282px;" src="https://www.sakbstore.com/images/slider/1632553417.jpg" alt="potapot">
                                            </a>
                                        </div>


                                        <div data-myval="#F7F8FA" class="item

                                             ">
                                            <a href="category/Winter-Collection/23.html">
                                                <img style="width: 100%;border-radius: 20px;max-height: 282px;" src="image/banner/47374275_942877129242012_7160934827284234240_n1.jpg" alt="potapot">
                                            </a>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding:0;padding-top:15px">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="padding:0">
                                <a href="#">
                                    <img class="sm-bn" src="{{asset('/')}}front/front_asset/image/banner/bottom-banner1.jpg" alt="potapot" style="width: 98%; max-height: 150px;">
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="padding:0">
                                <a href="#">
                                    <img  class="sm-bn" style="float: right;width: 98%; max-height: 150px;" src="{{asset('/')}}front/front_asset/image/banner/bottom-banner2.jpg" alt="potapot">
                                </a>
                            </div>



                        </div>


                    </div>


                </div>
            </div>
            </div>

        </section>
        <!--banner area end-->



        <div class="container-fluid-full" style="    background: #F9F9F9;">
            <div class="container" style="padding-top:0;padding-right:0">



                <!--col-sm-3-c 20% width 1 row 5 picture-->

                @foreach($categories as $category)
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding:0;padding-top:50px;">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding:0; margin-bottom: 2.5rem; ">

           <span class="text-left font-custom" style="padding-left: 10px;font-weight: bold;    font-size: 1.5rem;  ">
                {{$category->name}}         </span>

                        <span class=" font-custom all-p-btn" style="float: right;font-style: normal; font-weight: 700;  font-size: 14px; line-height: 22px; color: #fff; padding: 10px 20px; background-color: #FCA204;border-radius: .25rem;cursor:pointer  ">


               <a href="{{route('category-product',['id'=>$category->id])}}" style="color: #fff;">  VIEW ALL</a>
         </span>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-gri" style="display: grid; grid-template-columns: repeat(auto-fill,minmax(200px,1fr));  grid-gap: 2vw; gap: 2vw;">

                        @foreach($category->products as $product)


                        <div class="   " style="background: #fff;padding: 10px;box-shadow: rgb(0 0 0 / 5%) 0px 2px 5px 0px;border-radius: 10px;">

                            <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 0">


                                <a  style="padding: 0px;max-height: 235px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="{{route('product-detail',['id'=>$product->id])}}"  id="160" >
                                    <img class="img-responsive zoomEffect" style="width: 100%;margin: 0 auto;padding:5px" src="{{asset($product->image)}}" alt="D116 Smart Bluetooth Watch" height="800px" width="800px">
                                </a>


                                <div class="col-sm-12 col-xs-12" style="padding:0;background: #fff;margin-top: 10px;">
                                    <span id="productName160" class="col-sm-12 font-custom" style="-webkit-line-clamp: 2; -webkit-box-orient: vertical;  display: -webkit-box; white-space: pre-wrap; line-height: 18px;  width: 100%; font-size: 14px; height: 36px;text-overflow: ellipsis;overflow: hidden;text-align: center;font-weight: 600;">{{$product->name}}</span>

                                    <span id="productPrice160" class="col-sm-12  col-xs-12  font-custom" style="width: 100%; font-size: 16px; font-weight: 700; line-height: 19px; text-align: center;color: #323e46;padding: 1rem; ">
                            ৳ {{number_format($product->selling_price)}}                       </span>

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




        @endforeach

            </div>
        </div>



        <div class="modal modal1 fade" id="DataPrivew" role="dialog"  >
            <div class="modal-dialog ">

                <!-- Modal content-->
                <div class="modal-content" style="border: 0;">
                    <div class="modal-header" style="padding-bottom: 0;border:0">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> <strong>Please Order Now</strong></h4>
                    </div>
                    <div class="modal-body col-sm-12  col-xs-12" style="background: #fff;">

                        <div class="col-sm-12">
                            <div class="white-box">
                                <div class=" col-lg-12 col-md-12  col-sm-12 col-xs-12" >
                                    <form action="https://www.potapot.com/save-customer-information" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return  ButtonChange()">


                                        <div class="form-group" style="padding-bottom: 15px">
                                            <span style="color:#616161;">Phone Number </span>
                                            <input style="margin-top: .25rem;width: 100% !important;  border:1px solid #e0e0e0;;padding-left: 10px;box-shadow: none;" name="customer_mobile"  required type="text" class="form-control" placeholder="" pattern="\d*" maxlength="11" minlength="11">

                                        </div>



                                        <div class="form-group" style="padding-bottom: 15px">


                                            <span style="color:#616161;" >Name </span>
                                            <input style="margin-top: .25rem;width: 100% !important;  border: 1px solid #e0e0e0;padding-left: 10px;box-shadow: none;" name="customer_name" required type="text" class="form-control" placeholder=""  >

                                        </div>

                                        <input type="hidden" value="1"  name="customer_area">

                                        <div class="form-group" style="padding-bottom: 15px">
                                            <span style="color:#616161;" >Address </span>
                                            <textarea style="margin-top: .25rem;width: 100% !important;  border: 1px solid #e0e0e0;padding-left: 10px;box-shadow: none;" name="customer_address"    class="form-control"   ></textarea>

                                        </div>


                                        <div class="form-group" style="padding-bottom: 15px">
                                            <input id="submitBTN" type="submit" class="btn btn-success btn-block" value="Confirm Order" style="display: inline-block;margin-bottom:20px;margin-top:20px;border-radius: .25rem;cursor:pointer;font-style: normal; font-weight: 700; font-size: 14px; line-height: 22px;color: #fff;padding: 10px 20px; background-color: #FCA204">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>






        <style>
            @media (max-width: 767px) {
                .modal-dialog {
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                    margin: auto;
                    width: auto;
                }
                .sm-bn{
                    width:100% !important;
                    padding-top: 5px;
                }
            }
            @media (min-width: 768px) {
                .modal-dialog {
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                    margin: auto;
                    width:600px;
                    height:342px;
                }
            }

        </style>



        <!--<script src="front_asset/js/jquery-3.2.1.min.js"></script>-->
        <script>

            function AssignModel(obj){
                $('.modal1').modal('show');
                ProductAddTwoCart(obj);
            }



            $(document).ready(function () {
                $('#carousel-example-generic').on('slid.bs.carousel', function () {
                    var itemType = $('div.carousel-inner').find('div.active').data('myval');

                    console.log(itemType);
                    $('#' + slider_area.id).css({"background-color": "#" + itemType});
                });
            });

            function MoreSubCategory(Obj)
            {

                serverPage = 'https://www.potapot.com/ovation/MoreSubCategory/' + Obj;
                // alert(serverPage);
                xmlhttp.open("GET.html", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        //alert(xmlhttp.responseText);
                        document.getElementById("MoreSubCatArea").innerHTML = xmlhttp.responseText;


                    }

                    var scroll = document.getElementById('MoreSubCatS');
                    scroll.scrollTop = scroll.scrollHeight;
                    scroll.animate({scrollTop: scroll.scrollHeight}, "slow");
                };
                xmlhttp.send(null);


            }

        </script>




        <script src="slider-asset/js/jquery.min.js"></script>
        <script src="slider-asset/js/owl.carousel.min.js"></script>

        <script>

            $(document).ready(function () {
                //owl carousel

                if ($('.product-category').hasClass('owl-carousel')) {

                    $('.owl-carousel').owlCarousel({
                        items: 6,
                        margin: 15,
                        nav: true,
                        dots: false,
                        autoplay: true,
                        slideBy: 6,
                        autoplayHoverPause: true,
                        rewind: true,
                        responsive: {
                            0: {
                                items: 2
                            },
                            760: {
                                items: 2
                            },
                            960: {
                                items: 4
                            },
                            1170: {
                                items: 6
                            }
                        }
                    })
                }

            });
        </script>        </section>

    <!--content area end-->
@endsection
