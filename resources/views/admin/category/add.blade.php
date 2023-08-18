@extends('master.admin.master')
@section('body')
   <div class="container">
       <div class="row">
          <div class="col-md-10 mx-auto mt-5">
              <div class="card card-default">
                  <div class="card-header card-header-border-bottom bg-info">
                      <h2>Add Category</h2>
                  </div>
                  <div class="card-body">
                      <form class="form-pill" action="{{route('new-category')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="exampleFormControlInput3">Category Name</label>
                              <input type="text" class="form-control" placeholder="Category Name" name="name">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlPassword3">Category Description</label>
                              <textarea name="description" placeholder="Descrption" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput3">Category Image</label>
                              <input type="file" name="image" class="form-control-file">
                          </div>

                          <div class="card-footer float-right">
                              <button type="submit" class="btn btn-success">Create New Category</button>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
       </div>
   </div>
@endsection
