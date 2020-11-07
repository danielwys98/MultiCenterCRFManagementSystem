{!! Form::open(['route' => ['sp_DQuestionnaire.store',$study->study_id]]) !!}
@csrf
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasRole('Admin'))
            <div class="row">
                <div class="col-md-2">
                    <h4>{!! Form::label('SubjectName', 'Subject: ') !!}</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('Admin view of name', 'Subject: ') !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('patient_id',$newName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <h4> {!! Form::label('studyPeriod', 'Study Period: ') !!}</h4>
            </div>
            <div class="col-md-3">
                <h4>{!! Form::select('studyPeriod',$studyPeriod,null,['class'=>'form-control']) !!}</h4>
            </div>
        </div>
    </div>
</div>
<h3>Discharge Questionnaire</h3>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('DQtimeTaken', 'Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('DQtimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Oriented', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Oriented', 'No') !!}</p>
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-5">
        <p>2. Is the subject fit for discharge?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('ReadyDischarge', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('ReadyDischarge', 'No') !!}</p>
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
        {!! Form::label('AdditionalRemarks', 'Additional Remarks (where applicable)') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {!! Form::textarea('AdditionalRemarks', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('PhysicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::text('PhysicianSign', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('PhysicianName', 'Name (Printed) : ') !!}
        {!! Form::text('PhysicianName', '',['class'=>'form-control']) !!}
    </div>
</div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
