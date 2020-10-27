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
            <td>{!! Form::text('allergy_txt', (($Medical->Allergy)!='Normal')? $Medical->Allergy : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Eyes-Ears-Nose-Throat</td>
            <td>{!! Form::radio('eent', 'Normal',(($Medical->EENT) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('eent', 'Abnormal',(($Medical->EENT) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('eent_txt',(($Medical->EENT)!='Normal')? $Medical->EENT : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Respiratory</td>
            <td>{!! Form::radio('respiratory', 'Normal',(($Medical->Respiratory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('respiratory', 'Abnormal',(($Medical->Respiratory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('respiratory_txt',(($Medical->Respiratory)!='Normal')? $Medical->Respiratory : '',['class'=>'form-control']) !!}</td>
        <tr>
        <tr>
            <td>Cardiovascular</td>
            <td>{!! Form::radio('cardiovascular', 'Normal',(($Medical->Cardiovascular) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('cardiovascular', 'Abnormal',(($Medical->Cardiovascular) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('cardiovascular_txt',(($Medical->Cardiovascular)!='Normal')? $Medical->Cardiovascular : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Gastrointestinal</td>
            <td>{!! Form::radio('gastrointestinal', 'Normal',(($Medical->Gastrointestinal) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('gastrointestinal', 'Abnormal',(($Medical->Gastrointestinal) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('gastrointestinal_txt',(($Medical->Gastrointestinal)!='Normal')? $Medical->Gastrointestinal : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Genitourinary</td>
            <td>{!! Form::radio('genitourinary', 'Normal',(($Medical->Genitourinary) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('genitourinary', 'Abnormal',(($Medical->Genitourinary) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('genitourinary_txt',(($Medical->Genitourinary)!='Normal')? $Medical->Genitourinary : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('neurological', 'Normal',(($Medical->Respiratory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('neurological', 'Abnormal',(($Medical->Respiratory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('neurological_txt',(($Medical->Respiratory)!='Normal')? $Medical->Respiratory : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Haematopoietic-Lymphatic</td>
            <td>{!! Form::radio('haematopoieticL', 'Normal',(($Medical->HaematopoieticL) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('haematopoieticL', 'Abnormal',(($Medical->HaematopoieticL) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('haematopoieticL_txt',(($Medical->HaematopoieticL)!='Normal')? $Medical->HaematopoieticL : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Endocrine-Metabolic</td>
            <td>{!! Form::radio('endocrineM', 'Normal',(($Medical->EndocrineM) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('endocrineM', 'Abnormal',(($Medical->EndocrineM) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('endocrineM_txt',(($Medical->EndocrineM)!='Normal')? $Medical->EndocrineM : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Dermatological</td>
            <td>{!! Form::radio('dermatological', 'Normal',(($Medical->Respiratory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('dermatological', 'Abnormal',(($Medical->Respiratory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('dermatological_txt',(($Medical->Respiratory)!='Normal')? $Medical->Respiratory : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('musculoskeletal', 'Normal',(($Medical->Musculoskeletal) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('musculoskeletal', 'Abnormal',(($Medical->Musculoskeletal) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('musculoskeletal_txt',(($Medical->Musculoskeletal)!='Normal')? $Medical->Musculoskeletal : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Psychological</td>
            <td>{!! Form::radio('psychological', 'Normal',(($Medical->Psychological) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('psychological', 'Abnormal',(($Medical->Psychological) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('psychological_txt',(($Medical->Psychological)!='Normal')? $Medical->Psychological : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Family History</td>
            <td>{!! Form::radio('familyHistory', 'Normal',(($Medical->FamilyHistory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('familyHistory', 'Abnormal',(($Medical->FamilyHistory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('familyHistory_txt',(($Medical->FamilyHistory)!='Normal')? $Medical->FamilyHistory : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Surgical History</td>
            <td>{!! Form::radio('surgicalHistory', 'Normal',(($Medical->SurgicalHistory) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('surgicalHistory', 'Abnormal',(($Medical->SurgicalHistory) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('surgicalHistory_txt',(($Medical->SurgicalHistory)!='Normal')? $Medical->SurgicalHistory : '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Previous Hospitalization</td>
            <td>{!! Form::radio('prevHospitalization', 'Normal',(($Medical->PrevHospitalization) == 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::radio('prevHospitalization', 'Abnormal',(($Medical->PrevHospitalization) != 'Normal')? 'checked': '') !!}</td>
            <td>{!! Form::text('prevHospitalization_txt',(($Medical->PrevHospitalization)!='Normal')? $Medical->PrevHospitalization : '',['class'=>'form-control']) !!}</td>
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
                {!! Form::text('smoker_txt',(($Medical->Smoker)!='No')? $Medical->Smoker : '',['class'=>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td>Regular Alcohol Intake</td>
            <td>{!! Form::radio('rai', 'No',(($Medical->RAI) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('rai', 'Yes',(($Medical->RAI) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('rai_txt', 'amount and frequency: ') !!}
                {!! Form::text('rai_txt',(($Medical->RAI)!='No')? $Medical->RAI : '',['class'=>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td>Regular Medications or Supplements</td>
            <td>{!! Form::radio('rms', 'No',(($Medical->RMS) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('rms', 'Yes',(($Medical->RMS) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('rms_txt', 'describe: ') !!}
                {!! Form::text('rms_txt',(($Medical->RMS)!='No')? $Medical->RMS : '',['class'=>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td>Regular Exercise</td>
            <td>{!! Form::radio('regularExercise', 'No',(($Medical->RegularExercise) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('regularExercise', 'Yes',(($Medical->RegularExercise) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('regularExercise_txt', 'activity and frequency: ') !!}
                {!! Form::text('regularExercise_txt',(($Medical->RegularExercise)!='No')? $Medical->RegularExercise : '',['class'=>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td>Blood Donations</td>
            <td>{!! Form::radio('bloodDonations', 'No',(($Medical->BloodDonations) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('bloodDonations', 'Yes',(($Medical->BloodDonations) != 'No')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('bloodDonations_txt', 'date and blood volume: ') !!}
                {!! Form::text('bloodDonations_txt',(($Medical->BloodDonations)!='No')? $Medical->BloodDonations : '',['class'=>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <td>
                Regular Periods
                {!! Form::radio('regularPeriods', 'Not Applicable',(($Medical->RegularPeriods) == 'Not Applicable')? 'checked': '') !!}
                {!! Form::label('regularPeriods', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('regularPeriods', 'No',(($Medical->RegularPeriods) == 'No')? 'checked': '') !!}</td>
            <td>{!! Form::radio('regularPeriods', 'Yes',(($Medical->RegularPeriods) == 'Yes')? 'checked': '') !!}</td>
            <td>
                {!! Form::label('regularPeriods_No_txt', 'If No, describe: ') !!}
                {!! Form::text('regularPeriods_No_txt', (($Medical->RegularPeriods)=='No')? $Medical->RegularPeriods_No_txt: '',['class'=>'form-control']) !!}
                {!! Form::label('regularPeriods_Yes_txt', 'If Yes, please state last menstrual period: ') !!}
                {!! Form::text('regularPeriods_Yes_txt', (($Medical->RegularPeriods)=='Yes')? $Medical->RegularPeriods_Yes_txt: '',['class'=>'form-control']) !!}
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
                {!! Form::radio('fertilityControl', 'Not Applicable',(($Medical->FertilityControl)=='Not Applicable')?'checked': '',['id'=>'NA_F']) !!}
                {!! Form::label('NA_F', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('fertilityControl', 'No',(($Medical->FertilityControl)=='No')?'checked': '') !!}</td>
            <td>{!! Form::radio('fertilityControl', 'Yes',(($Medical->FertilityControl)=='Yes')?'checked': '') !!}</td>
            <td>
                {!! Form::label('fertilityControlCounseling', 'If No, advice and counseling given: ') !!}
                {!! Form::radio('fertilityControl_No_txt', 'Counseling not given',(($Medical->FertilityControl_No_txt)=='Counseling not given')?'checked': '',['id'=>'CounselingNo']) !!}
                {!! Form::label('CounselingNo', 'Counseling not given') !!}
                <br>
                {!! Form::radio('fertilityControl_No_txt', 'Counseling given',(($Medical->FertilityControl_No_txt)=='Counseling given')?'checked': '',['id'=>'CounselingYes']) !!}
                {!! Form::label('CounselingYes', 'Counseling given') !!}
            </td>
            <td>
                {!! Form::label('fertilityControlCounseling', 'If Yes, advice and counseling given: ') !!}
                <br>
                {!! Form::radio('fertilityControl_Yes_txt', 'The Natural Method (rhythm, withdrawal, mucus, body temperature',
                               (($Medical->FertilityControl_Yes_txt)=='The Natural Method (rhythm, withdrawal, mucus, body temperature')?'checked': '',['id'=>'CounselingYes1']) !!}

                {!! Form::label('CounselingYes1', 'The Natural Method (rhythm, withdrawal, mucus, body temperature  ') !!}
                <br>
                {!! Form::radio('fertilityControl_Yes_txt', 'The Barrier Method (condom, spermicides, diaphragm etc)',
                                (($Medical->FertilityControl_Yes_txt)=='The Barrier Method (condom, spermicides, diaphragm etc)')?'checked': '',['id'=>'CounselingYes2']) !!}
                {!! Form::label('CounselingYes2', 'The Barrier Method (condom, spermicides, diaphragm etc)') !!}
                <br>
                {!! Form::radio('fertilityControl_Yes_txt', 'Hormonal Method (OCP, depot, implant, IUD)',
                                (($Medical->FertilityControl_Yes_txt)=='Hormonal Method (OCP, depot, implant, IUD)')?'checked': '',['id'=>'CounselingYes3']) !!}
                {!! Form::label('CounselingYes3','Hormonal Method (OCP, depot, implant, IUD)') !!}
                <br>
                {!! Form::radio('fertilityControl_Yes_txt', 'Long term (tubal ligation, vasectomy)',
                                (($Medical->FertilityControl_Yes_txt)=='Long term (tubal ligation, vasectomy)')?'checked': '',['id'=>'Long term (tubal ligation, vasectomy)']) !!}
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
        {!! Form::radio('conclusion', 'Normal medical listing',(($Medical->Conclusion)== 'Normal medical listing')? 'checked': '') !!}
        {!! Form::label('conclusion', 'Normal medical listing') !!}
        {!! Form::radio('conclusion', 'Abnormal but not clinically significant medical history',(($Medical->Conclusion)== 'Abnormal but not clinically significant medical history')? 'checked': '') !!}
        {!! Form::label('conclusion', 'Abnormal but not clinically significant medical history') !!}
        {!! Form::radio('conclusion', 'Abnormal and clinically significant medical history',(($Medical->Conclusion)== 'Abnormal and clinically significant medical history')? 'checked': '') !!}
        {!! Form::label('conclusion', 'Abnormal and clinically significant medical history') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
