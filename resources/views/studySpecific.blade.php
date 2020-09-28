@extends('MasterLayout')

@section('content')
    <h1>This is the Study Specific Page</h1>
    <div class="container-fluid">
        <h3>Study Period 1</h3>
        <ul class="nav nav-pills sticky-top bg-light">
            <li class="active"><a data-toggle="tab" href="#Admission">Admission</a></li>
            <li><a data-toggle="tab" href="#BMVS">Body Measurements and Vital Signs</a></li>
            <li><a data-toggle="tab" href="#BAT">Breath Alcohol Test</a></li>
            <li><a data-toggle="tab" href="#AQuestionnaire">Admission Questionnaire</a></li>
            <li><a data-toggle="tab" href="#UrineTest">Urine Drugs of Abuse Test</a></li>
            <li><a data-toggle="tab" href="#Pharmacokinetic">Pharmacokinetic Blood Sampling</a></li>
            <li><a data-toggle="tab" href="#Pharmacodynamic">Pharmacodynamic Blood Sampling</a></li>
            <li><a data-toggle="tab" href="#PharmacodynamicPD">Pharmacodynamic(PD)Analysis</a></li>
            <li><a data-toggle="tab" href="#Discharge">Discharge</a></li>
            <li><a data-toggle="tab" href="#DischargeQuestionnaire">Discharge Questionnaire</a></li>
            <li><a data-toggle="tab" href="#IQuestionnaire36">Interim Questionnaire(36 hours Post Dose Visit)</a></li>
            <li><a data-toggle="tab" href="#IQuestionnaire48">Interim Questionnaire(48 hours Post Dose Visit)</a></li>
        </ul>
            <hr/>
        <div class="form-group row">
          <div class="col-md-4">
                {!! Form::checkbox('Absent', '') !!}
                {!! Form::label('Absent','Subject absent. Page _ to _ of CRF will be cancelled/removed') !!}
            </div>
            <div class="col-md-1">
                {!! Form::label('AdmissionDate', 'Admission Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('AdmissionDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
            <div class="col-md-1">
                {!! Form::label('DischargeDate', 'Discharge Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('DischargeDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>
        <hr>

        {{-- admission --}}
        <h3>Admission</h3>
        <div class="form-group row tab-content">
            <div id="Admission" class="tab-pane fade in active">
                    <div class="col-md-1">
                        {!! Form::label('dateTaken', 'Date Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                    <div class=" offset-3 col-md-1">
                        {!! Form::label('timeTaken', 'Time Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                    </div>

            {{-- consent --}}
            <h3>Study-Specific Consent Taken</h3>
            <div class="form-group row">
                    <div class="col-md-1">
                        {!! Form::label('dateTaken', 'Date Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                    <div class=" offset-3 col-md-1">
                        {!! Form::label('timeTaken', 'Time Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- body measurements and vital signs --}}
        <div class="form-group row tab-content">
            <div id="BMVS" class="tab-pane fade">
                <h3>Body Measurements and Vital Signs</h3>
                <hr>
                <div class="col-md-1">
                    {!! Form::label('dateTaken', 'Date Taken: ') !!}
                </div>
                <div class="col-md-2">
                    {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                </div>
                <div class=" offset-3 col-md-1">
                    {!! Form::label('timeTaken', 'Time Taken: ') !!}
                </div>
                <div class="col-md-2">
                    {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        {!! Form::label('weight', 'Weight: ') !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::number('weight','', ['class'=>'form-control','placeholder'=>'kg']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        {!! Form::label('height', 'Height: ') !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::number('height', '', ['class'=> 'form-control','placeholder'=>'cm']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        {!! Form::label('bmi', 'Body Mass Index: ') !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::number('bmi', '',['class'=>'form-control','placeholder'=>'kg/m2']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        {!! Form::label('temperature', 'Temperature: ') !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::number('temperature', '',['class'=>'form-control','placeholder'=>'°C']) !!}
                    </div>
                </div>

                {{-- Body measurement ends here--}}

                <h4>Vital Signs</h4>
                <hr>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">Reading Time (24-hour clock)</th>
                        <th scope="col">Blood Pressure (systolic/diastolic) (mmHg)</th>
                        <th scope="col">Heart Rate (beats per min)</th>
                        <th scope="col">Respiratory Rate (breaths per min)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
                        <td>{!! Form::number('Supine_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Supine_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Supine_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Supine_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                        <td>{!! Form::number('Sitting_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">
                            {!! Form::radio('SittingRepeat1', '') !!}
                            {!! Form::label('SittingRepeat1NA','Not Applicable') !!}
                            {!! Form::radio('SittingRepeat1', '') !!}
                            {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
                        </th>
                        <td>{!! Form::number('SittingRepeat1_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('SittingRepeat1_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('SittingRepeat1_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('SittingRepeat1_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">
                            {!! Form::radio('SittingRepeat2', '') !!}
                            {!! Form::label('SittingRepeat2NA','Not Applicable') !!}
                            {!! Form::radio('SittingRepeat2', '') !!}
                            {!! Form::label('SittingRepeat2','Sitting Repeated') !!}
                        </th>
                        <td>{!! Form::number('SittingRepeat2_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('SittingRepeat2_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('SittingRepeat2_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('SittingRepeat2_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4"
                            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                        <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    </tbody>
                </table>
                <p>
                    {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
                </p>
            </div>
            {{-- Body measurements and vital signs ends--}}
        </div>
        {{--breath alcohol test starts here--}}
        <div class="form-group row">
            <div id="BAT" class="tab-pane fade">
                <h3>Breath Alcohol Test</h3>
                <p>(Transcribed from Breath Alcohol Test Logbook)</p>
                <hr>
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}</div>
            <div class="col-md-2">
                {!! Form::date('dateTaken', old('dateTaken'),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::time('timeTaken', old('timeTaken'),['class'=>'form-control']) !!}
            </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('Laboratory', 'Laboratory:') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre',(old('Laboratory')=='Sarawak General Hospital Heart Centre')? 'checked' : '') !!}
                {!! Form::label('Laboratory','Sarawak General Hospital Heart Centre') !!}
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::radio('Laboratory',(old('Laboratory')=='Others')? 'checked' : '') !!}
                        {!! Form::label('Laboratory', 'Others') !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::text('Laboratory_text', old('laboratory'),['class'=>'form-control','placeholder'=>'Please specify']) !!}
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Test</th>
                <th scope="col">%BAC</th>
                <th scope="col">Result</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{!! Form::label('breathalcohol', 'Breath Alcohol: ') !!}</th>
                <td>{!! Form::number('breathalcohol', old('breathalcohol'),['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
                <td>
                    {!! Form::radio('breathalcoholResult', 'Positive',(old('breathalcoholResult')=='Positive')? 'checked' : '') !!}
                    {!! Form::label('breathalcoholResult', 'Positive') !!}
                    {!! Form::radio('breathalcoholResult', 'Negative',(old('breathalcoholResult')=='Negative')? 'checked' : '') !!}
                    {!! Form::label('breathalcoholResult', 'Negative') !!}
                </td>
            <tr>
                <th scope="row" colspan="2"
                    class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
                <td>{!! Form::text('Usertranscribed', old('Usertranscribed'),['class'=>'form-control']) !!}</td>
            </tr>
            </tbody>
        </table>
      </div>

        <div id="AQuestionnaire" class="tab-pane fade">
            <h5>Admission Questionnaire</h5>
            <div class="form-group row">
                <div class="col-md-1">
                    {!! Form::label('dateTaken', 'Date Taken: ') !!}
                </div>
                <div class="col-md-2">
                    {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                </div>
                <div class=" offset-3 col-md-1">
                    {!! Form::label('timeTaken', 'Time Taken: ') !!}
                </div>
                <div class="col-md-2">
                    {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Subject will not be eligible for this study if any of the following exclusion criteria are
                        met:</p>
                </div>
                <div class="col-sm-3">
                    <p>Yes</p>
                </div>
                <div class="col-sm-3">
                    <p>No</p>
                </div>
            </div>

            {{-- Admission Question 1 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>1.	Has the subject had any medical problems within the last 7 days before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission01', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission01', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “No”, proceed to next question.</p>
                    <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the medical problem significantly increase the subject’s risk if enrolled in the study?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0101', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0101', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the medical problem potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0102', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0102', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 2 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>2.	Has the subject taken any medication (including herbal remedies, with the exception of birth control medications) within 7 days before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission02', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission02', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “No”, proceed to next question.</p>
                    <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the use of medication significantly increase the subject’s risk if enrolled in the study?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0201', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0201', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the use of medication potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0202', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0202', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 3 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>3.	Has the subject been hospitalized within 4 weeks before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission03', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission03', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “No”, proceed to next question.</p>
                    <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the hospitalization significantly increase the subject’s risk if enrolled in the study?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0301', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0301', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the hospitalization potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0302', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0302', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 4 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>4.	Has the subject consumed any alcohol or xanthine-containing food or beverage within 24 hours before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission04', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission04', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “Yes”, specify amount and time taken</p>
                    <p>If “No”, proceed to next question.</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::text('Admission04yes', '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the use of alcohol or xanthine potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0401', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0401', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 5 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>5.	Has the subject consumed any food or beverage containing poppy seeds within 48 hours before drugs of abuse test? </p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission05', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission05', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “Yes”, specify amount and time taken</p>
                    <p>If “No”, proceed to next question.</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::text('Admission05yes', '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the use of poppy seeds potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0501', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0501', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 6 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>6.	Has the subject consumed any food or beverage containing grapefruit (including marmalade) and pomelo within 7 days before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission06', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission06', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “Yes”, specify amount and time taken</p>
                    <p>If “No”, proceed to next question.</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::text('Admission06yes', '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the use of grapefruit (including marmalade) or pomelo potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0601', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0601', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 7 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>7.	Has the subject participated in other experimental drug studies within 4 weeks before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission07', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission07', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “Yes”, provide details</p>
                    <p>If “No”, proceed to next question.</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::text('Admission07yes', '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the participation significantly increase the subject’s risk if enrolled in the study</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0701', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0701', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the participation potentially influence the pharmacokinetic profile of the study drug?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0702', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0702', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 8 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>8.    Has the subject participated in donation of (excluding the volume of whole blood that will be drawn during the screening procedures of this study):</p>
                    <ul>
                        <li>Plasma (500 mL) within the last 14 days, or</li>
                        <li>50 mL to 300 mL of whole blood within the last 28 days, or</li>
                        <li>301 mL to 500 mL of whole blood within the last 42 days, or</li>
                        <li>more than 500 mL of whole blood within 84 days before dosing?</li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission08', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission08', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “Yes”, provide details</p>
                    <p>If “No”, proceed to next section.</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::text('Admission08yes', '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the donation potentially increase the subject’s risk if enrolled in the study?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0801', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0801', 'No') !!}</p>
                </div>
            </div>

            {{-- Admission Question 9 --}}
            <div class="row">
                <div class="col-sm-6">
                    <p>9.   Has the subject use of non-acceptable methods of contraception within 14 days before dosing?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission09', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission09', 'No') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>If “Yes”, provide details</p>
                    <p>If “No”, proceed to next section.</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::text('Admission09yes', '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Can the use of this method potentially increase the subject’s risk if enrolled in the study?</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0901', 'Yes') !!}</p>
                </div>
                <div class="col-sm-3">
                    <p>{!! Form::radio('Admission0901', 'No') !!}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::text('PhysicianInitial', old('Usertranscribed'),['class'=>'form-control']) !!}
                </div>
            </div>
            </div>
        </div>

        {{-- urine drugs for abuse test --}}
        <div id="UrineTest" class="tab-pane fade">
            <div class="form-group">
                <h3>Urine Drugs of Abuse Test</h3>
                <p>(Transcribed from Urine Logbook)</p>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
                        {!! Form::date('UDrug_dateTaken', \Carbon\Carbon::now()) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
                        {!! Form::time('UDrug_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
                        {!! Form::time('UDrug_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
                    </div>
                </div>
                <div>
                    {!! Form::label('UDrug_Laboratory', 'Laboratory: ') !!}
                    {!! Form::radio('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
                    {!! Form::label('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
                    {!! Form::radio('UDrug_Laboratory', 'Other') !!}
                    {!! Form::label('UDrug_Laboratory', 'Other, specify: ') !!}
                    {!! Form::text('UDrug_Laboratory', '') !!}
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Test
                    </div>
                    <div class="col-sm-3">
                        Result
                    </div>
                    <div class="col-sm-3">
                        Comment
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_Methamphetamine', 'Methamphetamine (mAMP): ') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::radio('UDrug_Methamphetamine', 'Positive') !!}
                        {!! Form::label('UDrug_Methamphetamine', 'Positive ') !!}
                        {!! Form::radio('UDrug_Methamphetamine', 'Negative') !!}
                        {!! Form::label('UDrug_Methamphetamine', 'Negative ') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('UDrug_Methamphetamine', '') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::radio('UDrug_Morphine', 'Positive') !!}
                        {!! Form::label('UDrug_Morphine', 'Positive ') !!}
                        {!! Form::radio('UDrug_Morphine', 'Negative') !!}
                        {!! Form::label('UDrug_Morphine', 'Negative ') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('UDrug_Morphine', '') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::radio('UDrug_Marijuana', 'Positive') !!}
                        {!! Form::label('UDrug_Marijuana', 'Positive ') !!}
                        {!! Form::radio('UDrug_Marijuana', 'Negative') !!}
                        {!! Form::label('UDrug_Marijuana', 'Negative ') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('UDrug_Marijuana', '') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
                        {!! Form::text('UDrug_Transcribedby', '') !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- conclusion --}}
        <div id="conclusion" class="tab-pane fade">
            <div class="form-group">
                <h3>Conclusion</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <p>Does the subject obey all the restrictions and/or fulfill all the inclusion criteria and none of the exclusion criteria?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::label('inclusionYesNo', 'Yes') !!}</p>
                        <p>{!! Form::radio('inclusionYesNo', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::label('inclusionYesNo', 'No') !!}</p>
                        <p>{!! Form::radio('inclusionYesNo', 'No') !!}</p>
                    </div>
                </div>
                <p>If “Yes”, continue with enrollment into the Study Period 1.</p>
                <p>If “No”, the subject may or may not be admitted into the study ward, based on the discretion of the investigator.</p>
                {!! Form::label('Comments', 'Comments') !!}
                {!! Form::textarea('Comments', '') !!}
                <div class="row">
                    <div class="col-sm-6">
                        <p>Is the subject fit for dosing?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::label('subjectFit', 'Yes') !!}</p>
                        <p>{!! Form::radio('subjectFit', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::label('subjectFit', 'No') !!}</p>
                        <p>{!! Form::radio('subjectFit', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
                        {!! Form::text('physicianSign', '') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                        {!! Form::text('physicianName', '') !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Pharmacokinetic Blood Sampling --}}
        <div id="Pharmacokinetic" class="tab-pane fade">
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
        </div>

        {{-- Pharmacodynamic Blood Sampling --}}
        <div id="Pharmacodynamic" class="tab-content fade">
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
        </div>

        {{-- Pharmacodynamic (PD) Analysis --}}
        <div id="PharmacodynamicPD" class="tab-pane fade">
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
        </div>

        {{-- Discharge --}}
       <div id="discharge" class="tab-pane fade">
        <div class="form-group row">
            <h3>Discharge</h3>
            <div class="col-md-1">
                {!! Form::label('date', 'Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                {!! Form::label('unscheduled ', 'Is this an unscheduled discharge? ') !!}
            </div>
            <div class="col-sm-2">
                <p>
                    {!! Form::radio('unscheduled', 'No') !!}
                    {!! Form::label('unscheduled ', 'No') !!}
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    {!! Form::radio('unscheduled', 'Yes') !!}
                    {!! Form::label('unscheduled ', 'Yes,explain:') !!}
                    {!! Form::text('unscheduled', '') !!}
                </p>
            </div>
        </div>
        <h4>Vital Signs</h4>
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Position</th>
                <th scope="col">Reading Time (24-hour clock)</th>
                <th scope="col">Blood Pressure (systolic/diastolic) (mmHg)</th>
                <th scope="col">Heart Rate (beats per min)</th>
                <th scope="col">Respiratory Rate (breaths per min)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                <td>{!! Form::number('Sitting_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Sitting_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">
                    {!! Form::radio('SittingRepeat1', '') !!}
                    {!! Form::label('SittingRepeat1NA','Not Applicable') !!}
                    {!! Form::radio('SittingRepeat1', '') !!}
                    {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
                </th>
                <td>{!! Form::number('SittingRepeat1_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat1_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat1_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat1_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row" colspan="4"
                    class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            </tbody>
        </table>

        <div id="DischargeQuestionnaire" class="tab-pane fade">
          <h3>Discharge Questionnaire</h3>
            <div class="form-group row">
                    <div class="col-md-1">
                        {!! Form::label('time', 'Time: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-3">
                        <p>Yes</p>
                    </div>
                    <div class="col-sm-3">
                        <p>No</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>1.   Is the subject oriented and has steady gait?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('DischargeQues1', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('DischargeQues1', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>2.	Is the subject fit for discharge?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('DischargeQues1', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('DischargeQues1', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <p>The answers for all the statements above should be “Yes” before a subject is recommended for discharge. The attending physician is required to exercise his clinical judgement. The above criteria serve as a minimal guide only.</p>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        {!! Form::label('Remarks', 'Additional Remarks (where applicable)') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        {!! Form::textarea('Remarks', '') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
                        {!! Form::text('physicianSign', '') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                        {!! Form::text('physicianName', '') !!}
                    </div>
                </div>
           </div>

        {{-- Interim Questionnaire(36 hours Post Dose Visit) --}}
        <div id="IQuestionnaire36" class="tab-pane fade">
            <div class="form-group">
                <h3>Interim Questionnaire(36 hours Post Dose Visit)</h3>
                <div class="form-group row">
                    <div class="col-md-1">
                        {!! Form::label('dateTaken', 'Date Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                    <div class=" offset-3 col-md-1">
                        {!! Form::label('timeTaken', 'Time Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-3">
                        <p>Yes</p>
                    </div>
                    <div class="col-sm-3">
                        <p>No</p>
                    </div>
                </div>


                {{-- Interim Question 1 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>1.	Has the subject had any medical problems since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs01', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs01', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 2</p>
                        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                    </div>
                </div>
                {{-- Interim Question 2 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>2.	Has the subject taken any medication (including herbal remedies), except birth control medications and other medications deemed acceptable by the Investigator other than study drug since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs02', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs02', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 3</p>
                        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                    </div>
                </div>
                {{-- Interim Question 3 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>3.	Has the subject consumed any alcohol or xanthine-containing food or beverage since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs03', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs03', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 4</p>
                        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim36hrs03txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 4 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>4.    Has the subject consumed any food or beverage containing grapefruit (including marmalade) or pomelo since last visit?/p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs04', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs04', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 5</p>
                        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim36hrs04txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 5 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>5.	Has the subject participated in other experimental drug studies since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs05', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs05', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 6</p>
                        <p>If “Yes”, provide details{!! Form::text('Interim36hrs05txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 6 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>6.	Has the subject participated in donation of blood (excluding the volume of whole blood that drawn during the procedures of this study) since last visit:</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs06', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs06', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 7</p>
                        <p>If “Yes”, provide details{!! Form::text('Interim36hrs06txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 7 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>7.   For female subjects of childbearing potential only: Has the subject use of non-acceptable methods of contraception since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs07', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs05', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “Yes”, provide details{!! Form::text('Interim36hrs03txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 8 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>8.   Does any event above potentially influence the PK or PD profile of study drug, or increase the subject’s risk if continue the study?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs08', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs08', 'No') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim36hrs08', 'Not Applicable') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('Interim36hrsInterviewedby', 'Interviewed by (initial): ') !!}
                        {!! Form::text('Interim36hrsInterviewedby', '') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('Interim36hrsCheckedby', 'Checked by (initial): ') !!}
                        {!! Form::text('Interim36hrsCheckedby', '') !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Interim Questionnaire(48 hours Post Dose Visit) --}}
        <div id="IQuestionnaire48" class="tab-pane fade">
            <div class="form-group">
                <h3>Interim Questionnaire(48 hours Post Dose Visit)</h3>
                <div class="form-group row">
                    <div class="col-md-1">
                        {!! Form::label('dateTaken', 'Date Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                    <div class=" offset-3 col-md-1">
                        {!! Form::label('timeTaken', 'Time Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-3">
                        <p>Yes</p>
                    </div>
                    <div class="col-sm-3">
                        <p>No</p>
                    </div>
                </div>

                {{-- Interim Question 1 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>1.	Has the subject had any medical problems since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs01', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs01', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 2</p>
                        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                    </div>
                </div>
                {{-- Interim Question 2 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>2.	Has the subject taken any medication (including herbal remedies), except birth control medications and other medications deemed acceptable by the Investigator other than study drug since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs02', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs02', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 3</p>
                        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
                    </div>
                </div>
                {{-- Interim Question 3 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>3.	Has the subject consumed any alcohol or xanthine-containing food or beverage since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs03', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs03', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 4</p>
                        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim48hrs03txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 4 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>4.    Has the subject consumed any food or beverage containing grapefruit (including marmalade) or pomelo since last visit?/p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs04', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs04', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 5</p>
                        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim48hrs04txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 5 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>5.	Has the subject participated in other experimental drug studies since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs05', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs05', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 6</p>
                        <p>If “Yes”, provide details{!! Form::text('Interim48hrs05txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 6 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>6.	Has the subject participated in donation of blood (excluding the volume of whole blood that drawn during the procedures of this study) since last visit:</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs06', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs06', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “No”, proceed to Question 7</p>
                        <p>If “Yes”, provide details{!! Form::text('Interim48hrs06txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 7 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>7.   For female subjects of childbearing potential only: Has the subject use of non-acceptable methods of contraception since last visit?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs07', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs05', 'No') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>If “Yes”, provide details{!! Form::text('Interim48hrs03txt', '') !!}</p>
                    </div>
                </div>
                {{-- Interim Question 8 --}}
                <div class="row">
                    <div class="col-sm-6">
                        <p>8.   Does any event above potentially influence the PK or PD profile of study drug, or increase the subject’s risk if continue the study?</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs08', 'Yes') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs08', 'No') !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{!! Form::radio('Interim48hrs08', 'Not Applicable') !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('Interim48hrsInterviewedby', 'Interviewed by (initial): ') !!}
                        {!! Form::text('Interim48hrsInterviewedby', '') !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('Interim48hrsCheckedby', 'Checked by (initial): ') !!}
                        {!! Form::text('Interim48hrsCheckedby', '') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
