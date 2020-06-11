    {!! Form::model($data,['route' => ['details.update',$patient->id]]) !!}
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
            {!! Form::number('weight',old('weight'), ['class'=>'form-control','placeholder'=>'kg']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('height', 'Height: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('height',old('height'), ['class'=> 'form-control','placeholder'=>'cm']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('bmi', 'Body Mass Index: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('bmi',old('bmi'),['class'=>'form-control','placeholder'=>'kg/m2']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('temperature', 'Temperature: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('temperature',old('temperature'),['class'=>'form-control','placeholder'=>'°C']) !!}
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
            <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
            <td>{!! Form::number('Supine_ReadingTime', old('Supine_ReadingTime'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Supine_BP', old('Supine_BP'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Supine_HR', old('Supine_HR'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Supine_RespiratoryRate', old('Supine_RespiratoryRate'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        <tr>
            <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
            <td>{!! Form::number('Sitting_ReadingTime', old('Sitting_ReadingTime'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Sitting_BP', old('Sitting_BP'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Sitting_HR', old('Sitting_HR'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        </tr>
        <tr>
            <th scope="row">{!! Form::label('Standing', 'Standing: ') !!}</th>
            <td>{!! Form::number('Standing_ReadingTime', old('Standing_ReadingTime'),['class'=>'form-control','placeholder'=>'']) !!}</td>
            <td>{!! Form::number('Standing_BP', old('Standing_BP'),['class'=>'form-control','placeholder'=>'']) !!}</td>
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
    <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
