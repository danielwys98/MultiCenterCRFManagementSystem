@extends('MasterLayout')

@section('content')

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
    <div class="container-fluid">
        <h3>Edit <strong>{{$study->study_name}}</strong>'s Details</h3>
        <hr>
        {!! Form::model($study,['route' => ['studySpecific.update',$study->study_id]]) !!}
        @method('PUT')
        @csrf
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('startDate', 'Start Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('startDate', old('startDate',$study->startDate),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('endDate', 'End Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('endDate', old('endDate',$study->endDate),['class'=>'form-control']) !!}
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
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('protocolNo', 'Protocol NO: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('protocolNo',old('protocolNO',$study->protocolNo),['class'=>'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}
        <br>
        <h3>View Subjects' study period details for {{$study->study_name}}</h3>
        <hr/>
        {{--new forms to select the subject and view their study periods details--}}
        {!! Form::open(['route' => ['SubjectStudySpecific.edit',$study->study_id]]) !!}
        <div class="form-group row">
            <div class="col-md-2">
                <div>
                    @if($oriPatientName != NULL)
                    {!! Form::label('SubjectName', 'Subject that enrolled into the study') !!}
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                    @else
                        {!! Form::label('SubjectName', 'Subject that enrolled into the study') !!}
                        {!! Form::select('patient_id',['---'],null,['class'=>'form-control']) !!}
                    @endif
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    @if($oriPatientName != NULL)
                        {!! Form::label('Study Period', 'Study Period') !!}
                        {!! Form::select('study_period',$studyPeriod,null,['class'=>'form-control']) !!}
                    @else
                        {!! Form::label('Study Period', 'Study Period') !!}
                        {!! Form::select('study_period',['---'],null,['class'=>'form-control']) !!}
                    @endif
                </div>
            </div>
        </div>

        {!! Form::submit('View subject study period details',['class'=>'btn btn-success','onclick'=>'are you sure?'])!!}
        {!! Form::close() !!}
        <br>
        <br>
        {!! Form::open(['route' => ['subject.removePSS',$study->study_id],'onsubmit' => 'return confirm("Are you sure?")']) !!}
        <div class="form-group row">
            <div class="col-md-2">
                <div>
                    @if($oriPatientName != NULL)
                        {!! Form::label('SubjectName', 'Subject that enrolled into the study') !!}
                        {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                    @else
                        {!! Form::label('SubjectName', 'Subject that enrolled into the study') !!}
                        {!! Form::select('patient_id',['---'],null,['class'=>'form-control']) !!}
                    @endif
                </div>
            </div>
        </div>
        {!! Form::submit('Remove subject from study',['class'=>'btn btn-danger'])!!}
        {!! Form::close() !!}
    </div>
@endsection
