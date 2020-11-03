{!! Form::open(['route' => ['sp_PDAnalysis.store',$study->study_id]]) !!}
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
{{-- Pharmacodynamic (PD) Analysis --}}
<h3>Pharmacodynamic (PD) Analysis</h3>
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
    <p>Analysis Instructions: Stand whole blood for 30 minutes at room temperature before PD analysis. PD analysis has
        to be completed within 3 hours.</p>
</div>
<table class="table table-bordered">
    <thead>
<tr>
    <th scope="col" class="text-center">
        <p>Date</p>
        <p>(yyyy/mm/dd)</p>
    </th>
    <th scope="col" class="text-center">
        <p>Sample Code</p>
    </th>
    <th scope="col" class="text-center">
        <p>Time Post Dose</p>
        <p>(hour)</p>
    </th>
    <th scope="col" class="text-center">
        <p>Time of PD analysis</p>
        <p>(24-hour clock)</p>
    </th>
    <th scope="col" class="text-center">
        <p>Results for PD analysis</p>
        <p>(AU*min)</p>
    </th>
    <th scope="col" class="text-center">
        <p>Analysis conducted by</p>
    </th>
    <th scope="col" class="text-center">
        <p>Checked by</p>
    </th>
    <th scope="col" class="text-center">
        <p>Comments</p>
    </th>
</tr>
    </thead>
    <tbody>

<tr>
    <td>
        {!! Form::date('pda_Date_Day_PD', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        PD
    </td>
    <td class="text-center">
        ______
    </td>
    <td class="text-center">
        ______
    </td>
    <td>
        {!! Form::text('pda_PD_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_PD_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_PD_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td class="col-md-3">
        {!! Form::text('pda_PD_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S1
    </td>
    <td class="text-center">
        1
    </td>
    <td>
        {!! Form::time('pda_S1_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S2
    </td>
    <td class="text-center">
        2
    </td>
    <td>
        {!! Form::time('pda_S2_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S3
    </td>
    <td class="text-center">
        3
    </td>
    <td>
        {!! Form::time('pda_S3_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S4', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S4
    </td>
    <td class="text-center">
        4
    </td>
    <td>
        {!! Form::time('pda_S4_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S5', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S5
    </td>
    <td class="text-center">
        5
    </td>
    <td>
        {!! Form::time('pda_S5_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S6', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S6
    </td>
    <td class="text-center">
        8
    </td>
    <td>
        {!! Form::time('pda_S6_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S7', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S7
    </td>
    <td class="text-center">
        12
    </td>
    <td>
        {!! Form::time('pda_S7_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S8', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S8
    </td>
    <td class="text-center">
        16
    </td>
    <td>
        {!! Form::time('pda_S8_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Result', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S9', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S9
    </td>
    <td class="text-center">
        24
    </td>
    <td>
        {!! Form::time('pda_S9_Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Result','',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Conducted', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
</tbody>
</table>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
