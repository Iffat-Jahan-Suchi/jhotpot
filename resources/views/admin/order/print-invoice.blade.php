<div class="container">
    <div class="row">

        <div class="content-wrapper">
            <div class="content">					<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
                    <div class="d-flex justify-content-between">
                        <h2 class="text-dark font-weight-medium"></h2>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-secondary">
                                <i class="mdi mdi-content-save"></i> Save</button>
                            <button class="btn btn-sm btn-secondary">
                                <i class="mdi mdi-printer"></i> Print</button>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2">From</p>
                            <address>
                                Jhotpot
                                <br> 47 Holmes Green, Sophiebury, WP9M 3ZZ
                                <br> Email: example@gmail.com
                                <br> Phone: +91 5264 251 325
                            </address>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2">To</p>
                            <address>
                                CUSTOMER INFO
                                <br>Customer Name: {{$order->customer->name}}
                                <br>Email: {{$order->customer->email}}
                                <br>Phone: {{$order->customer->mobile}}
                            </address>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2">Details</p>
                            <address>
                                Invoice ID:
                                <span class="text-dark">{{$order->id}}</span>
                                <br>Order Date: {{$order->order_date}}
                                <br>Invoice Date:{{date('y-m-d')}}
                            </address>
                        </div>
                    </div>
                    <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @php($sum=0)
                            @foreach($order->orderDetails as $orderProduct)
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderProduct->prodcut_name}}</td>
                                <td>{{$orderProduct->prodcut_qty}}</td>
                                <td>{{$orderProduct->prodcut_price}}</td>
                                <td>{{$orderProduct->prodcut_price * $orderProduct->prodcut_qty}}</td>

                        </tr>
                        @php($sum=$sum+$orderProduct->prodcut_price * $orderProduct->prodcut_qty)
                        @endforeach

                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">

                            <ul class="list-unstyled mt-4">
                                <li class="mid pb-3 text-dark"> Subtotal
                                    <span class="d-inline-block float-right text-default">{{$sum}}</span>
                                </li>
                                <li class="mid pb-3 text-dark">Vat(15%)
                                    <span class="d-inline-block float-right text-default">{{$order->tax_total}}</span>
                                </li>
                                <li class="mid pb-3 text-dark">Shipping Cost
                                    <span class="d-inline-block float-right text-default">{{$order->shipping_cost}}</span>
                                </li>
                                <li class="pb-3 text-dark">Total
                                    <span class="d-inline-block float-right">{{number_format($order->order_total)}} TK</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
