@extends('MasterLayout')

@section('content')
    <h1>This is the Pre-Screening Database Page</h1>
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
                    <a href="{{ route('preScreening.edit',$patient->id) }}" class="btn btn-primary">Edit Profile</a>
                </td>
                <td>
                    {{--<form action="{{route('Patients_Details.create',$patient->id)}}" method="POST">
                        @csrf
                        {{method_field('GET')}}
                        <button type="submit" class="btn btn-primary">Add Details</button>
                    </form>--}}
                    <a href="{{route('Patients_Details.create',$patient->id)}}" class="btn btn-primary">Add Details</a>
                </td>
                <td>
                    <a href="{{route('Patients_Details.show',$patient->id)}}" class="btn btn-primary">Show Details</a>
                </td>
                <td>
                    <a href="{{route('Patients_Details.edit',$patient->id)}}" class="btn btn-primary">Edit Details</a>
                </td>
                <td>
                    <form action="{{route('Patients_Details.delete',$patient->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Details</button>
                    </form>
                </td>
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
