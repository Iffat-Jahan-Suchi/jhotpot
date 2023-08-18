@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Add Brand</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('new-brand')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Category Name</label>
                                <select name="category_id" class="form-control" id="">
                                    <option value="">--- Select Category Name ---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Brand Name</label>
                                <input type="text" class="form-control" placeholder="Brand Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Brand Description</label>
                                <textarea name="description" placeholder="Descrption" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Brand Image</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Create New Brand</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



