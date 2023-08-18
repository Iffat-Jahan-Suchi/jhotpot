<section style="background-color:#fff">
    <div class="container">
        <div class="row">


            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding-zero">
                <div style="float: left">
                    <a href="{{route('home')}}"><img src="{{asset('/')}}front/front_asset/image/uplogo.png" style="float: right;" alt="potapot" title="potapot logo"></a>
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
