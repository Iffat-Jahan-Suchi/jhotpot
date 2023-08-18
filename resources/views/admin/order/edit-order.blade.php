@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <form action="{{route('update-order-info',['id'=>$order->id])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-11 mx-auto ">

                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h4>Order Billing Info</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$order->customer->name}}</td>
                                </tr>
                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{$order->customer->email}}</td>
                                </tr>
                                <tr>
                                    <th>Customer Mobile No</th>
                                    <td>{{$order->customer->mobile}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 mx-auto">

                    <p class="text-center text-success">{{Session::get('message')}}</p>

                    <div class="card">
                        <div class="card-header bg-warning">
                            <h4>Order Basic Info</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Order Id</th>
                                    <td>{{$order->id}}</td>
                                </tr>

                                <tr>
                                    <th>Order Total Amount</th>
                                    <td>{{$order->order_total}}</td>
                                </tr>

                                <tr>
                                    <th>Delivery Address</th>
                                    <td> <textarea name="delivery_address">{{$order->delivery_address}}</textarea></td>
                                </tr>

                                <tr>
                                    <th>Order Status</th>
                                    <td>
                                        <select name="order_status" id="">
                                            <option value="Pending">Pending</option>
                                            <option value="Processing">Processing</option>
                                            <option value="Complete">Complete</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Payment Status</th>
                                    <td>
                                        <select name="payment_status">
                                            <option value="Pending">Pending</option>
                                            <option value="Processing">Processing</option>
                                            <option value="Complete">Complete</option>
                                            <option value="Cancel">Cancel</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Order date</th>
                                    <td>{{$order->order_date}}</td>
                                </tr>

                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{$order->payment_type == '1' ? 'Cash On Delivery' : 'Online Payment'}}</td>
                                </tr>

                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{$order->payment_status}}</td>
                                </tr>

                            </table>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success form-control" value="Update Order Info">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
@endsection


