{{-- Discharge --}}
<h3>Discharge</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('date', 'Date: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('unscheduled ', 'Is this an unscheduled discharge? ') !!}
    </div>
    <div class="col-md-2">
            {!! Form::radio('unscheduled', 'No') !!}
            {!! Form::label('unscheduled ', 'No') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
            {!! Form::radio('unscheduled', 'Yes') !!}
            {!! Form::label('unscheduled ', 'Yes ') !!}
            </div>
            <div class="col-md-7">
            {!! Form::text('unscheduled', '',['class'=>'form-control','placeholder'=>'If yes, please explain']) !!}
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
        <td>{!! Form::number('Sitting_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('SittingRepeat1', '') !!}
            {!! Form::label('SittingRepeat1NA','Not Applicable') !!}
            {!! Form::radio('SittingRepeat1', '') !!}
            {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
        </th>
        <td>{!! Form::number('SittingRepeat1_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat1_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat1_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat1_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
