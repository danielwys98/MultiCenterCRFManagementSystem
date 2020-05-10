@extends('MasterLayout')

@section('content')
    <h1>This is the Pre-screening Form Page</h1>

    <div class="form-group">
        <div class="col-sm-6">
        {!! Form::open(['route' => 'foo/bar']) !!}

        {!! Form::label('dateTaken', 'Date Taken: ') !!}
        {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}

        {!! Form::label('timeTaken', 'Time Taken: ') !!}
        {!! Form::time('timeTaken', \Carbon\Carbon::now()) !!}
        
        {!! Form::close() !!}
        </div>
    </div>
    
@endsection