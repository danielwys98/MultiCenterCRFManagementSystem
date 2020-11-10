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
<h3>{{$patient->name}} {{$study->study_name}}'s study specific details for study period {{$study_period}}</h3>
<h3>Admission</h3>
<hr>
<div class="row">
    <div class="col-2">
        {!! Form::label('AdmissionDateTaken', 'Date Taken: ') !!}
        {!! Form::label('AdmissionDateTaken', $Admission->AdmissionDateTaken,['readonly'])!!}
    </div>

    <div class="col-4">
        {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
        {!! Form::label('AdmissionTimeTaken', old('AdmissionTimeTaken',$Admission->AdmissionTimeTaken)) !!}
    </div>
</div>

{{-- consent --}}

<h3>Study-Specific Consent Taken</h3>
<hr>
<div class="form-group row">
    {!! Form::label('ConsentDateTaken', 'Date Taken: ') !!}
    {!! Form::label('ConsentDateTaken',old('ConsentDateTaken',$Admission->ConsentDateTaken),['class'=>'form-control']) !!}

</div>
<div>
    {!! Form::label('ConsentTimeTaken', 'Time Taken: ') !!}
    {!! Form::label('ConsentTimeTaken',old('ConsentTimeTaken',$Admission->ConsentTimeTaken),['class'=>'form-control']) !!}
</div>
<div class="page-break">
    <div>
        <h3>Body Measurements and Vital Signs</h3>
        <hr>
        @if($BMVS->Absent == 1)
            <div class="form-group row">
                    <pre><h4>Subject is absent from Body Measurement and Vital Signs for study period {{$study_period}}!</h4></pre>
            </div>
        @else
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::label('dateTaken',old('dateTaken',$BMVS->dateTaken),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                {!! Form::label('timeTaken', old('timeTaken',$BMVS->timeTaken),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('weight', 'Weight: ') !!}
                {!! Form::label('weight',old('weight',$BMVS->weight.' KG'), ['class'=>'form-control','placeholder'=>'kg']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('height', 'Height: ') !!}
                {!! Form::label('height', old('height',$BMVS->height.' CM'), ['class'=> 'form-control','placeholder'=>'cm']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('bmi', 'Body Mass Index: ') !!}
                {!! Form::label('bmi', old('bmi',$BMVS->bmi.' KG/m^2'),['class'=>'form-control','placeholder'=>'kg/m2','readonly'],false) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('temperature', 'Temperature: ') !!}
                {!! Form::label('temperature', old('temperature',$BMVS->temperature.' &deg;C'),['class'=>'form-control','placeholder'=>'°C'],false) !!}
            </div>
        </div>


        {{-- Body measurement ends here--}}


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
                <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                <td>{!! Form::label('Sitting_ReadingTime',old('Sitting_ReadingTime',$BMVS->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>
                    Systolic: {!! Form::label('Sitting_BP_S', old('Sitting_BP_S',$BMVS->Sitting_BP_S),['class'=>'form-control','placeholder'=>'']) !!}
                    /
                    Diastolic: {!! Form::label('Sitting_BP_D', old('Sitting_BP_D',$BMVS->Sitting_BP_D),['class'=>'form-control','placeholder'=>'']) !!}
                </td>
                <td>{!! Form::label('Sitting_HR', old('Sitting_HR',$BMVS->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$BMVS->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>

                @if($BMVS->Sitting_BP_Repeat1 == NULL)
                    <th scope="row">
                    {!! Form::label('SittingRepeat1','Sitting Repeated Not Applicable')!!}
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat1','Not Applicable')!!}</td>
                    </th>
                @else
                    <th scope="row">
                        {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
                    </th>
                    <td>{!! Form::label('Sitting_ReadingTime_Repeat1',old('Sitting_ReadingTime_Repeat1',$BMVS->Sitting_ReadingTime_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>
                        Systolic: {!! Form::label('Sitting_BP_S_Repeat1', old('Sitting_BP_S_Repeat1',$BMVS->Sitting_BP_S_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}
                        /
                        Diastolic: {!! Form::label('Sitting_BP_D_Repeat1', old('Sitting_BP_D_Repeat1',$BMVS->Sitting_BP_D_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}
                    </td>
                    <td>{!! Form::label('Sitting_HR_Repeat1', old('Sitting_HR_Repeat1',$BMVS->Sitting_HR_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_RespiratoryRate_Repeat1', old('Sitting_RespiratoryRate_Repeat1',$BMVS->Sitting_RespiratoryRate_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
                @endif
            </tr>
            <tr>
                @if($BMVS->Sitting_BP_Repeat2 == NULL)
                    <th scope="row">
                        {!! Form::label('SittingRepeat2', 'Sitting Repeated Not Applicable') !!}
                    </th>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                    <td>{!! Form::label('SittingRepeat2','Not Applicable')!!}</td>
                @else
                    <th scope="row">{!! Form::label('SittingRepeat2', 'Sitting Repeated') !!}</th>
                    <td>{!! Form::label('Sitting_ReadingTime_Repeat2',old('Sitting_ReadingTime_Repeat2',$BMVS->Sitting_ReadingTime_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>
                        Systolic: {!! Form::label('Sitting_BP_S_Repeat2', old('Sitting_BP_S_Repeat2',$BMVS->Sitting_BP_S_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}
                        /
                        Diastolic: {!! Form::label('Sitting_BP_D_Repeat2', old('Sitting_BP_D_Repeat2',$BMVS->Sitting_BP_D_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}
                    </td>
                    <td>{!! Form::label('Sitting_HR_Repeat2', old('Sitting_HR_Repeat2',$BMVS->Sitting_HR_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    <td>{!! Form::label('Sitting_RespiratoryRate_Repeat2', old('Sitting_RespiratoryRate_Repeat2',$BMVS->Sitting_RespiratoryRate_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
                @endif
            </tr>
            <tr>
                <th scope="row" colspan="4"
                    class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                <td>{!! Form::label('Initial', old('Initial',$BMVS->Initial),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            </tbody>
        </table>
        <p>
            {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
        </p>
    </div>
   @endif
</div>

{{--BREATH ALCOHOL TEST STARTS HERE--}}
<div class="page-break">
<h3>Breath Alcohol Test</h3>
<p>(Transcribed from Breath Alcohol Test Logbook)</p>
<hr>
    @if($BAT->Absent == 1)
        <div class="form-group row">
            <div class="col-md-1">
                <pre><h4>Subject is absent from Breath Alcohol Test for study period {{$study_period}}!</h4></pre>
            </div>
    @elseif($BAT->NApplicable)
                <div class="form-group row">
                    <div class="col-md-1">
                        <pre><h4>Not applicable for this study!</h4></pre>
                    </div>
    @else
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
        {!! Form::label('dateTaken',old('dateTaken',$BAT->dateTaken),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
        {!! Form::label('timeTaken', old('timeTaken',$BAT->timeTaken),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('Laboratory', 'Laboratory:') !!}
        {!! Form::label('Laboratory', old('Laboratory',$BAT->laboratory)) !!}
    </div>
</div>
<br>
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
        <td>{!! Form::label('breathalcohol', old('breathalcohol',$BAT->breathalcohol),['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
        <td>
            {!! Form::label('breathalcoholResult', 'Negative',(old('breathalcoholResult',$BAT->breathalcoholResult)=='Negative')? 'checked' : '',['id'=>'Negative']) !!}
        </td>
    <tr>
        <th scope="row" colspan="2" class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
        <td>{!! Form::label('Usertranscribed', old('Usertranscribed',$BAT->Usertranscribed),['class'=>'form-control']) !!}</td>
    </tr>
    </tbody>
</table>
        @endif
     </div>
</div>

{{--Admission Questionnaire starts here--}}
<h3>Admission Questionnaire</h3>
<hr>
    @if($AQuestionnaire->Absent ==1)
                <div class="row">
                    <div class="col-sm-6">
                        <pre><h4>Subject is absent from Body Measurement and Vital Signs for study period {{$study_period}}!</h4></pre>
                    </div>
                </div>
    @else
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('AQuestionnaireDateTaken', 'Date Taken: ') !!}
            {!! Form::label('AQuestionnaireDateTaken',old('AQuestionnaireDateTaken',$AQuestionnaire->AQuestionnaireDateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('AQuestionnaireTimeTaken', 'Time Taken: ') !!}
            {!! Form::label('AQuestionnaireTimeTaken',old('AQuestionnaireTimeTaken',$AQuestionnaire->AQuestionnaireTimeTaken),['class'=>'form-control']) !!}
        </div>
    </div>
    <hr>
{{-- Admission Question 1 --}}
<div class="row">
    <div class="col-md-6">
        <p>1. Has the subject had any medical problems within the last 7 days before dosing?</p>
        <p>{!! Form::label('MedicalProblem', ($AQuestionnaire->MedicalProblem)) !!}</p>
    </div>
</div>
@if($AQuestionnaire->MedicalProblem == "Yes")
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem significantly increase the subject’s risk if enrolled in the study?</p>
            <p>{!! Form::label('MP_IncreaseRisk', ($AQuestionnaire->MP_IncreaseRisk)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem potentially influence the pharmacokinetic profile of the study drug?</p>
            <p>{!! Form::label('MP_InfluencePKinetic',($AQuestionnaire->MP_InfluencePKinetic)) !!}</p>
        </div>
    </div>
@endif
<hr>

{{-- Admission Question 2 --}}


<div class="row">
    <div class="col-sm-6">
        <p>2. Has the subject taken any medication (including herbal remedies, with the exception of birth control
            medications) within 7 days before dosing?</p>
        <p>{!! Form::label('Medication', ($AQuestionnaire->Medication)) !!}</p>
    </div>
</div>
@if ($AQuestionnaire->Medication == "Yes")
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication significantly increase the subject’s risk if enrolled in the study?</p>
            <p>{!! Form::label('Medi_IncreaseRisk',($AQuestionnaire->Medi_IncreaseRisk)) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication potentially influence the pharmacokinetic profile of the study drug?</p>
            <p>{!! Form::label('Medi_InfluencePKinetic', ($AQuestionnaire->Medi_InfluencePKinetic)) !!}</p>
        </div>
    </div>
@endif
<hr>

{{-- Admission Question 3 --}}

    <div class="row">
        <div class="col-sm-6">
            <p>3. Has the subject been hospitalized within 4 weeks before dosing?</p>
            <p>{!! Form::label('Hospitalized',($AQuestionnaire->Hospitalized)) !!}</p>
        </div>
    </div>
    @if($AQuestionnaire->Hospitalized == "Yes")
        <div class="row">
            <div class="col-sm-6">
                <p>Can the hospitalization significantly increase the subject’s risk if enrolled in the study?</p>
                <p>{!! Form::label('H_IncreaseRisk', ($AQuestionnaire->H_IncreaseRisk)) !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Can the hospitalization potentially influence the pharmacokinetic profile of the study drug?</p>
                <p>{!! Form::label('H_InfluencePKinetic', ($AQuestionnaire->H_InfluencePKinetic)) !!}</p>
            </div>
        </div>
    @endif
</div>
<hr>
{{-- Admission Question 4 --}}


<div class="row">
    <div class="col-md-6">
        <p>4. Has the subject consumed any alcohol or xanthine-containing food or beverage within 24 hours before
            dosing?</p>
        <p>{!! Form::label('alcoholXanthine', ($AQuestionnaire->AlcoholXanthine)) !!}</p>
    </div>
</div>
@if($AQuestionnaire->AlcoholXanthine!="No")
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of alcohol or xanthine potentially influence the pharmacokinetic profile of the study
                drug?</p>
            <p>{!! Form::label('AX_InfluencePKinetic', ($AQuestionnaire->AX_InfluencePKinetic)) !!}</p>
        </div>
    </div>
    @endif
    <hr>

    {{-- Admission Question 5 --}}
    <div class="page-break">
    <div class="row">
        <div class="col-sm-6">
            <p>5. Has the subject consumed any food or beverage containing poppy seeds within 48 hours before drugs of
                abuse
                test? </p>
            <p>{!! Form::label('poppySeeds', ($AQuestionnaire->PoppySeeds)) !!}</p>
        </div>
    </div>
    @if($AQuestionnaire->PoppySeeds=="Yes")
        <div class="row">
            <div class="col-sm-6">
                <p>Can the use of poppy seeds potentially influence the pharmacokinetic profile of the study drug?</p>
                <p>{!! Form::label('PS_InfluencePKinetic', ($AQuestionnaire->PS_InfluencePKinetic)) !!}</p>
            </div>
            @endif
            <hr>

            {{-- Admission Question 6 --}}


            <div class="row">
                <div class="col-sm-6">
                    <p>6. Has the subject consumed any food or beverage containing grapefruit (including marmalade) and
                        pomelo
                        within 7 days before dosing?</p>
                    <p>{!! Form::label('grapefruitPomelo', ($AQuestionnaire->GrapefruitPomelo)) !!}</p>
                </div>
            </div>
            @if($AQuestionnaire->GrapefruitPomelo!="No")
                <div class="row">
                    <div class="col-sm-6">
                        <p>Can the use of grapefruit (including marmalade) or pomelo potentially influence the
                            pharmacokinetic profile
                            of the study drug?</p>
                        <p>{!! Form::label('Grapefruit_InfluencePKinetic', ($AQuestionnaire->Grapefruit_InfluencePKinetic)) !!}</p>
                    </div>
                </div>
            @endif
            <hr>

            {{-- Admission Question 7 --}}


            <div class="page-break">
                <div class="row">
                    <div class="col-sm-6">
                        <p>7. Has the subject participated in other experimental drug studies within 4 weeks before
                            dosing?</p>
                        <p>{!! Form::label('otherDrugStudies', ($AQuestionnaire->OtherDrugStudies)) !!}</p>
                    </div>
                </div>
                @if($AQuestionnaire->OtherDrugStudies!="No")
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Can the participation significantly increase the subject’s risk if enrolled in the
                                study</p>
                            <p>{!! Form::label('Other_IncreaseRisk',($AQuestionnaire->Other_IncreaseRisk)) !!}</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Can the participation potentially influence the pharmacokinetic profile of the study
                                    drug?</p>
                                <p>{!! Form::label('Other_InfluencePKinetic', 'Yes',(($AQuestionnaire->Other_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
                            </div>
                        </div>
                    </div>
                        @endif
                    {{--page break ends here--}}
            </div>
                    <hr>
                    {{-- Admission Question 8 --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <p>8. Has the subject participated in donation of (excluding the volume of whole blood that
                                will be drawn during
                                the screening procedures of this study):</p>
                            <ul>
                                <li>Plasma (500 mL) within the last 14 days, or</li>
                                <li>50 mL to 300 mL of whole blood within the last 28 days, or</li>
                                <li>301 mL to 500 mL of whole blood within the last 42 days, or</li>
                                <li>more than 500 mL of whole blood within 84 days before dosing?</li>
                            </ul>
                            <p>{!! Form::label('bloodDono', ($AQuestionnaire->BloodDono)) !!}</p>
                        </div>
                    </div>
                    @if($AQuestionnaire->BloodDono != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('bloodDono_Yes',(old('bloodDono',$AQuestionnaire->BloodDono)!='No' && ($AQuestionnaire->BloodDono!=NULL))? $AQuestionnaire->BloodDono :'',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Can the donation potentially increase the subject’s risk if enrolled in the
                                    study?</p>
                                <p>{!! Form::label('Blood_IncreaseRisk', ($AQuestionnaire->Blood_IncreaseRisk)) !!}</p>
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Admission Question 9 --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <p>9. Has the subject use of non-acceptable methods of contraception within 14 days before
                                dosing?</p>
                            <p>{!! Form::label('contraception', ($AQuestionnaire->Contraception)) !!}</p>
                        </div>
                    </div>
                    @if($AQuestionnaire->Contraception != "No")
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Can the use of this method potentially increase the subject’s risk if enrolled in the
                                    study?</p>
                                <p>{!! Form::label('Contraception_IncreaseRisk', ($AQuestionnaire->Contraception_IncreaseRisk)) !!}</p>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <div class="page-break">
                        {{-- Physician Initial starts here--}}
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('PhysicianInitial',old('PhysicianInitial',$AQuestionnaire->PhysicianInitial),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
            @endif
                    <hr>
                    {{-- urine drugs for abuse test --}}
                    <h3>Urine Pregnancy Test</h3>
                    <p>(Transcribed from Urine Logbook)</p>
                    @if($UrineTest->UPreg_male == 1)
                    <div class=" form-group row">
                        <pre><h4>Not Applicable for study period {{$study_period}}!</h4></pre>
                    </div>
                    @elseif ($UrineTest->Absent == 1)
                    <div class=" form-group row">
                        <pre><h4>Subject is absent from Urine Pregnancy Test for study period {{$study_period}}!</h4></pre>
                    </div>
                    @else
                    <div class=" form-group row">
                        <div class="col-md-1">
                            {!! Form::label('UPreg_dateTaken', 'Date Taken: ') !!}
                            {!! Form::label('UPreg_dateTaken', ($UrineTest->UPreg_dateTaken)) !!}
                        </div>
                    </div>
                    <div class=" form-group row">
                        <div class="col-md-1">
                            {!! Form::label('UPreg_TestTime', 'Test Time: ') !!}
                            {!! Form::label('UPreg_TestTime',$UrineTest->UPreg_TestTime) !!}
                        </div>
                        <div class="offset-3 col-md-1">
                            {!! Form::label('UPreg_ReadTime', 'Read Time: ') !!}
                            {!! Form::label('UPreg_ReadTime', old("UPreg_ReadTime",$UrineTest->UPreg_ReadTime)) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            {!! Form::label('uPreg_Laboratory', 'Laboratory: ') !!}
                            {!! Form::label('uPreg_Laboratory', ($UrineTest->UPreg_Laboratory)) !!}
                        </div>
                    </div>
                    <table border="1">
                        <thead>
                        <tr>
                            <th scope="col">
                                Test
                            </th>
                            <th scope="col">
                                Result
                            </th>
                            <th scope="col">
                                Comment
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                {!! Form::label('UPreg_hCG', 'hCG: ') !!}
                            </th>
                            <td>
                                {!! Form::label('UPreg_hCG', ($UrineTest->UPreg_hCG)) !!}
                            </td>
                            <td>
                                @if($UrineTest->UPreg_hCG_Comment != NULL)
                                    {!! Form::label('UPreg_hCG_Comment',($UrineTest->UPreg_hCG_Comment)) !!}
                                @else
                                    {!! Form::label('UPreg_hCG_Comment','-') !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="2" class="text-lg-right">
                                {!! Form::label('UPreg_Transcribedby', 'Transcribed by (initial): ') !!}
                            </th>
                            <td>
                                {!! Form::label('UPreg_Transcribedby',($UrineTest->UPreg_Transcribedby)) !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endif
                <br>
                <hr>
                <div class="page-break">
                    <h3>Urine Drugs of Abuse Test</h3>
                    <p>(Transcribed from Urine Logbook)</p>
                    @if($UrineTest->NApplicable == 1)
                        <div class=" form-group row">
                            <pre><h4>Not Applicable for study period {{$study_period}}!</h4></pre>
                        </div>
                    @elseif ($UrineTest->AbsentUDrug == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Subject is Absent from Urine Drugs of Abuse Test for study period {{$study_period}}!</h4></pre>
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <div class="col-md-1">
                                {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
                                {!! Form::label('UDrug_dateTaken',$UrineTest->UDrug_dateTaken) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1">
                                {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
                                {!! Form::label('UDrug_TestTime',old("UPreg_ReadTime",$UrineTest->UDrug_TestTime),['class'=>'form-control']) !!}
                            </div>
                            <div class=" offset-3 col-md-1">
                                {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
                                {!! Form::label('UDrug_ReadTime',old("UPreg_ReadTime",$UrineTest->UDrug_ReadTime),['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                {!! Form::label('UDrug_Laboratory', 'Laboratory: ') !!}
                                {!! Form::label('UDrug_Laboratory', ($UrineTest->UDrug_Laboratory)) !!}
                            </div>
                        </div>
                        <table border="1">
                            <thead>
                            <tr>
                                <th scope="col">Test</th>
                                <th scope="col">Result</th>
                                <th scope="col">Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    {!! Form::label('UDrug_Methamphetamine', 'Methamphetamine (mAMP): ') !!}
                                </th>
                                <td>
                                    {!! Form::label('UDrug_Methamphetamine', ($UrineTest->UDrug_Methamphetamine)) !!}
                                </td>
                                <td>
                                    @if($UrineTest->UDrug_Methamphetamine_Comment != NULL)
                                        {!! Form::label('UDrug_Methamphetamine_Comment',($UrineTest->UDrug_Methamphetamine_Comment)) !!}
                                    @else
                                        {!! Form::label('UDrug_Methamphetamine_Comment','-') !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
                                </th>
                                <td>
                                    {!! Form::label('UDrug_Morphine', ($UrineTest->UDrug_Morphine)) !!}
                                </td>
                                <td>
                                    @if($UrineTest->UDrug_Morphine_Comment != NULL)
                                        {!! Form::label('UDrug_Morphine_Comment',($UrineTest->UDrug_Morphine_Comment)) !!}
                                    @else
                                        {!! Form::label('UDrug_Morphine_Comment','-') !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
                                </th>
                                <td>
                                    {!! Form::label('UDrug_Marijuana',($UrineTest->UDrug_Marijuana)) !!}
                                </td>
                                <td>
                                    @if($UrineTest->UDrug_Marijuana_Comment != NULL)
                                        {!! Form::label('UDrug_Marijuana_Comment',($UrineTest->UDrug_Marijuana_Comment)) !!}
                                    @else
                                        {!! Form::label('UDrug_Marijuana_Comment','-') !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2" class="text-lg-right">
                                    {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
                                </th>
                                <td>
                                    {!! Form::label('UDrug_Transcribedby',($UrineTest->UDrug_Transcribedby)) !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
                <hr>
                {{-- conclusion --}}
                <div class="page-break">
                    <h3>Conclusion</h3>
                    @if($UrineTest->AbsentC == 1)
                        <div class="col-md-7">
                            <pre><h4>Subject is absent from both Urine Test for study period {{$study_period}}!</h4></pre>
                        </div>
                        </div>
                    @else
                    <div class=" form-group row">
                        <div class="col-md-7">
                            <p>Does the subject obey all the restrictions and/or fulfill all the inclusion criteria and
                                none
                                of the
                                exclusion criteria?</p>
                            <p>{!! Form::label('inclusionYesNo', ($UrineTest->inclusionYesNo)) !!}</p>
                        </div>
                    </div>
                    @if($UrineTest->inclusionYesNo == "Yes")
                        <div class="form-group row col">
                            <p>If “Yes”, continue with enrollment into the Study Period 1.</p>
                        </div>
                    @else
                        <div class="form-group row col">
                            <p>If “No”, the subject may or may not be admitted into the study ward, based on the
                                discretion of
                                the
                                investigator.</p>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="row col">
                            {!! Form::label('Comments', 'Comments') !!}
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                @if($UrineTest->Comments !=NULL)
                                    {!! Form::textarea('Comments',($UrineTest->Comments)) !!}
                                @else
                                    {!! Form::textarea('Comments','-') !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <div class="col-md-7">
                            <p>Is the subject fit for dosing?</p>
                        </div>
                        <div class="col-md-1">
                            <p>{!! Form::label('subjectFit', (($UrineTest->subjectFit))) !!}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" offset-5 col-md-3">
                            {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
                            {!! Form::label('physicianSign',($UrineTest->physicianSign)) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" offset-5 col-md-3">
                            {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                            {!! Form::label('physicianName',($UrineTest->physicianName)) !!}
                        </div>
                    </div>
                @endif
                </div>
                <div class="page-break">
                    @if($PKinetic->Absent == 1)
                        <div class=" form-group row">
                            <pre><h4>Subject is absent from Pharmacokinetic Blood Sampling for study period {{$study_period}}!</h4></pre>
                        </div>
                    @else
                    <h3>Pharmacokinetic Blood Sampling</h3>
                    {{-- Pharmacokinetic Blood Sampling --}}
                    <div class="form-group row">
                        <div class="col-md-2">
                            {!! Form::label('Day1',($PKinetic->Day1)) !!}
                        </div>
                        <div class="col-md-1">
                            <p class="text-center">to</p>
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('Day3',($PKinetic->Day3)) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="row col">
                        <p><strong>Tube Type and Volume Required:</strong> Heparin, 3mL</p>
                    </div>
                    <div class="row col">
                        <p><strong>Processing and Storage Instructions:</strong> Centrifuge at 4˚C for 10 minutes at
                            3000 rpm within 45
                            minutes, store below
                            -20˚C.</p>
                    </div>
                    <div class="page-break">
                    <table border="1">
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
                                {!! Form::label('LastFoodDate',old("LastFoodDate",$PKinetic->LastFoodDate),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('LastWaterDate',old("LastWaterDate",$PKinetic->LastWaterDate),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('StudyDrugDate',old("StudyDrugDate",$PKinetic->StudyDrugDate),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <p>Time</p>
                                <p>(24-hour clock)</p>
                            </th>
                            <td>
                                {!! Form::label('LastFoodTime',old("LastFoodTime",$PKinetic->LastFoodTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('LastWaterTime',old("LastWaterTime",$PKinetic->LastWaterTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('StudyDrugTime',old("StudyDrugTime",$PKinetic->StudyDrugTime),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <table border="1">
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
                                {!! Form::label('pk_Date_Day_PD',old('pk_Date_Day_PD',$PKinetic->pk_Date_Day_PD),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">PD</td>
                            <td class="text-center">______</td>
                            <td class="text-center">______</td>
                            <td>
                                {!! Form::label('pk_PD_AST',old('pk_PD_AST',$PKinetic->pk_PD_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_PD_Collected',old('pk_PD_Collected',$PKinetic->pk_PD_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_PD_Checked',old('pk_PD_Checked',$PKinetic->pk_PD_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td class="col-md-3">
                                @if($PKinetic->pk_PD_Comments != NULL)
                                    {!! Form::label('pk_PD_Comments',old('pk_PD_Comments',$PKinetic->pk_PD_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_PD_Comments',old('pk_PD_Comments',$PKinetic->pk_PD_Comments),['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S1',old('pk_Date_Day_S1',$PKinetic->pk_Date_Day_S1),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">S1</td>
                            <td class="text-center">0.50</td>
                            <td>
                                {!! Form::label('pk_S1_SST',old('pk_S1_SST',$PKinetic->pk_S1_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S1_AST',old('pk_S1_AST',$PKinetic->pk_S1_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S1_Collected',old('pk_S1_Collected',$PKinetic->pk_S1_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S1_Checked',old('pk_S1_Checked',$PKinetic->pk_S1_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S1_Comments != NULL)
                                    {!! Form::label('pk_S1_Comments',old('pk_S1_Comments',$PKinetic->pk_S1_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S1_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S2',old('pk_Date_Day_S2',$PKinetic->pk_Date_Day_S2),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                <p>S2</p>
                            </td>
                            <td class="text-center">
                                <p>1</p>
                            </td>
                            <td>
                                {!! Form::label('pk_S2_SST',old('pk_S2_SST',$PKinetic->pk_S2_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S2_AST',old('pk_S2_AST',$PKinetic->pk_S2_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S2_Collected',old('pk_S2_Collected',$PKinetic->pk_S2_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S2_Checked',old('pk_S2_Checked',$PKinetic->pk_S2_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S2_Comments != NULL)
                                    {!! Form::label('pk_S2_Comments',old('pk_S2_Comments',$PKinetic->pk_S2_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S2_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S3',old('pk_Date_Day_S3',$PKinetic->pk_Date_Day_S3),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S3
                            </td>
                            <td class="text-center">
                                1.5
                            </td>
                            <td>
                                {!! Form::label('pk_S3_SST',old('pk_S3_SST',$PKinetic->pk_S3_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S3_AST',old('pk_S3_AST',$PKinetic->pk_S3_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S3_Collected',old('pk_S3_Collected',$PKinetic->pk_S3_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S3_Checked',old('pk_S3_Checked',$PKinetic->pk_S3_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S3_Comments != NULL)
                                    {!! Form::label('pk_S3_Comments',old('pk_S3_Comments',$PKinetic->pk_S3_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S3_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S4',old('pk_Date_Day_S4',$PKinetic->pk_PD_AST),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S4
                            </td>
                            <td class="text-center">
                                2
                            </td>
                            <td>
                                {!! Form::label('pk_S4_SST',old('pk_S4_SST',$PKinetic->pk_S4_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S4_AST',old('pk_S4_AST',$PKinetic->pk_S4_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S4_Collected',old('pk_S4_Collected',$PKinetic->pk_S4_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S4_Checked',old('pk_S4_Checked',$PKinetic->pk_S4_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S4_Comments != NULL)
                                    {!! Form::label('pk_S4_Comments',old('pk_S4_Comments',$PKinetic->pk_S4_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S4_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S5',old('pk_Date_Day_S5',$PKinetic->pk_Date_Day_S5),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S5
                            </td>
                            <td class="text-center">
                                2.5
                            </td>
                            <td>
                                {!! Form::label('pk_S5_SST',old('pk_S5_SST',$PKinetic->pk_S5_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S5_AST',old('pk_S5_AST',$PKinetic->pk_S5_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S5_Collected',old('pk_S5_Collected',$PKinetic->pk_S5_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S5_Checked',old('pk_S5_Checked',$PKinetic->pk_S5_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S5_Comments != NULL)
                                    {!! Form::label('pk_S5_Comments',old('pk_S5_Comments',$PKinetic->pk_S5_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S5_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">
                                {!! Form::label('pk_Date_Day_S6',old('pk_Date_Day_S6',$PKinetic->pk_Date_Day_S6),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S6
                            </td>
                            <td class="text-center">
                                3
                            </td>
                            <td>
                                {!! Form::label('pk_S6_SST',old('pk_S6_SST',$PKinetic->pk_S6_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S6_AST',old('pk_S6_AST',$PKinetic->pk_S6_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S6_Collected',old('pk_S6_Collected',$PKinetic->pk_S6_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S6_Checked',old('pk_S6_Checked',$PKinetic->pk_S6_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S6_Comments != NULL)
                                    {!! Form::label('pk_S6_Comments',old('pk_S6_Comments',$PKinetic->pk_S6_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S6_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S7',old('pk_Date_Day_S7',$PKinetic->pk_Date_Day_S7),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S7
                            </td>
                            <td class="text-center">
                                3.5
                            </td>
                            <td>
                                {!! Form::label('pk_S7_SST',old('pk_S7_SST',$PKinetic->pk_S7_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S7_AST',old('pk_S7_AST',$PKinetic->pk_S7_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S7_Collected',old('pk_S7_Collected',$PKinetic->pk_S7_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S7_Checked',old('pk_S7_Checked',$PKinetic->pk_S7_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S7_Comments != NULL)
                                    {!! Form::label('pk_S7_Comments',old('pk_S7_Comments',$PKinetic->pk_S7_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S7_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S8',old('pk_Date_Day_S8',$PKinetic->pk_Date_Day_S8),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S8
                            </td>
                            <td class="text-center">
                                4
                            </td>
                            <td>
                                {!! Form::label('pk_S8_SST',old('pk_S8_SST',$PKinetic->pk_S8_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S8_AST',old('pk_S8_AST',$PKinetic->pk_S8_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S8_Collected',old('pk_S8_Collected',$PKinetic->pk_S8_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S8_Checked',old('pk_S8_Checked',$PKinetic->pk_S8_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S8_Comments != NULL)
                                    {!! Form::label('pk_S8_Comments',old('pk_S8_Comments',$PKinetic->pk_S8_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S8_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S9',old('pk_Date_Day_S9',$PKinetic->pk_Date_Day_S9),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S9
                            </td>
                            <td class="text-center">
                                4.5
                            </td>
                            <td>
                                {!! Form::label('pk_S9_SST',old('pk_S9_SST',$PKinetic->pk_S9_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S9_AST',old('pk_S9_AST',$PKinetic->pk_S9_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S9_Collected',old('pk_S9_Collected',$PKinetic->pk_S9_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S9_Checked',old('pk_S9_Checked',$PKinetic->pk_S9_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S9_Comments != NULL)
                                    {!! Form::label('pk_S9_Comments',old('pk_S9_Comments',$PKinetic->pk_S9_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S9_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S10',old('pk_Date_Day_S10',$PKinetic->pk_Date_Day_S10),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S10
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td>
                                {!! Form::label('pk_S10_SST',old('pk_S10_SST',$PKinetic->pk_S10_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S10_AST',old('pk_S10_AST',$PKinetic->pk_S10_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S10_Collected',old('pk_S10_Collected',$PKinetic->pk_S10_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S10_Checked',old('pk_S10_Checked',$PKinetic->pk_S10_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S10_Comments != NULL)
                                    {!! Form::label('pk_S10_Comments',old('pk_S10_Comments',$PKinetic->pk_S10_Checked),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S10_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S11',old('pk_Date_Day_S11',$PKinetic->pk_Date_Day_S11),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S11
                            </td>
                            <td class="text-center">
                                6
                            </td>
                            <td>
                                {!! Form::label('pk_S11_SST',old('pk_S11_SST',$PKinetic->pk_S11_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S11_AST',old('pk_S11_AST',$PKinetic->pk_S11_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S11_Collected',old('pk_S11_Collected',$PKinetic->pk_S11_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S11_Checked',old('pk_S11_Checked',$PKinetic->pk_S11_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S11_Comments != NULL)
                                    {!! Form::label('pk_S11_Comments',old('pk_S11_Comments',$PKinetic->pk_S11_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S11_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S12',old('pk_Date_Day_S12',$PKinetic->pk_Date_Day_S12),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                <p>S12</p>
                            </td>
                            <td class="text-center">
                                <p>7</p>
                            </td>
                            <td>
                                {!! Form::label('pk_S12_SST',old('pk_S12_SST',$PKinetic->pk_S12_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S12_AST',old('pk_S12_AST',$PKinetic->pk_S12_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S12_Collected',old('pk_S12_Collected',$PKinetic->pk_S12_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S12_Checked',old('pk_S12_Checked',$PKinetic->pk_S12_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S12_Comments != NULL)
                                    {!! Form::label('pk_S12_Comments',old('pk_S12_Comments',$PKinetic->pk_S12_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S12_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S13',old('pk_Date_Day_S13',$PKinetic->pk_Date_Day_S13),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S13
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td>
                                {!! Form::label('pk_S13_SST',old('pk_S13_SST',$PKinetic->pk_S13_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S13_AST',old('pk_S13_AST',$PKinetic->pk_S13_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S13_Collected',old('pk_S13_Collected',$PKinetic->pk_S13_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S13_Checked',old('pk_S13_Checked',$PKinetic->pk_S13_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S13_Comments != NULL)
                                    {!! Form::label('pk_S13_Comments',old('pk_S13_Comments',$PKinetic->pk_S13_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S13_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S14',old('pk_Date_Day_S14',$PKinetic->pk_Date_Day_S14),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S14
                            </td>
                            <td class="text-center">
                                10
                            </td>
                            <td>
                                {!! Form::label('pk_S14_SST',old('pk_S14_SST',$PKinetic->pk_S14_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S14_AST',old('pk_S14_AST',$PKinetic->pk_S14_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S14_Collected',old('pk_S14_Collected',$PKinetic->pk_S14_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S14_Checked',old('pk_S14_Checked',$PKinetic->pk_S14_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S14_Comments != NULL)
                                    {!! Form::label('pk_S14_Comments',old('pk_S14_Comments',$PKinetic->pk_S14_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S14_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S15',old('pk_Date_Day_S15',$PKinetic->pk_Date_Day_S15),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S15
                            </td>
                            <td class="text-center">
                                12
                            </td>
                            <td>
                                {!! Form::label('pk_S15_SST',old('pk_S15_SST',$PKinetic->pk_S15_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S15_AST',old('pk_S15_AST',$PKinetic->pk_S15_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S15_Collected',old('pk_S15_Collected',$PKinetic->pk_S15_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S15_Checked',old('pk_S15_Checked',$PKinetic->pk_S15_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S15_Comments != NULL)
                                    {!! Form::label('pk_S15_Comments',old('pk_S15_Comments',$PKinetic->pk_S15_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S15_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S16',old('pk_Date_Day_S16',$PKinetic->pk_Date_Day_S16),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S16
                            </td>
                            <td class="text-center">
                                14
                            </td>
                            <td>
                                {!! Form::label('pk_S16_SST',old('pk_S16_SST',$PKinetic->pk_S16_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S16_AST',old('pk_S16_AST',$PKinetic->pk_S16_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S16_Collected',old('pk_S16_Collected',$PKinetic->pk_S16_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S16_Checked',old('pk_S16_Checked',$PKinetic->pk_S16_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S16_Comments != NULL)
                                    {!! Form::label('pk_S16_Comments',old('pk_S16_Comments',$PKinetic->pk_S16_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S16_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S17',old('pk_Date_Day_S17',$PKinetic->pk_Date_Day_S17),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S17
                            </td>
                            <td class="text-center">
                                16
                            </td>
                            <td>
                                {!! Form::label('pk_S17_SST',old('pk_S17_SST',$PKinetic->pk_S17_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S17_AST',old('pk_S17_AST',$PKinetic->pk_S17_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S17_Collected',old('pk_S17_Collected',$PKinetic->pk_S17_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S17_Checked',old('pk_S17_Checked',$PKinetic->pk_S17_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S17_Comments != NULL)
                                    {!! Form::label('pk_S17_Comments',old('pk_S17_Comments',$PKinetic->pk_S17_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S17_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S18',old('pk_Date_Day_S18',$PKinetic->pk_Date_Day_S18),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S18
                            </td>
                            <td class="text-center">
                                18
                            </td>
                            <td>
                                {!! Form::label('pk_S18_SST',old('pk_S18_SST',$PKinetic->pk_S18_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S18_AST',old('pk_S18_AST',$PKinetic->pk_S18_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S18_Collected',old('pk_S18_Collected',$PKinetic->pk_S18_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S18_Checked',old('pk_S18_Checked',$PKinetic->pk_S18_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S18_Comments != NULL)
                                    {!! Form::label('pk_S18_Comments',old('pk_S18_Comments',$PKinetic->pk_S18_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S18_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S19',old('pk_Date_Day_S19',$PKinetic->pk_Date_Day_S19),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                S19
                            </td>
                            <td class="text-center">
                                24
                            </td>
                            <td>
                                {!! Form::label('pk_S19_SST',old('pk_S19_SST',$PKinetic->pk_S19_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S19_AST',old('pk_S19_AST',$PKinetic->pk_S19_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S19_Collected',old('pk_S19_Collected',$PKinetic->pk_S19_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S19_Checked',old('pk_S19_Checked',$PKinetic->pk_S19_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S19_Comments != NULL)
                                    {!! Form::label('pk_S19_Comments',old('pk_S19_Comments',$PKinetic->pk_S19_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S19_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S20',old('pk_Date_Day_S20',$PKinetic->pk_Date_Day_S20),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">S20</td>
                            <td class="text-center">36</td>
                            <td>
                                {!! Form::label('pk_S20_SST',old('pk_S20_SST',$PKinetic->pk_S20_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S20_AST',old('pk_S20_AST',$PKinetic->pk_S20_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S20_Collected',old('pk_S20_Collected',$PKinetic->pk_S20_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S20_Checked',old('pk_S20_Checked',$PKinetic->pk_S20_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S20_Comments != NULL)
                                    {!! Form::label('pk_S20_Comments',old('pk_S20_Comments',$PKinetic->pk_S20_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S20_Comments',"-",['class'=>'form-control']) !!}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('pk_Date_Day_S21',old('pk_Date_Day_S21',$PKinetic->pk_Date_Day_S21),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">S21</td>
                            <td class="text-center">48</td>
                            <td>
                                {!! Form::label('pk_S21_SST',old('pk_S21_SST',$PKinetic->pk_S21_SST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S21_AST',old('pk_S21_AST',$PKinetic->pk_S21_AST),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S21_Collected',old('pk_S21_Collected',$PKinetic->pk_S21_Collected),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('pk_S21_Checked',old('pk_S21_Checked',$PKinetic->pk_S21_Checked),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                @if($PKinetic->pk_S21_Comments != NULL)
                                    {!! Form::label('pk_S21_Comments',old('pk_S21_Comments',$PKinetic->pk_S21_Comments),['class'=>'form-control']) !!}
                                @else
                                    {!! Form::label('pk_S21_Comments',"-",['class'=>'form-control']) !!}
                                @endif
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
                </div>
                @endif
                <div class="page-break">
                    {{-- Pharmacodynamic Blood Sampling starts here--}}
                    <h3>Pharmacodynamic Blood Sampling</h3>
                    @if($PDynamic->NApplicable== 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Not Applicable for the study!</h4></pre>
                            </div>
                        </div>
                    @elseif ($PDynamic->Absent == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Subject is absent from Pharmacodynamic Blood Sampling for study period {{$study_period}}!</h4></pre>
                            </div>
                        </div>
                    @else
                        <hr/>
                        <div class="form-group row">
                            <div class="col-md-2">
                                {!! Form::label('day1',old("day1",$PDynamic->Day1),['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-1">
                                <p class="text-center">to</p>
                            </div>
                            <div class="col-md-2">
                                {!! Form::label('day2',old("day2",$PDynamic->Day2),['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row col">
                            <p><strong>Tube Type and Volume Required:</strong> Hirudin, 1.6mL</p>
                        </div>
                        <div class="row col">
                            <p><strong>Processing and Storage Instructions:</strong> To send the whole blood directly
                                after collection for PD analysis.</p>
                        </div>
                        <table border="1">
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
                                    {!! Form::label('PD_Date_Day_1',old("PD_Date_Day_1",$PDynamic->PD_Date_Day_1),['class'=>'form-control']) !!}
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
                                    {!! Form::label('PD_AST',old("PD_AST",$PDynamic->PD_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('PD_Collected',old("PD_Collected",$PDynamic->PD_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('PD_Checked',old("PD_Checked",$PDynamic->PD_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td class="col-md-3">
                                    @if($PDynamic->PD_Comments != NULL)
                                        {!! Form::label('PD_Comments',old('pk_S21_Comments',$PDynamic->PD_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('PD_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S1_Date_Day_1',old("S1_Date_Day_1",$PDynamic->S1_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S1
                                </td>
                                <td class="text-center">
                                    1
                                </td>
                                <td>
                                    {!! Form::label('S1_SST',old("S1_SST",$PDynamic->S1_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S1_AST',old("S1_AST",$PDynamic->S1_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S1_Collected',old("S1_Collected",$PDynamic->S1_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S1_Checked',old("S1_Checked",$PDynamic->S1_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S1_Comments != NULL)
                                        {!! Form::label('S1_Comments',old('S1_Comments',$PDynamic->S1_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S1_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S2_Date_Day_1',old("S2_Date_Day_1",$PDynamic->S2_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S2
                                </td>
                                <td class="text-center">
                                    2
                                </td>
                                <td>
                                    {!! Form::label('S2_SST',old("S2_SST",$PDynamic->S2_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S2_AST',old("S2_AST",$PDynamic->S2_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S2_Collected',old("S2_Collected",$PDynamic->S2_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S2_Checked',old("S2_Checked",$PDynamic->S2_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S2_Comments != NULL)
                                        {!! Form::label('S2_Comments',old('S2_Comments',$PDynamic->S2_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S2_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S3_Date_Day_1',old("S3_Date_Day_1",$PDynamic->S3_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S3
                                </td>
                                <td class="text-center">
                                    3
                                </td>
                                <td>
                                    {!! Form::label('S3_SST',old("S3_SST",$PDynamic->S3_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S3_AST',old("S3_AST",$PDynamic->S3_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S3_Collected',old("S3_Collected",$PDynamic->S3_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S3_Checked',old("S3_Checked",$PDynamic->S3_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S3_Comments != NULL)
                                        {!! Form::label('S3_Comments',old('S3_Comments',$PDynamic->S3_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S3_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S4_Date_Day_1',old("S4_Date_Day_1",$PDynamic->S4_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S4
                                </td>
                                <td class="text-center">
                                    4
                                </td>
                                <td>
                                    {!! Form::label('S4_SST',old("S4_SST",$PDynamic->S4_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S4_AST',old("S4_AST",$PDynamic->S4_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S4_Collected',old("S4_Collected",$PDynamic->S4_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S4_Checked',old("S4_Checked",$PDynamic->S4_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S4_Comments != NULL)
                                        {!! Form::label('S4_Comments',old('S4_Comments',$PDynamic->S4_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S4_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-2">
                                    {!! Form::label('S5_Date_Day_1',old("S5_Date_Day_1",$PDynamic->S5_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S5
                                </td>
                                <td class="text-center">
                                    5
                                </td>
                                <td>
                                    {!! Form::label('S5_SST',old("S5_SST",$PDynamic->S5_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S5_AST',old("S5_AST",$PDynamic->S5_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S5_Collected',old("S5_Collected",$PDynamic->S5_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S5_Checked',old("S5_Checked",$PDynamic->S5_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S5_Comments != NULL)
                                        {!! Form::label('S5_Comments',old('S5_Comments',$PDynamic->S5_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S5_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    {!! Form::label('S6_Date_Day_1',old("S6_Date_Day_1",$PDynamic->S6_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S6
                                </td>
                                <td class="text-center">
                                    8
                                </td>
                                <td>
                                    {!! Form::label('S6_SST',old("S6_SST",$PDynamic->S6_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S6_AST',old("S6_AST",$PDynamic->S6_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S6_Collected',old("S6_Collected",$PDynamic->S6_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S6_Checked',old("S6_Checked",$PDynamic->S6_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S6_Comments != NULL)
                                        {!! Form::label('S6_Comments',old('S6_Comments',$PDynamic->S6_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S6_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S7_Date_Day_1',old("S7_Date_Day_1",$PDynamic->S7_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S7
                                </td>
                                <td class="text-center">
                                    12
                                </td>
                                <td>
                                    {!! Form::label('S7_SST',old("S7_SST",$PDynamic->S7_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S7_AST',old("S7_AST",$PDynamic->S7_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S7_Collected',old("S7_Collected",$PDynamic->S7_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S7_Checked',old("S7_Checked",$PDynamic->S7_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S7_Comments != NULL)
                                        {!! Form::label('S7_Comments',old('S7_Comments',$PDynamic->S7_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S7_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S8_Date_Day_1',old("S8_Date_Day_1",$PDynamic->S8_Date_Day_1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S8
                                </td>
                                <td class="text-center">
                                    16
                                </td>
                                <td>
                                    {!! Form::label('S8_SST',old("S8_SST",$PDynamic->S8_SST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S8_AST',old("S8_AST",$PDynamic->S8_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S8_Collected',old("S8_Collected",$PDynamic->S8_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S8_Checked',old("S8_Checked",$PDynamic->S8_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S8_Comments != NULL)
                                        {!! Form::label('S8_Comments',old('S8_Comments',$PDynamic->S8_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S8_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('S9_Date_Day_2',old("S9_Date_Day_2",$PDynamic->S9_Date_Day_2),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S9
                                </td>
                                <td class="text-center">
                                    24
                                </td>
                                <td>
                                    {!! Form::label('S9_SST',old("S9_SST",$PDynamic->S9_SST),['class'=>'form-control']) !!}
                                </td>
                                <td class="col-sm-1">
                                    {!! Form::label('S9_AST',old("S9_AST",$PDynamic->S9_AST),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S9_Collected',old("S9_Collected",$PDynamic->S9_Collected),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('S9_Checked',old("S9_Checked",$PDynamic->S9_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDynamic->S9_Comments != NULL)
                                        {!! Form::label('S9_Comments',old('S9_Comments',$PDynamic->S9_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('S9_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
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
                    @endif
                </div>
                <div class="page-break">

                    {{-- Pharmacodynamic (PD) Analysis STARTS HERE--}}

                    <h3>Pharmacodynamic (PD) Analysis</h3>
                    @if($PDAnalysis->NApplicable == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Not Applicable for this study!</h4></pre>
                            </div>
                        </div>
                    @elseif($PDAnalysis->Absent == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Subject is absent from Pharmacodynamic(PD)Analysis for study period {{$study_period}}!</h4></pre>
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <div class="col-md-1">
                                {!! Form::label('Day1', 'Day 1: ') !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::label('Day1', old('Day1',$PDAnalysis->Day1),['class'=>'form-control']) !!}
                            </div>
                            <div class="col-md-1">
                                {!! Form::label('Day2', 'Day 2: ') !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::label('Day2',old('Day2',$PDAnalysis->Day2),['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row col">
                            <p>Analysis Instructions: Stand whole blood for 30 minutes at room temperature before PD
                                analysis. PD analysis has
                                to be completed within 3 hours.</p>
                        </div>
                        <table border="1">
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
                                    {!! Form::label('pda_Date_Day_PD',old('pda_Date_Day_PD',$PDAnalysis->pda_Date_Day_PD),['class'=>'form-control']) !!}
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
                                    {!! Form::label('pda_PD_Result',old('pda_PD_Result',$PDAnalysis->pda_PD_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_PD_Conducted',old('pda_PD_Conducted',$PDAnalysis->pda_PD_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_PD_Checked',old('pda_PD_Checked',$PDAnalysis->pda_PD_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td class="col-md-3">
                                    @if($PDAnalysis->pda_PD_Comments != NULL)
                                        {!! Form::label('pda_PD_Comments',old('pda_PD_Comments',$PDAnalysis->pda_PD_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_PD_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S1', old('pda_Date_Day_S1',$PDAnalysis->pda_Date_Day_S1),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S1
                                </td>
                                <td class="text-center">
                                    1
                                </td>
                                <td>
                                    {!! Form::label('pda_S1_Time', old('pda_S1_Time',$PDAnalysis->pda_S1_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S1_Result',old('pda_S1_Result',$PDAnalysis->pda_S1_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S1_Conducted',old('pda_S1_Conducted',$PDAnalysis->pda_S1_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S1_Checked',old('pda_S1_Checked',$PDAnalysis->pda_S1_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S1_Comments != NULL)
                                        {!! Form::label('pda_S1_Comments',old('pda_S1_Comments',$PDAnalysis->pda_S1_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S1_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S2', old('pda_Date_Day_S2',$PDAnalysis->pda_Date_Day_S2),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S2
                                </td>
                                <td class="text-center">
                                    2
                                </td>
                                <td>
                                    {!! Form::label('pda_S2_Time',old('pda_S2_Time',$PDAnalysis->pda_S2_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S2_Result',old('pda_S2_Result',$PDAnalysis->pda_S2_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S2_Conducted',old('pda_S2_Conducted',$PDAnalysis->pda_S2_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S2_Checked',old('pda_S2_Checked',$PDAnalysis->pda_S2_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S2_Comments != NULL)
                                        {!! Form::label('pda_S2_Comments',old('pda_S2_Comments',$PDAnalysis->pda_S2_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S2_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S3',old('pda_Date_Day_S3',$PDAnalysis->pda_Date_Day_S3),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S3
                                </td>
                                <td class="text-center">
                                    3
                                </td>
                                <td>
                                    {!! Form::label('pda_S3_Time',old('pda_S3_Time',$PDAnalysis->pda_S3_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S3_Result',old('pda_S3_Result',$PDAnalysis->pda_S3_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S3_Conducted',old('pda_S3_Conducted',$PDAnalysis->pda_S3_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S3_Checked',old('pda_S3_Checked',$PDAnalysis->pda_S3_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S3_Comments != NULL)
                                        {!! Form::label('pda_S3_Comments',old('pda_S3_Comments',$PDAnalysis->pda_S3_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S3_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S4',old('pda_Date_Day_S4',$PDAnalysis->pda_Date_Day_S4),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S4
                                </td>
                                <td class="text-center">
                                    4
                                </td>
                                <td>
                                    {!! Form::label('pda_S4_Time',old('pda_S4_Time',$PDAnalysis->pda_S4_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S4_Result',old('pda_S4_Result',$PDAnalysis->pda_S4_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S4_Conducted',old('pda_S4_Conducted',$PDAnalysis->pda_S4_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S4_Checked', old('pda_S4_Checked',$PDAnalysis->pda_S4_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S4_Comments != NULL)
                                        {!! Form::label('pda_S4_Comments',old('pda_S4_Comments',$PDAnalysis->pda_S4_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S4_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S5',old('pda_Date_Day_S5',$PDAnalysis->pda_Date_Day_S5),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S5
                                </td>
                                <td class="text-center">
                                    5
                                </td>
                                <td>
                                    {!! Form::label('pda_S5_Time',old('pda_S5_Time',$PDAnalysis->pda_S5_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S5_Result',old('pda_S5_Result',$PDAnalysis->pda_S5_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S5_Conducted',old('pda_S5_Conducted',$PDAnalysis->pda_S5_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S5_Checked',old('pda_S5_Checked',$PDAnalysis->pda_S5_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S5_Comments != NULL)
                                        {!! Form::label('pda_S5_Comments',old('pda_S5_Comments',$PDAnalysis->pda_S5_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S5_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S6',old('pda_Date_Day_S6',$PDAnalysis->pda_Date_Day_S6),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S6
                                </td>
                                <td class="text-center">
                                    8
                                </td>
                                <td>
                                    {!! Form::label('pda_S6_Time',old('pda_S6_Time',$PDAnalysis->pda_S6_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S6_Result',old('pda_S6_Result',$PDAnalysis->pda_S6_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S6_Conducted',old('pda_S6_Conducted',$PDAnalysis->pda_S6_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S6_Checked',old('pda_S6_Checked',$PDAnalysis->pda_S6_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S6_Comments != NULL)
                                        {!! Form::label('pda_S6_Comments',old('pda_S6_Comments',$PDAnalysis->pda_S6_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S6_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S7',old('pda_Date_Day_S7',$PDAnalysis->pda_Date_Day_S7),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S7
                                </td>
                                <td class="text-center">
                                    12
                                </td>
                                <td>
                                    {!! Form::label('pda_S7_Time',old('pda_S7_Time',$PDAnalysis->pda_S7_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S7_Result',old('pda_S7_Result',$PDAnalysis->pda_S7_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S7_Conducted',old('pda_S7_Conducted',$PDAnalysis->pda_S7_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S7_Checked',old('pda_S7_Checked',$PDAnalysis->pda_S7_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S7_Comments != NULL)
                                        {!! Form::label('pda_S7_Comments',old('pda_S7_Comments',$PDAnalysis->pda_S7_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S7_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S8',old('pda_Date_Day_S8',$PDAnalysis->pda_Date_Day_S8),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S8
                                </td>
                                <td class="text-center">
                                    16
                                </td>
                                <td>
                                    {!! Form::label('pda_S8_Time',old('pda_S8_Time',$PDAnalysis->pda_S8_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S8_Result',old('pda_S8_Result',$PDAnalysis->pda_S8_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S8_Conducted',old('pda_S8_Conducted',$PDAnalysis->pda_S8_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S8_Checked',old('pda_S8_Checked',$PDAnalysis->pda_S8_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S8_Comments != NULL)
                                        {!! Form::label('pda_S8_Comments',old('pda_S8_Comments',$PDAnalysis->pda_S8_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S8_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! Form::label('pda_Date_Day_S9',old('pda_Date_Day_S9',$PDAnalysis->pda_Date_Day_S9),['class'=>'form-control']) !!}
                                </td>
                                <td class="text-center">
                                    S9
                                </td>
                                <td class="text-center">
                                    24
                                </td>
                                <td>
                                    {!! Form::label('pda_S9_Time',old('pda_S9_Time',$PDAnalysis->pda_S9_Time),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S9_Result',old('pda_S9_Result',$PDAnalysis->pda_S9_Result),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S9_Conducted',old('pda_S9_Conducted',$PDAnalysis->pda_S9_Conducted),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    {!! Form::label('pda_S9_Checked',old('pda_S9_Checked',$PDAnalysis->pda_S9_Checked),['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    @if($PDAnalysis->pda_S9_Comments != NULL)
                                        {!! Form::label('pda_S9_Comments',old('pda_S9_Comments',$PDAnalysis->pda_S9_Comments),['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::label('pda_S9_Comments',"-",['class'=>'form-control']) !!}
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="page-break">


                    {{-- Vital Signs STARTS HERE--}}
                    @if($VitalSign->Absent == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Subject is absent from Vital Signs for study period {{$study_period}}!</h4></pre>
                            </div>
                        </div>
                    @else
                    <div class="page-break">
                    <h3>Vital Signs</h3>
                    <hr>
                    <div class="row col">
                        <p>During the confinement period, vital signs should be measured within ± 30 minutes of the
                            scheduled measurement
                            time (i.e vital signs to be taken within 30 minutes of 09:00 – time post dose 1 hour
                            etc)</p>
                    </div>
                    <table border="1">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                <p>Date</p>
                                <p>(yyyy/mm/dd)</p>
                            </th>
                            <th scope="col" class="text-center">
                                <p>Time Post Dose</p>
                                <p>(hour)</p>
                            </th>
                            <th scope="col" class="text-center">
                                <p>Reading Time</p>
                                <p>(24-hour clock)</p>
                            </th>
                            <th scope="col" class="text-center col-md-2">
                                <p>Sitting Blood Pressure</p>
                                <p>(systolic/diastolic) (mmHg)</p>
                            </th>
                            <th scope="col" class="text-center">
                                <p>Pulse Rate</p>
                                <p>(beats per min.)</p>
                            </th>
                            <th scope="col" class="text-center">
                                <p>Respiration Rate</p>
                                <p>(breaths per min.)</p>
                            </th>
                            <th scope="col" class="text-center">
                                <p>Taken by</p>
                                <p>(Initial)</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {!! Form::label('TPD_1_Date', old('TPD_1_Date',$VitalSign->TPD_1_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                1
                            </td>
                            <td>
                                {!! Form::label('TPD_1_ReadingTime', old('TPD_1_ReadingTime',$VitalSign->TPD_1_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_1_SittingBP_S', old('TPD_1_SittingBP_S',$VitalSign->TPD_1_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_1_SittingBP_D', old('TPD_1_SittingBP_D',$VitalSign->TPD_1_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_1_Pulse', old('TPD_1_Pulse',$VitalSign->TPD_1_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_1_Respiration', old('TPD_1_Respiration',$VitalSign->TPD_1_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_1_TakenBy', old('TPD_1_TakenBy',$VitalSign->TPD_1_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_2_Date', old('TPD_2_Date',$VitalSign->TPD_2_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                <p>2</p>
                            </td>
                            <td>
                                {!! Form::label('TPD_2_ReadingTime',old('TPD_2_ReadingTime',$VitalSign->TPD_2_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_2_SittingBP_S', old('TPD_2_SittingBP_S',$VitalSign->TPD_2_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_2_SittingBP_D', old('TPD_2_SittingBP_D',$VitalSign->TPD_2_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_2_Pulse', old('TPD_2_Pulse',$VitalSign->TPD_2_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_2_Respiration', old('TPD_2_Respiration',$VitalSign->TPD_2_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_2_TakenBy', old('TPD_2_TakenBy',$VitalSign->TPD_2_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_5_Date', old('TPD_5_Date',$VitalSign->TPD_5_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                5
                            </td>
                            <td>
                                {!! Form::label('TPD_5_ReadingTime', old('TPD_5_ReadingTime',$VitalSign->TPD_5_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_5_SittingBP_S', old('TPD_5_SittingBP_S',$VitalSign->TPD_5_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_5_SittingBP_D', old('TPD_5_SittingBP_D',$VitalSign->TPD_5_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_5_Pulse', old('TPD_5_Pulse',$VitalSign->TPD_5_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_5_Respiration', old('TPD_5_Respiration',$VitalSign->TPD_5_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_5_TakenBy', old('TPD_5_TakenBy',$VitalSign->TPD_5_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_8_Date', old('TPD_8_Date',$VitalSign->TPD_8_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                8
                            </td>
                            <td>
                                {!! Form::label('TPD_8_ReadingTime', old('TPD_8_ReadingTime',$VitalSign->TPD_8_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_8_SittingBP_S', old('TPD_8_SittingBP_S',$VitalSign->TPD_8_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_8_SittingBP_D', old('TPD_8_SittingBP_D',$VitalSign->TPD_8_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_8_Pulse', old('TPD_8_Pulse',$VitalSign->TPD_8_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_8_Respiration', old('TPD_8_Respiration',$VitalSign->TPD_8_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_8_TakenBy', old('TPD_8_TakenBy',$VitalSign->TPD_8_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_12_Date',old('TPD_12_Date',$VitalSign->TPD_12_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                12
                            </td>
                            <td>
                                {!! Form::label('TPD_12_ReadingTime', old('TPD_12_ReadingTime',$VitalSign->TPD_12_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_12_SittingBP_S', old('TPD_12_SittingBP_S',$VitalSign->TPD_12_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_12_SittingBP_D', old('TPD_12_SittingBP_D',$VitalSign->TPD_12_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_12_Pulse', old('TPD_12_Pulse',$VitalSign->TPD_12_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_12_Respiration', old('TPD_12_Respiration',$VitalSign->TPD_12_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_12_TakenBy', old('TPD_12_TakenBy',$VitalSign->TPD_12_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_24_Date', old('TPD_24_Date',$VitalSign->TPD_24_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                <p>24</p>
                            </td>
                            <td colspan="5" class="text-center">
                                <p>Refer to Discharge Page</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_36_Date', old('TPD_36_Date',$VitalSign->TPD_36_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                <p>36</p>
                            </td>
                            <td>
                                {!! Form::label('TPD_36_ReadingTime', old('TPD_36_ReadingTime',$VitalSign->TPD_36_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_36_SittingBP_S', old('TPD_36_SittingBP_S',$VitalSign->TPD_36_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_36_SittingBP_D', old('TPD_36_SittingBP_D',$VitalSign->TPD_36_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_36_Pulse', old('TPD_36_Pulse',$VitalSign->TPD_36_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_36_Respiration', old('TPD_36_Respiration',$VitalSign->TPD_36_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_36_TakenBy', old('TPD_36_TakenBy',$VitalSign->TPD_36_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::label('TPD_48_Date', old('TPD_48_Date',$VitalSign->TPD_48_Date),['class'=>'form-control']) !!}
                            </td>
                            <td class="text-center">
                                <p>48</p>
                            </td>
                            <td>
                                {!! Form::label('TPD_48_ReadingTime', old('TPD_48_ReadingTime',$VitalSign->TPD_48_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('TPD_48_SittingBP_S', old('TPD_48_SittingBP_S',$VitalSign->TPD_48_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('TPD_48_SittingBP_D', old('TPD_48_SittingBP_D',$VitalSign->TPD_48_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_48_Pulse', old('TPD_48_Pulse',$VitalSign->TPD_48_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_48_Respiration', old('TPD_48_Respiration',$VitalSign->TPD_48_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('TPD_48_TakenBy', old('TPD_48_TakenBy',$VitalSign->TPD_48_TakenBy),['class'=>'form-control']) !!}
                            </td>
                        </tr>
                       </table>
                    </div>
                        {{--new table for repeat vital signs--}}
                        <h3> For repeat/extra vital signs</h3>
                      <table border="1">
                          <thead>
                          <tr>
                              <th scope="col" class="text-center">
                                  <p>Date</p>
                                  <p>(yyyy/mm/dd)</p>
                              </th>
                              <th scope="col" class="text-center">
                                  <p>Time Post Dose</p>
                                  <p>(hour)</p>
                              </th>
                              <th scope="col" class="text-center">
                                  <p>Reading Time</p>
                                  <p>(24-hour clock)</p>
                              </th>
                              <th scope="col" class="text-center col-md-2">
                                  <p>Sitting Blood Pressure</p>
                                  <p>(systolic/diastolic) (mmHg)</p>
                              </th>
                              <th scope="col" class="text-center">
                                  <p>Pulse Rate</p>
                                  <p>(beats per min.)</p>
                              </th>
                              <th scope="col" class="text-center">
                                  <p>Respiration Rate</p>
                                  <p>(breaths per min.)</p>
                              </th>
                              <th scope="col" class="text-center">
                                  <p>Taken by</p>
                                  <p>(Initial)</p>
                              </th>
                          </tr>
                          </thead>
                          <tbody>
                        <tr>
                            @if($VitalSign->Extra1_TPD == NULL)
                            <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra1_Date', old('Extra1_Date',$VitalSign->Extra1_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra1_TPD',old('Extra1_TPD',$VitalSign->Extra1_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra1_ReadingTime', old('Extra1_ReadingTime',$VitalSign->Extra1_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra1_SittingBP_S', old('Extra1_SittingBP_S',$VitalSign->Extra1_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra1_SittingBP_D', old('Extra1_SittingBP_D',$VitalSign->Extra1_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra1_Pulse', old('Extra1_Pulse',$VitalSign->Extra1_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra1_Respiration', old('Extra1_Respiration',$VitalSign->Extra1_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra1_TakenBy', old('Extra1_TakenBy',$VitalSign->Extra1_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra2_TPD == NULL)
                            <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra2_Date', old('Extra2_Date',$VitalSign->Extra2_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra2_TPD', old('Extra2_TPD',$VitalSign->Extra2_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra2_ReadingTime', old('Extra2_ReadingTime',$VitalSign->Extra2_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra2_SittingBP_S', old('Extra2_SittingBP_S',$VitalSign->Extra2_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra2_SittingBP_D', old('Extra2_SittingBP_D',$VitalSign->Extra2_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra2_Pulse', old('Extra2_Pulse',$VitalSign->Extra2_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra2_Respiration', old('Extra2_Respiration',$VitalSign->Extra2_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra2_TakenBy', old('Extra2_TakenBy',$VitalSign->Extra2_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra3_TPD == NULL)
                                <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra3_Date', old('Extra3_Date',$VitalSign->Extra3_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra3_TPD', old('Extra3_TPD',$VitalSign->Extra3_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra3_ReadingTime', old('Extra3_ReadingTime',$VitalSign->Extra3_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra3_SittingBP_S', old('Extra3_SittingBP_S',$VitalSign->Extra3_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra3_SittingBP_D', old('Extra3_SittingBP_D',$VitalSign->Extra3_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra3_Pulse', old('Extra3_Pulse',$VitalSign->Extra3_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra3_Respiration', old('Extra3_Respiration',$VitalSign->Extra3_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra3_TakenBy', old('Extra3_TakenBy',$VitalSign->Extra3_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra4_TPD == NULL)
                                <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra4_Date',old('Extra4_Date',$VitalSign->Extra4_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra4_TPD', old('Extra4_TPD',$VitalSign->Extra4_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra4_ReadingTime', old('Extra4_ReadingTime',$VitalSign->Extra4_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra4_SittingBP_S', old('Extra4_SittingBP_S',$VitalSign->Extra4_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra4_SittingBP_D', old('Extra4_SittingBP_D',$VitalSign->Extra4_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra4_Pulse', old('Extra4_Pulse',$VitalSign->Extra4_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra4_Respiration', old('Extra4_Respiration',$VitalSign->Extra4_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra4_TakenBy', old('Extra4_TakenBy',$VitalSign->Extra4_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra5_TPD == NULL)
                                <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra5_Date', old('Extra5_Date',$VitalSign->Extra5_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra5_TPD', old('Extra5_TPD',$VitalSign->Extra5_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra5_ReadingTime', old('Extra5_ReadingTime',$VitalSign->Extra5_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra5_SittingBP_S', old('Extra5_SittingBP_S',$VitalSign->Extra5_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra5_SittingBP_D', old('Extra5_SittingBP_D',$VitalSign->Extra5_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra5_Pulse', old('Extra5_Pulse',$VitalSign->Extra5_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra5_Respiration', old('Extra5_Respiration',$VitalSign->Extra5_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra5_TakenBy', old('Extra5_TakenBy',$VitalSign->Extra5_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra6_TPD == NULL)
                                <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra6_Date', old('Extra6_Date',$VitalSign->Extra6_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra6_TPD', old('Extra6_TPD',$VitalSign->Extra6_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra6_ReadingTime', old('Extra6_ReadingTime',$VitalSign->Extra6_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra6_SittingBP_S', old('Extra6_SittingBP_S',$VitalSign->Extra6_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra6_SittingBP_D', old('Extra6_SittingBP_D',$VitalSign->Extra6_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra6_Pulse', old('Extra6_Pulse',$VitalSign->Extra6_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra6_Respiration', old('Extra6_Respiration',$VitalSign->Extra6_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra6_TakenBy', old('Extra6_TakenBy',$VitalSign->Extra6_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra7_TPD == NULL)
                                <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra7_Date', old('Extra7_Date',$VitalSign->Extra7_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra7_TPD', old('Extra7_TPD',$VitalSign->Extra7_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra7_ReadingTime',old('Extra7_ReadingTime',$VitalSign->Extra7_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra7_SittingBP_S', old('Extra7_SittingBP_S',$VitalSign->Extra7_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra7_SittingBP_D', old('Extra7_SittingBP_D',$VitalSign->Extra7_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra7_Pulse', old('Extra7_Pulse',$VitalSign->Extra7_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra7_Respiration', old('Extra7_Respiration',$VitalSign->Extra7_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra7_TakenBy', old('Extra7_TakenBy',$VitalSign->Extra7_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            @if($VitalSign->Extra2_TPD == NULL)
                                <td>Not Repeated</td>
                            @else
                            <td>
                                {!! Form::label('Extra8_Date', old('Extra8_Date',$VitalSign->Extra8_Date),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra8_TPD', old('Extra8_TPD',$VitalSign->Extra8_TPD),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra8_ReadingTime', old('Extra8_ReadingTime',$VitalSign->Extra8_ReadingTime),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                Systolic: {!! Form::label('Extra8_SittingBP_S', old('Extra8_SittingBP_S',$VitalSign->Extra8_SittingBP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
                                /
                                Diastolic: {!! Form::label('Extra8_SittingBP_D', old('Extra8_SittingBP_D',$VitalSign->Extra8_SittingBP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra8_Pulse', old('Extra8_Pulse',$VitalSign->Extra8_Pulse),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra8_Respiration', old('Extra8_Respiration',$VitalSign->Extra8_Respiration),['class'=>'form-control']) !!}
                            </td>
                            <td>
                                {!! Form::label('Extra8_TakenBy', old('Extra8_TakenBy',$VitalSign->Extra8_TakenBy),['class'=>'form-control']) !!}
                            </td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                    <div class="row col">
                        <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading
                            only).</p>
                    </div>
                    <div class="form-group row col-md-6">
                        {!! Form::label('Comment','Comments/ Remarks: ') !!}
                        {!! Form::label('Comment',old('Comment',$VitalSign->Comment),['class'=>'form-control']) !!}
                    </div>
                    @endif
                </div>
                {{-- Discharge STARTS HERE--}}
                @if($Discharge->Absent == 1)
                <div class="form-group row">
                    <div class="col-md-1">
                        <pre><h4>Subject is absent from Discharge for study period {{$study_period}}!</h4></pre>
                    </div>
                </div>
                @else
                <div class="page-break">
                    <h3>Discharge</h3>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-1">
                            {!! Form::label('DischargeDate', 'Date: ') !!}
                            {!! Form::label('DischargeDate', ($Discharge->DischargeDate)) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            {!! Form::label('UnscheduledDischarge ', 'Is this an unscheduled discharge? ') !!}
                            {!! Form::label('unscheduledDischarge', ($Discharge->UnscheduledDischarge)) !!}
                        </div>
                        @if($Discharge->UnscheduledDischarge == "Yes")
                            <div class="col-md-7">
                                {!! Form::label('unscheduledDischarge_Text',($Discharge->UnscheduledDischarge)) !!}
                            </div>
                        @endif
                    </div>
                    <hr>
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
                            <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                            <td>{!! Form::label('Sitting_ReadingTime', old('Sitting_ReadingTime',$Discharge->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                            <td>
                                Systolic: {!! Form::label('Sitting_BP_S', old('Sitting_BP_S',$Discharge->Sitting_BP_S),['class'=>'form-control','placeholder'=>'']) !!}
                                /
                                Diastolic: {!! Form::label('Sitting_BP_D', old('Sitting_BP_D',$Discharge->Sitting_BP_D),['class'=>'form-control','placeholder'=>'']) !!}
                            </td>
                            <td>{!! Form::label('Sitting_HR', old('Sitting_HR',$Discharge->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                            <td>{!! Form::label('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$Discharge->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                @if($Discharge->SittingRepeat=='No' OR $Discharge->SittingRepeat== NULL )
                                    {!! Form::label('SittingRepeatNA','Not Applicable') !!}
                                @elseif($Discharge->SittingRepeat=='Yes')
                                    {!! Form::label('SittingRepeatYes','Sitting Repeated') !!}
                                @endif
                            </th>
                            <td>
                                @if($Discharge->SittingRepeat_ReadingTime != NULL)
                                    {!! Form::label('SittingRepeat_ReadingTime', ($Discharge->SittingRepeat_ReadingTime)) !!}
                                @else
                                    {!! Form::label('SittingRepeat_ReadingTime', '-') !!}
                                @endif
                            </td>
                            <td>
                                @if($Discharge->SittingRepeat_BP_S != NULL AND $Discharge->SittingRepeat_BP_D != NULL)
                                    Systolic: {!! Form::label('SittingRepeat_BP_S',($Discharge->SittingRepeat_BP_S)) !!}
                                    /
                                    Diastolic: {!! Form::label('SittingRepeat_BP_D',($Discharge->SittingRepeat_BP_D)) !!}
                                @else
                                    Systolic: {!! Form::label('SittingRepeat_BP_S','-') !!} /
                                    Diastolic: {!! Form::label('SittingRepeat_BP_D','-') !!}
                                @endif
                            </td>
                            @if($Discharge->SittingRepeat_HR != NULL AND $Discharge->SittingRepeat_RespiratoryRate != NULL)
                                <td>{!! Form::label('SittingRepeat_HR',($Discharge->SittingRepeat_HR)) !!}</td>
                                <td>{!! Form::label('SittingRepeat_RespiratoryRate',($Discharge->SittingRepeat_RespiratoryRate)) !!}</td>
                            @else
                                <td>{!! Form::label('SittingRepeat_HR','-') !!}</td>
                                <td>{!! Form::label('SittingRepeat_RespiratoryRate','-') !!}</td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row" colspan="4"
                                class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                            <td>{!! Form::label('Initial',($Discharge->Initial)) !!}</td>
                        </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
                <hr>

                {{--Discharge Questionnaire starts here--}}
                 @if($DQuestionnaire->Absent ==1)
                    <div class="form-group row">
                        <div class="col-md-1">
                            <pre><h4>Subject is absent from Discharge Questionnaire and Vital Signs for study period {{$study_period}}!</h4></pre>
                        </div>
                    </div>
                 @else
                <div class="page-break">
                    <h3>Discharge Questionnaire</h3>
                    <div class="form-group row">
                        <div class="col-md-1">
                            {!! Form::label('time', 'Time: ') !!}
                            {!! Form::label('timeTaken',($DQuestionnaire->DQtimeTaken)) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <p>1. Is the subject oriented and has steady gait?</p>
                            <p>{!! Form::label('Oriented', ($DQuestionnaire->Oriented)) !!}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <p>2. Is the subject fit for discharge?</p>
                            <p>{!! Form::label('ReadyDischarge', ($DQuestionnaire->ReadyDischarge)) !!}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row col">
                        <p>The answers for all the statements above should be “Yes” before a subject is recommended for
                            discharge. The
                            attending physician is required to exercise his clinical judgement. The above criteria serve
                            as a minimal guide
                            only.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            {!! Form::label('Remarks', 'Additional Remarks (where applicable)') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::textarea('Remarks',old("Remarks",$DQuestionnaire->Remarks),['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
                            {!! Form::label('physicianSign',($DQuestionnaire->PhysicianSign)) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                            {!! Form::label('physicianName',($DQuestionnaire->PhysicianName)) !!}
                        </div>
                    </div>
                </div>
                @endif
                {{-- Interim Questionnaire(36 hours Post Dose Visit) --}}
                <div class="page-break">
                <h3>Interim Questionnaire(36 hours Post Dose Visit)</h3>
                @if($IQ36->NApplicable == 1)
                    <div class=" form-group row">
                        <div class="col-md-2">
                            <pre><h4>Not Applicable for the study!</h4></pre>
                        </div>
                    </div>
                @elseif($IQ36->Absent == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Subject is absent from Interim Questionnaire 36 hours Post Dose Visit for study period {{$study_period}}!</h4></pre>
                                <hr>
                            </div>
                        </div>
                @else
                    <div class="form-group row">
                        <div class="col-md-1">
                            {!! Form::label('dateTaken', 'Date Taken: ') !!}
                            {!! Form::label('dateTaken',($IQ36->dateTaken)) !!}
                        </div>
                        <div class=" offset-3 col-md-1">
                            {!! Form::label('timeTaken', 'Time Taken: ') !!}
                            {!! Form::label('timeTaken',($IQ36->timeTaken)) !!}
                        </div>
                    </div>

                    {{-- Interim Question 1 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>1. Has the subject had any medical problems since last visit?</p>
                            <p>{!! Form::label('Interim36hrs01', ($IQ36->interim36hrs01)) !!}</p>
                        </div>
                    </div>
                    <hr>

                    {{-- Interim Question 2 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>2. Has the subject taken any medication (including herbal remedies), except birth control
                                medications and
                                other medications deemed acceptable by the Investigator other than study drug since last
                                visit?</p>
                            <p>{!! Form::label('Interim36hrs02', ($IQ36->interim36hrs02)) !!}</p>
                        </div>
                    </div>
                    <hr>

                    {{-- Interim Question 3 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since
                                last visit?</p>
                        </div>
                    </div>
                    @if($IQ36->Interim36hrs03 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs03txt',($IQ36->interim36hrs03)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 4 --}}
                    <div class="page-break">
                        <div class="row">
                            <div class="col-md-6">
                                <p>4. Has the subject consumed any food or beverage containing grapefruit (including
                                    marmalade) or pomelo since
                                    last visit?</p>
                            </div>
                        </div>
                        @if($IQ36->interim36hrs04!="No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('Interim36hrs04txt',($IQ36->interim36hrs04)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('Interim36hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>

                    {{-- Interim Question 5 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
                        </div>
                    </div>
                    @if($IQ36->interim36hrs05 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs05txt',($IQ36->interim36hrs05)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 6 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood
                                that drawn during
                                the procedures of this study) since last visit:</p>
                        </div>
                    </div>
                    @if($IQ36->interim36hrs06 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs06txt',($IQ36->interim36hrs06)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 7 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>7. For female subjects of childbearing potential only: Has the subject use of
                                non-acceptable methods of
                                contraception since last visit?</p>
                        </div>
                    </div>
                    @if($IQ36->interim36hrs07 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs07txt',($IQ36->interim36hrs07)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('Interim36hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 8 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>8. Does any event above potentially influence the PK or PD profile of study drug, or
                                increase the subject’s
                                risk if continue the study?</p>
                            {!! Form::label('Interim36hrs08', ($IQ36->interim36hrs08)) !!}
                        </div>
                    </div>
                </div>
                <hr>
                    {{--Interviewed and physician signature--}}

                    <div class="form-group row">
                        <div class="offset-5 col-md-3">
                            {!! Form::label('Interim36hrsInterviewedby', 'Interviewed by (initial): ') !!}
                            {!! Form::label('Interim36hrsInterviewedby',($IQ36->Interim36hrsInterviewedby)) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('Interim36hrsCheckedby', 'Checked by (initial): ') !!}
                            {!! Form::label('Interim36hrsCheckedby',($IQ36->Interim36hrsCheckedby)) !!}
                        </div>
                    </div>
                @endif
                </div>

                <div class="page-break">
                    <h3>Interim Questionnaire(48 hours Post Dose Visit)</h3>
                    {{--    Interim Questionnaire 48 Starts here!--}}
                    @if($IQ48->NApplicable == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Not Applicable for the study!</h4></pre>
                            </div>
                        </div>
                    @elseif($IQ48->Absent == 1)
                        <div class=" form-group row">
                            <div class="col-md-2">
                                <pre><h4>Subject is absent from Interim Questionnaire 48 hours Post Dose Visit for study period {{$study_period}}!</h4></pre>
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <div class="col-md-1">
                                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                                {!! Form::label('dateTaken',($IQ48->dateTaken)) !!}
                            </div>
                            <div class=" offset-3 col-md-1">
                                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                                {!! Form::label('timeTaken',($IQ48->timeTaken)) !!}
                            </div>
                        </div>

                        {{-- Interim Question 1 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <p>1. Has the subject had any medical problems since last visit?</p>
                                <p>{!! Form::label('interim48hrs01', ($IQ48->interim48hrs01)) !!}</p>
                            </div>
                        </div>
                        <hr>

                        {{-- Interim Question 2 --}}


                        <div class="row">
                            <div class="col-md-6">
                                <p>2. Has the subject taken any medication (including herbal remedies), except birth control
                                    medications and
                                    other medications deemed acceptable by the Investigator other than study drug since last
                                    visit?</p>
                                <p>{!! Form::label('interim48hrs02', ($IQ48->interim48hrs02)) !!}</p>
                            </div>
                        </div>
                        <hr>

                        {{-- Interim Question 3 --}}


                        <div class="row">
                            <div class="col-md-6">
                                <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since
                                    last visit?</p>
                            </div>
                        </div>
                        @if($IQ48->interim48hrs03 != "No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs03txt',($IQ48->interim48hrs03)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                        <hr>

                        {{-- Interim Question 4 --}}
                        <div class="page-break">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>4. Has the subject consumed any food or beverage containing grapefruit (including
                                        marmalade) or pomelo since
                                        last visit?</p>
                                </div>
                            </div>
                            @if($IQ48->interim48hrs04!="No")
                                <div class="row">
                                    <div class="col-md-5">
                                        {!! Form::label('interim48hrs04txt',($IQ48->interim48hrs04)) !!}
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-5">
                                        {!! Form::label('interim48hrs03txt','No') !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <hr>

                        {{-- Interim Question 5 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
                            </div>
                        </div>
                        @if($IQ48->interim48hrs05 != "No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs05txt',($IQ48->interim48hrs05)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                        <hr>

                        {{-- Interim Question 6 --}}


                        <div class="row">
                            <div class="col-md-6">
                                <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood
                                    that drawn during
                                    the procedures of this study) since last visit:</p>
                            </div>
                        </div>
                        @if($IQ48->interim48hrs06 != "No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs06txt',($IQ48->interim48hrs06)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                        <hr>

                        {{-- Interim Question 7 --}}

                        <div class="row">
                            <div class="col-md-6">
                                <p>7. For female subjects of childbearing potential only: Has the subject use of
                                    non-acceptable methods of
                                    contraception since last visit?</p>
                            </div>
                        </div>
                        @if($IQ48->interim48hrs07 != "No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs07txt',($IQ48->interim48hrs07)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim48hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                        <hr>

                        {{-- Interim Question 8 --}}

                        <div class="row">
                            <div class="col-md-6">
                                <p>8. Does any event above potentially influence the PK or PD profile of study drug, or
                                    increase the subject’s
                                    risk if continue the study?</p>
                                {!! Form::label('interim48hrs08', ($IQ48->interim48hrs08)) !!}
                            </div>
                        </div>
                        <hr>

                        {{--Interviewed and physician signature--}}

                        <div class="form-group row">
                            <div class="offset-5 col-md-3">
                                {!! Form::label('interim48hrsInterviewedby', 'Interviewed by (initial): ') !!}
                                {!! Form::label('interim48hrsInterviewedby',($IQ48->interim48hrsInterviewedby)) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('interim48hrsCheckedby', 'Checked by (initial): ') !!}
                                {!! Form::label('interim48hrsCheckedby',($IQ48->interim48hrsCheckedby)) !!}
                            </div>
                        </div>
                    @endif
                </div>
            <div class="page-break">
                <h3>Interim Questionnaire(72 hours Post Dose Visit)</h3>
                {{--    Interim Questionnaire 72 Starts here!--}}
                @if($IQ72->NApplicable == 1)
                    <div class=" form-group row">
                        <div class="col-md-2">
                            <pre><h4>Not Applicable for the study!</h4></pre>
                        </div>
                    </div>
                @elseif($IQ72->Absent == 1)
                    <div class=" form-group row">
                        <div class="col-md-2">
                            <pre><h4>Subject is absent from Interim Questionnaire 72 hours Post Dose Visit for study period {{$study_period}}!</h4></pre>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <div class="col-md-1">
                            {!! Form::label('dateTaken', 'Date Taken: ') !!}
                            {!! Form::label('dateTaken',($IQ72->dateTaken)) !!}
                        </div>
                        <div class=" offset-3 col-md-1">
                            {!! Form::label('timeTaken', 'Time Taken: ') !!}
                            {!! Form::label('timeTaken',($IQ72->timeTaken)) !!}
                        </div>
                    </div>

                    {{-- Interim Question 1 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>1. Has the subject had any medical problems since last visit?</p>
                            <p>{!! Form::label('interim72hrs01', ($IQ72->interim72hrs01)) !!}</p>
                        </div>
                    </div>
                    <hr>

                    {{-- Interim Question 2 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>2. Has the subject taken any medication (including herbal remedies), except birth control
                                medications and
                                other medications deemed acceptable by the Investigator other than study drug since last
                                visit?</p>
                            <p>{!! Form::label('interim72hrs02', ($IQ72->interim72hrs02)) !!}</p>
                        </div>
                    </div>
                    <hr>

                    {{-- Interim Question 3 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since
                                last visit?</p>
                        </div>
                    </div>
                    @if($IQ72->interim72hrs03 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs03txt',($IQ72->interim72hrs03)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 4 --}}
                    <div class="page-break">
                        <div class="row">
                            <div class="col-md-6">
                                <p>4. Has the subject consumed any food or beverage containing grapefruit (including
                                    marmalade) or pomelo since
                                    last visit?</p>
                            </div>
                        </div>
                        @if($IQ72->interim72hrs04!="No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim72hrs04txt',($IQ72->interim72hrs04)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim72hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>

                    {{-- Interim Question 5 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
                        </div>
                    </div>
                    @if($IQ72->interim72hrs05 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs05txt',($IQ72->interim72hrs05)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 6 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood
                                that drawn during
                                the procedures of this study) since last visit:</p>
                        </div>
                    </div>
                    @if($IQ72->interim72hrs06 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs06txt',($IQ72->interim72hrs06)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 7 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>7. For female subjects of childbearing potential only: Has the subject use of
                                non-acceptable methods of
                                contraception since last visit?</p>
                        </div>
                    </div>
                    @if($IQ72->interim72hrs07 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs07txt',($IQ72->interim72hrs07)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim72hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 8 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>8. Does any event above potentially influence the PK or PD profile of study drug, or
                                increase the subject’s
                                risk if continue the study?</p>
                            {!! Form::label('interim72hrs08', ($IQ72->interim72hrs08)) !!}
                        </div>
                    </div>
                    <hr>

                    {{--Interviewed and physician signature--}}

                    <div class="form-group row">
                        <div class="offset-5 col-md-3">
                            {!! Form::label('interim72hrsInterviewedby', 'Interviewed by (initial): ') !!}
                            {!! Form::label('interim72hrsInterviewedby',($IQ72->interim72hrsInterviewedby)) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('interim72hrsCheckedby', 'Checked by (initial): ') !!}
                            {!! Form::label('interim72hrsCheckedby',($IQ72->interim72hrsCheckedby)) !!}
                        </div>
                    </div>
                @endif
            </div>
                <h3>Interim Questionnaire(96 hours Post Dose Visit)</h3>
                {{--    Interim Questionnaire 96 Starts here!--}}
                @if($IQ96->NApplicable == 1)
                    <div class=" form-group row">
                        <div class="col-md-2">
                            <pre><h4>Not Applicable for the study!</h4></pre>
                        </div>
                    </div>
                @elseif($IQ96->Absent == 1)
                    <div class=" form-group row">
                        <div class="col-md-2">
                            <pre><h4>Subject is absent from Interim Questionnaire 96 hours Post Dose Visit for study period {{$study_period}}!</h4></pre>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <div class="col-md-1">
                            {!! Form::label('dateTaken', 'Date Taken: ') !!}
                            {!! Form::label('dateTaken',($IQ96->dateTaken)) !!}
                        </div>
                        <div class=" offset-3 col-md-1">
                            {!! Form::label('timeTaken', 'Time Taken: ') !!}
                            {!! Form::label('timeTaken',($IQ96->timeTaken)) !!}
                        </div>
                    </div>

                    {{-- Interim Question 1 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>1. Has the subject had any medical problems since last visit?</p>
                            <p>{!! Form::label('interim96hrs01', ($IQ96->interim96hrs01)) !!}</p>
                        </div>
                    </div>
                    <hr>

                    {{-- Interim Question 2 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>2. Has the subject taken any medication (including herbal remedies), except birth control
                                medications and
                                other medications deemed acceptable by the Investigator other than study drug since last
                                visit?</p>
                            <p>{!! Form::label('interim96hrs02', ($IQ96->interim96hrs02)) !!}</p>
                        </div>
                    </div>
                    <hr>

                    {{-- Interim Question 3 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since
                                last visit?</p>
                        </div>
                    </div>
                    @if($IQ96->interim96hrs03 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs03txt',($IQ96->interim96hrs03)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 4 --}}
                    <div class="page-break">
                        <div class="row">
                            <div class="col-md-6">
                                <p>4. Has the subject consumed any food or beverage containing grapefruit (including
                                    marmalade) or pomelo since
                                    last visit?</p>
                            </div>
                        </div>
                        @if($IQ96->interim96hrs04!="No")
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim96hrs04txt',($IQ96->interim96hrs04)) !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-5">
                                    {!! Form::label('interim96hrs03txt','No') !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>

                    {{-- Interim Question 5 --}}
                    <div class="row">
                        <div class="col-md-6">
                            <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
                        </div>
                    </div>
                    @if($IQ96->interim96hrs05 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs05txt',($IQ96->interim96hrs05)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 6 --}}


                    <div class="row">
                        <div class="col-md-6">
                            <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood
                                that drawn during
                                the procedures of this study) since last visit:</p>
                        </div>
                    </div>
                    @if($IQ96->interim96hrs06 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs06txt',($IQ96->interim96hrs06)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 7 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>7. For female subjects of childbearing potential only: Has the subject use of
                                non-acceptable methods of
                                contraception since last visit?</p>
                        </div>
                    </div>
                    @if($IQ96->interim96hrs07 != "No")
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs07txt',($IQ96->interim96hrs07)) !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                {!! Form::label('interim96hrs03txt','No') !!}
                            </div>
                        </div>
                    @endif
                    <hr>

                    {{-- Interim Question 8 --}}

                    <div class="row">
                        <div class="col-md-6">
                            <p>8. Does any event above potentially influence the PK or PD profile of study drug, or
                                increase the subject’s
                                risk if continue the study?</p>
                            {!! Form::label('interim96hrs08', ($IQ96->interim96hrs08)) !!}
                        </div>
                    </div>
                    <hr>

                    {{--Interviewed and physician signature--}}

                    <div class="form-group row">
                        <div class="offset-5 col-md-3">
                            {!! Form::label('interim96hrsInterviewedby', 'Interviewed by (initial): ') !!}
                            {!! Form::label('interim96hrsInterviewedby',($IQ96->interim96hrsInterviewedby)) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('interim96hrsCheckedby', 'Checked by (initial): ') !!}
                            {!! Form::label('interim96hrsCheckedby',($IQ96->interim96hrsCheckedby)) !!}
                        </div>
                    </div>
                @endif
</body>



