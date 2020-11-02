@extends('MasterLayout')

@section('content')

{!! Form::open(['route' => ['testPost',$study->study_id]]) !!}
@CSRF
{{-- admission --}}
<h3>Admission</h3>
    <div class="row">
        <div class="col-md-1">
        <h4> {!! Form::label('studyPeriod', 'Study Period') !!}</h4>
        </div>
        <div class="col-md-1">
         <h4>{!! Form::select('studyPeriod',$studyPeriod,null) !!}</h4>
        </div>
    </div>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('AdmissionDateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('AdmissionDateTaken',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('AdmissionTimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>

{{-- consent --}}
<h3>Study-Specific Consent Taken</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('ConsentDateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('ConsentDateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('ConsentTimeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('ConsentTimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}

@endsection
