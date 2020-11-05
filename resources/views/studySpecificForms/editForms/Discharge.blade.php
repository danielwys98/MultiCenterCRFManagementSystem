{!! Form::model($Discharge,['route' => ['sp_Discharge.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
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
        <th scope="col" class="col-md-2">Blood Pressure (systolic/diastolic) (mmHg)</th>
        <th scope="col">Heart Rate (beats per min)</th>
        <th scope="col">Respiratory Rate (breaths per min)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
        <td>{!! Form::time('Sitting_ReadingTime', old('Sitting_ReadingTime',$Discharge->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('Sitting_BP_S', old('Sitting_BP_S',$Discharge->Sitting_BP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D', old('Sitting_BP_D',$Discharge->Sitting_BP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
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
        <td>
            {!! Form::number('SittingRepeat_BP_S',old('SittingRepeat_BP_S',$Discharge->SittingRepeat_BP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('SittingRepeat_BP_D',old('SittingRepeat_BP_D',$Discharge->SittingRepeat_BP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('SittingRepeat_HR',old('SittingRepeat_HR',$Discharge->SittingRepeat_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat_RespiratoryRate',old('SittingRepeat_RespiratoryRate',$Discharge->SittingRepeat_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::text('Initial',old('Initial',$Discharge->Initial),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
<div class="row col">
    <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading only).</p>
</div>
<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
    {!! Form::text('Comment',old('Comment',$Discharge->Comment),['class'=>'form-control']) !!}
</div>
{{-- Body measurements and vital signs ends--}}
<div class="row col">
    {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}
