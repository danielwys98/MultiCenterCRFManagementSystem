@extends('MasterLayout')

@section('content')
    <h1>This is the Study Specific Database Page</h1>
    <table class="table table-hover">
        <thead>
        @if(count($studies))
                <th scope="col">Name</th>
                <th scope="col">Count of Participate</th>
        </thead>
        <tbody>
        @foreach($studies as $study)
            <tr>
                <td>
                    <p>{{$study->study_name}}</p><br>
                </td>
                <td>
                    <p>{{$study->patient_Count}}</p>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <th>You dont have studies! add study!</th>
            </tr>
            <tr>
                <td><a href="{{ url('/studySpecificdb/create') }}"><button class="btn btn-success" type="submit">Create new study-specific</button></a></td>
            </tr>
        @endif
        <tr>
            <td><a href="{{ url('/studySpecificdb/create') }}"><button class="btn btn-success" type="submit">Create new study-specific</button></a></td>
            <td></td>
        </tr>
        </tbody>
    </table>
@endsection
