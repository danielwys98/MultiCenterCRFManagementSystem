@extends('MasterLayout')

@section('content')
    <h1>This is the Pre-Screening Database Page</h1>
    <table class="table table-hover">
        <thead>
        @if(count($patients))
            <tr>
                <th scope="col">All the Patients</th>
            </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>
                    <p>{{$patient->name}}</p><br>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <th>You dont have patients! add patients!</th>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
