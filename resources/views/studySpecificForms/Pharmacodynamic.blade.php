{{-- Pharmacodynamic Blood Sampling --}}
    <div class="form-group row">
        <h3>Pharmacodynamic Blood Sampling</h3>
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
    <div class="form-group row">
        <p>Tube Type and Volume Required: Hirudin, 1.6mL</p>
        <p>Processing and Storage Instructions: To send the whole blood directly after collection for PD analysis.</p>
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
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
            {!! Form::time('Pharmacodynamic_PD_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_PD_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_PD_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_PD_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S1</p>
        </div>
        <div class="col-sm-1">
            <p>1</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S1_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S1_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S1_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S1_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S1_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S2</p>
        </div>
        <div class="col-sm-1">
            <p>2</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S2_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S2_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S2_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S2_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S2_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S3</p>
        </div>
        <div class="col-sm-1">
            <p>3</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S3_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S3_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S3_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S3_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S3_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S4</p>
        </div>
        <div class="col-sm-1">
            <p>4</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S4_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S4_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S4_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S4_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S4_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S5</p>
        </div>
        <div class="col-sm-1">
            <p>5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S5_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S5_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S5_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S5_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S5_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S6</p>
        </div>
        <div class="col-sm-1">
            <p>8</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S6_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S6_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S6_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S6_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S6_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S7</p>
        </div>
        <div class="col-sm-1">
            <p>12</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S7_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S7_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S7_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S7_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S7_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S8</p>
        </div>
        <div class="col-sm-1">
            <p>16</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S8_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S8_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S8_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S8_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S8_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('Pharmacodynamic_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S9</p>
        </div>
        <div class="col-sm-1">
            <p>24</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S9_SST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('Pharmacodynamic_S9_AST', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S9_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('Pharmacodynamic_S9_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('Pharmacodynamic_S9_Comments', '') !!}
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