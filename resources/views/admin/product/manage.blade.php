@extends('master.admin.master')
@section('body')

    <div class="container ">
        <div class="row">
            <div class="col-md-10 mx-auto mt-2">
                <div class="card card-default">
                    <div class="card-header text-center"><h2>Manage Product</h2></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$products->firstItem()+$loop->index}}</th>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{isset($product->brand->name) ? $product->brand->name : ''}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td><img src="{{asset($product->image)}}" alt="" height="50" width="80"></td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <a href="{{route('edit-product',['id'=>$product->id])}}" class=" btn btn-success btn-xs">
                                            <i class="mdi mdi-square-edit-outline"></i>

                                        </a>
                                        <a href="" onclick="deleteProduct({{$product->id}})" class=" btn btn-danger btn-xs">
                                            <i class="mdi mdi-delete-empty"></i>

                                        </a>
                                        <form action="{{route('delete-product',['id'=>$product->id])}}" method="post" id="deleteProductForm{{$product->id}}">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        function deleteProduct(id) {
            event.preventDefault();
            var check=confirm('Are you sure to delete this...');
            if(check)
            {
                document.getElementById('deleteProductForm'+id).submit();
            }

        }
    </script>
@endsection

