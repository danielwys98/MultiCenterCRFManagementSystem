@extends('MasterLayout')

@section('content')
{!! Form::open() !!}
<h3>Safety Follow Up Questionnaire</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('FollowUpDateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('FollowUpDateTaken',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('AdmissionTimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-6">
    </div>
    <div class="col-md-1">
        <p class="font-weight-bold">Yes</p>
    </div>
    <div class="col-md-1">
        <p class="font-weight-bold">No</p>
    </div>
</div>
<hr>
{{--Question 1--}}
<div class="row">
    <div class="col-md-6">
        <p>1. Has the subject had any unresolved or newly onset medical problem(s) since the last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('MedicalProblem', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('MedicalProblem', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <p>If “Yes”, record in <strong>Adverse Event and Concomitant Medication Log</strong>.</p>
    </div>
</div>
<hr>
{{--Question 2--}}
<div class="row">
    <div class="col-sm-6">
        <p>2. Has the subject taken any medication (including herbal remedies, with the exception of birth control
            medications) since the last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Medication', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Medication', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “Yes”, record in <strong>Adverse Event and Concomitant Medication Log</strong>.</p>
    </div>
</div>
<hr>
{{--Question 3--}}
<div class="row">
    <div class="col-sm-6">
        <p>3. Has the subject been hospitalized sine the last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Hospitalized', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Hospitalized', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “Yes”, record in <strong>Adverse Event and Concomitant Medication Log</strong>.</p>
    </div>
</div>
<hr>
{{--Question 4--}}
<div class="row">
    <div class="col-sm-6">
        <p>7. Has the subject participated in other experimental drug studies or blood donation since last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('otherDrugStudies', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('otherDrugStudies', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “Yes”, provide details</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('otherDrugStudies_Yes', '',['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{--End of Questions--}}

<div class="row">
    <div class="col-md-2">
        {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('PhysicianInitial','',['class'=>'form-control']) !!}
    </div>
</div>

<h4>Comments</h4>
<div class="row">
    <div class="col-md-2">
        {!! Form::radio('Comment', 'Well','',['id'=>'Well']) !!}
    </div>
    <div class="col-10">
        {!! Form::label('Well', "The subject's follow up indicated that the subject is well and do not require further medical attention.") !!}
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        {!! Form::radio('Comment', 'Unsolved','',['id'=>'Unsolved']) !!}
    </div>
    <div class="col-10">
        {!! Form::label('Unsolved', "Baseline and/or adverse event(s) not resolved. Provide details") !!}
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {!! Form::textarea('Comment_text','',['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::text('physicianSign',old("physicianSign",$DQuestionnaire->PhysicianSign),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
        {!! Form::text('physicianName',old("physicianName",$DQuestionnaire->PhysicianName),['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        {!! Form::date('FollowUpDateTaken',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>

{!! Form::close() !!}
@endsection
