@extends('MasterLayout')

@section('content')
    <div class="container">
        <h1>This is the Pre-screening Page</h1>

        <h3>Please fill in the belows to start creating an Pre-Studing Screening Form</h3>
        {!! Form::open(['url' => 'foo/bar']) !!}
        <div class="form-group row">
        {!! Form::label('NRIC', 'Please Fill In Your NRIC: ') !!}
        {!! Form::number('NRIC', '',['class'=>'form-control']) !!}
        </div>
        <div class="form-group row">
        {!! Form::label('MRNno', 'MRN Hopsital Registration Number: ') !!}
        {!! Form::number('MRNno', '',['class'=>'form-control']) !!}
        </div>
        {{-- {!! Form::submit('Create',['class'=>'btn btn-primary'])!!} --}}
        {!! Form::close() !!}
        <a href="/preScreeningForm"><button type="button" class="btn btn-danger">Create</button></a>
    </div>
@endsection
