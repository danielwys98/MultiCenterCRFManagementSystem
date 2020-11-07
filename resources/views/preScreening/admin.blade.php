	@extends('MasterLayout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <p>The following forms have not been filled. Please add them first in order to proceed to edit:</p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    {{--content starts here--}}
    <div class="row">
        <div class="col-md-5">
            <h1>Pre-Screening Database</h1>
            <a href="{{ route('preScreening.create') }}" class="btn btn-primary">Add a new Subject</a>
            {{--search bar--}}
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
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">All the Patients</th>
            <th>Actions</th>
        </tr>
        </thead>
        @if(count($patients)>0)
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
                    <a href="{{route('preScreeningForms.create',$patient->id)}}" class="btn btn-primary">Add Details</a>
                </td>
                <td>
                    <a href="{{route('preScreeningForms.edit',$patient->id)}}" class="btn btn-primary">Edit Details</a>
                </td>
                <td>
                    <form action="{{route('preScreening.destroy',$patient->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure to delete this subject?')" class="btn btn-danger">Delete Subject</button>
                        {{-- <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('preScreening.destroy',$patient->id)}}"><i class="fa fa-trash"></i></a> --}}
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            <td>No Patient found!</td>
        @endif
    </table>
    <div>
        {{$patients->links()}}
    </div>
@endsection
