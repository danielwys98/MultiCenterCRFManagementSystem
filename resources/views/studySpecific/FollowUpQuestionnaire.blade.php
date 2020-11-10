@extends('MasterLayout')

@section('content')
    {!! Form::model($followUpQ,['route'=>['updateFollowUpQ',$PID,$study_id]]) !!}
    <div class="col-md-2">
        {!! Form::submit('Generate Report',['class'=>'btn btn-success','onclick'=>'are you sure?','name'=>'submitbutton'])!!}
        {{--<button name="test" value="test"><a href="{{route('testing')}}"></a> Follow Up Questionnaire</button>--}}
    </div>
<h3>Safety Follow Up Questionnaire for </h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('FollowUpDateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('FollowUpDateTaken',old('FollowUpDateTaken',$followUpQ->FollowUpDateTaken),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('AdmissionTimeTaken', old('AdmissionTimeTaken',$followUpQ->AdmissionTimeTaken),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('MedicalProblem', 'Yes',(old('MedicalProblem',$followUpQ->MedicalProblem)=='Yes')?'checked':'') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('MedicalProblem', 'No',(old('MedicalProblem',$followUpQ->MedicalProblem)!='Yes'&& $followUpQ->MedicalProblem!=NULL)?'checked':'') !!}</p>
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
        <p>{!! Form::radio('Medication', 'Yes',(old('Medication',$followUpQ->Medication)=='Yes')?'checked':'') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Medication', 'No',(old('Medication',$followUpQ->Medication)!='Yes'&& $followUpQ->Medication!=NULL)?'checked':'') !!}</p>
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
        <p>{!! Form::radio('Hospitalized', 'Yes',(old('Hospitalized',$followUpQ->Hospitalized)=='Yes')?'checked':'') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Hospitalized', 'No',(old('Hospitalized',$followUpQ->Hospitalized)!='Yes'&& $followUpQ->Hospitalized!=NULL)?'checked':'') !!}</p>
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
        <p>{!! Form::radio('otherdrugdtudies', 'Yes',(old('otherDrugStudies',$followUpQ->otherDrugStudies)!='No' && $followUpQ->otherDrugStudies!=NULL)?'checked':'') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('otherdrugstudies', 'No',(old('otherDrugStudies',$followUpQ->otherDrugStudies)=='No')?'checked':'') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>If “Yes”, provide details</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('otherDrugStudies_Yes',(old('otherDrugStudies',$followUpQ->otherDrugStudies)!='No' && $followUpQ->otherDrugStudies!=NULL)?$followUpQ->otherDrugStudies:'',['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{--End of Questions--}}

<div class="row">
    <div class="col-md-6">

    </div>
    <div class="col-md-2">
        {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('PhysicianInitial',old('PhysicianInitial',$followUpQ->PhysicianInitial),['class'=>'form-control']) !!}
    </div>
</div>
<hr>
<h4>Comments: </h4>
<div class="row">
    <div class="col-md-1">
        {!! Form::radio('comment', 'Well',(old('Comment',$followUpQ->Comment)=='Well')?'checked':'',['id'=>'Well']) !!}
    </div>
    <div class="col-md-10">
        {!! Form::label('Well', "The subject's follow up indicated that the subject is well and do not require further medical attention.") !!}
    </div>
</div>
<div class="row">
    <div class="col-md-1">
        {!! Form::radio('comment', 'Unsolved',(old('Comment',$followUpQ->Comment)!='Well'&& $followUpQ->Comment!=NULL)?'checked':'',['id'=>'Unsolved']) !!}
    </div>
    <div class="col-10">
        {!! Form::label('Unsolved', "Baseline and/or adverse event(s) not resolved. Provide details") !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        {!! Form::textarea('Comment_text',(old('Comment',$followUpQ->Comment)!='Well' && $followUpQ->Comment!=NULL)?$followUpQ->Comment:'',['class'=>'form-control','rows'=>'3']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::text('physicianSign',old('physicianSign',$followUpQ->physicianSign),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
        {!! Form::text('physicianName',old('physicianName',$followUpQ->physicianName),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::date('DateSign',old('DateSign',$followUpQ->DateSign),['class'=>'form-control']) !!}
    </div>
</div>
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection
