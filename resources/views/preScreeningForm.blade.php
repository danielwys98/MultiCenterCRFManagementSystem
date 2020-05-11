@extends('MasterLayout')

@section('content')
    <h2>Visit 1: Pre-Study Screening</h2>
    <hr>

    {!! Form::open(['url' => 'foo/bar']) !!}


    <h3>General Consent</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>

    <h3>Subject Demographics</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Gender', 'Gender:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Gender', 'Male') !!}
            {!! Form::label('Male', 'Male') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Gender', 'Female') !!}
            {!! Form::label('Female', 'Female') !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Ethnicity', 'Ethnicity:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Ethnicity', 'Chinese') !!}
            {!! Form::label('Chinese', 'Chinese') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Ethnicity', 'Malay') !!}
            {!! Form::label('Malay', 'Malay') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Ethnicity', 'Indian') !!}
            {!! Form::label('Indian', 'Indian') !!}
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-3">
            {!! Form::radio('Ethnicity', 'Others') !!}
            {!! Form::label('Others', 'Others') !!}
                </div>
                <div class="col-md-5">
            {!! Form::text('Others', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('DoB', 'Date of Birth: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('DoB', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('age', 'Age: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::number('age', '',['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('maritalstatus', 'Marital Status:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('maritalstatus', 'Single') !!}
            {!! Form::label('maritalstatusS', 'Single') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('maritalstatus', 'Married') !!}
            {!! Form::label('maritalstatusM', 'Married') !!}
        </div>
    </div>

    <h3>Body Measurements and Vital Signs</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('weight', 'Weight: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('weight', '', ['class'=>'form-control','placeholder'=>'kg']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('height', 'Height: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('height', '', ['class'=> 'form-control','placeholder'=>'cm']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('bmi', 'Body Mass Index: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('bmi', '',['class'=>'form-control','placeholder'=>'kg/m2']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('temperature', 'Temperature: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('temperature', '',['class'=>'form-control','placeholder'=>'°C']) !!}
        </div>
    </div>

    {!! Form::close() !!}


@endsection
