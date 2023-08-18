@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('update-product',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Category Name</label>
                                <select name="category_id" id="" required class="form-control" onchange="getBrand(this.value)">
                                    <option value="" disabled selected>---select category name---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Brand Name</label>
                                <select name="brand_id" id="brandId" class="form-control">
                                    <option value="" disabled selected>---select Brand name---</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected': ''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Unit Name</label>
                                <select name="unit_id" id="" class="form-control">
                                    <option value="" disabled selected>---select Unit name---</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{$unit->id == $product->unit_id ? 'selected' : ''}}>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Name</label>
                                <input type="text" class="form-control" value="{{$product->name}}" placeholder="Product Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Code</label>
                                <input type="text" class="form-control" value="{{$product->code}}" placeholder="Product Code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Regular Price</label>
                                <input type="number" class="form-control" value="{{$product->regular_price}}" placeholder="regular price" name="regular_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">selling Price</label>
                                <input type="number" class="form-control" value="{{$product->selling_price}}" placeholder="selling price" name="selling_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Short description</label>
                                <textarea name="short_description" placeholder="short description" class="form-control">{{$product->short_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Long Description</label>
                                <textarea name="long_description" id="summernote" placeholder="long_description" class="form-control">{{$product->long_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Image</label>
                                <input type="file" name="image" class="form-control-file">
                                <img src="{{asset($product->image)}}" alt="" height="100" width="130">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Product Sub Image</label>
                                <input type="file" name="sub_image[]" multiple class="form-control-file">
                                @foreach($subImages as $subImage)
                                    <img src="{{asset($subImage->image)}}" alt="" height="100" width="130">
                                @endforeach
                            </div>

                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update Product</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

