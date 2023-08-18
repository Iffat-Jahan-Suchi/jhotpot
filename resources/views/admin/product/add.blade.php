@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Add Product</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('new-product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Category Name</label>
                                <select name="category_id" required class="form-control" onchange="getBrand(this.value)">
                                    <option value="" disabled selected>---select category name---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Brand Name</label>
                                <select name="brand_id" id="brandId" class="form-control">
                                    <option value="" disabled selected>---select Brand name---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Unit Name</label>
                                <select name="unit_id" id="" class="form-control">
                                    <option value="" disabled selected>---select Unit name---</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Name</label>
                                <input type="text" class="form-control" placeholder="Product Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Code</label>
                                <input type="text" class="form-control" placeholder="Product Code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Regular Price</label>
                                <input type="number" class="form-control" placeholder="regular price" name="regular_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">selling Price</label>
                                <input type="number" class="form-control" placeholder="selling price" name="selling_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Short description</label>
                                <textarea name="short_description" placeholder="short description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Long Description</label>
                                <textarea name="long_description" id="summernote" placeholder="long_description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Image</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Sub Image</label>
                                <input type="file" name="sub_image[]" multiple class="form-control-file">
                            </div>

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Create New Product</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
