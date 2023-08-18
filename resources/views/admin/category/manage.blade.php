@extends('master.admin.master')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-2">
                <div class="card card-default">
                    <div class="card-header text-center"><h2>Manage Category</h2></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Category Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{asset($category->image)}}" alt="" height="50" width="80"></td>
                                <td>{{$category->status}}</td>
                                <td>
                                    <a href="{{route('edit-category',['id'=>$category->id])}}" class=" btn btn-success btn-xs">
                                       <i class="mdi mdi-square-edit-outline"></i>

                                    </a>
                                    <a href="" onclick="deleteCategory({{$category->id}})" class=" btn btn-danger btn-xs">
                                        <i class="mdi mdi-delete-empty"></i>

                                    </a>
                                    <form action="{{route('delete-category',['id'=>$category->id])}}" method="post" id="deleteCat{{$category->id}}">
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
        function deleteCategory(id) {
            event.preventDefault();
            var check=confirm('Are you sure to delete this...');
            if(check)
            {
                document.getElementById('deleteCat'+id).submit();
            }

        }
    </script>

@endsection
