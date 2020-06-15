@extends('MasterLayout')

@section('content')


    <div class="container-fluid">
        <h3>Please fill in the belows to start creating an Pre-Study Screening Form</h3>
        <h3>General Consent</h3>
        <hr>
        {!! Form::open(['route'=>'preScreening.store']) !!}
        @csrf
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
            <div class="col-md-2">
            {!! Form::label('NRIC', 'Please Fill In Your NRIC: ') !!}
            </div>
            <div class="col-md-3">
            {!! Form::text('NRIC', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            {!! Form::label('name', 'Please Fill In Your Name: ') !!}
            </div>
            <div class="col-md-3">
            {!! Form::text('name','',['class'=>'form-control']) !!}
            </div>
        </div>
        {{-- subject demographics --}}
        <h3>Subject Demographics</h3>
        <hr>
        <div class="form-group row">
            <div class="col-md-2">
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
            <div class="col-md-2">
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
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::radio('Ethnicity', 'Others') !!}
                        {!! Form::label('otherRaces', 'Others') !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::text('Others', old('Others'),['class'=>'form-control','placeholder'=>'Please specify']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('dateOfBirth', 'Date of Birth: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('DoB', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('age', 'Age: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::number('age', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
        <div class="col-md-2">
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
        <div class="col-md-2">
        {!! Form::label('MRNno', 'MRN Hopsital Registration Number: ') !!}
        </div>
        <div class="col-md-3">
        {!! Form::text('MRNno', '',['class'=>'form-control']) !!}
        </div>
    </div>
    <br>
        {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}
    </div>
@endsection
