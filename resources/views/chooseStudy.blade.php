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
    <h1>Choose Studies to add details</h1>

    @if(count($studies))
        <table class="table table-hover">
            <thead>
            <th scope="col">Name</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($studies as $study)
                <tr>
                    <td>
                        <p>{{$study->study_name}}</p><br>
                    </td>
                    <td>
                        <a href="{{route('studySpecific.input',$study->study_id) }}"><button class="btn btn-outline-success float-md-left">{{--<i class="fas fa-user-edit"></i>--}}Go</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1>You dont have studies! add study!</h1>
    @endif

@endsection
