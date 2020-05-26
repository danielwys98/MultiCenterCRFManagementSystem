@extends('MasterLayout')

@section('content')
    <h3>Please fill in the belows to start creating an Pre-Studing Screening Form</h3>

    <div class="container-fluid">
        <h4>General Consent</h4>
        {!! Form::open(['route'=>'preScreening.store']) !!}
        @csrf
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-md-4">
            {!! Form::label('NRIC', 'Please Fill In Your NRIC: ') !!}
            {!! Form::text('NRIC', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
            {!! Form::label('name', 'Please Fill In Your Name: ') !!}
            {!! Form::text('name','',['class'=>'form-control']) !!}
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
                        {!! Form::label('otherRaces', 'Others') !!}
                        {!! Form::text('Others', old('Others'),['class'=>'form-control','placeholder'=>'Please specify']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('dateOfBirth', 'Date of Birth: ') !!}
            </div>
            <div class="col-md-4">
                {!! Form::date('DoB', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('age', 'Age: ') !!}
            </div>
            <div class="col-md-4">
                {!! Form::number('age', '',['class'=>'form-control']) !!}
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
        {!! Form::text('MRNno', '',['class'=>'form-control']) !!}
        </div>
    </div>
    <br>
        {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}

@endsection
