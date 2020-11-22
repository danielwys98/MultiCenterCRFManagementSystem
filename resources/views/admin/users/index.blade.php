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
                                <th scope="col" class="col-md-2">Actions</th>
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
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}"><button class="btn btn-outline-primary col-md-5"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>  Edit</button></a>
                                        {{--submit it as form to delete the users--}}
                                       <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                           @csrf
                                           {{method_field('DELETE')}}
                                           <button type="submit" onclick="return confirm('Are you sure to delete this study?')" class="btn btn-outline-danger offset-1 col-md-5"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                   <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                               </svg>  Delete</button>
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
