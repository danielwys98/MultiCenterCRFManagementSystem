@extends('MasterLayout')

@section('content')
    <h3>Edit Subject Details</h3>
    <div class="container-fluid">
        <h4>General Consent</h4>
        {!! Form::model($patient,['route' => ['preScreening.update',$patient->id]]) !!}
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('dateTaken', old('dateTaken'),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('timeTaken', old('timeTaken'),['class'=>'form-control']) !!}
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-md-4">
        {!! Form::label('NRIC', 'Please Fill In Your NRIC: ') !!}
        {!! Form::number('NRIC',old('NRIC'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
            {!! Form::label('name', 'Please Fill In Your Name: ') !!}
            {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
        </div>
        {{-- subject demographics --}}
        <h3>Subject Demographics</h3>
        <hr>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('sex', 'Gender:') !!}
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
                {!! Form::label('race', 'Ethnicity:') !!}
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
            <div class="offset-4 col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::radio('Ethnicity', 'Others') !!}
                        {!! Form::label('Others', 'Others') !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('Others', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('dateOfBirth', 'Date of Birth: ') !!}
            </div>
            <div class="col-md-4">
                {!! Form::date('DoB', old('DoB'),['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('age', 'Age: ') !!}
            </div>
            <div class="col-md-4">
                {!! Form::number('age', old('age'),['class'=>'form-control']) !!}
            </div>
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

    <div class="form-group row">
        <div class="col-md-4">
        {!! Form::label('MRNno', 'MRN Hopsital Registration Number: ') !!}
        {!! Form::number('MRNno', old('MRNno'),['class'=>'form-control']) !!}
        </div>
    </div>
        {!! Form::close() !!}

@endsection
