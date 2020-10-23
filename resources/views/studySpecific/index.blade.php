@extends('MasterLayout')

@section('content')
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
    <h1>This is the Study Specific Database Page</h1>

        @if(count($studies))
        <table class="table table-hover">
                <thead>
                <th scope="col">Name</th>
                <th scope="col">Count of Participate</th>
                <th scope="col">Count of Study Specific Period</th>
                <th>Actions</th>
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
                <td>
                    <p>{{$study->studyPeriod_Count}}</p>
                </td>
                <td>
                    <button class="btn btn-outline-primary float-md-left"><a href="{{route('studySpecific.edit',$study->study_id)}}"><i class="fas fa-user-edit"></i></a></button>
                    <form action="{{route('studySpecific.destroy',$study->study_id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-outline-danger float-md-right"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        @else
                <h1>You dont have studies! add study!</h1>
        @endif
            <td><a href="{{ route('studySpecific.create') }}"><button class="btn btn-success" type="submit">Create new study-specific</button></a></td>

@endsection
