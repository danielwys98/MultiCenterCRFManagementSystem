@extends('MasterLayout')

@section('content')
    <h1>Dashboard</h1>

    <div class="card">
        <div class="card-title">
            <p>Currently undergoing studies</p>
        </div>
        <div class="card-body">
            @foreach($studies as $s)
                    <a href={{ url('studySpecific/input/'.$s->study_id) }}>{{$s->study_name}},</a>
            @endforeach
        </div>
    </div><br/>
    @can('adminFunctions')
   {{--     <a href="{{ route('test.PDF') }}"><button class="btn btn-success" type="submit">test</button></a>
        <a href="{{ url('/downloadPDF/preScreening') }}"><button class="btn btn-success" type="submit">test preScreening report</button></a>--}}
    @endcan

@endsection
