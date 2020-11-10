<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>
</head>
<style>
    .page-break {
        page-break-after: always;
    }
</style>
<body>
<h3>{{$patient->name}}'s Safety Follow Up Questionnaire for {{$study->study_name}}</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('FollowUpDateTaken', 'Date Taken: ') !!}
        {!! Form::label('FollowUpDateTaken',$followUpQ->FollowUpDateTaken,['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
        {!! Form::label('AdmissionTimeTaken', $followUpQ->AdmissionTimeTaken,['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{--Question 1--}}
<div class="row">
    <div class="col-md-6">
        <p>1. Has the subject had any unresolved or newly onset medical problem(s) since the last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::label('MedicalProblem',$followUpQ->MedicalProblem) !!}</p>
    </div>
</div>
<div class="row">
        <p>If “Yes”, record in <strong>Adverse Event and Concomitant Medication Log</strong>.</p>
</div>
<hr>
{{--Question 2--}}
<div class="row">
    <div class="col-sm-6">
        <p>2. Has the subject taken any medication (including herbal remedies, with the exception of birth control
            medications) since the last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::label('Medication',$followUpQ->Medication) !!}</p>
    </div>
</div>
<div class="row">
        <p>If “Yes”, record in <strong>Adverse Event and Concomitant Medication Log</strong>.</p>
</div>
<hr>
{{--Question 3--}}
<div class="row">
    <div class="col-sm-6">
        <p>3. Has the subject been hospitalized sine the last review?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::label('Hospitalized',$followUpQ->Hospitalized) !!}</p>
    </div>
</div>
<div class="row">
        <p>If “Yes”, record in <strong>Adverse Event and Concomitant Medication Log</strong>.</p>
</div>
<hr>
{{--Question 4--}}
<div class="row">
    <div class="col-sm-6">
        <p>7. Has the subject participated in other experimental drug studies or blood donation since last review?</p>
    </div>
    @if($followUpQ->otherDrugStudies=="No")
    <div class="col-md-1">
        <p>{!! Form::label('otherDrugStudies',$followUpQ->otherDrugStudies) !!}</p>
    </div>
        @else
        <div class="col-md-1">
            <p>{!! Form::label('otherDrugStudies','Yes, '.$followUpQ->otherDrugStudies) !!}</p>
        </div>
        @endif
</div>
<hr>
{{--End of Questions--}}

<div class="row">
    <div class="col-md-6">

    </div>
    <div class="col-md-2">
        {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
        {!! Form::label('PhysicianInitial',$followUpQ->PhysicianInitial) !!}
    </div>
</div>
<hr>
<h4>Comments: </h4>
<div class="row">
    @if($followUpQ->Comment=="well")
    <div class="col-md-1">
        {!! Form::label('Well', "The subject's follow up indicated that the subject is well and do not require further medical attention.") !!}
    </div>
    @else
    <div>
        {!! Form::label('Unsolved', "Baseline and/or adverse event(s) not resolved. Provide details: ".$followUpQ->Comment) !!}
    </div>
    @endif
</div>
<hr>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::label('physicianSign',$followUpQ->physicianSign) !!}
    </div>
</div>
<br>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
        {!! Form::label('physicianName',$followUpQ->physicianName) !!}
    </div>
</div>
<br>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('DateSign',$followUpQ->DateSign) !!}
    </div>
</div>
</body>
