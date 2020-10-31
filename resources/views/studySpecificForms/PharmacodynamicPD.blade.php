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
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
        {!! Form::time('PharmacodynamicAnalysis_PD_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_PD_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_PD_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td class="col-md-3">
        {!! Form::text('PharmacodynamicAnalysis_PD_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S1
    </td>
    <td class="text-center">
        1
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S1_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S1_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S1_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S1_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S1_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S2
    </td>
    <td class="text-center">
        2
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S2_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S2_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S2_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S2_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S2_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S3
    </td>
    <td class="text-center">
        3
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S3_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S3_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S3_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S3_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S3_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S4
    </td>
    <td class="text-center">
        4
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S4_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S4_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S4_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S4_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S4_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S5
    </td>
    <td class="text-center">
        5
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S5_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S5_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S5_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S5_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S5_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S6
    </td>
    <td class="text-center">
        8
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S6_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S6_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S6_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S6_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S6_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S7
    </td>
    <td class="text-center">
        12
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S7_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S7_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S7_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S7_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S7_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S8
    </td>
    <td class="text-center">
        16
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S8_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S8_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S8_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S8_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S8_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('PharmacodynamicAnalysis_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S9
    </td>
    <td class="text-center">
        24
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S9_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('PharmacodynamicAnalysis_S9_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S9_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S9_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('PharmacodynamicAnalysis_S9_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
</tbody>
</table>
