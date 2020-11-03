{!! Form::model($DQuestionnaire,['route' => ['sp_DQuestionnaire.update',$patient->id,$study_id]]) !!}
@method('PUT')
@csrf
<h3>Discharge Questionnaire</h3>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('time', 'Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken',old("timeTaken",$DQuestionnaire->timeTaken),['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-5">
    </div>
    <div class="col-md-1 font-weight-bold">
        Yes
    </div>
    <div class="col-md-1 font-weight-bold">
        No
    </div>
</div>
<div class="form-group row">
    <div class="col-md-5">
        <p>1. Is the subject oriented and has steady gait?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Oriented', 'Yes',(($DQuestionnaire->Oriented)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Oriented', 'No',(($DQuestionnaire->Oriented)=='No')? 'checked' : '') !!}</p>
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-5">
        <p>2. Is the subject fit for discharge?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('ReadyDischarge', 'Yes',(($DQuestionnaire->ReadyDischarge)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('ReadyDischarge', 'No',(($DQuestionnaire->ReadyDischarge)=='Yes')? 'checked' : '') !!}</p>
    </div>
</div>
<hr>

<div class="row col">
    <p>The answers for all the statements above should be “Yes” before a subject is recommended for discharge. The
        attending physician is required to exercise his clinical judgement. The above criteria serve as a minimal guide
        only.</p>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::label('Remarks', 'Additional Remarks (where applicable)') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {!! Form::textarea('Remarks',old("Remarks",$DQuestionnaire->Remarks),['class'=>'form-control']) !!}
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

{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
