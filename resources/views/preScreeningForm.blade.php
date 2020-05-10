@extends('MasterLayout')

@section('content')
   <h2>Visit 1: Pre-Study Screening</h2>
   <hr>

    {!! Form::open(['url' => 'foo/bar']) !!}

    <div class="form-group">
        <h3>General Consent</h3>
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
        {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
        
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
    </div>

    <div class="form-group">
        <h3>Subject Demographics</h3>
        <div class="form-group">
        {!! Form::label('Gender', 'Gender:') !!}

        {!! Form::label('GenderM', 'Male') !!}
        {!! Form::checkbox('GenderM', 'Male') !!}
    
        {!! Form::label('GenderF', 'Female') !!}
        {!! Form::checkbox('GenderF', 'Female') !!}
        </div>
        <div class="form-group">
        {!! Form::label('Ethnicity', 'Ethnicity:') !!}

        {!! Form::label('Ethnicity-C', 'Chinese') !!}
        {!! Form::radio('Ethnicity-C', 'Chinese') !!}
    
        {!! Form::label('Ethnicity-M', 'Malay') !!}
        {!! Form::radio('Ethnicity-M', 'Malay') !!}

        {!! Form::label('Ethnicity-I', 'Indian') !!}
        {!! Form::radio('Ethnicity-I', 'Indian') !!}

        {!! Form::label('Ethnicity-O', 'Others') !!}
        {!! Form::text('Ethnicity-O', '') !!}
        </div>
        <div class="form-group">
            {!! Form::label('DoB', 'Date of Birth: ') !!}
            {!! Form::date('DoB', \Carbon\Carbon::now()) !!}
        </div>
        <div class="form-group">
            {!! Form::label('age', 'Age: ') !!}
            {!! Form::number('age', '') !!}
        </div>
        <div class="form-group">
            {!! Form::label('maritalstatus', 'Marital Status:') !!}
    
            {!! Form::label('maritalstatusS', 'Single') !!}
            {!! Form::checkbox('maritalstatusS', 'Single') !!}
        
            {!! Form::label('maritalstatusM', 'Married') !!}
            {!! Form::checkbox('maritalstatusM', 'Married') !!}
        </div>
    </div>
    <div class="form-group">
        <h3>Body Measurements and Vital Signs</h3>
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
        {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
        
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}

        <div class="form-group">
            {!! Form::label('weight', 'Weight: ') !!}
            kg
            {!! Form::number('weight', '') !!}
        </div>
        <div class="form-group">
            {!! Form::label('height', 'Height: ') !!}
            cm
            {!! Form::number('height', '') !!}
        </div>
        <div class="form-group">
            {!! Form::label('bmi', 'Body Mass Index: ') !!}
            kg/m2
            {!! Form::number('bmi', '') !!}
        </div>
        <div class="form-group">
            {!! Form::label('temperature', 'Temperature: ') !!}
            °C
            {!! Form::number('temperature', '') !!}
        </div>
    </div>

    {!! Form::close() !!}
    
    
@endsection