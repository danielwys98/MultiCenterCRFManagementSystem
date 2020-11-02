{!! Form::open([$Discharge,'route' => ['sp1_Discharge.update',$patient->id,$study_id]]) !!}
{{-- Discharge --}}
<h3>Discharge</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('DischargeDate', 'Date: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('DischargeDate', old('DischargeDate',$Discharge->DischargeDate),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('UnscheduledDischarge ', 'Is this an unscheduled discharge? ') !!}
    </div>
    <div class="col-md-2">
            {!! Form::radio('unscheduledDischarge', 'No',($Discharge->UnscheduledDischarge=='No')? 'checked' : '') !!}
            {!! Form::label('UnscheduledDischarge ', 'No') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
            {!! Form::radio('unscheduledDischarge', 'Yes',($Discharge->UnscheduledDischarge!='No')? 'checked' : '') !!}
            {!! Form::label('UnscheduledDischarge ', 'Yes ') !!}
            </div>
            <div class="col-md-7">
            {!! Form::text('unscheduledDischarge_Text', ($Discharge->UnscheduledDischarge!='No' &&$Discharge->UnscheduledDischarge!=NULL)?  $Discharge->UnscheduledDischarge: '',['class'=>'form-control','placeholder'=>'If yes, please explain']) !!}
            </div>
        </div>
    </div>
</div>
<h4>Vital Signs</h4>
<hr>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Position</th>
        <th scope="col">Reading Time (24-hour clock)</th>
        <th scope="col">Blood Pressure (systolic/diastolic) (mmHg)</th>
        <th scope="col">Heart Rate (beats per min)</th>
        <th scope="col">Respiratory Rate (breaths per min)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
        <td>{!! Form::time('Sitting_ReadingTime', old('Sitting_ReadingTime',$Discharge->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_BP', old('Sitting_BP',$Discharge->Sitting_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_HR', old('Sitting_HR',$Discharge->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$Discharge->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('sittingRepeat', 'No',($Discharge->SittingRepeat=='No')? 'checked' : '',['id'=>'SittingRepeatNA']) !!}
            {!! Form::label('SittingRepeatNA','Not Applicable') !!}
            {!! Form::radio('sittingRepeat', 'Yes',($Discharge->SittingRepeat=='Yes')? 'checked' : '',['id'=>'SittingRepeatYes']) !!}
            {!! Form::label('SittingRepeatYes','Sitting Repeated') !!}
        </th>
        <td>{!! Form::time('SittingRepeat_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
{!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
