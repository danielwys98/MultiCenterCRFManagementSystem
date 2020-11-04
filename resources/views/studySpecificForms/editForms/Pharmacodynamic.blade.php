{!! Form::model($PDynamic,['route' => ['sp_Pdynamicsampling.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
{{-- Pharmacodynamic Blood Sampling --}}
<h3>Pharmacodynamic Blood Sampling</h3>
<div class=" form-group row">
    <div class="col-md-2">
        {!! Form::label('NApplicable', 'Not Applicable:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('NApplicable') !!}
    </div>
</div>
<hr/>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::date('day1',old("day1",$PDynamic->Day1),['class'=>'form-control']) !!}
        </div>
        <div class="col-md-1">
            <p class="text-center">to</p>
        </div>
        <div class="col-md-2">
            {!! Form::date('day2',old("day2",$PDynamic->Day2),['class'=>'form-control']) !!}
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
            {!! Form::date('PD_Date_Day_1',old("PD_Date_Day_1",$PDynamic->PD_Date_Day_1),['class'=>'form-control']) !!}
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
            {!! Form::time('PD_AST',old("PD_AST",$PDynamic->PD_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('PD_Collected',old("PD_Collected",$PDynamic->PD_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('PD_Checked',old("PD_Checked",$PDynamic->PD_Checked),['class'=>'form-control']) !!}
        </td>
        <td class="col-md-3">
            {!! Form::text('PD_Comments',old("PD_Comments",$PDynamic->PD_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S1_Date_Day_1',old("S1_Date_Day_1",$PDynamic->S1_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S1
        </td>
        <td class="text-center">
            1
        </td>
        <td>
            {!! Form::time('S1_SST',old("S1_SST",$PDynamic->S1_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S1_AST',old("S1_AST",$PDynamic->S1_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S1_Collected',old("S1_Collected",$PDynamic->S1_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S1_Checked',old("S1_Checked",$PDynamic->S1_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S1_Comments',old("S1_Comments",$PDynamic->S1_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S2_Date_Day_1',old("S2_Date_Day_1",$PDynamic->S2_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S2
        </td>
        <td class="text-center">
            2
        </td>
        <td>
            {!! Form::time('S2_SST',old("S2_SST",$PDynamic->S2_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S2_AST',old("S2_AST",$PDynamic->S2_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S2_Collected',old("S2_Collected",$PDynamic->S2_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S2_Checked',old("S2_Checked",$PDynamic->S2_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S2_Comments',old("S2_Comments",$PDynamic->S2_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S3_Date_Day_1',old("S3_Date_Day_1",$PDynamic->S3_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S3
        </td>
        <td class="text-center">
            3
        </td>
        <td>
            {!! Form::time('S3_SST',old("S3_SST",$PDynamic->S3_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S3_AST',old("S3_AST",$PDynamic->S3_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S3_Collected',old("S3_Collected",$PDynamic->S3_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S3_Checked',old("S3_Checked",$PDynamic->S3_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S3_Comments',old("S3_Comments",$PDynamic->S3_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S4_Date_Day_1',old("S4_Date_Day_1",$PDynamic->S4_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S4
        </td>
        <td class="text-center">
            4
        </td>
        <td>
            {!! Form::time('S4_SST',old("S4_SST",$PDynamic->S4_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S4_AST',old("S4_AST",$PDynamic->S4_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S4_Collected',old("S4_Collected",$PDynamic->S4_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S4_Checked',old("S4_Checked",$PDynamic->S4_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S4_Comments',old("S4_Comments",$PDynamic->S4_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class="col-sm-2">
            {!! Form::date('S5_Date_Day_1',old("S5_Date_Day_1",$PDynamic->S5_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S5
        </td>
        <td class="text-center">
            5
        </td>
        <td>
            {!! Form::time('S5_SST',old("S5_SST",$PDynamic->S5_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S5_AST',old("S5_AST",$PDynamic->S5_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S5_Collected',old("S5_Collected",$PDynamic->S5_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S5_Checked',old("S5_Checked",$PDynamic->S5_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S5_Comments',old("S5_Comments",$PDynamic->S5_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class="text-center">
            {!! Form::date('S6_Date_Day_1',old("S6_Date_Day_1",$PDynamic->S6_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S6
        </td>
        <td class="text-center">
            8
        </td>
        <td>
            {!! Form::time('S6_SST',old("S6_SST",$PDynamic->S6_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S6_AST',old("S6_AST",$PDynamic->S6_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S6_Collected',old("S6_Collected",$PDynamic->S6_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S6_Checked',old("S6_Checked",$PDynamic->S6_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S6_Comments',old("S6_Comments",$PDynamic->S6_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S7_Date_Day_1',old("S7_Date_Day_1",$PDynamic->S7_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S7
        </td>
        <td class="text-center">
            12
        </td>
        <td>
            {!! Form::time('S7_SST',old("S7_SST",$PDynamic->S7_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S7_AST',old("S7_AST",$PDynamic->S7_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S7_Collected',old("S7_Collected",$PDynamic->S7_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S7_Checked',old("S7_Checked",$PDynamic->S7_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S7_Comments',old("S7_Comments",$PDynamic->S7_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S8_Date_Day_1',old("S8_Date_Day_1",$PDynamic->S8_Date_Day_1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S8
        </td>
        <td class="text-center">
            16
        </td>
        <td>
            {!! Form::time('S8_SST',old("S8_SST",$PDynamic->S8_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('S8_AST',old("S8_AST",$PDynamic->S8_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S8_Collected',old("S8_Collected",$PDynamic->S8_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S8_Checked',old("S8_Checked",$PDynamic->S8_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S8_Comments',old("S8_Comments",$PDynamic->S8_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('S9_Date_Day_2',old("S9_Date_Day_2",$PDynamic->S9_Date_Day_2),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S9
        </td>
        <td class="text-center">
            24
        </td>
        <td>
            {!! Form::time('S9_SST',old("S9_SST",$PDynamic->S9_SST),['class'=>'form-control']) !!}
        </td>
        <td class="col-sm-1">
            {!! Form::time('S9_AST',old("S9_AST",$PDynamic->S9_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S9_Collected',old("S9_Collected",$PDynamic->S9_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S9_Checked',old("S9_Checked",$PDynamic->S9_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('S9_Comments',old("S9_Comments",$PDynamic->S9_Comments),['class'=>'form-control']) !!}
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
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
