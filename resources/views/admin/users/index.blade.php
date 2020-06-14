@extends('MasterLayout')
@section('content')
    <div class="container">
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
                                <th scope="col">ID</th>
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
                                <th scope="row"> {{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                        {{--submit it as form to delete the users--}}
                                       <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                           @csrf
                                           {{method_field('DELETE')}}
                                           <button type="submit" class="btn btn-danger">Delete</button>
                                       </form>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
