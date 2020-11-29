{!! Form::open(['route' => ['preScreeningForms.store',$patient->id]]) !!}
    @csrf
    {{-- body measurements and vital signs --}}
    <h3>Body Measurements and Vital Signs</h3>
    <hr>
    {{-- date and time --}}
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
    {{-- end date and time --}}
    {{-- weight, height, bmi and temp --}}
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
            {{--{!! Form::text('bmi', '',['class'=>'form-control','placeholder'=>'kg/m2']) !!}--}}
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
    {{-- end weight, height, bmi and temp --}}
    {{-- vital signs --}}
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
            <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
            <td>{!! Form::time('Supine_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>
                {!! Form::number('Supine_BP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                {!! Form::number('Supine_BP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
            </td>
            <td>{!! Form::number('Supine_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Supine_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
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
            <th scope="row">{!! Form::label('Standing', 'Standing: ') !!}</th>
            <td>{!! Form::time('Standing_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>
                {!! Form::number('Standing_BP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                {!! Form::number('Standing_BP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
            </td>
            <td>{!! Form::number('Standing_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Standing_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        <tr>
            <th scope="row" colspan="4"
                class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
            <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        </tbody>
    </table>
    {{-- end vital signs --}}
    <p>
        {!! Form::label('note1', 'Only latest reading is transcribed. Please comment below if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
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
