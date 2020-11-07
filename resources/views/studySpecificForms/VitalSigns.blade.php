{!! Form::open(['route' => ['sp_VitalSign.store',$study->study_id]]) !!}
@csrf
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasRole('Admin'))
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
{{-- Vital Signs --}}
<h3 xmlns="http://www.w3.org/1999/html">Vital Signs</h3>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
</div>
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
            {!! Form::date('TPD_1_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            1
        </td>
        <td>
            {!! Form::time('TPD_1_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_1_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_1_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_2_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>2</p>
        </td>
        <td>
            {!! Form::time('TPD_2_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_2_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_2_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_5_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            5
        </td>
        <td>
            {!! Form::time('TPD_5_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_5_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_5_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_8_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            8
        </td>
        <td>
            {!! Form::time('TPD_8_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_8_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_8_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_12_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            12
        </td>
        <td>
            {!! Form::time('TPD_12_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_12_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_12_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_24_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
            {!! Form::date('TPD_36_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>36</p>
        </td>
        <td>
            {!! Form::time('TPD_36_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_36_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_36_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('TPD_48_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>48</p>
        </td>
        <td>
            {!! Form::time('TPD_48_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('TPD_48_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('TPD_48_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td colspan="7" class="font-weight-bold">
        For repeat/extra vital signs
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra1_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra1_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra1_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra1_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra2_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra2_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra2_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra2_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra3_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra3_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra3_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra3_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra4_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra4_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra4_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra4_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra5_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra5_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra5_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra5_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra6_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra6_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra6_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra6_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra7_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra7_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra7_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra7_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td >
            {!! Form::date('Extra8_Date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_TPD', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('Extra8_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_SittingBP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::text('Extra8_SittingBP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_Pulse', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_Respiration', '',['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('Extra8_TakenBy', '',['class'=>'form-control']) !!}
        </td>
    </tr>

    </tbody>
</table>
<div class="row col">
    <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading only).</p>
</div>

<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
    {!! Form::text('Comment','',['class'=>'form-control']) !!}
</div>
{{-- Body measurements and vital signs ends--}}
<div class="row col">
    {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}
