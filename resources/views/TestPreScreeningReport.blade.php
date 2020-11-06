<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>
</head>
<style>
    .page-break {
        page-break-after: always;
    }
</style>
<body>
<h3>{{$patient->name}}'s Pre-Screening Details</h3>
<h3>Body Measurements and Vital Signs</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
        {!! Form::label('dateTaken', $BodyAndVitals->dateTaken,['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
        {!! Form::label('timeTaken',$BodyAndVitals->timeTaken) !!}
    </div>
</div>
<br>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('weight', 'Weight: ') !!}
        {!! Form::label('weight',$BodyAndVitals->weight, ['class'=>'form-control','placeholder'=>'kg']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('height', 'Height: ') !!}
        {!! Form::label('height',$BodyAndVitals->height, ['class'=> 'form-control','placeholder'=>'cm']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('bmi', 'Body Mass Index: ') !!}
        {!! Form::label('bmi',$BodyAndVitals->bmi,['class'=>'form-control','placeholder'=>'','readonly']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('temperature', 'Temperature: ') !!}
        {!! Form::label('temperature',$BodyAndVitals->temperature,['class'=>'form-control','placeholder'=>'°C']) !!}
    </div>
</div>
{{--Vital Signs--}}
<h4>Vital Signs</h4>
<hr>
<table border="1">
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
        <td>{!! Form::label('Supine_ReadingTime',$BodyAndVitals->Supine_ReadingTime,['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            Systolic: {!! Form::label('Supine_BP_S', $BodyAndVitals->Supine_BP_S,['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            /
            Diastolic: {!! Form::label('Supine_BP_D', $BodyAndVitals->Supine_BP_D,['class'=>'form-control col-md-6','placeholder'=>'siastolic']) !!}
        </td>
        <td>{!! Form::label('Supine_HR', $BodyAndVitals->Supine_HR,['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::label('Supine_RespiratoryRate', $BodyAndVitals->Supine_RespiratoryRate,['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
        <td>{!! Form::label('Sitting_ReadingTime', $BodyAndVitals->Sitting_ReadingTime,['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            Systolic: {!! Form::label('Sitting_BP_S',$BodyAndVitals->Sitting_BP_S,['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            /
            Diastolic: {!! Form::label('Sitting_BP_D', $BodyAndVitals->Sitting_BP_D,['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::label('Sitting_HR', $BodyAndVitals->Sitting_HR,['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::label('Sitting_RespiratoryRate',$BodyAndVitals->Sitting_RespiratoryRate,['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">{!! Form::label('Standing', 'Standing: ') !!}</th>
        <td>{!! Form::label('Standing_ReadingTime',$BodyAndVitals->Standing_ReadingTime,['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            Systolic: {!! Form::label('Standing_BP_S',$BodyAndVitals->Standing_BP_S,['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            /
            Diastolic: {!! Form::label('Standing_BP_D',$BodyAndVitals->Standing_BP_D,['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::label('Standing_HR', $BodyAndVitals->Standing_HR,['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::label('Standing_RespiratoryRate', $BodyAndVitals->Standing_RespiratoryRate,['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::label('Initial',$BodyAndVitals->Initial,['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
<p>
    {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
</p>
<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
    {!! Form::label('Comment',$BodyAndVitals->Comment,['class'=>'form-control']) !!}
</div>
{{--BATER--}}
<div class="page-break">
    <br>
    <h3>Breath Alcohol Test</h3>
    <p>(Transcribed from Breath Alcohol Test Logbook)</p>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::label('dateTaken', $BATER->dateTaken,['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
            {!! Form::label('timeTaken',$BATER->timeTaken,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('Laboratory', 'Laboratory:') !!}
            {!! Form::label('Laboratory',$BATER->laboratory) !!}

        </div>
    </div>
    <table border="1">
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
            <td>{!! Form::label('breathalcohol',$BATER->breathalcohol,['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
            <td>
                {!! Form::label('breathalcoholResult', $BATER->breathalcoholResult) !!}
            </td>
        <tr>
            <th scope="row" colspan="2"
                class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
            <td>{!! Form::label('Usertranscribed', $BATER->Usertranscribed) !!}</td>
        </tr>
        </tbody>
    </table>

    {{--Electrocardiogram--}}
    <h3>Electrocardiogram Recording</h3>
    <p>(ECG Recording attached in Appendix)</p>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('ECGdateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('ECGdateTaken', $BATER->ECGdateTaken,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('conclusion', 'Conclusion: ') !!}
            {!! Form::label('conclusion', $BATER->conclusion) !!}
        </div>
    </div>
</div>


{{--Medical History--}}
<h3>Medical History</h3>
<hr>
<div class="row">
    <div class="col-sm-3">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
        {!! Form::label('dateTaken', \Carbon\Carbon::now()) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
        {!! Form::label('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
    </div>
</div>
<h4>System Review</h4>
<hr>
<table border="1">
    <thead>
    <tr>
        <th scope="col">System Review</th>
        <th scope="col">If abnormal, give pertinent details</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Allergy</th>
        <td>{!! Form::label('allergy',$Medical->Allergy)!!}</td>
    </tr>
    <tr>
        <th>Eyes-Ears-Nose-Throat</th>
        <td>{!! Form::label('eent',$Medical->EENT) !!}</td>
    </tr>
    <tr>
        <th>Respiratory</th>
        <td>{!! Form::label('respiratory',$Medical->Respiratory) !!}</td>
    </tr>
    <tr>
        <th>Cardiovascular</th>
        <td>{!! Form::label('cardiovascular',$Medical->Cardiovascular) !!}</td>
    </tr>
    <tr>
        <th>Gastrointestinal</th>
        <td>{!! Form::label('gastrointestinal', $Medical->Gastrointestinal) !!}</td>
    </tr>
    <tr>
        <th>Genitourinary</th>
        <td>{!! Form::label('genitourinary', $Medical->Genitourinary) !!}</td>
    </tr>
    <tr>
        <th>Neurological</th>
        <td>{!! Form::label('neurological', $Medical->Respiratory) !!}</td>
    </tr>
    <tr>
        <th>Haematopoietic-Lymphatic</th>
        <td>{!! Form::label('haematopoieticL', $Medical->HaematopoieticL) !!}</td>
    </tr>
    <tr>
        <th>Endocrine-Metabolic</th>
        <td>{!! Form::label('endocrineM',$Medical->EndocrineM) !!}</td>
    </tr>
    <tr>
        <th>Dermatological</th>
        <td>{!! Form::label('dermatological', $Medical->Respiratory) !!}</td>
    </tr>
    <tr>
        <th>Musculoskeletal</th>
        <td>{!! Form::label('musculoskeletal', $Medical->Musculoskeletal) !!}</td>
    </tr>
    <tr>
        <th>Psychological</th>
        <td>{!! Form::label('psychological', $Medical->Psychological) !!}</td>
    </tr>
    <tr>
        <th>Family History</th>
        <td>{!! Form::label('familyHistory',$Medical->FamilyHistory) !!}</td>
    </tr>
    <tr>
        <th>Surgical History</th>
        <td>{!! Form::label('surgicalHistory', $Medical->SurgicalHistory) !!}</td>
    </tr>
    <tr>
        <th>Previous Hospitalization</th>
        <td>{!! Form::label('prevHospitalization', $Medical->PrevHospitalization) !!}</td>
    </tr>
    </tbody>
</table>
<h4>Subject Lifestyle</h4>
<hr>
<table border="1">
    <tr>
        <th>Subject Lifestyle</th>
        <th>No</th>
        <th>Pertinent details (if applicable)</th>
    </tr>
    <tr>
        <td>Smoker</td>
        @if($Medical->Smoker!='No')
            <td>{!! Form::label('smoker','Yes') !!}</td>
            <td>
                Number of sticks a day: {!! Form::label('smoker_txt',$Medical->Smoker) !!}
            </td>
        @else
            <td>{!! Form::label('smoker',$Medical->Smoker) !!}</td>
            <td>
                Number of sticks a day: {!! Form::label('smoker_txt','None') !!}
            </td>
        @endif
    </tr>
    <tr>
        <td>Regular Alcohol Intake</td>
        @if($Medical->RAI!='No')
            <td>{!! Form::label('rai','Yes') !!}</td>
            <td>
                {!! Form::label('rai_txt', 'amount and frequency: ') !!}
                {!! Form::label('rai_txt',$Medical->RAI) !!}
            </td>x
        @else
            <td>{!! Form::label('rai',$Medical->RAI) !!}</td>
            <td>Amount and frequency: {!! Form::label('rai','None') !!}</td>
        @endif
    </tr>
    <tr>
        <td>Regular Medications or Supplements</td>
        @if($Medical->RMS!='No')
            <td>{!! Form::label('rms','Yes') !!}</td>
            <td>
                {!! Form::label('rms_txt', 'Describe: ') !!}
                {!! Form::label('rms_txt',$Medical->RMS) !!}
            </td>
        @else

            <td>{!! Form::label('rms',$Medical->RMS) !!}</td>
            <td>{!! Form::label('rms','Describe: None') !!}</td>
        @endif
    </tr>
    <tr>
        <td>Regular Exercise</td>
        @if($Medical->RegularExercise!='No')
            <td>{!! Form::label('regularExercise', 'Yes') !!}</td>
            <td>
                {!! Form::label('regularExercise_txt', 'Activity and Frequency: ') !!}
                {!! Form::label('regularExercise_txt',$Medical->RegularExercise) !!}
            </td>
        @else
            <td>{!! Form::label('regularExercise', $Medical->RegularExercise) !!}</td>
            <td>{!! Form::label('regularExercise', 'Activity and Frequency: None') !!}</td>
        @endif
    </tr>
    <tr>
        <td>Blood Donations</td>
        @if($Medical->BloodDonations!='No')
            <td>{!! Form::label('regularExercise', 'Yes') !!}</td>
            <td>
                {!! Form::label('regularExercise_txt', 'Date and Blood Volume: ') !!}
                {!! Form::label('regularExercise_txt',$Medical->BloodDonations) !!}
            </td>
        @else
            <td>{!! Form::label('regularExercise', $Medical->BloodDonations) !!}</td>
            <td>{!! Form::label('regularExercise', 'Date and Blood Volume: None') !!}</td>
        @endif
    </tr>
    <tr>
        <td>Regular Periods</td>
        @if($Medical->RegularPeriods=='Yes')
            <td>{!! Form::label('regularExercise',$Medical->RegularPeriods) !!}</td>
            <td>
                {!! Form::label('regularExercise_txt',$Medical->RegularPeriods_Yes_txt) !!}
            </td>
        @elseif($Medical->RegularPeriods=='No')
            <td>{!! Form::label('regularExercise', $Medical->RegularPeriods) !!}</td>
            <td>{!! Form::label('regularExercise', $Medical->RegularPeriods_No_txt) !!}</td>
        @elseif($Medical->RegularPeriods=='Not Applicable')
            <td>{!! Form::label('regularExercise',$Medical->RegularPeriods) !!}</td>
            <td>{!! Form::label('regularExercise', $Medical->RegularPeriods) !!}</td>
        @endif
    </tr>
    <tr>
        <td>Active Sexual Activities</td>
        @if($Medical->ActiveSexAct!='No')
            <td>{!! Form::label('regularExercise',$Medical->ActiveSexAct) !!}</td>
            <td>{!! Form::label('regularExercise','None') !!}</td>
        @else
            <td>{!! Form::label('regularExercise', $Medical->ActiveSexAct) !!}</td>
            <td>{!! Form::label('regularExercise', 'None') !!}</td>
        @endif
    </tr>
    <tr>
        <td>
            Fertility Control
        </td>
        @if($Medical->FertilityControl=='Yes')
            <td>{!! Form::label('regularExercise',$Medical->FertilityControl) !!}</td>
            <td>
                {!! Form::label('regularExercise_txt',$Medical->FertilityControl_Yes_txt) !!}
            </td>
        @elseif($Medical->FertilityControl=='No')
            <td>{!! Form::label('regularExercise', $Medical->FertilityControl) !!}</td>
            <td>{!! Form::label('regularExercise', $Medical->FertilityControl_No_txt) !!}</td>
        @elseif($Medical->FertilityControl=='Not Applicable')
            <td>{!! Form::label('regularExercise',$Medical->FertilityControl) !!}</td>
            <td>{!! Form::label('regularExercise', $Medical->FertilityControl) !!}</td>
        @endif
    </tr>
    <tr>
        <td>Breastfeeding Female</td>
        @if($Medical->Breastfeeding!='No')
            <td>{!! Form::label('regularExercise',$Medical->Breastfeeding) !!}</td>
            <td>{!! Form::label('regularExercise','None') !!}</td>
        @else
            <td>{!! Form::label('regularExercise', $Medical->Breastfeeding) !!}</td>
            <td>{!! Form::label('regularExercise', 'None') !!}</td>
        @endif
    </tr>
</table>
<div>
    {!! Form::label('conclusion', 'Conclusion: ') !!}
    {!! Form::label('conclusion',$Medical->Conclusion) !!}
</div>

<div class="page-break">
    {{--TODO Physical Exam here--}}
</div>

<div class="page-break">
    {{--TODO Urine Test here--}}
</div>

<div class="page-break">
    {{--TODO Lab Test here--}}
</div>

{{--Serology Test--}}
<h3>Serology Test</h3>
<p>(Laboratory Test Report attached in Appendix)</p>
<hr>
<div class="row">
    {!! Form::label('dateCTaken', 'Date of Consent Taken: ') !!}
    {!! Form::label('dateCTaken',$Serology->dateCTaken ) !!}
</div>

<h5>Blood (Hepatitis B and C & HIV Screening Test)</h5>
<div class="row">
    {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
    {!! Form::label('dateBCollected',$Serology->dateBCollected) !!}
</div>
<div>
    {!! Form::label('laboratory', 'Laboratory: ') !!}
    {!! Form::label('laboratory',$Serology->Laboratory) !!}
</div>
<div class="page-break">

</div>
{{--Inclusion Exclusion--}}
<h3>Inclusion and Exclusion Criteria</h3>
<hr>
<h5>Inclusion Criteria</h5>
<hr>
<div class="row">
    <p>Subject will be eligible for this study if all of the following inclusion criteria are
        met:</p>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>1. Age within 18 - 55 years.</p>
        <p>{!! Form::label('Inclusion01', $InclusionExclusion->Inclusion01) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>2. Weight within the BMI of 18-30 kg/m2.</p>
        <p>{!! Form::label('Inclusion02', $InclusionExclusion->Inclusion02) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>3. Non-smoker.</p>
        <p>{!! Form::label('Inclusion03', $InclusionExclusion->Inclusion03) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>4. Able to complete the clinical study including the follow-up.</p>
        <p>{!! Form::label('Inclusion04', $InclusionExclusion->Inclusion04) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>5. Capable of providing written informed consent.</p>
        <p>{!! Form::label('Inclusion05',$InclusionExclusion->Inclusion05) !!}</p>
    </div>
</div>

<h5>Exclusion Criteria</h5>
<hr>
<div class="row">
    <div class="col-sm-6">
        <p>Subject will not be eligible for this study if any of the following exclusion criteria are
            met:</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>1. Breastfeeding female.</p>
        <p>{!! Form::label('Exclusion01', $InclusionExclusion->Exclusion01) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>2. Pregnancy test positive female.</p>
        <p>{!! Form::label('Exclusion02', $InclusionExclusion->Exclusion02) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>3. Systolic blood pressure outside 90-140 mmHg or diastolic blood pressure outside 50-90
            mmHg.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion03',$InclusionExclusion->Exclusion03) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>4. Bradycardia defined as symptomatic heart rate < 50 bpm or asymptomatic heart rate < 45 bpm
            and tachycardia defined as heart rate > 100 bpm.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion04', $InclusionExclusion->Exclusion04) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>5. Clinically significant ECG abnormalities.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion05',$InclusionExclusion->Exclusion05) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>6. QTc > 450 ms for male and > 460 ms for female.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion06',$InclusionExclusion->Exclusion06) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>7. A history of asthma and allergies, or any significant adverse reactions, to any
            medications.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion07', $InclusionExclusion->Exclusion07) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>8. Clinically significant medical history of eyes, ears, nose, throat, respiratory,
            cardiovascular, gastrointestinal, genitourinary, neurological, haematopoietic, lymphatic,
            endocrine, metabolic, dermatological, musculoskeletal, psychological, family history or
            surgical history.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion08',$InclusionExclusion->Exclusion08) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>9. A history of gastritis or peptic ulcer.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion09',$InclusionExclusion->Exclusion09) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>10. Family history of sudden cardiac death.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion10',$InclusionExclusion->Exclusion10) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>11. Clinically significant physical examination finding.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion11',$InclusionExclusion->Exclusion11) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>12. Clinically significant laboratory abnormalities.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion12',$InclusionExclusion->Exclusion12) !!}</p>
    </div>=
</div>
<div class="row">
    <div class="col-sm-6">
        <p>13. Haemoglobin < 12.0 g/dL for male and < 11.0 g/dL for female at screening.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion13', $InclusionExclusion->Exclusion13) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>14. Total bilirubin > 1.25 x upper limit of normal (unless it is an isolated elevation where
            the direct bilirubin is ≤ 35% of total), ALT/AST > 1.5 x upper limit of normal, or CPK > 2 x
            upper limit of normal.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion14', $InclusionExclusion->Exclusion14) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>15. Hepatitis B, Hepatitis C or HIV positive.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion15', $InclusionExclusion->Exclusion15) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>16. A history of drug or substance abuse, including alcohol (≥ 14 units per week) within 6
            months before dosing (1 unit of alcohol equals approximately ½ pint [285 mL] of beer, 1
            glass [125 mL] of wine, or 1 shot [25 mL] of spirit).</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion16', $InclusionExclusion->Exclusion16) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>17. Urine DOA test positive.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion17',$InclusionExclusion->Exclusion17) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>18. Breath alcohol test positive.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion18',$InclusionExclusion->Exclusion18) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>19. Have taken any medications (including herbal remedies) within 7 days before dosing, with
            the exception of birth control and other medications deemed acceptable by the
            Investigator.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion19',$InclusionExclusion->Exclusion19) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>20. Clinically significant illness or injury or hospitalisation for any reason within 28 days
            before dosing.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion20',$InclusionExclusion->Exclusion20) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>21. Participation in other clinical study involving a marketed or investigational drug within
            28 days or 10 half-lives of the drug before dosing, whichever is longer.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion21',$InclusionExclusion->Exclusion21) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>22. Donation of > 500 mL of plasma within 14 days before dosing; or donation or loss of whole
            blood (excluding the amount of blood collected during screening) before dosing as
            follows:</p>
        <p>- 50-300 mL within 28 days,</p>
        <p>- 301-500 mL within 42 days, or</p>
        <p>- > 500 mL within 84 days.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion22',$InclusionExclusion->Exclusion22) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>23. Difficulty to swallow the study drug.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion23',$InclusionExclusion->Exclusion23) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>24. Any other medical condition or reason that, in the opinion of the Investigator or
            Research Physician, makes the subject unsuitable to participate in the clinical study.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion24',$InclusionExclusion->Exclusion24) !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>25. Female of childbearing potential having unprotected sexual intercourse with any
            nonsterile male partner within 14 days before dosing; acceptable methods of contraception
            include:</p>
        <p>- double barrier (1 by each partner), and at least 1 of these barriers (condom, cervical cap,
            diaphragm or sponge) must contain spermicide,</p>
        <p>- hormonal (oral, injectable, transdermal, intravaginal or implantable),</p>
        <p>- intrauterine contraceptive system,</p>
        <p>- surgical (vasectomy or tubal ligation), or</p>
        <p>- sexual abstinence.</p>
    </div>
    <div class="col-sm-3">
        <p>{!! Form::label('Exclusion25',$InclusionExclusion->Exclusion25) !!}</p>
    </div>
</div>
<div class="page-break">
{{--Conclusion and Signature--}}
<h3>Conclusion</h3>
<hr>
<div class="row">
        <p>Does the subject fulfill all the inclusion criteria and none of the exclusion criteria?</p>
        <p>{!! Form::label('inclusionyesno',$Conclu->inclusionYesNo) !!}</p>
    </div>
</div>
<p>If “Yes”, enroll the subject into the study.</p>
<p>If “No”, provide details. The subject may or may not be enrolled into the study, based on the
    discretion of the research physician.</p>
{!! Form::label('NoDetails',(($Conclu->inclusionyesno)!='Yes')? $Conclu->inclusionYesNo : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}<br/>
<div>
    <p>The abnormality (ies) not clinically significant, this subject can be enrolled into this study and is safe to receive <strong>{{$study->study_name}}</strong>, the study medication.<p></p>
</div>
@if($Conclu->abnormality!=NULL)
<div>
    {!! Form::label('abnormality', 'Clinically significant abnormality (ies), this subject cannot be enrolled into this study.') !!}
</div>
    @endif
</body>



