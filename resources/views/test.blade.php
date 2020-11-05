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
<h3>{{$patient->name}} {{$study->study_name}}'s study specific details</h3>
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
                <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
                <td>{!! Form::label('Supine_ReadingTime', old('Supine_ReadingTime',$BMVS->Supine_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_BP', old('Supine_BP',$BMVS->Supine_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_HR', old('Supine_HR',$BMVS->Supine_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Supine_RespiratoryRate', old('Supine_RespiratoryRate',$BMVS->Supine_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                <td>{!! Form::label('Sitting_ReadingTime',old('Sitting_ReadingTime',$BMVS->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::label('Sitting_BP', old('Sitting_BP',$BMVS->Sitting_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
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
                    <td>{!! Form::label('Sitting_BP_Repeat1', old('Sitting_BP_Repeat1',$BMVS->Sitting_BP_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
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
                    <td>{!! Form::label('Sitting_BP_Repeat2', old('Sitting_BP_Repeat2',$BMVS->Sitting_BP_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
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
</div>
{{--BREATH ALCOHOL TEST STARTS HERE--}}
<h3>Breath Alcohol Test</h3>
<p>(Transcribed from Breath Alcohol Test Logbook)</p>
<hr>
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
{{--Admission Questionnaire starts here--}}

<h3>Admission Questionnaire</h3>
<hr>
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
<div class="page-break">
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
    <hr>
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
    </div>
    <hr>
    {{-- Admission Question 5 --}}
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
                        @endif
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
                                {!! Form::text('bloodDono_Yes',(old('bloodDono',$AQuestionnaire->BloodDono)!='No' && ($AQuestionnaire->BloodDono!=NULL))? $AQuestionnaire->BloodDono :'',['class'=>'form-control']) !!}
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
                    <hr>
                {{-- urine drugs for abuse test --}}
                    <h3>Urine Pregnancy Test</h3>
                    <p>(Transcribed from Urine Logbook)</p>
                    <div class=" form-group row">
                @if($UrineTest->UPreg_male == 1)
                            <div class="col-md-2">
                                {!! Form::label('UPreg_male', 'Not Applicable for male: ') !!}
                            </div>
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
                                {!! Form::label('UPreg_hCG_Comment',($UrineTest->UPreg_hCG_Comment)) !!}
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
                    <div class="col-md-2">
                        {!! Form::label('NApplicable', 'Not Applicable') !!}
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
                            {!! Form::label('UDrug_Methamphetamine_Comment',($UrineTest->UDrug_Methamphetamine_Comment)) !!}
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
                            {!! Form::label('UDrug_Morphine_Comment',($UrineTest->UDrug_Morphine_Comment)) !!}
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
                            {!! Form::label('UDrug_Marijuana_Comment',($UrineTest->UDrug_Marijuana_Comment)) !!}
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
                <div class=" form-group row">
                    <div class="col-md-7">
                        <p>Does the subject obey all the restrictions and/or fulfill all the inclusion criteria and none
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
                    <p>If “No”, the subject may or may not be admitted into the study ward, based on the discretion of
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
                            {!! Form::textarea('Comments',($UrineTest->Comments)) !!}
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-md-7">
                        <p>Is the subject fit for dosing?</p>
                    </div>
                    <div class="col-md-1">
                        <p>{!! Form::label('subjectFit', (($UrineTest->subjectFit)=='Yes')) !!}</p>
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
             </div>
            <div class="page-break">
                <h3>Pharmacokinetic Blood Sampling</h3>
            </div>
                <div class="page-break">
                    <h3>Pharmacodynamic Blood Sampling</h3>
                </div>
                <div class="page-break">
                    <h3>Pharmacodynamic (PD) Analysis</h3>
                </div>
                <div class="page-break">
                    <h3>Vital Signs</h3>
                </div>
                {{-- Discharge --}}
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
                        <td>{!! Form::time('Sitting_ReadingTime', old('Sitting_ReadingTime',$Discharge->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_BP', old('Sitting_BP',$Discharge->Sitting_BP),['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_HR', old('Sitting_HR',$Discharge->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$Discharge->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">
                            @if($Discharge->SittingRepeat=='No' OR $Discharge->SittingRepeat== NULL )
                                {!! Form::label('SittingRepeatNA','Not Applicable') !!}
                            @elseif($Discharge->SittingRepeat=='Yes')
                                {!! Form::label('SittingRepeatYes','Sitting Repeated') !!}
                            @endif
                        </th>
                        <td>{!! Form::label('SittingRepeat_ReadingTime', ($Discharge->SittingRepeat_ReadingTime)) !!}</td>
                        <td>{!! Form::label('SittingRepeat_BP',($Discharge->SittingRepeat_BP)) !!}</td>
                        <td>{!! Form::label('SittingRepeat_HR',($Discharge->SittingRepeat_HR)) !!}</td>
                        <td>{!! Form::label('SittingRepeat_RespiratoryRate',($Discharge->SittingRepeat_RespiratoryRate)) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4"
                            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                        <td>{!! Form::label('Initial',($Discharge->Initial)) !!}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <hr>
                {{--Discharge Questionnaire starts here--}}
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
                    <p>The answers for all the statements above should be “Yes” before a subject is recommended for discharge. The
                        attending physician is required to exercise his clinical judgement. The above criteria serve as a minimal guide
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
                {{-- Interim Questionnaire(36 hours Post Dose Visit) --}}
                <h3>Interim Questionnaire(36 hours Post Dose Visit)</h3>
                <div class=" form-group row">
                    <div class="col-md-2">
                        {!! Form::label('NApplicable', 'Not Applicable:') !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::checkbox('NApplicable') !!}
                    </div>
                </div>
                <hr>
                <div class="page-break">
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
                        <p>2. Has the subject taken any medication (including herbal remedies), except birth control medications and
                            other medications deemed acceptable by the Investigator other than study drug since last visit?</p>
                        <p>{!! Form::label('Interim36hrs02', ($IQ36->interim36hrs02)) !!}</p>
                    </div>
                </div>
                <hr>
                {{-- Interim Question 3 --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since last visit?</p>
                        <p>{!! Form::label('Interim36hrs03', ($IQ36->Interim36hrs03)) !!}</p>
                    </div>
                </div>
                    @if($IQ36->Interim36hrs03 != "No")
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::label('Interim36hrs03txt',($IQ36->interim36hrs03)) !!}
                    </div>
                </div>
                    @endif
                <hr>
                {{-- Interim Question 4 --}}
                    <div class="page-break">
                <div class="row">
                    <div class="col-md-6">
                        <p>4. Has the subject consumed any food or beverage containing grapefruit (including marmalade) or pomelo since
                            last visit?</p>
                        <p>{!! Form::label('Interim36hrs04', ($IQ36->interim36hrs04)) !!}</p>
                    </div>
                </div>
                @if($IQ36->interim36hrs04!="No")
                <div class="row">
                    <div class="col-md-5">
                    {!! Form::label('Interim36hrs04txt',($IQ36->interim36hrs04)) !!}
                    </div>
                </div>
                @endif
                </div>
                <hr>
                {{-- Interim Question 5 --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
                        {!! Form::label('Interim36hrs05', ($IQ36->interim36hrs05)) !!}
                    </div>
                </div>
                    @if($IQ36->interim36hrs05 != "No")
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::label('Interim36hrs05txt',($IQ36->interim36hrs05)) !!}
                    </div>
                </div>
                    @endif
                <hr>
                {{-- Interim Question 6 --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood that drawn during
                            the procedures of this study) since last visit:</p>
                        <p>{!! Form::label('Interim36hrs06', ($IQ36->interim36hrs06)) !!}</p>
                    </div>
                </div>
                    @if($IQ36->interim36hrs06 != "No")
                    <div class="row">
                        <div class="col-md-5">
                            {!! Form::label('Interim36hrs06txt',($IQ36->interim36hrs06)) !!}
                        </div>
                    </div>
                    @endif
                <hr>
                {{-- Interim Question 7 --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>7. For female subjects of childbearing potential only: Has the subject use of non-acceptable methods of
                            contraception since last visit?</p>
                        <p>{!! Form::label('Interim36hrs07', ($IQ36->interim36hrs07)) !!}</p>
                    </div>
                </div>
                    @if($IQ36->interim36hrs07 != "No")
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::label('Interim36hrs07txt',($IQ36->interim36hrs07)) !!}
                    </div>
                </div>
                    @endif
                <hr>
                {{-- Interim Question 8 --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>8. Does any event above potentially influence the PK or PD profile of study drug, or increase the subject’s
                            risk if continue the study?</p>
                        {!! Form::label('Interim36hrs08', ($IQ36->interim36hrs08)) !!}
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
                </div>
</body>



