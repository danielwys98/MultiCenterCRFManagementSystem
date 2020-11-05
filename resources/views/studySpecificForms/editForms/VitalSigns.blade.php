{!! Form::open([$VitalSign,'route' => ['sp_VitalSign.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
{{-- Vital Signs --}}
<h3>Vital Signs</h3>
<hr>
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
        <th scope="col" class="text-center col-md-2">
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
            {!! Form::date('TPD_1_Date', old('TPD_1_Date',$VitalSign->TPD_1_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            1
        </td>
        <td>
            {!! Form::time('TPD_1_ReadingTime', old('TPD_1_ReadingTime',$VitalSign->TPD_1_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_SittingBP_S', old('TPD_1_SittingBP_S',$VitalSign->TPD_1_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_1_SittingBP_D', old('TPD_1_SittingBP_D',$VitalSign->TPD_1_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_Pulse', old('TPD_1_Pulse',$VitalSign->TPD_1_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_Respiration', old('TPD_1_Respiration',$VitalSign->TPD_1_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_TakenBy', old('TPD_1_TakenBy',$VitalSign->TPD_1_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_2_Date', old('TPD_2_Date',$VitalSign->TPD_2_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>2</p>
        </td>
        <td>
            {!! Form::time('TPD_2_ReadingTime',old('TPD_2_ReadingTime',$VitalSign->TPD_2_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_SittingBP_S', old('TPD_2_SittingBP_S',$VitalSign->TPD_2_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_2_SittingBP_D', old('TPD_2_SittingBP_D',$VitalSign->TPD_2_SittingBP_D),['class'=>'form-control col-md-6', 'placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_Pulse', old('TPD_2_Pulse',$VitalSign->TPD_2_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_Respiration', old('TPD_2_Respiration',$VitalSign->TPD_2_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_TakenBy', old('TPD_2_TakenBy',$VitalSign->TPD_2_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_5_Date', old('TPD_5_Date',$VitalSign->TPD_5_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            5
        </td>
        <td>
            {!! Form::time('TPD_5_ReadingTime', old('TPD_5_ReadingTime',$VitalSign->TPD_5_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_SittingBP_S', old('TPD_5_SittingBP_S',$VitalSign->TPD_5_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_5_SittingBP_D', old('TPD_5_SittingBP_D',$VitalSign->TPD_5_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_Pulse', old('TPD_5_Pulse',$VitalSign->TPD_5_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_Respiration', old('TPD_5_Respiration',$VitalSign->TPD_5_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_TakenBy', old('TPD_5_TakenBy',$VitalSign->TPD_5_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_8_Date', old('TPD_8_Date',$VitalSign->TPD_8_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            8
        </td>
        <td>
            {!! Form::time('TPD_8_ReadingTime', old('TPD_8_ReadingTime',$VitalSign->TPD_8_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_SittingBP_S', old('TPD_8_SittingBP_S',$VitalSign->TPD_8_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_8_SittingBP_D', old('TPD_8_SittingBP_D',$VitalSign->TPD_8_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_Pulse', old('TPD_8_Pulse',$VitalSign->TPD_8_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_Respiration', old('TPD_8_Respiration',$VitalSign->TPD_8_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_TakenBy', old('TPD_8_TakenBy',$VitalSign->TPD_8_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_12_Date',old('TPD_12_Date',$VitalSign->TPD_12_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            12
        </td>
        <td>
            {!! Form::time('TPD_12_ReadingTime', old('TPD_12_ReadingTime',$VitalSign->TPD_12_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_SittingBP_S', old('TPD_12_SittingBP_S',$VitalSign->TPD_12_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_12_SittingBP_D', old('TPD_12_SittingBP_D',$VitalSign->TPD_12_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_Pulse', old('TPD_12_Pulse',$VitalSign->TPD_12_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_Respiration', old('TPD_12_Respiration',$VitalSign->TPD_12_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_TakenBy', old('TPD_12_TakenBy',$VitalSign->TPD_12_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_24_Date', old('TPD_24_Date',$VitalSign->TPD_24_Date),['class'=>'form-control']) !!}
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
            {!! Form::date('TPD_36_Date', old('TPD_36_Date',$VitalSign->TPD_36_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>36</p>
        </td>
        <td>
            {!! Form::time('TPD_36_ReadingTime', old('TPD_36_ReadingTime',$VitalSign->TPD_36_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_SittingBP_S', old('TPD_36_SittingBP_S',$VitalSign->TPD_36_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_36_SittingBP_D', old('TPD_36_SittingBP_D',$VitalSign->TPD_36_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_Pulse', old('TPD_36_Pulse',$VitalSign->TPD_36_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_Respiration', old('TPD_36_Respiration',$VitalSign->TPD_36_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_TakenBy', old('TPD_36_TakenBy',$VitalSign->TPD_36_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_48_Date', old('TPD_48_Date',$VitalSign->TPD_48_Date),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>48</p>
        </td>
        <td>
            {!! Form::time('TPD_48_ReadingTime', old('TPD_48_ReadingTime',$VitalSign->TPD_48_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_SittingBP_S', old('TPD_48_SittingBP_S',$VitalSign->TPD_48_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_48_SittingBP_D', old('TPD_48_SittingBP_D',$VitalSign->TPD_48_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_Pulse', old('TPD_48_Pulse',$VitalSign->TPD_48_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_Respiration', old('TPD_48_Respiration',$VitalSign->TPD_48_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_TakenBy', old('TPD_48_TakenBy',$VitalSign->TPD_48_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td colspan="7" class="font-weight-bold">
        For repeat/extra vital signs
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra1_Date', old('Extra1_Date',$VitalSign->Extra1_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_TPD',old('Extra1_TPD',$VitalSign->Extra1_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra1_ReadingTime', old('Extra1_ReadingTime',$VitalSign->Extra1_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_SittingBP_S', old('Extra1_SittingBP_S',$VitalSign->Extra1_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra1_SittingBP_D', old('Extra1_SittingBP_D',$VitalSign->Extra1_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_Pulse', old('Extra1_Pulse',$VitalSign->Extra1_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_Respiration', old('Extra1_Respiration',$VitalSign->Extra1_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_TakenBy', old('Extra1_TakenBy',$VitalSign->Extra1_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra2_Date', old('Extra2_Date',$VitalSign->Extra2_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_TPD', old('Extra2_TPD',$VitalSign->Extra2_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra2_ReadingTime', old('Extra2_ReadingTime',$VitalSign->Extra2_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_SittingBP_S', old('Extra2_SittingBP_S',$VitalSign->Extra2_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra2_SittingBP_D', old('Extra2_SittingBP_D',$VitalSign->Extra2_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_Pulse', old('Extra2_Pulse',$VitalSign->Extra2_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_Respiration', old('Extra2_Respiration',$VitalSign->Extra2_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_TakenBy', old('Extra2_TakenBy',$VitalSign->Extra2_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra3_Date', old('Extra3_Date',$VitalSign->Extra3_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_TPD', old('Extra3_TPD',$VitalSign->Extra3_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra3_ReadingTime', old('Extra3_ReadingTime',$VitalSign->Extra3_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_SittingBP_S', old('Extra3_SittingBP_S',$VitalSign->Extra3_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra3_SittingBP_D', old('Extra3_SittingBP_D',$VitalSign->Extra3_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_Pulse', old('Extra3_Pulse',$VitalSign->Extra3_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_Respiration', old('Extra3_Respiration',$VitalSign->Extra3_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_TakenBy', old('Extra3_TakenBy',$VitalSign->Extra3_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra4_Date',old('Extra4_Date',$VitalSign->Extra4_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_TPD', old('Extra4_TPD',$VitalSign->Extra4_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra4_ReadingTime', old('Extra4_ReadingTime',$VitalSign->Extra4_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_SittingBP_S', old('Extra4_SittingBP_S',$VitalSign->Extra4_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra4_SittingBP_D', old('Extra4_SittingBP_D',$VitalSign->Extra4_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_Pulse', old('Extra4_Pulse',$VitalSign->Extra4_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_Respiration', old('Extra4_Respiration',$VitalSign->Extra4_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_TakenBy', old('Extra4_TakenBy',$VitalSign->Extra4_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra5_Date', old('Extra5_Date',$VitalSign->Extra5_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_TPD', old('Extra5_TPD',$VitalSign->Extra5_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra5_ReadingTime', old('Extra5_ReadingTime',$VitalSign->Extra5_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_SittingBP_S', old('Extra5_SittingBP_S',$VitalSign->Extra5_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra5_SittingBP_D', old('Extra5_SittingBP_D',$VitalSign->Extra5_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_Pulse', old('Extra5_Pulse',$VitalSign->Extra5_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_Respiration', old('Extra5_Respiration',$VitalSign->Extra5_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_TakenBy', old('Extra5_TakenBy',$VitalSign->Extra5_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra6_Date', old('Extra6_Date',$VitalSign->Extra6_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_TPD', old('Extra6_TPD',$VitalSign->Extra6_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra6_ReadingTime', old('Extra6_ReadingTime',$VitalSign->Extra6_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_SittingBP_S', old('Extra6_SittingBP_S',$VitalSign->Extra6_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra6_SittingBP_D', old('Extra6_SittingBP_D',$VitalSign->Extra6_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_Pulse', old('Extra6_Pulse',$VitalSign->Extra6_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_Respiration', old('Extra6_Respiration',$VitalSign->Extra6_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_TakenBy', old('Extra6_TakenBy',$VitalSign->Extra6_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra7_Date', old('Extra7_Date',$VitalSign->Extra7_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_TPD', old('Extra7_TPD',$VitalSign->Extra7_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra7_ReadingTime',old('Extra7_ReadingTime',$VitalSign->Extra7_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_SittingBP_S', old('Extra7_SittingBP_S',$VitalSign->Extra7_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra7_SittingBP_D', old('Extra7_SittingBP_D',$VitalSign->Extra7_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_Pulse', old('Extra7_Pulse',$VitalSign->Extra7_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_Respiration', old('Extra7_Respiration',$VitalSign->Extra7_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_TakenBy', old('Extra7_TakenBy',$VitalSign->Extra7_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra8_Date', old('Extra8_Date',$VitalSign->Extra8_Date),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_TPD', old('Extra8_TPD',$VitalSign->Extra8_TPD),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra8_ReadingTime', old('Extra8_ReadingTime',$VitalSign->Extra8_ReadingTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_SittingBP_S', old('Extra8_SittingBP_S',$VitalSign->Extra8_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra8_SittingBP_D', old('Extra8_SittingBP_D',$VitalSign->Extra8_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_Pulse', old('Extra8_Pulse',$VitalSign->Extra8_Pulse),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_Respiration', old('Extra8_Respiration',$VitalSign->Extra8_Respiration),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_TakenBy', old('Extra8_TakenBy',$VitalSign->Extra8_TakenBy),['class'=>'form-control']) !!}
        </td>
    </tr>

    </tbody>
</table>
<div class="row col">
    <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading only).</p>
</div>
<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
    {!! Form::text('Comment',old('Comment',$VitalSign->Comment),['class'=>'form-control']) !!}
</div>
{{-- Body measurements and vital signs ends--}}
<div class="row col">
    {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}

