@extends('MasterLayout')

@section('content')
    <h1>Currently undergoing studies</h1>
        @foreach($studies as $s)
           <div class="card-columns-fluid" id="dashboard">
                <div class="card-header">
                    <p class="card-title"><a href={{ url('studySpecific/input/'.$s->study_id) }}>{{$s->study_name}}</a></p>
                </div>
                <div class="card-body">
                            <p class="card-text">Has {{$s->studyPeriod_Count}} Study Periods</p>
                            <p class="card-text">Start Date: {{$s->startDate}}</p>
                            <p class="card-text">End Date: {{$s->endDate}}</p>
                </div>
             </div>
        @endforeach
@endsection
