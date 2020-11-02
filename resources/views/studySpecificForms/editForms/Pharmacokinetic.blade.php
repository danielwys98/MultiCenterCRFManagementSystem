{!! Form::model($PKinetic,['route' => ['sp_Pharmocokinetic.update',$patient->id,$study_id]]) !!}
@method('PUT')
@csrf
{{-- Pharmacokinetic Blood Sampling --}}
<h3>Pharmacokinetic Blood Sampling</h3>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::date('Day1',old("Day1",$PKinetic->Day1),['class'=>'form-control']) !!}
    </div>
    <div class="col-md-1">
        <p class="text-center">to</p>
    </div>
    <div class="col-md-2">
        {!! Form::date('Day3',old("Day3",$PKinetic->Day3),['class'=>'form-control']) !!}
    </div>
</div>
<hr>
<div class="row col">
    <p><strong>Tube Type and Volume Required:</strong> Heparin, 3mL</p>
</div>
<div class="row col">
    <p><strong>Processing and Storage Instructions:</strong> Centrifuge at 4˚C for 10 minutes at 3000 rpm within 45
        minutes, store below
        -20˚C.</p>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
        </th>
        <th scope="col">
            <p>Last Food Intake</p>
        </th>
        <th scope="col">
            <p>Last Water Intake</p>
        </th>
        <th scope="col">
            <p>Study Drug Dosing</p>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Date</th>
        <td>
            {!! Form::date('LastFoodDate',old("LastFoodDate",$PKinetic->LastFoodDate),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::date('LastWaterDate',old("LastWaterDate",$PKinetic->LastWaterDate),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::date('StudyDrugDate',old("StudyDrugDate",$PKinetic->StudyDrugDate),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row">
            <p>Time</p>
            <p>(24-hour clock)</p>
        </th>
        <td>
            {!! Form::time('LastFoodTime',old("LastFoodTime",$PKinetic->LastFoodTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('LastWaterTime',old("LastWaterTime",$PKinetic->LastWaterTime),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('StudyDrugTime',old("StudyDrugTime",$PKinetic->StudyDrugTime),['class'=>'form-control']) !!}
        </td>
    </tr>
    </tbody>
</table>
<br>
<br>
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
        <th scope="col" class="text-center">
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
            {!! Form::date('pk_Date_Day_PD',old('pk_Date_Day_PD',$PKinetic->pk_Date_Day_PD),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">PD</td>
        <td class="text-center">______</td>
        <td class="text-center">______</td>
        <td>
            {!! Form::time('pk_PD_AST',old('pk_PD_AST',$PKinetic->pk_PD_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_PD_Collected',old('pk_PD_Collected',$PKinetic->pk_PD_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_PD_Checked',old('pk_PD_Checked',$PKinetic->pk_PD_Checked),['class'=>'form-control']) !!}
        </td>
        <td class="col-md-3">
            {!! Form::text('pk_PD_Comments',old('pk_PD_Comments',$PKinetic->pk_PD_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S1',old('pk_Date_Day_S1',$PKinetic->pk_Date_Day_S1),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">S1</td>
        <td class="text-center">0.50</td>
        <td>
            {!! Form::time('pk_S1_SST',old('pk_S1_SST',$PKinetic->pk_S1_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S1_AST',old('pk_S1_AST',$PKinetic->pk_S1_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S1_Collected',old('pk_S1_Collected',$PKinetic->pk_S1_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S1_Checked',old('pk_S1_Checked',$PKinetic->pk_S1_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S1_Comments',old('pk_S1_Comments',$PKinetic->pk_S1_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S2',old('pk_Date_Day_S2',$PKinetic->pk_Date_Day_S2),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>S2</p>
        </td>
        <td class="text-center">
            <p>1</p>
        </td>
        <td>
            {!! Form::time('pk_S2_SST',old('pk_S2_SST',$PKinetic->pk_S2_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S2_AST',old('pk_S2_AST',$PKinetic->pk_S2_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S2_Collected',old('pk_S2_Collected',$PKinetic->pk_S2_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S2_Checked',old('pk_S2_Checked',$PKinetic->pk_S2_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S2_Comments',old('pk_S2_Comments',$PKinetic->pk_S2_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S3',old('pk_Date_Day_S3',$PKinetic->pk_Date_Day_S3),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S3
        </td>
        <td class="text-center">
            1.5
        </td>
        <td>
            {!! Form::time('pk_S3_SST',old('pk_S3_SST',$PKinetic->pk_S3_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S3_AST',old('pk_S3_AST',$PKinetic->pk_S3_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S3_Collected',old('pk_S3_Collected',$PKinetic->pk_S3_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S3_Checked',old('pk_S3_Checked',$PKinetic->pk_S3_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S3_Comments',old('pk_S3_Comments',$PKinetic->pk_S3_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S4',old('pk_Date_Day_S4',$PKinetic->pk_PD_AST),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S4
        </td>
        <td class="text-center">
            2
        </td>
        <td>
            {!! Form::time('pk_S4_SST',old('pk_S4_SST',$PKinetic->pk_S4_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S4_AST',old('pk_S4_AST',$PKinetic->pk_S4_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S4_Collected',old('pk_S4_Collected',$PKinetic->pk_S4_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S4_Checked',old('pk_S4_Checked',$PKinetic->pk_S4_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S4_Comments',old('pk_S4_Comments',$PKinetic->pk_S4_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S5',old('pk_Date_Day_S5',$PKinetic->pk_Date_Day_S5),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S5
        </td>
        <td class="text-center">
            2.5
        </td>
        <td>
            {!! Form::time('pk_S5_SST',old('pk_S5_SST',$PKinetic->pk_S5_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S5_AST',old('pk_S5_AST',$PKinetic->pk_S5_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S5_Collected',old('pk_S5_Collected',$PKinetic->pk_S5_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S5_Checked',old('pk_S5_Checked',$PKinetic->pk_S5_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S5_Comments',old('pk_S5_Comments',$PKinetic->pk_S5_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class="col-sm-2">
            {!! Form::date('pk_Date_Day_S6',old('pk_Date_Day_S6',$PKinetic->pk_Date_Day_S6),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S6
        </td>
        <td class="text-center">
            3
        </td>
        <td>
            {!! Form::time('pk_S6_SST',old('pk_S6_SST',$PKinetic->pk_S6_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S6_AST',old('pk_S6_AST',$PKinetic->pk_S6_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S6_Collected',old('pk_S6_Collected',$PKinetic->pk_S6_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S6_Checked',old('pk_S6_Checked',$PKinetic->pk_S6_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S6_Comments',old('pk_S6_Comments',$PKinetic->pk_S6_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S7',old('pk_Date_Day_S7',$PKinetic->pk_Date_Day_S7),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S7
        </td>
        <td class="text-center">
            3.5
        </td>
        <td>
            {!! Form::time('pk_S7_SST',old('pk_S7_SST',$PKinetic->pk_S7_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S7_AST',old('pk_S7_AST',$PKinetic->pk_S7_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S7_Collected',old('pk_S7_Collected',$PKinetic->pk_S7_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S7_Checked',old('pk_S7_Checked',$PKinetic->pk_S7_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S7_Comments',old('pk_S7_Comments',$PKinetic->pk_S7_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S8',old('pk_Date_Day_S8',$PKinetic->pk_Date_Day_S8),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S8
        </td>
        <td class="text-center">
            4
        </td>
        <td>
            {!! Form::time('pk_S8_SST',old('pk_S8_SST',$PKinetic->pk_S8_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S8_AST',old('pk_S8_AST',$PKinetic->pk_S8_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S8_Collected',old('pk_S8_Collected',$PKinetic->pk_S8_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S8_Checked',old('pk_S8_Checked',$PKinetic->pk_S8_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S8_Comments',old('pk_S8_Comments',$PKinetic->pk_S8_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S9',old('pk_Date_Day_S9',$PKinetic->pk_Date_Day_S9),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S9
        </td>
        <td class="text-center">
            4.5
        </td>
        <td>
            {!! Form::time('pk_S9_SST',old('pk_S9_SST',$PKinetic->pk_S9_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S9_AST',old('pk_S9_AST',$PKinetic->pk_S9_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S9_Collected',old('pk_S9_Collected',$PKinetic->pk_S9_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S9_Checked',old('pk_S9_Checked',$PKinetic->pk_S9_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S9_Comments',old('pk_S9_Comments',$PKinetic->pk_S9_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S10',old('pk_Date_Day_S10',$PKinetic->pk_Date_Day_S10),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S10
        </td>
        <td class="text-center">
            5
        </td>
        <td>
            {!! Form::time('pk_S10_SST',old('pk_S10_SST',$PKinetic->pk_S10_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S10_AST',old('pk_S10_AST',$PKinetic->pk_S10_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S10_Collected',old('pk_S10_Collected',$PKinetic->pk_S10_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S10_Checked',old('pk_S10_Checked',$PKinetic->pk_S10_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S10_Comments',old('pk_S10_Comments',$PKinetic->pk_S10_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S11',old('pk_Date_Day_S11',$PKinetic->pk_Date_Day_S11),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S11
        </td>
        <td class="text-center">
            6
        </td>
        <td>
            {!! Form::time('pk_S11_SST',old('pk_S11_SST',$PKinetic->pk_S11_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S11_AST',old('pk_S11_AST',$PKinetic->pk_S11_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S11_Collected',old('pk_S11_Collected',$PKinetic->pk_S11_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S11_Checked',old('pk_S11_Checked',$PKinetic->pk_S11_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S11_Comments',old('pk_S11_Comments',$PKinetic->pk_S11_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S12',old('pk_Date_Day_S12',$PKinetic->pk_Date_Day_S12),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            <p>S12</p>
        </td>
        <td class="text-center">
            <p>7</p>
        </td>
        <td>
            {!! Form::time('pk_S12_SST',old('pk_S12_SST',$PKinetic->pk_S12_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S12_AST',old('pk_S12_AST',$PKinetic->pk_S12_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S12_Collected',old('pk_S12_Collected',$PKinetic->pk_S12_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S12_Checked',old('pk_S12_Checked',$PKinetic->pk_S12_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S12_Comments',old('pk_S12_Comments',$PKinetic->pk_S12_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S13',old('pk_Date_Day_S13',$PKinetic->pk_Date_Day_S13),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S13
        </td>
        <td class="text-center">
            8
        </td>
        <td>
            {!! Form::time('pk_S13_SST',old('pk_S13_SST',$PKinetic->pk_S13_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S13_AST',old('pk_S13_AST',$PKinetic->pk_S13_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S13_Collected',old('pk_S13_Collected',$PKinetic->pk_S13_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S13_Checked',old('pk_S13_Checked',$PKinetic->pk_S13_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S13_Comments',old('pk_S13_Comments',$PKinetic->pk_S13_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S14',old('pk_Date_Day_S14',$PKinetic->pk_Date_Day_S14),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S14
        </td>
        <td class="text-center">
            10
        </td>
        <td>
            {!! Form::time('pk_S14_SST',old('pk_S14_SST',$PKinetic->pk_S14_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S14_AST',old('pk_S14_AST',$PKinetic->pk_S14_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S14_Collected',old('pk_S14_Collected',$PKinetic->pk_S14_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S14_Checked',old('pk_S14_Checked',$PKinetic->pk_S14_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S14_Comments',old('pk_S14_Comments',$PKinetic->pk_S14_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S15',old('pk_Date_Day_S15',$PKinetic->pk_Date_Day_S15),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S15
        </td>
        <td class="text-center">
            12
        </td>
        <td>
            {!! Form::time('pk_S15_SST',old('pk_S15_SST',$PKinetic->pk_S15_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S15_AST',old('pk_S15_AST',$PKinetic->pk_S15_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S15_Collected',old('pk_S15_Collected',$PKinetic->pk_S15_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S15_Checked',old('pk_S15_Checked',$PKinetic->pk_S15_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S15_Comments',old('pk_S15_Comments',$PKinetic->pk_S15_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S16',old('pk_Date_Day_S16',$PKinetic->pk_Date_Day_S16),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S16
        </td>
        <td class="text-center">
            14
        </td>
        <td>
            {!! Form::time('pk_S16_SST',old('pk_S16_SST',$PKinetic->pk_S16_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S16_AST',old('pk_S16_AST',$PKinetic->pk_S16_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S16_Collected',old('pk_S16_Collected',$PKinetic->pk_S16_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S16_Checked',old('pk_S16_Checked',$PKinetic->pk_S16_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S16_Comments',old('pk_S16_Comments',$PKinetic->pk_S16_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S17',old('pk_Date_Day_S17',$PKinetic->pk_Date_Day_S17),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S17
        </td>
        <td class="text-center">
            16
        </td>
        <td>
            {!! Form::time('pk_S17_SST',old('pk_S17_SST',$PKinetic->pk_S17_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S17_AST',old('pk_S17_AST',$PKinetic->pk_S17_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S17_Collected',old('pk_S17_Collected',$PKinetic->pk_S17_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S17_Checked',old('pk_S17_Checked',$PKinetic->pk_S17_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S17_Comments',old('pk_S17_Comments',$PKinetic->pk_S17_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S18',old('pk_Date_Day_S18',$PKinetic->pk_Date_Day_S18),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S18
        </td>
        <td class="text-center">
            18
        </td>
        <td>
            {!! Form::time('pk_S18_SST',old('pk_S18_SST',$PKinetic->pk_S18_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S18_AST',old('pk_S18_AST',$PKinetic->pk_S18_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S18_Collected',old('pk_S18_Collected',$PKinetic->pk_S18_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S18_Checked',old('pk_S18_Checked',$PKinetic->pk_S18_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S18_Comments',old('pk_S18_Comments',$PKinetic->pk_S18_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S19',old('pk_Date_Day_S19',$PKinetic->pk_Date_Day_S19),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">
            S19
        </td>
        <td class="text-center">
            24
        </td>
        <td>
            {!! Form::time('pk_S19_SST',old('pk_S19_SST',$PKinetic->pk_S19_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S19_AST',old('pk_S19_AST',$PKinetic->pk_S19_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S19_Collected',old('pk_S19_Collected',$PKinetic->pk_S19_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S19_Checked',old('pk_S19_Checked',$PKinetic->pk_S19_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S19_Comments',old('pk_S19_Comments',$PKinetic->pk_S19_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S20',old('pk_Date_Day_S20',$PKinetic->pk_Date_Day_S20),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">S20</td>
        <td class="text-center">36</td>
        <td>
            {!! Form::time('pk_S20_SST',old('pk_S20_SST',$PKinetic->pk_S20_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S20_AST',old('pk_S20_AST',$PKinetic->pk_S20_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S20_Collected',old('pk_S20_Collected',$PKinetic->pk_S20_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S20_Checked',old('pk_S20_Checked',$PKinetic->pk_S20_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S20_Comments',old('pk_S20_Comments',$PKinetic->pk_S20_Comments),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td>
            {!! Form::date('pk_Date_Day_S21',old('pk_Date_Day_S21',$PKinetic->pk_Date_Day_S21),['class'=>'form-control']) !!}
        </td>
        <td class="text-center">S21</td>
        <td class="text-center">48</td>
        <td>
            {!! Form::time('pk_S21_SST',old('pk_S21_SST',$PKinetic->pk_S21_SST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::time('pk_S21_AST',old('pk_S21_AST',$PKinetic->pk_S21_AST),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S21_Collected',old('pk_S21_Collected',$PKinetic->pk_S21_Collected),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S21_Checked',old('pk_S21_Checked',$PKinetic->pk_S21_Checked),['class'=>'form-control']) !!}
        </td>
        <td>
            {!! Form::text('pk_S21_Comments',old('pk_S21_Comments',$PKinetic->pk_S21_Comments),['class'=>'form-control']) !!}
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