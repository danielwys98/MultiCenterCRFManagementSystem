	@extends('MasterLayout')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h1>Pre-Screening Database</h1>
        </div>
        <div class="col-md-7">
            <div class="row">
                <form class="form-inline" method="get" action="{{url('/preScreening/admin/search')}}">
                    <div class="col-md-8">
                        <input name="search_patient" class="form-control" type="search" placeholder="Patient">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-warning" type="submit" value="show">Show all</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">All the Patients</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>
                    <p>{{$patient->name}}</p><br>
                </td>
                <td>
                    <a href="{{ route('preScreening.show',$patient->id) }}" class="btn btn-dark">View Profile</a>

                </td>
                <td>
                    {{--<form action="{{route('details.create',$patient->id)}}" method="POST">
                        @csrf
                        {{method_field('GET')}}
                        <button type="submit" class="btn btn-primary">Add Details</button>
                    </form>--}}
                    <a href="{{route('details.create',$patient->id)}}" class="btn btn-primary">Add Details</a>
                </td>
                <td>
                    <a href="{{route('details.edit',$patient->id)}}" class="btn btn-primary">Edit Details</a>
                </td>
                {{--  <td>
                      <form action="{{route('details.delete',$patient->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete Details</button>
                      </form>
                  </td>--}}
                <td>
                    <form action="{{route('preScreening.destroy',$patient->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Subject</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('preScreening.create') }}" class="btn btn-primary">Add a new Subject</a>

@endsection
