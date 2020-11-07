    {!! Form::model($BodyAndVitals,['route' => ['preScreeningForms.update',$patient->id]]) !!}
    @method('PUT')
    @csrf
    {{-- body measurements and vital signs --}}
    <h3>Body Measurements and Vital Signs</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', old('dateTaken'),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken',old('timeTaken'),['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('weight', 'Weight: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::text('weight',old('weight'), ['class'=>'form-control','placeholder'=>'kg']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('height', 'Height: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::text('height',old('height'), ['class'=> 'form-control','placeholder'=>'cm']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('bmi', 'Body Mass Index: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::text('bmi',old('bmi'),['class'=>'form-control','placeholder'=>'','readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('temperature', 'Temperature: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::text('temperature',old('temperature'),['class'=>'form-control','placeholder'=>'°C']) !!}
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
            <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
            <td>{!! Form::time('Supine_ReadingTime',old('Supine_ReadingTime'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>
                {!! Form::number('Supine_BP_S', old('Supine_BP_S'),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                {!! Form::number('Supine_BP_D', old('Supine_BP_D'),['class'=>'form-control col-md-6','placeholder'=>'siastolic']) !!}
            </td>
            <td>{!! Form::number('Supine_HR', old('Supine_HR'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Supine_RespiratoryRate', old('Supine_RespiratoryRate'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        <tr>
            <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
            <td>{!! Form::time('Sitting_ReadingTime', old('Sitting_ReadingTime'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>
                {!! Form::number('Sitting_BP_S', old('Sitting_BP_S'),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                {!! Form::number('Sitting_BP_D', old('Sitting_BP_D'),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
            </td>
            <td>{!! Form::number('Sitting_HR', old('Sitting_HR'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        <tr>
            <th scope="row">{!! Form::label('Standing', 'Standing: ') !!}</th>
            <td>{!! Form::time('Standing_ReadingTime',old('Standing_ReadingTime'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>
                {!! Form::number('Standing_BP_S', old('Standing_BP_S'),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                {!! Form::number('Standing_BP_D', old('Standing_BP_D'),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
            </td>
            <td>{!! Form::number('Standing_HR', old('Standing_HR'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Standing_RespiratoryRate', old('Standing_RespiratoryRate'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        <tr>
            <th scope="row" colspan="4"
                class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
            <td>{!! Form::text('Initial',old('Initial'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        </tbody>
    </table>
    <p>
        {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
    </p>
    <div class="form-group row col-md-6">
        {!! Form::label('Comment','Comments/ Remarks: ') !!}
        {!! Form::text('Comment',old('Comment'),['class'=>'form-control']) !!}
    </div>
   {{-- <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>--}}
    <div class="row col">
        {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
    </div>
    {!! Form::close() !!}
