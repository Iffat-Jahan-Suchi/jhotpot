@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Edit Category</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('update-category',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Edit Category Name</label>
                                <input type="text" class="form-control" placeholder="Category Name" value="{{$category->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Edit Category Description</label>
                                <textarea name="description" placeholder="Descrption" class="form-control">{{$category->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Edit Category Image</label>
                                <input type="file" name="image" class="form-control-file">
                                <img src="{{asset($category->image)}}" alt="" height="100" width="130">
                            </div>

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update Category</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

