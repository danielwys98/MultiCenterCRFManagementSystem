{!! Form::model($Conclu,['route' => ['update.conclusion',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    <h3>Conclusion</h3>
    <div class="row">
        <div class="col-sm-6">
            <p>Does the subject fulfill all the inclusion criteria and none of the exclusion criteria?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::label('Yes', 'Yes') !!}</p>
            <p>{!! Form::radio('inclusionyesno','Yes',(($Conclu->inclusionYesNo)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::label('No', 'No') !!}</p>
            <p>{!! Form::radio('inclusionyesno','No',(($Conclu->inclusionYesNo)!='Yes')? 'checked' : '') !!}</p>
        </div>
    </div>
    <p>If “Yes”, enroll the subject into the study.</p>
    <p>If “No”, provide details. The subject may or may not be enrolled into the study, based on the
        discretion of the research physician.</p>
    {!! Form::text('NoDetails',(($Conclu->inclusionyesno)!='Yes')? $Conclu->inclusionYesNo : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}<br/>
    <div>
        {!! Form::checkbox('NAbnormality ', 'NAbnormality ') !!}
        {!! Form::label('NAbnormality', 'The abnormality (ies) not clinically significant, this subject can be enrolled into this study and is safe to receive ……………………………, the study medication. ') !!}
        {!! Form::select('study', $studies, null, ['class' => 'form-control']) !!}
    </div>
    <div>
        {!! Form::checkbox('abnormality ', 'abnormality ') !!}
        {!! Form::label('abnormality', 'Clinically significant abnormality (ies), this subject cannot be enrolled into this study.') !!}
    </div>
</div>
<div class="form-group">
    <h3>Pre-study Screening Signature</h3>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('physicianSign', 'Physician’s Signature: ') !!}
            {!! Form::text('physicianSign', old('physicianSign'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('physicianName', 'Name (Printed) : ') !!}
            {!! Form::text('physicianName', old('physicianName'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::date('dateTaken') !!}
        </div>
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
