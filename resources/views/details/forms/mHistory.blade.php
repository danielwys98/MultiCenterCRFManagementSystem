{!! Form::model($Medical,['route' => ['update.mhistory',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    <h3>Medical History</h3>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
        </div>
    </div>
    <table class="table col-sm-9">
        <tr>
            <th>System Review</th>
            <th>Normal</th>
            <th>Abnormal</th>
            <th>If abnormal, give pertinent details</th>
        </tr>
        <tr>
            <td>Allergy</td>
            <td>{!! Form::radio('allergy','Normal',(($Medical->Allergy) == 'Normal')? 'checked': '')!!}</td>
            <td>{!! Form::radio('allergy', 'Abnormal',(($Medical->Allergy)!='Normal')? 'checked' : '')!!}</td>
            <td>{!! Form::text('allergy_txt', (($Medical->Allergy)!='Normal')? $Medical->Allergy : '') !!}</td>
        </tr>
        <tr>
            <td>Eyes-Ears-Nose-Throat</td>
            <td>{!! Form::radio('eent', 'Normal',(($Medical->EENT) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('eent', 'Abnormal',(($Medical->EENT) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('eent_txt',(($Medical->EENT)!='Normal')? $Medical->EENT : '') !!}</td>
        </tr>
        <tr>
            <td>Respiratory</td>
            <td>{!! Form::radio('respiratory', 'Normal',(($Medical->Respiratory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('respiratory', 'Abnormal',(($Medical->Respiratory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('respiratory_txt',(($Medical->Respiratory)!='Normal')? $Medical->Respiratory : '') !!}</td>
        <tr>
        <tr>
            <td>Cardiovascular</td>
            <td>{!! Form::radio('cardiovascular', 'Normal',(($Medical->Cardiovascular) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('cardiovascular', 'Abnormal',(($Medical->Cardiovascular) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('cardiovascular_txt',(($Medical->Cardiovascular)!='Normal')? $Medical->Cardiovascular : '') !!}</td>
        </tr>
        <tr>
            <td>Gastrointestinal</td>
            <td>{!! Form::radio('gastrointestinal', 'Normal',(($Medical->Gastrointestinal) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('gastrointestinal', 'Abnormal',(($Medical->Gastrointestinal) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('gastrointestinal_txt',(($Medical->Gastrointestinal)!='Normal')? $Medical->Gastrointestinal : '') !!}</td>
        </tr>
        <tr>
            <td>Genitourinary</td>
            <td>{!! Form::radio('genitourinary', 'Normal',(($Medical->Genitourinary) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('genitourinary', 'Abnormal',(($Medical->Genitourinary) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('genitourinary_txt',(($Medical->Genitourinary)!='Normal')? $Medical->Genitourinary : '') !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('neurological', 'Normal',(($Medical->Respiratory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('neurological', 'Abnormal',(($Medical->Respiratory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('neurological_txt',(($Medical->Respiratory)!='Normal')? $Medical->Respiratory : '') !!}</td>
        </tr>
        <tr>
            <td>Haematopoietic-Lymphatic</td>
            <td>{!! Form::radio('haematopoieticL', 'Normal',(($Medical->HaematopoieticL) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('haematopoieticL', 'Abnormal',(($Medical->HaematopoieticL) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('haematopoieticL_txt',(($Medical->HaematopoieticL)!='Normal')? $Medical->HaematopoieticL : '') !!}</td>
        </tr>
        <tr>
            <td>Endocrine-Metabolic</td>
            <td>{!! Form::radio('endocrineM', 'Normal',(($Medical->EndocrineM) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('endocrineM', 'Abnormal',(($Medical->EndocrineM) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('endocrineM_txt',(($Medical->EndocrineM)!='Normal')? $Medical->EndocrineM : '') !!}</td>
        </tr>
        <tr>
            <td>Dermatological</td>
            <td>{!! Form::radio('dermatological', 'Normal',(($Medical->Respiratory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('dermatological', 'Abnormal',(($Medical->Respiratory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('dermatological_txt',(($Medical->Respiratory)!='Normal')? $Medical->Respiratory : '') !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('musculoskeletal', 'Normal',(($Medical->Musculoskeletal) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('musculoskeletal', 'Abnormal',(($Medical->Musculoskeletal) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('musculoskeletal_txt',(($Medical->Musculoskeletal)!='Normal')? $Medical->Musculoskeletal : '') !!}</td>
        </tr>
        <tr>
            <td>Psychological</td>
            <td>{!! Form::radio('psychological', 'Normal',(($Medical->Psychological) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('psychological', 'Abnormal',(($Medical->Psychological) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('psychological_txt',(($Medical->Psychological)!='Normal')? $Medical->Psychological : '') !!}</td>
        </tr>
        <tr>
            <td>Family History</td>
            <td>{!! Form::radio('familyHistory', 'Normal',(($Medical->FamilyHistory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('familyHistory', 'Abnormal',(($Medical->FamilyHistory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('familyHistory_txt',(($Medical->FamilyHistory)!='Normal')? $Medical->FamilyHistory : '') !!}</td>
        </tr>
        <tr>
            <td>Surgical History</td>
            <td>{!! Form::radio('surgicalHistory', 'Normal',(($Medical->SurgicalHistory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('surgicalHistory', 'Abnormal',(($Medical->SurgicalHistory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('surgicalHistory_txt',(($Medical->SurgicalHistory)!='Normal')? $Medical->SurgicalHistory : '') !!}</td>
        </tr>
        <tr>
            <td>Previous Hospitalization</td>
            <td>{!! Form::radio('prevHospitalization', 'Normal',(($Medical->PrevHospitalization) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('prevHospitalization', 'Abnormal',(($Medical->PrevHospitalization) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('prevHospitalization_txt',(($Medical->PrevHospitalization)!='Normal')? $Medical->PrevHospitalization : '') !!}</td>
        </tr>
    </table>
    <table class="table col-sm-9">
        <tr>
            <th>Subject Lifestyle</th>
            <th>No</th>
            <th>Yes</th>
            <th>Pertinent details (if applicable)</th>
        </tr>
        <tr>
            <td>Smoker</td>
            <td>{!! Form::radio('smoker', 'No',(($Medical->Smoker) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('smoker', 'Yes',(($Medical->Smoker) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('smoker_txt', 'number of sticks a day: ') !!}
                {!! Form::text('smoker_txt',(($Medical->Smoker)!='No')? $Medical->Smoker : '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Alcohol Intake</td>
            <td>{!! Form::radio('rai', 'No',(($Medical->RAI) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('rai', 'Yes',(($Medical->RAI) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('rai_txt', 'amount and frequency: ') !!}
                {!! Form::text('rai_txt',(($Medical->RAI)!='No')? $Medical->RAI : '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Medications or Supplements</td>
            <td>{!! Form::radio('rms', 'No',(($Medical->RMS) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('rms', 'Yes',(($Medical->RMS) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('rms_txt', 'describe: ') !!}
                {!! Form::text('rms_txt',(($Medical->RMS)!='No')? $Medical->RMS : '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Exercise</td>
            <td>{!! Form::radio('regularExercise', 'No',(($Medical->RegularExercise) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('regularExercise', 'Yes',(($Medical->RegularExercise) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('regularExercise_txt', 'activity and frequency: ') !!}
                {!! Form::text('regularExercise_txt',(($Medical->RegularExercise)!='No')? $Medical->RegularExercise : '') !!}
            </td>
        </tr>
        <tr>
            <td>Blood Donations</td>
            <td>{!! Form::radio('bloodDonations', 'No',(($Medical->BloodDonations) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('bloodDonations', 'Yes',(($Medical->BloodDonations) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('bloodDonations_txt', 'date and blood volume: ') !!}
                {!! Form::text('bloodDonations_txt',(($Medical->BloodDonations)!='No')? $Medical->BloodDonations : '') !!}
            </td>
        </tr>
        <tr>
            <td>
                Regular Periods
                {!! Form::radio('regularPeriods', 'Not Applicable',(($Medical->RegularPeriods) == 'Not Applicable')? 'checked': '') !!}
                {!! Form::label('regularPeriods', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('regularPeriods', 'No',(str_split($Medical->RegularPeriods,3) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('regularPeriods', 'Yes',(str_split($Medical->RegularPeriods,4) == 'Yes')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('regularPeriods_No_txt', 'If No, describe: ') !!}
                {!! Form::text('regularPeriods_No_txt', '') !!}
                {!! Form::label('regularPeriods_No_txt', 'If Yes, please state last menstrual period: ') !!}
                {!! Form::text('regularPeriods_No_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Active Sexual Activities</td>
            <td>{!! Form::radio('activeSexAct', 'No',(($Medical->ActiveSexAct) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('activeSexAct', 'Yes',(($Medical->ActiveSexAct) != 'No')? 'checked': '') !!}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                Fertility Control
                {!! Form::radio('FertilityControl', 'Not Applicable','',['id'=>'NA_F']) !!}
                {!! Form::label('NA_F', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('FertilityControl', 'No') !!}</td>
            <td>{!! Form::radio('FertilityControl', 'Yes') !!}</td>
            <td>
                {!! Form::label('FertilityControlCounseling', 'If No, advice and counseling given: ') !!}
                {!! Form::radio('FertilityControl_No_txt', 'Counseling not given','',['id'=>'CounselingNo']) !!}
                {!! Form::label('CounselingNo', 'Counseling not given') !!}
                <br>
                {!! Form::radio('FertilityControl_No_txt', 'Counseling given','',['id'=>'CounselingYes']) !!}
                {!! Form::label('CounselingYes', 'Counseling given') !!}
            </td>
            <td>
                {!! Form::label('FertilityControlCounseling', 'If Yes, advice and counseling given: ') !!}
                <br>
                {!! Form::radio('FertilityControl_Yes_txt', 'The Natural Method (rhythm, withdrawal, mucus, body temperature','',['id'=>'CounselingYes1']) !!}
                {!! Form::label('CounselingYes1', 'The Natural Method (rhythm, withdrawal, mucus, body temperature  ') !!}
                <br>
                {!! Form::radio('FertilityControl_Yes_txt', 'The Barrier Method (condom, spermicides, diaphragm etc)','',['id'=>'CounselingYes2']) !!}
                {!! Form::label('CounselingYes2', 'The Barrier Method (condom, spermicides, diaphragm etc)') !!}
                <br>
                {!! Form::radio('FertilityControl_Yes_txt', 'Hormonal Method (OCP, depot, implant, IUD)','',['id'=>'CounselingYes3']) !!}
                {!! Form::label('CounselingYes3','Hormonal Method (OCP, depot, implant, IUD)') !!}
                <br>
                {!! Form::radio('FertilityControl_Yes_txt', 'Long term (tubal ligation, vasectomy)','',['id'=>'Long term (tubal ligation, vasectomy)']) !!}
                {!! Form::label('CounselingYes4','Long term (tubal ligation, vasectomy)')!!}
            </td>
        </tr>
        <tr>
            <td>Breastfeeding Female</td>
            <td>{!! Form::radio('breastfeeding', 'No',(($Medical->Breastfeeding) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('breastfeeding', 'Yes',(($Medical->Breastfeeding) != 'No')? 'checked': '') !!}</td>
            <td></td>
        </tr>
    </table>
    <div>
        {!! Form::label('conclusion', 'Conclusion: ') !!}
        {!! Form::radio('conclusion', 'Normal medical listing') !!}
        {!! Form::label('conclusion', 'Normal medical listing') !!}
        {!! Form::radio('conclusion', 'Abnormal but not clinically significant medical history ') !!}
        {!! Form::label('conclusion', 'Abnormal but not clinically significant medical history ') !!}
        {!! Form::radio('conclusion', 'Abnormal and clinically significant medical history') !!}
        {!! Form::label('conclusion', 'Abnormal and clinically significant medical history') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
