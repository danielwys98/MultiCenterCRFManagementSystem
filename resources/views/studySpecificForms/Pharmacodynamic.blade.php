{{-- Pharmacodynamic Blood Sampling --}}
<h3>Pharmacodynamic Blood Sampling</h3>

<div class="form-group row">
    <div class="col-md-2">
        {!! Form::date('Day1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class="col-md-1">
        <p class="text-center">to</p>
    </div>
    <div class="col-md-2">
        {!! Form::date('Day2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>
<div class="row col">
    <p><strong>Tube Type and Volume Required:</strong> Hirudin, 1.6mL</p>
</div>
<div class="row col">
    <p><strong>Processing and Storage Instructions:</strong> To send the whole blood directly after collection for PD analysis.</p>
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
        <p>Scheduled Sampling Time</p>
        <p>(24-hour clock)</p>
    </th>
    <th  scope="col" class="text-center">
        <p>Actual Sampling Time</p>
        <p>(24-hour clock)</p>
    </th>
    <th scope="col" class="text-center">
        <p>Collected by</p>
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
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        <p>PD</p>
    </td>
    <td class="text-center">
        <p>______</p>
    </td>
    <td class="text-center">
        <p>______</p>
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_PD_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_PD_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_PD_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td class="col-md-3">
        {!! Form::text('Pharmacodynamic_PD_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S1
    </td>
    <td class="text-center">
        1
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S1_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S1_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S1_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S1_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S1_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S2
    </td>
    <td class="text-center">
        2
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S2_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S2_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S2_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S2_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S2_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S3
    </td>
    <td class="text-center">
        3
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S3_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S3_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S3_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S3_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S3_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S4
    </td>
    <td class="text-center">
        4
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S4_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S4_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S4_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S4_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S4_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td class="col-sm-2">
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S5
    </td>
    <td class="text-center">
        5
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S5_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S5_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S5_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S5_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S5_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td class="text-center">
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S6
    </td>
    <td class="text-center">
        8
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S6_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S6_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S6_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S6_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S6_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S7
    </td>
    <td class="text-center">
        12
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S7_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S7_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S7_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S7_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S7_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S8
    </td>
    <td class="text-center">
        16
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S8_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S8_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S8_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S8_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S8_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('Pharmacodynamic_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S9
    </td>
    <td class="text-center">
        24
    </td>
    <td>
        {!! Form::time('Pharmacodynamic_S9_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td class="col-sm-1">
        {!! Form::time('Pharmacodynamic_S9_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S9_Collected', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S9_Checked', '',['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('Pharmacodynamic_S9_Comments', '',['class'=>'form-control']) !!}
    </td>
</tr>
</tbody>
</table>
<div class="row">
    <div class="col-md-3">
        <p>NS = Not statistically significant</p>
    </div>
    <div class="col-md-3">
        <p>NA = Not available (state reason)</p>
    </div>
</div>
<div class="row col">
    <p>Reasons for significant time deviation and / or sample not available:</p>
</div>
<div class="row col">
    <ul>
        <li>1- Problematic blood sampling</li>
        <li>2- No blood collected due to no venous access</li>
        <li>3- Early/late sampling</li>
        <li>4- Sample tube breakage</li>
        <li>5- Re-cannulation</li>
        <li>6- Other (specify)</li>
    </ul>
</div>
