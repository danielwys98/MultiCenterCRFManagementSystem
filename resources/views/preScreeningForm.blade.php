@extends('MasterLayout')

@section('content')
   <h2>Visit 1: Pre-Study Screening</h2>
   <hr>

    {!! Form::open(['url' => 'foo/bar']) !!}

    <div class="form-group">
        <h3>General Consent</h3>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <h3>Subject Demographics</h3>
        <table class="table col-sm-9">
            <tr>
                <td>{!! Form::label('Gender', 'Gender:') !!}</td>
                <td>
                    {!! Form::label('GenderM', 'Male') !!}
                    {!! Form::radio('GenderM', 'Male') !!}
                    {!! Form::label('GenderF', 'Female') !!}
                    {!! Form::radio('GenderF', 'Female') !!}
                </td>
            </tr>
            <tr>
                <td>{!! Form::label('Ethnicity', 'Ethnicity:') !!}</td>
                <td>
                    {!! Form::radio('Ethnicity-C', 'Chinese') !!}
                    {!! Form::label('Ethnicity-C', 'Chinese') !!}
                    
                    {!! Form::radio('Ethnicity-M', 'Malay') !!}
                    {!! Form::label('Ethnicity-M', 'Malay') !!}

                    {!! Form::radio('Ethnicity-I', 'Indian') !!}
                    {!! Form::label('Ethnicity-I', 'Indian') !!}

                    {!! Form::radio('Ethnicity-O', 'Others') !!}
                    {!! Form::label('Ethnicity-O', 'Others') !!}
                    {!! Form::text('Ethnicity-O', '') !!}
                </td>
            </tr>
            <tr>
                <td>{!! Form::label('DoB', 'Date of Birth: ') !!}</td>
                <td>{!! Form::date('DoB', \Carbon\Carbon::now()) !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('age', 'Age: ') !!}</td>
                <td>{!! Form::number('age', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('maritalstatus', 'Marital Status:') !!}</td>
                <td>
                    {!! Form::label('maritalstatusS', 'Single') !!}
                    {!! Form::radio('maritalstatusS', 'Single') !!}
                
                    {!! Form::label('maritalstatusM', 'Married') !!}
                    {!! Form::radio('maritalstatusM', 'Married') !!}
                </td>
            </tr>
        </table>
    </div>
    <div class="form-group">
        <h3>Body Measurements and Vital Signs</h3>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
        </div>
        <table class="table col-sm-9">
            <tr>
                <td>{!! Form::label('weight', 'Weight: ') !!}</td>
                <td>kg</td>
                <td>{!! Form::number('weight', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('height', 'Height: ') !!}</td>
                <td>cm</td>
                <td>{!! Form::number('height', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('bmi', 'Body Mass Index: ') !!}</td>
                <td>kg/m2</td>
                <td>{!! Form::number('bmi', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('temperature', 'Temperature: ') !!}</td>
                <td>°C</td>
                <td>{!! Form::number('temperature', '') !!}</td>
            </tr>
        </table>
    </div>

    {!! Form::close() !!}
    
    
@endsection