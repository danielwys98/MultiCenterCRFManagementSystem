{!! Form::model($PDAnalysis,['route' => ['sp_PDAnalysis.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
{{-- Pharmacodynamic (PD) Analysis --}}
<h3>Pharmacodynamic (PD) Analysis</h3>
<div class=" form-group row">
    <div class="col-md-2">
        {!! Form::label('NApplicable', 'Not Applicable:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('NApplicable') !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('Day1', 'Day 1: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('Day1', old('Day1',$PDAnalysis->Day1),['class'=>'form-control']) !!}
    </div>
    <div class="col-md-1">
        {!! Form::label('Day2', 'Day 2: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('Day2',old('Day2',$PDAnalysis->Day2),['class'=>'form-control']) !!}
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
        {!! Form::date('pda_Date_Day_PD',old('pda_Date_Day_PD',$PDAnalysis->pda_Date_Day_PD),['class'=>'form-control']) !!}
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
        {!! Form::text('pda_PD_Result',old('pda_PD_Result',$PDAnalysis->pda_PD_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_PD_Conducted',old('pda_PD_Conducted',$PDAnalysis->pda_PD_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_PD_Checked',old('pda_PD_Checked',$PDAnalysis->pda_PD_Checked),['class'=>'form-control']) !!}
    </td>
    <td class="col-md-3">
        {!! Form::text('pda_PD_Comments',old('pda_PD_Comments',$PDAnalysis->pda_PD_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S1', old('pda_Date_Day_S1',$PDAnalysis->pda_Date_Day_S1),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S1
    </td>
    <td class="text-center">
        1
    </td>
    <td>
        {!! Form::time('pda_S1_Time', old('pda_S1_Time',$PDAnalysis->pda_S1_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Result',old('pda_S1_Result',$PDAnalysis->pda_S1_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Conducted',old('pda_S1_Conducted',$PDAnalysis->pda_S1_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Checked',old('pda_S1_Checked',$PDAnalysis->pda_S1_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S1_Comments',old('pda_S1_Comments',$PDAnalysis->pda_S1_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S2', old('pda_Date_Day_S2',$PDAnalysis->pda_Date_Day_S2),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S2
    </td>
    <td class="text-center">
        2
    </td>
    <td>
        {!! Form::time('pda_S2_Time',old('pda_S2_Time',$PDAnalysis->pda_S2_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Result',old('pda_S2_Result',$PDAnalysis->pda_S2_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Conducted',old('pda_S2_Conducted',$PDAnalysis->pda_S2_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Checked',old('pda_S2_Checked',$PDAnalysis->pda_S2_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S2_Comments',old('pda_S2_Comments',$PDAnalysis->pda_S2_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S3',old('pda_Date_Day_S3',$PDAnalysis->pda_Date_Day_S3),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S3
    </td>
    <td class="text-center">
        3
    </td>
    <td>
        {!! Form::time('pda_S3_Time',old('pda_S3_Time',$PDAnalysis->pda_S3_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Result',old('pda_S3_Result',$PDAnalysis->pda_S3_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Conducted',old('pda_S3_Conducted',$PDAnalysis->pda_S3_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Checked',old('pda_S3_Checked',$PDAnalysis->pda_S3_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S3_Comments',old('pda_S3_Comments',$PDAnalysis->pda_S3_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S4',old('pda_Date_Day_S4',$PDAnalysis->pda_Date_Day_S4),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S4
    </td>
    <td class="text-center">
        4
    </td>
    <td>
        {!! Form::time('pda_S4_Time',old('pda_S4_Time',$PDAnalysis->pda_S4_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Result',old('pda_S4_Result',$PDAnalysis->pda_S4_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Conducted',old('pda_S4_Conducted',$PDAnalysis->pda_S4_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Checked', old('pda_S4_Checked',$PDAnalysis->pda_S4_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S4_Comments', old('pda_S4_Comments',$PDAnalysis->pda_S4_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S5',old('pda_Date_Day_S5',$PDAnalysis->pda_Date_Day_S5),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S5
    </td>
    <td class="text-center">
        5
    </td>
    <td>
        {!! Form::time('pda_S5_Time',old('pda_S5_Time',$PDAnalysis->pda_S5_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Result',old('pda_S5_Result',$PDAnalysis->pda_S5_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Conducted',old('pda_S5_Conducted',$PDAnalysis->pda_S5_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Checked',old('pda_S5_Checked',$PDAnalysis->pda_S5_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S5_Comments',old('pda_S5_Comments',$PDAnalysis->pda_S5_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S6',old('pda_Date_Day_S6',$PDAnalysis->pda_Date_Day_S6),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S6
    </td>
    <td class="text-center">
        8
    </td>
    <td>
        {!! Form::time('pda_S6_Time',old('pda_S6_Time',$PDAnalysis->pda_S6_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Result',old('pda_S6_Result',$PDAnalysis->pda_S6_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Conducted',old('pda_S6_Conducted',$PDAnalysis->pda_S6_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Checked',old('pda_S6_Checked',$PDAnalysis->pda_S6_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S6_Comments',old('pda_S6_Comments',$PDAnalysis->pda_S6_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S7',old('pda_Date_Day_S7',$PDAnalysis->pda_Date_Day_S7),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S7
    </td>
    <td class="text-center">
        12
    </td>
    <td>
        {!! Form::time('pda_S7_Time',old('pda_S7_Time',$PDAnalysis->pda_S7_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Result',old('pda_S7_Result',$PDAnalysis->pda_S7_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Conducted',old('pda_S7_Conducted',$PDAnalysis->pda_S7_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Checked',old('pda_S7_Checked',$PDAnalysis->pda_S7_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S7_Comments',old('pda_S7_Comments',$PDAnalysis->pda_S7_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S8',old('pda_Date_Day_S8',$PDAnalysis->pda_Date_Day_S8),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S8
    </td>
    <td class="text-center">
        16
    </td>
    <td>
        {!! Form::time('pda_S8_Time',old('pda_S8_Time',$PDAnalysis->pda_S8_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Result',old('pda_S8_Result',$PDAnalysis->pda_S8_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Conducted',old('pda_S8_Conducted',$PDAnalysis->pda_S8_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Checked',old('pda_S8_Checked',$PDAnalysis->pda_S8_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S8_Comments',old('pda_S8_Comments',$PDAnalysis->pda_S8_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
<tr>
    <td>
        {!! Form::date('pda_Date_Day_S9',old('pda_Date_Day_S9',$PDAnalysis->pda_Date_Day_S9),['class'=>'form-control']) !!}
    </td>
    <td class="text-center">
        S9
    </td>
    <td class="text-center">
        24
    </td>
    <td>
        {!! Form::time('pda_S9_Time',old('pda_S9_Time',$PDAnalysis->pda_S9_Time),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Result',old('pda_S9_Result',$PDAnalysis->pda_S9_Result),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Conducted',old('pda_S9_Conducted',$PDAnalysis->pda_S9_Conducted),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Checked',old('pda_S9_Checked',$PDAnalysis->pda_S9_Checked),['class'=>'form-control']) !!}
    </td>
    <td>
        {!! Form::text('pda_S9_Comments',old('pda_S9_Comments',$PDAnalysis->pda_S9_Comments),['class'=>'form-control']) !!}
    </td>
</tr>
</tbody>
</table>
{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
