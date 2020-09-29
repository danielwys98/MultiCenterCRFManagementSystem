{{-- Pharmacodynamic (PD) Analysis --}}
    <div class="form-group row">
        <h3>Pharmacodynamic (PD) Analysis</h3>
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
        <p>Analysis Instructions: Stand whole blood for 30 minutes at room temperature before PD analysis. PD analysis has to be completed within 3 hours.</p>
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
            <p>Time of PD analysis</p>
            <p>(24-hour clock)</p>
        </div>
        <div class="col-sm-1">
            <p>Results for PD analysis</p>
            <p>(AU*min)</p>
        </div>
        <div class="col-sm-1">
            <p>Analysis conducted by</p>
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
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
            {!! Form::time('PharmacodynamicAnalysis_PD_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_PD_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_PD_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_PD_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S1</p>
        </div>
        <div class="col-sm-1">
            <p>1</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S1_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S1_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S1_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S1_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S1_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S2</p>
        </div>
        <div class="col-sm-1">
            <p>2</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S2_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S2_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S2_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S2_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S2_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S3</p>
        </div>
        <div class="col-sm-1">
            <p>3</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S3_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S3_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S3_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S3_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S3_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S4</p>
        </div>
        <div class="col-sm-1">
            <p>4</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S4_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S4_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S4_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S4_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S4_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S5</p>
        </div>
        <div class="col-sm-1">
            <p>5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S5_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S5_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S5_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S5_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S5_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S6</p>
        </div>
        <div class="col-sm-1">
            <p>8</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S6_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S6_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S6_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S6_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S6_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S7</p>
        </div>
        <div class="col-sm-1">
            <p>12</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S7_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S7_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S7_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S7_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S7_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S8</p>
        </div>
        <div class="col-sm-1">
            <p>16</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S8_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S8_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S8_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S8_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S8_Comments', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {!! Form::date('PharmacodynamicAnalysis_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>S9</p>
        </div>
        <div class="col-sm-1">
            <p>24</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S9_TimePDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::time('PharmacodynamicAnalysis_S9_ResultsPDAnalysis', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S9_Collected', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('PharmacodynamicAnalysis_S9_Checked', '') !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('PharmacodynamicAnalysis_S9_Comments', '') !!}
        </div>
    </div>

    {{-- Vital Signs --}}
    <h3>Vital Signs</h3>
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
    <div class="form-group row">
        <p>During the confinement period, vital signs should be measured within ± 30 minutes of the scheduled measurement time (i.e vital signs to be taken within 30 minutes of 09:00 – time post dose 1 hour etc)</p>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <p>Date</p>
            <p>(yyyy/mm/dd)</p>
        </div>
        <div class="col-sm-1">
            <p>Time Post Dose</p>
            <p>(hour)</p>
        </div>
        <div class="col-sm-1">
            <p>Reading Time</p>
            <p>(24-hour clock)</p>
        </div>
        <div class="col-sm-2">
            <p>Sitting Blood Pressure</p>
            <p>(systolic/diastolic) (mmHg)</p>
        </div>
        <div class="col-sm-1">
            <p>Pulse Rate</p>
            <p>(beats per min.)</p>
        </div>
        <div class="col-sm-1">
            <p>Respiration Rate</p>
            <p>(breaths per min.)</p>
        </div>
        <div class="col-sm-3">
            <p>Taken by</p>
            <p>(Initial)</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>1</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_1_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_1_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_1_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_1_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_1_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>2</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_2_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_2_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_2_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_2_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_2_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>5</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_3_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_3_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_3_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_3_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_3_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>8</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_4_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_4_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_4_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_4_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_4_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_1', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>12</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_5_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_5_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_5_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_5_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_5_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>24</p>
        </div>
        <div class="col-sm-8">
            <p>Refer to Discharge Page</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_2', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>36</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_7_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_7_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_7_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_7_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_7_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>48</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_8_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_8_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_8_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_8_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_8_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <p>For repeat/extra vital signs</p>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::date('VitalSigns_Date_Day_3', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-1">
            <p>{!! Form::text('VitalSigns_9_TPD', '') !!}</p>
        </div>
        <div class="col-sm-1">
            {!! Form::time('VitalSigns_9_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('VitalSigns_9_SBP', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_9_Pulse', '') !!}
        </div>
        <div class="col-sm-1">
            {!! Form::text('VitalSigns_9_Respiration', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('VitalSigns_9_TakenBy', '') !!}
        </div>
    </div>
    <div class="row">
        <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading only).</p>
    </div>