@extends('MasterLayout')

@section('content')
    <div>
        <h3>Please fill in the belows to start creating an Pre-Study Screening Form</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <p>There are a few criteria that didn't fill in. Please fill in all the criteria</p>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
            {!! Form::text('NRIC', '',['class'=>'form-control', 'placeholder'=>'e.g. 110101135227']) !!}
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
                {!! Form::label('Gender', 'Gender:') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Gender', 'Male','',['id'=>'Male']) !!}
                {!! Form::label('Male', 'Male') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Gender', 'Female','',['id'=>'Female']) !!}
                {!! Form::label('Female', 'Female') !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('race', 'Ethnicity:') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Ethnicity', 'Chinese','',['id'=>'Chinese']) !!}
                {!! Form::label('Chinese', 'Chinese') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Ethnicity', 'Malay','',['id'=>'Malay']) !!}
                {!! Form::label('Malay', 'Malay') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Ethnicity', 'Indian','',['id'=>'Indian']) !!}
                {!! Form::label('Indian', 'Indian') !!}
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::radio('Ethnicity', 'Others','',['id'=>'otherRaces']) !!}
                        {!! Form::label('otherRaces', 'Others') !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::text('Ethnic_Text','',['class'=>'form-control','placeholder'=>'Please specify']) !!}
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
            {!! Form::radio('maritalstatus', 'Single','',['id'=>'Single']) !!}
            {!! Form::label('Single', 'Single') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('maritalstatus', 'Married','',['id'=>'Married']) !!}
            {!! Form::label('Married', 'Married') !!}
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
