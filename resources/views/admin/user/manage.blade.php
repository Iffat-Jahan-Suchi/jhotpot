@extends('master.admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-2">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <div class="card card-default">
                    <div class="card-header text-center"><h2>Manage Category</h2></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                    <td>
                                        <a href="{{route('edit-user',['id'=>$user->id])}}" class=" btn btn-success btn-xs">
                                            <i class="mdi mdi-square-edit-outline"></i>

                                        </a>
                                        <a href="{{route('delete-user',['id'=>$user->id])}}" onclick="confirm('Are you sure to delete this..')" class=" btn btn-danger btn-xs">
                                            <i class="mdi mdi-delete-empty"></i>

                                        </a>

                                        {{--<form action="{{route('delete-user',['id'=>$user->id])}}" method="post" id="deleteUserForm{{$user->id}}">
                                            @csrf
                                        </form>--}}
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
        function deleteUser(id) {
            event.preventDefault();
            var check=confirm('Are you sure to delete this...');
            if(check)
            {
                document.getElementById('deleteUserForm'+id).submit();
            }

        }
    </script>

@endsection

