{!! Form::open(['route' => ['sp_Bmvs.store',$study->study_id]]) !!}
@csrf
{{-- body measurements and vital signs --}}
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasAnyRoles(['Admin','superAdmin']))
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
<h3>Body Measurements and Vital Signs</h3>
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
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('weight', 'Weight: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::text('weight','', ['class'=>'form-control','placeholder'=>'kg']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('height', 'Height: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::text('height', '', ['class'=> 'form-control','placeholder'=>'cm']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('bmi', 'Body Mass Index: ') !!}
    </div>
    <div class="col-md-1">
        {{--{!! Form::number('bmi', '',['class'=>'form-control','placeholder'=>'kg/m2']) !!}--}}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('temperature', 'Temperature: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::text('temperature', '',['class'=>'form-control','placeholder'=>'°C']) !!}
    </div>
</div>

{{-- Body measurement ends here--}}

<h4>Vital Signs</h4>
<hr>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Position</th>
        <th scope="col">Reading Time (24-hour clock)</th>
        <th scope="col" class="col-md-3">Blood Pressure (systolic/diastolic) (mmHg)</th>
        <th scope="col">Heart Rate (beats per min)</th>
        <th scope="col">Respiratory Rate (breaths per min)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
        <td>{!! Form::time('Sitting_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('Sitting_BP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('SittingRepeat1', 'Not Applicable','checked',['id'=>'SittingRepeat1NA']) !!}
            {!! Form::label('SittingRepeat1NA','Not Applicable') !!}
            {!! Form::radio('SittingRepeat1', 'Sitting Repeated','',['id'=>'SittingRepeat1']) !!}
            {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
        </th>
        <td>{!! Form::time('Sitting_ReadingTime_Repeat1', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{{--{!! Form::number('Sitting_BP_Repeat1', '',['class'=>'form-control','placeholder'=>'']) !!}--}}
            {!! Form::number('Sitting_BP_S_Repeat1', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D_Repeat1', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}</td>
        <td>{!! Form::number('Sitting_HR_Repeat1', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate_Repeat1', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('SittingRepeat2', 'Not Applicable','checked',['id'=>'SittingRepeat2NA']) !!}
            {!! Form::label('SittingRepeat2NA','Not Applicable') !!}
            {!! Form::radio('SittingRepeat2', 'Sitting Repeated','',['id'=>'SittingRepeat2']) !!}
            {!! Form::label('SittingRepeat2','Sitting Repeated') !!}
        </th>
        <td>{!! Form::time('Sitting_ReadingTime_Repeat2', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{{--{!! Form::number('Sitting_BP_Repeat2', '',['class'=>'form-control','placeholder'=>'']) !!}--}}
            {!! Form::number('Sitting_BP_S_Repeat2', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D_Repeat2', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}</td>
        <td>{!! Form::number('Sitting_HR_Repeat2', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate_Repeat2', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
<p>
    {!! Form::label('note1', 'Only latest reading is transcribed.Comment below if outside Systolic 90-140, Diastolic 50-90, HR 50-100') !!}
</p>
<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
{!! Form::text('Comment','',['class'=>'form-control']) !!}
</div>
{{-- Body measurements and vital signs ends--}}
<div class="row col">
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}
