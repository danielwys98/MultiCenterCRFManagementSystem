{{-- Pharmacokinetic Blood Sampling --}}
    <div class="form-group row">
        <h3>Pharmacokinetic Blood Sampling</h3>
        <div class="col-md-1">
            {!! Form::label('Day1', 'Day 1: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('Day1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-md-1">
            {!! Form::label('Day3', 'Day 3: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('Day3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <p>Tube Type and Volume Required: Heparin, 3mL</p>
        <p>Processing and Storage Instructions: Centrifuge at 4˚C for 10 minutes at 3000 rpm within 45 minutes, store below -20˚C.</p>
    </div>

    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-3">
            <p>Last Food Intake</p>
        </div>
        <div class="col-sm-3">
            <p>Last Water Intake</p>
        </div>
        <div class="col-sm-3">
            <p>Study Drug Dosing</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p>Date</p>
        </div>
        <div class="col-sm-3">
            {!! Form::date('LastFoodDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::date('LastWaterDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::date('StudyDrugDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p>Time</p>
            <p>(24-hour clock)</p>
        </div>
        <div class="col-sm-3">
            {!! Form::time('LastFoodTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::time('LastWaterTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::time('StudyDrugTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <p>Date</p>
            <p>(yyyy/mm/dd)</p>
        </div>
        <div class="col-sm-1">
            <p>Sample Code</p>
        </div>
        <div class="col-sm-1">
            <p>Time Post Dose</p>
            <p>(hour)</p>
        </div>
        <div class="col-sm-1">
            <p>Scheduled Sampling Time</p>
            <p>(24-hour clock)</p>
        </div>
        <div class="col-sm-1">
            <p>Actual Sampling Time</p>
            <p>(24-hour clock)</p>
        </div>
        <div class="col-sm-1">
            <p>Collected by</p>
        </div>
        <div class="col-sm-1">
            <p>Checked by</p>
        </div>
        <div class="col-sm-4">
            <p>Comments</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>PD</p>
        </div>
        <div class="col-sm-1">
            <p>______</p>
        </div>
        <div class="col-sm-1">
            <p>______</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_PD_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_PD_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_PD_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_PD_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S1</p>
        </div>
        <div class="col-sm-1">
            <p>0.50</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S1_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S1_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S1_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S1_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S1_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S2</p>
        </div>
        <div class="col-sm-1">
            <p>1</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S2_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S2_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S2_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S2_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S2_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S3</p>
        </div>
        <div class="col-sm-1">
            <p>1.5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S3_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S3_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S3_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S3_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S3_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S4</p>
        </div>
        <div class="col-sm-1">
            <p>2</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S4_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S4_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S4_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S4_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S4_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S5</p>
        </div>
        <div class="col-sm-1">
            <p>2.5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S5_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S5_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S5_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S5_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S5_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S6</p>
        </div>
        <div class="col-sm-1">
            <p>3</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S6_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S6_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S6_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S6_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S6_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S7</p>
        </div>
        <div class="col-sm-1">
            <p>3.5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S7_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S7_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S7_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S7_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S7_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S8</p>
        </div>
        <div class="col-sm-1">
            <p>4</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S8_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S8_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S8_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S8_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S8_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S9</p>
        </div>
        <div class="col-sm-1">
            <p>4.5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S9_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S9_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S9_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S9_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S9_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S10</p>
        </div>
        <div class="col-sm-1">
            <p>5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S10_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S10_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S10_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S10_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S10_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S11</p>
        </div>
        <div class="col-sm-1">
            <p>6</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S11_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S11_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S11_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S11_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S11_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S12</p>
        </div>
        <div class="col-sm-1">
            <p>7</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S12_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S12_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S12_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S12_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S12_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S13</p>
        </div>
        <div class="col-sm-1">
            <p>8</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S13_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S13_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S13_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S13_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S13_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S14</p>
        </div>
        <div class="col-sm-1">
            <p>10</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S14_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S14_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S14_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S14_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S14_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S15</p>
        </div>
        <div class="col-sm-1">
            <p>12</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S15_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S15_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S15_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S15_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S15_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S16</p>
        </div>
        <div class="col-sm-1">
            <p>14</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S16_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S16_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S16_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S16_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S16_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S17</p>
        </div>
        <div class="col-sm-1">
            <p>16</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S17_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S17_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S17_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S17_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S17_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S18</p>
        </div>
        <div class="col-sm-1">
            <p>18</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S18_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S18_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S18_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S18_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S18_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S19</p>
        </div>
        <div class="col-sm-1">
            <p>24</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S19_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S19_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S19_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S19_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S19_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S20</p>
        </div>
        <div class="col-sm-1">
            <p>36</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S20_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S20_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S20_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S20_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S20_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacokinetic_Date_Day_3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S21</p>
        </div>
        <div class="col-sm-1">
            <p>48</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S21_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacokinetic_S21_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S21_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacokinetic_S21_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacokinetic_S21_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p>NS = Not statistically significant</p>
        </div>
        <div class="col-md-3">
            <p>NA = Not available (state reason)</p>
        </div>
    </div>
    <div class="row">
        <p>Reasons for significant time deviation and / or sample not available:</p>
        <ul>
            <li>1-  Problematic blood sampling</li>
            <li>2-  No blood collected due to no venous access</li>
            <li>3-  Early/late sampling</li>
            <li>4-  Sample tube breakage</li>
            <li>5-  Re-cannulation</li>
            <li>6-  Other (specify)</li>
        </ul>
    </div>