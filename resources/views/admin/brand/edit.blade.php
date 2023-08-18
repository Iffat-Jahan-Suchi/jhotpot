@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Edit Brand</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('update-brand',['id'=>$brand->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Category Name</label>
                                <select name="category_id" class="form-control" id="">
                                    <option value="">--- Select Category Name ---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $brand->category_id ? 'selected': ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Edit Brand Name</label>
                                <input type="text" class="form-control" placeholder="Brand Name" value="{{$brand->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Edit Brand Description</label>
                                <textarea name="description" placeholder="Descrption" class="form-control">{{$brand->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Edit Brand Image</label>
                                <input type="file" name="image" class="form-control-file">
                                <img src="{{asset($brand->image)}}" alt="" height="100" width="130">
                            </div>

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update Brand</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


