@extends('MasterLayout')

@section('content')


    <div class="container-fluid">
        <h3>Edit {{$study->study_name}}'s Details</h3>
        <hr>
        {!! Form::model($study,['route' => ['studySpecific.update',$study->study_id]]) !!}
        @method('PUT')
        @csrf
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('dateTaken', old('dateTaken',$study->dateTaken),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::time('timeTaken', old('timeTaken',$study->timeTaken),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('study_name', 'Please Enter the study name: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('study_name', old('study_name',$study->study_name),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('patient_Count', 'Please add in the number of participant ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::number('patient_Count',old('patient_Count',$study->patient_Count),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('studyPeriod_Count', 'Please add in the number of Study Periods ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::number('studyPeriod_Count',old('studyPeriod_Count',$study->studyPeriod_Count),['class'=>'form-control']) !!}
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
                {!! Form::text('MRNno',old('MRNno',$study->MRNno),['class'=>'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}
        <br>
        <hr/>
        {{--new forms to select the subject and view their study periods details--}}
        {!! Form::open(['route' => ['SubjectStudySpecific.edit',$study->study_id]]) !!}
        <div class="form-group row">
            <div class="col-md-2">
                <div>
                    {!! Form::label('SubjectName', 'Subject that enrolled into the study') !!}
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        {!! Form::submit('View subject study period details',['class'=>'btn btn-success'])!!}
        {!! Form::close() !!}
    </div>
@endsection
