@extends('master.admin.master')
@section('body')

@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-2">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <div class="card card-default">
                    <div class="card-header text-center"><h2>Manage Brand</h2></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$brand->category->name}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td><img src="{{asset($brand->image)}}" alt="" height="50" width="80"></td>
                                    <td>{{$brand->status}}</td>
                                    <td>
                                        <a href="{{route('edit-brand',['id'=>$brand->id])}}" class=" btn btn-success btn-xs">
                                            <i class="mdi mdi-square-edit-outline"></i>

                                        </a>
                                        <a href="" onclick="deleteBrand({{$brand->id}})" class=" btn btn-danger btn-xs">
                                            <i class="mdi mdi-delete-empty"></i>

                                        </a>
                                        <form action="{{route('delete-brand',['id'=>$brand->id])}}" method="post" id="deleteBrandForm{{$brand->id}}">
                                            @csrf
                                        </form>
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
        function deleteBrand(id) {
            event.preventDefault();
            var check=confirm("Are you sure to delete this");
            if(check)
            {
                document.getElementById('deleteBrandForm'+id).submit();
            }
        }
    </script>

@endsection

