 @extends('MasterLayout')

@section('content')


    <div class="container-fluid">
        <h3>Please fill in the belows to start creating a Study-Specific</h3>
        <hr>
        {!! Form::open(['route'=>'studySpecific.store']) !!}
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
                {!! Form::label('study_name', 'Please Enter the study name: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('study_name', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('patient_Count', 'Please add in the number of participant ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::number('patient_Count',"",['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('studyPeriod_Count', 'Please add in the number of Study Periods ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::number('studyPeriod_Count',"",['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <p><strong>Name:   </strong>{{Auth::user()->name}}</p>
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
