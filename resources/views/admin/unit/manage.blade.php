@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-2">

                <div class="card card-default">
                    <div class="card-header text-center"><h2>Manage Unit</h2></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Unit Name</th>
                                <th scope="col">Unit Description</th>
                                <th scope="col">Unit Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units as $unit)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$unit->name}}</td>
                                    <td>{{$unit->description}}</td>
                                    <td>{{$unit->status}}</td>
                                    <td>
                                        <a href="{{route('edit-unit',['id'=>$unit->id])}}" class=" btn btn-success btn-xs">
                                            <i class="mdi mdi-square-edit-outline"></i>

                                        </a>
                                        <a href="{{route('delete-unit',['id'=>$unit->id])}}" onclick="return confirm('Are you sure delete this...')" class=" btn btn-danger btn-xs">
                                            <i class="mdi mdi-delete-empty"></i>

                                        </a>
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

@endsection
