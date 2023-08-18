@extends('master.admin.master')
@section('body')


    <div class="container">
        <div class="row">
            <div class="col-md-12  mt-2">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <div class="card card-default">
                    <div class="card-header text-center"><h2>Manage Category</h2></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Order No </th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Order Total</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a href="{{route('view-order-detail',['id'=>$order->id])}}" class=" btn btn-info btn-xs" title="View Order Detail">
                                            <i class="mdi mdi-cryengine"></i>

                                        </a>
                                        <a href="{{route('invoice-order',['id'=>$order->id])}}" class=" btn btn-primary btn-xs" title="View Order Invoice">
                                            <i class="mdi mdi-format-list-checkbox"></i>

                                        </a>
                                        <a href="{{route('download-invoice',['id'=>$order->id])}}" class=" btn btn-warning btn-xs" title="Order Download">
                                            <i class="mdi mdi-download-outline"></i>
                                        </a>
                                        <a href="{{route('edit-order',['id'=>$order->id])}}" class=" btn btn-success btn-xs {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Edit Order">
                                            <i class="mdi mdi-square-edit-outline"></i>

                                        </a>
                                        <a href="" onclick="deleteOrder({{$order->id}})" class="btn btn-danger btn-xs {{$order->order_status == 'Cancel' ? '' : 'disabled'}}" title="Delete Order">
                                            <i class="mdi mdi mdi-delete-empty"></i>

                                        </a>
                                        <form action="{{route('admin-delete-order',['id'=>$order->id])}}" method="post" id="adminDeleteOrder{{$order->id}}">
                                            @csrf
                                        </form>


                                     {{--   <a href="" onclick="deleteCategory({{$category->id}})" class=" btn btn-danger btn-xs">
                                            <i class="mdi mdi-delete-empty"></i>

                                        </a>--}}
                                       {{-- <form action="{{route('delete-category',['id'=>$category->id])}}" method="post" id="deleteCat{{$category->id}}">
                                            @csrf
                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteOrder(id) {
            event.preventDefault();
            var check=confirm('Are you sure to delete this...');
            if(check)
            {
                document.getElementById('adminDeleteOrder'+id).submit();
            }

        }
    </script>

@endsection
