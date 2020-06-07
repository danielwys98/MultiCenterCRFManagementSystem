@extends('MasterLayout')

@section('content')
    <h1>This is the Pre-Screening Database Page</h1>
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
                    <a href="{{ route('preScreening.show',$patient->id) }}" class="btn btn-dark">View {{$patient->name}} 's Profile</a>
                    <a href="{{ route('preScreening.edit',$patient->id) }}" class="btn btn-primary">Edit Profile</a>
                    <form action="{{route('preScreening.destroy',$patient->id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">Delete Subject</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
