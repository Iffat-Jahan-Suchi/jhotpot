@extends('master.front.master')

@section('body')
    @include('master.front.masterheader')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Licorice&family=Playball&family=Rubik+Glitch&display=swap" rel="stylesheet">
    <style>
        h1{
            font-family: 'Alex Brush', cursive;
            font-family: 'Licorice', cursive;
            font-family: 'Playball', cursive;
            font-family: 'Rubik Glitch', cursive;
        }
        .mystyle {
            font-family: 'Alex Brush', cursive;
            font-family: 'Licorice', cursive;
            font-family: 'Playball', cursive;
            font-family: 'Rubik Glitch', cursive;
        }
    </style>

    <section class="text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title text-left text-primary bg-cover">My Dashboard</h1>
                        <hr/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>



                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="card">
                            <div class="list-group list-group-flush">
                                <a href="" class="list-group-item">My profile</a>
                                <a href="{{route('customer-change-password')}}" class="list-group-item">Change Password</a>
                                <a href="" class="list-group-item">All Order</a>
                                <a href="" class="list-group-item">Cancel Order</a>
                                <a href="" class="list-group-item">My Wishlist</a>
                                <a href="" class="list-group-item">My Payment History</a>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <h4 class="text-center mystyle text-danger">My Recent Order</h4>
                        <div class="table-responsive">

                            <table class="table table-success table-striped">
                                <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Order info</th>
                                    <th>Total Price</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_total}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->payment_status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

    </section>

@endsection
