@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-info">
                        <h2>Add Unit</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-pill" action="{{route('update-unit',['id'=>$unit->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Unit Name</label>
                                <input type="text" class="form-control" placeholder="Unit Name" name="name" value="{{$unit->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Unit Description</label>
                                <textarea name="description" placeholder="Descrption" class="form-control">{{$unit->description}}</textarea>
                            </div>
                            <div class="card-footer float-right">
                                <button type="submit" class="btn btn-success">Update Unit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

