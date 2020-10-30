{{-- Vital Signs --}}
<h3 xmlns="http://www.w3.org/1999/html">Vital Signs</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('Day1', 'Day 1: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('Day1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class="col-md-1">
        {!! Form::label('Day2', 'Day 2: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('Day2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>
<div class="row col">
    <p>During the confinement period, vital signs should be measured within ± 30 minutes of the scheduled measurement
        time (i.e vital signs to be taken within 30 minutes of 09:00 – time post dose 1 hour etc)</p>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" class="text-center">
            <p>Date</p>
            <p>(yyyy/mm/dd)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Time Post Dose</p>
            <p>(hour)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Reading Time</p>
            <p>(24-hour clock)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Sitting Blood Pressure</p>
            <p>(systolic/diastolic) (mmHg)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Pulse Rate</p>
            <p>(beats per min.)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Respiration Rate</p>
            <p>(breaths per min.)</p>
        </th>
        <th scope="col" class="text-center">
            <p>Taken by</p>
            <p>(Initial)</p>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            1
        </td>
        <td>
            {!! Form::time('VitalSigns_1_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_1_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_1_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_1_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_1_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>2</p>
        </td>
        <td>
            {!! Form::time('VitalSigns_2_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_2_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_2_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_2_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_2_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            5
        </td>
        <td>
            {!! Form::time('VitalSigns_3_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_3_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_3_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_3_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_3_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            8
        </td>
        <td>
            {!! Form::time('VitalSigns_4_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_4_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_4_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_4_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_4_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            12
        </td>
        <td>
            {!! Form::time('VitalSigns_5_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_5_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_5_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_5_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_5_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>24</p>
        </td>
        <td colspan="5" class="text-center">
            <p>Refer to Discharge Page</p>
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>36</p>
        </td>
        <td>
            {!! Form::time('VitalSigns_7_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_7_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_7_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_7_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_7_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('VitalSigns_Date_Day_3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>48</p>
        </td>
        <td>
            {!! Form::time('VitalSigns_8_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_8_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_8_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_8_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_8_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td colspan="7" class="font-weight-bold">
        For repeat/extra vital signs
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra1_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra1_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra1_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra1_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra1_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra1_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra2_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra2_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra2_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra2_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra2_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra2_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra3_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra3_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra3_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra3_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra3_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra3_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra4', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra4_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra4_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra4_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra4_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra4_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra4_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra5', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra5_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra5_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra5_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra5_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra5_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSign_Extra5_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra6', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra6_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra6_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra6_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra6_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra6_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra6_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra7', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra7_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra7_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra7_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra7_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra7_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra7_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('VitalSigns_Date_Day_Extra8', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra8_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('VitalSigns_Extra8_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra8_SBP', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra8_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra8_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('VitalSigns_Extra8_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>

    </tbody>
</table>
<div class="row col">
    <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading only).</p>
</div>
