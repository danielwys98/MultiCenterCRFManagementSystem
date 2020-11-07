{!! Form::model($AQuestionnaire,['route' => ['sp_AQuestionnaire.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
<h3>Admission Questionnaire</h3>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
</div>
<hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('AQuestionnaireDateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('AQuestionnaireDateTaken',old('AQuestionnaireDateTaken',$AQuestionnaire->AQuestionnaireDateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('AQuestionnaireTimeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('AQuestionnaireTimeTaken',old('AQuestionnaireTimeTaken',$AQuestionnaire->AQuestionnaireTimeTaken),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class=" form-group row">
        <div class="col-md-6">
        </div>
        <div class="col-md-1">
            <p class="font-weight-bold">Yes</p>
        </div>
        <div class="col-md-1">
            <p class="font-weight-bold">No</p>
        </div>
    </div>
    <hr>

    {{-- Admission Question 1 --}}
    <div class="row">
        <div class="col-md-6">
            <p>1. Has the subject had any medical problems within the last 7 days before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('MedicalProblem', 'Yes',(($AQuestionnaire->MedicalProblem)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('MedicalProblem', 'No',(($AQuestionnaire->MedicalProblem)=='No')? 'checked' : '') !!}</p>
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
        <div class="col-md-1">
            <p>{!! Form::radio('MP_IncreaseRisk', 'Yes',(($AQuestionnaire->MP_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('MP_IncreaseRisk', 'No',(($AQuestionnaire->MP_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('MP_InfluencePKinetic', 'Yes',(($AQuestionnaire->MP_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('MP_InfluencePKinetic', 'No',(($AQuestionnaire->MP_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>

    {{-- Admission Question 2 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>2. Has the subject taken any medication (including herbal remedies, with the exception of birth control
                medications) within 7 days before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Medication', 'Yes',(($AQuestionnaire->Medication)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Medication', 'No',(($AQuestionnaire->Medication)=='No')? 'checked' : '') !!}</p>
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
        <div class="col-md-1">
            <p>{!! Form::radio('Medi_IncreaseRisk', 'Yes',(($AQuestionnaire->Medi_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Medi_IncreaseRisk', 'No',(($AQuestionnaire->Medi_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Medi_InfluencePKinetic', 'Yes',(($AQuestionnaire->Medi_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Medi_InfluencePKinetic', 'No',(($AQuestionnaire->Medi_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>

    {{-- Admission Question 3 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>3. Has the subject been hospitalized within 4 weeks before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Hospitalized', 'Yes',(($AQuestionnaire->Hospitalized)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Hospitalized', 'No',(($AQuestionnaire->Hospitalized)=='No')? 'checked' : '') !!}</p>
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
        <div class="col-md-1">
            <p>{!! Form::radio('H_IncreaseRisk', 'Yes',(($AQuestionnaire->H_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('H_IncreaseRisk', 'No',(($AQuestionnaire->H_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the hospitalization potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('H_InfluencePKinetic', 'Yes',(($AQuestionnaire->H_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('H_InfluencePKinetic', 'No',(($AQuestionnaire->H_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>

    {{-- Admission Question 4 --}}
    <div class="row">
        <div class="col-md-6">
            <p>4. Has the subject consumed any alcohol or xanthine-containing food or beverage within 24 hours before
                dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('alcoholXanthine', 'Yes',(old('alcoholXanthine',$AQuestionnaire->AlcoholXanthine)!='No' && ($AQuestionnaire->AlcoholXanthine!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('alcoholXanthine', 'No',(old('alcoholXanthine',$AQuestionnaire->AlcoholXanthine)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <p>If “No”, proceed to next question.</p>
            <p>If “Yes”, specify amount and time taken: </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('alcoholXanthine_Yes',(old('alcoholXanthine',$AQuestionnaire->AlcoholXanthine)!='No' && ($AQuestionnaire->AlcoholXanthine!=NULL))? $AQuestionnaire->AlcoholXanthine :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of alcohol or xanthine potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('AX_InfluencePKinetic', 'Yes',(($AQuestionnaire->AX_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('AX_InfluencePKinetic', 'No',(($AQuestionnaire->AX_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 5 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>5. Has the subject consumed any food or beverage containing poppy seeds within 48 hours before drugs of abuse
                test? </p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('poppySeeds', 'Yes',(old('poppySeeds',$AQuestionnaire->PoppySeeds)!='No' && ($AQuestionnaire->PoppySeeds!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('poppySeeds', 'No',(old('poppySeeds',$AQuestionnaire->PoppySeeds)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>If “No”, proceed to next question.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>If “Yes”, specify amount and time taken</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('poppySeeds_Yes',(old('poppySeeds',$AQuestionnaire->PoppySeeds)!='No' && ($AQuestionnaire->PoppySeeds!=NULL))? $AQuestionnaire->PoppySeeds :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of poppy seeds potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('PS_InfluencePKinetic', 'Yes',(($AQuestionnaire->PS_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('PS_InfluencePKinetic', 'No',(($AQuestionnaire->PS_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 6 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>6. Has the subject consumed any food or beverage containing grapefruit (including marmalade) and pomelo
                within 7 days before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('grapefruitPomelo', 'Yes',(old('grapefruitPomelo',$AQuestionnaire->GrapefruitPomelo)!='No' && ($AQuestionnaire->GrapefruitPomelo!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('grapefruitPomelo', 'No',(old('grapefruitPomelo',$AQuestionnaire->GrapefruitPomelo)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, specify amount and time taken</p>
            <p>If “No”, proceed to next question.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('grapefruitPomelo_Yes',(old('grapefruitPomelo',$AQuestionnaire->GrapefruitPomelo)!='No' && ($AQuestionnaire->GrapefruitPomelo!=NULL))? $AQuestionnaire->GrapefruitPomelo :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of grapefruit (including marmalade) or pomelo potentially influence the pharmacokinetic profile
                of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Grapefruit_InfluencePKinetic', 'Yes',(($AQuestionnaire->Grapefruit_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Grapefruit_InfluencePKinetic', 'No',(($AQuestionnaire->Grapefruit_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 7 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>7. Has the subject participated in other experimental drug studies within 4 weeks before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('otherDrugStudies', 'Yes',(old('otherDrugStudies',$AQuestionnaire->OtherDrugStudies)!='No' && ($AQuestionnaire->OtherDrugStudies!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('otherDrugStudies', 'No',(old('otherDrugStudies',$AQuestionnaire->OtherDrugStudies)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “No”, proceed to next question.</p>
            <p>If “Yes”, provide details</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('otherDrugStudies_Yes',(old('otherDrugStudies',$AQuestionnaire->OtherDrugStudies)!='No' && ($AQuestionnaire->OtherDrugStudies!=NULL))? $AQuestionnaire->OtherDrugStudies :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the participation significantly increase the subject’s risk if enrolled in the study</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_IncreaseRisk', 'Yes',(($AQuestionnaire->Other_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_IncreaseRisk', 'No',(($AQuestionnaire->Other_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the participation potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_InfluencePKinetic', 'Yes',(($AQuestionnaire->Other_InfluencePKinetic)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Other_InfluencePKinetic', 'No',(($AQuestionnaire->Other_InfluencePKinetic)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 8 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>8. Has the subject participated in donation of (excluding the volume of whole blood that will be drawn during
                the screening procedures of this study):</p>
            <ul>
                <li>Plasma (500 mL) within the last 14 days, or</li>
                <li>50 mL to 300 mL of whole blood within the last 28 days, or</li>
                <li>301 mL to 500 mL of whole blood within the last 42 days, or</li>
                <li>more than 500 mL of whole blood within 84 days before dosing?</li>
            </ul>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('bloodDono', 'Yes',(old('bloodDono',$AQuestionnaire->BloodDono)!='No' && ($AQuestionnaire->BloodDono!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('bloodDono', 'No',(old('bloodDono',$AQuestionnaire->BloodDono)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “No”, proceed to next section.</p>
            <p>If “Yes”, provide details</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('bloodDono_Yes',(old('bloodDono',$AQuestionnaire->BloodDono)!='No' && ($AQuestionnaire->BloodDono!=NULL))? $AQuestionnaire->BloodDono :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the donation potentially increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Blood_IncreaseRisk', 'Yes',(($AQuestionnaire->Blood_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Blood_IncreaseRisk', 'No',(($AQuestionnaire->Blood_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    {{-- Admission Question 9 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>9. Has the subject use of non-acceptable methods of contraception within 14 days before dosing?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('contraception', 'Yes',(old('contraception',$AQuestionnaire->Contraception)!='No' && ($AQuestionnaire->Contraception!=NULL))? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('contraception', 'No',(old('contraception',$AQuestionnaire->Contraception)=='No')? 'checked' :'') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “No”, proceed to next section.</p>
            <p>If “Yes”, provide details</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            {!! Form::text('contraception_Yes',(old('contraception',$AQuestionnaire->Contraception)!='No' && ($AQuestionnaire->Contraception!=NULL))? $AQuestionnaire->Contraception :'',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of this method potentially increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Contraception_IncreaseRisk', 'Yes',(($AQuestionnaire->Contraception_IncreaseRisk)=='Yes')? 'checked' : '') !!}</p>
        </div>
        <div class="col-md-1">
            <p>{!! Form::radio('Contraception_IncreaseRisk', 'No',(($AQuestionnaire->Contraception_IncreaseRisk)=='No')? 'checked' : '') !!}</p>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-md-2">
            {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('PhysicianInitial',old('PhysicianInitial',$AQuestionnaire->PhysicianInitial),['class'=>'form-control']) !!}
        </div>
    </div>
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
<br>

