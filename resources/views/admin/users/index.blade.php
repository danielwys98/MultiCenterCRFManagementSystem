@extends('MasterLayout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <h1>Users Details</h1>
                    <div class="card-body">
                    @if (session('Messages'))
                        <div class="alert alert-success">
                            {{ session('Messages') }}
                        </div>
                    @endif
                    @if (session('ErrorMessages'))
                        <div class="alert alert-danger">
                            {{ session('ErrorMessages') }}
                        </div>
                    @endif
                    </div>
                        <table class="table table-lg table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Users' ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At (Date and Time)</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="text-justify col-md-1"> {{$user->id}}</td>
                                <td class="text-justify col-md-2">{{$user->name}}</td>
                                <td class="text-justify col-md-2">{{$user->email}}</td>
                                <td class="text-justify col-md-2">{{$user->created_at}}</td>
                                <td class="text-justify col-md-2">{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td class="col-md-1">
                                    <button class="btn btn-outline-primary float-md-left"><a href="{{route('users.edit',$user->id)}}"><i class="fas fa-user-edit"></i></a></button>
                                        {{--submit it as form to delete the users--}}
                                       <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                           @csrf
                                           {{method_field('DELETE')}}
                                           <button type="submit" class="btn btn-outline-danger float-md-right"><i class="fas fa-trash"></i></button>
                                       </form>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$users->links()}}
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
