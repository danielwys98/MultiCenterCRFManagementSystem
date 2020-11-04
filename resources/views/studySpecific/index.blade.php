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
                <tr>
                <th scope="col" class="col-md-5">Name</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
                </thead>
        <tbody>
        @foreach($studies as $study)
            <tr>
                <td>
                    {{$study->study_name}}
                </td>
                <td>
                    <a href="{{route('studySpecific.edit',$study->study_id)}}"><button class="btn btn-outline-primary col-md-2 float-left">{{--<i class="fas fa-user-edit"></i>--}}Update</button></a>
                    <form action="{{route('studySpecific.destroy',$study->study_id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('Are you sure to delete this study?')" class="btn btn-outline-danger col-md-2"><i class="fas fa-trash"></i></button>
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
