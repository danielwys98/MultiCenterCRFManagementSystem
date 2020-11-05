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
        <table class="table table-bordered">
                <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col" class="col-md-2">Start Date</th>
                <th scope="col" class="col-md-2">End Date</th>
                <th scope="col" class="col-md-2">Actions</th>
                </tr>
                </thead>
        <tbody>
        @foreach($studies as $study)
            <tr>
                <td>
                    {{$study->study_name}}
                </td>
                <td>{{$study->startDate}}</td>
                <td>{{$study->endDate}}</td>
                <td>
                    <a href="{{route('studySpecific.edit',$study->study_id)}}"><button class="btn btn-outline-primary col-md-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>  Edit</button></a>
                    <form action="{{route('studySpecific.destroy',$study->study_id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('Are you sure to delete this study?')" class="btn btn-outline-danger col-md-4"><i class="fas fa-trash"></i>  Delete</button>
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
