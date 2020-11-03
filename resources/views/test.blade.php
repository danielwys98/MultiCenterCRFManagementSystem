<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>
</head>
<style>
    .page-break
    {
        page-break-after: always;
    }
</style>
<body>
    <h3>{{$patient->name}} {{$study->study_name}}'s study specific details</h3>
    <h3>Admission</h3>
    <hr>
    <div class="row">
        <div class="col-2">
            {!! Form::label('AdmissionDateTaken', 'Date Taken: ') !!}
            {!! Form::label('AdmissionDateTaken', $Admission->AdmissionDateTaken,['readonly'])!!}
        </div>

        <div class="col-4">
                {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
                {!! Form::label('AdmissionTimeTaken', old('AdmissionTimeTaken',$Admission->AdmissionTimeTaken)) !!}
        </div>
    </div>
    {{-- consent --}}
    <h3>Study-Specific Consent Taken</h3>
    <hr>
    <div class="form-group row">
            {!! Form::label('ConsentDateTaken', 'Date Taken: ') !!}
            {!! Form::label('ConsentDateTaken',old('ConsentDateTaken',$Admission->ConsentDateTaken),['class'=>'form-control']) !!}

    </div>
    <div>
        {!! Form::label('ConsentTimeTaken', 'Time Taken: ') !!}
        {!! Form::label('ConsentTimeTaken',old('ConsentTimeTaken',$Admission->ConsentTimeTaken),['class'=>'form-control']) !!}
    </div>
    <div class="page-break">
    <div>
        <h3>Body Measurements and Vital Signs</h3>
        <hr>
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::label('dateTaken',old('dateTaken',$BMVS->dateTaken),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                {!! Form::label('timeTaken', old('timeTaken',$BMVS->timeTaken),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('weight', 'Weight: ') !!}
                {!! Form::label('weight',old('weight',$BMVS->weight.' KG'), ['class'=>'form-control','placeholder'=>'kg']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('height', 'Height: ') !!}
                {!! Form::label('height', old('height',$BMVS->height.' CM'), ['class'=> 'form-control','placeholder'=>'cm']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('bmi', 'Body Mass Index: ') !!}
                {!! Form::label('bmi', old('bmi',$BMVS->bmi.' KG/m^2'),['class'=>'form-control','placeholder'=>'kg/m2','readonly'],false) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('temperature', 'Temperature: ') !!}
                {!! Form::label('temperature', old('temperature',$BMVS->temperature.' &deg;C'),['class'=>'form-control','placeholder'=>'°C'],false) !!}
            </div>
        </div>

        {{-- Body measurement ends here--}}

        <h4>Vital Signs</h4>
        <hr>
        <table border="1">
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
                <td>{!! Form::label('Supine_ReadingTime', old('Supine_ReadingTime',$BMVS->Supine_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_BP', old('Supine_BP',$BMVS->Supine_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_HR', old('Supine_HR',$BMVS->Supine_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_RespiratoryRate', old('Supine_RespiratoryRate',$BMVS->Supine_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                <td>{!! Form::label('Sitting_ReadingTime',old('Sitting_ReadingTime',$BMVS->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_BP', old('Sitting_BP',$BMVS->Sitting_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_HR', old('Sitting_HR',$BMVS->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$BMVS->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>

                @if($BMVS->Sitting_BP_Repeat1 == NULL)
                    <th scope="row">
                    {!! Form::label('SittingRepeat1','Sitting Repeated Not Applicable')!!}
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    </th>
                @else
                    <th scope="row">
                    {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
                    </th>
                    <td>{!! Form::label('Sitting_ReadingTime_Repeat1',old('Sitting_ReadingTime_Repeat1',$BMVS->Sitting_ReadingTime_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_BP_Repeat1', old('Sitting_BP_Repeat1',$BMVS->Sitting_BP_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_HR_Repeat1', old('Sitting_HR_Repeat1',$BMVS->Sitting_HR_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_RespiratoryRate_Repeat1', old('Sitting_RespiratoryRate_Repeat1',$BMVS->Sitting_RespiratoryRate_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                @endif
            </tr>
            <tr>
                @if($BMVS->Sitting_BP_Repeat2 == NULL)
                <th scope="row">
                    {!! Form::label('SittingRepeat2', 'Sitting Repeated Not Applicable') !!}
                </th>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                @else
                <th scope="row">{!! Form::label('SittingRepeat2', 'Sitting Repeated') !!}</th>
                <td>{!! Form::label('Sitting_ReadingTime_Repeat2',old('Sitting_ReadingTime_Repeat2',$BMVS->Sitting_ReadingTime_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_BP_Repeat2', old('Sitting_BP_Repeat2',$BMVS->Sitting_BP_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_HR_Repeat2', old('Sitting_HR_Repeat2',$BMVS->Sitting_HR_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_RespiratoryRate_Repeat2', old('Sitting_RespiratoryRate_Repeat2',$BMVS->Sitting_RespiratoryRate_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                @endif
            </tr>
            <tr>
                <th scope="row" colspan="4"
                    class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                <td>{!! Form::label('Initial', old('Initial',$BMVS->Initial),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            </tbody>
        </table>
        <p>
            {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
        </p>
    </div>
    </div>
    {{--BREATH ALCOHOL TEST STARTS HERE--}}
    <h3>Breath Alcohol Test</h3>
    <p>(Transcribed from Breath Alcohol Test Logbook)</p>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::label('dateTaken',old('dateTaken',$BAT->dateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
            {!! Form::label('timeTaken', old('timeTaken',$BAT->timeTaken),['class'=>'form-control']) !!}
        </div>
    </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('Laboratory', 'Laboratory:') !!}
                {!! Form::label('Laboratory', old('Laboratory',$BAT->laboratory)) !!}
            </div>
        </div>
    <br>
    <table border="1">
        <thead>
        <tr>
            <th scope="col">Test</th>
            <th scope="col">%BAC</th>
            <th scope="col">Result</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{!! Form::label('breathalcohol', 'Breath Alcohol: ') !!}</th>
            <td>{!! Form::label('breathalcohol', old('breathalcohol',$BAT->breathalcohol),['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
            <td>
                {!! Form::label('breathalcoholResult', 'Negative',(old('breathalcoholResult',$BAT->breathalcoholResult)=='Negative')? 'checked' : '',['id'=>'Negative']) !!}
            </td>
        <tr>
            <th scope="row" colspan="2" class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
            <td>{!! Form::label('Usertranscribed', old('Usertranscribed',$BAT->Usertranscribed),['class'=>'form-control']) !!}</td>
        </tr>
        </tbody>
    </table>
</body>
