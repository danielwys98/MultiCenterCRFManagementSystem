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
            <td>{!! Form::radio('Allergy', 'Normal') !!}</td>
            <td>{!! Form::radio('Allergy', 'Abnormal') !!}</td>
            <td>{!! Form::text('Allergy_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Eyes-Ears-Nose-Throat</td>
            <td>{!! Form::radio('EENT', 'Normal') !!}</td>
            <td>{!! Form::radio('EENT', 'Abnormal') !!}</td>
            <td>{!! Form::text('EENT_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Respiratory</td>
            <td>{!! Form::radio('Respiratory', 'Normal') !!}</td>
            <td>{!! Form::radio('Respiratory', 'Abnormal') !!}</td>
            <td>{!! Form::text('Respiratory_txt', '') !!}</td>
        <tr>
        <tr>
            <td>Cardiovascular</td>
            <td>{!! Form::radio('Cardiovascular', 'Normal') !!}</td>
            <td>{!! Form::radio('Cardiovascular', 'Abnormal') !!}</td>
            <td>{!! Form::text('Cardiovascular_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Gastrointestinal</td>
            <td>{!! Form::radio('Gastrointestinal', 'Normal') !!}</td>
            <td>{!! Form::radio('Gastrointestinal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Gastrointestinal_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Genitourinary</td>
            <td>{!! Form::radio('Genitourinary', 'Normal') !!}</td>
            <td>{!! Form::radio('Genitourinary', 'Abnormal') !!}</td>
            <td>{!! Form::text('Genitourinary_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('Neurological', 'Normal') !!}</td>
            <td>{!! Form::radio('Neurological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Neurological_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Haematopoietic-Lymphatic</td>
            <td>{!! Form::radio('HaematopoieticL', 'Normal') !!}</td>
            <td>{!! Form::radio('HaematopoieticL', 'Abnormal') !!}</td>
            <td>{!! Form::text('HaematopoieticL_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Endocrine-Metabolic</td>
            <td>{!! Form::radio('EndocrineM', 'Normal') !!}</td>
            <td>{!! Form::radio('EndocrineM', 'Abnormal') !!}</td>
            <td>{!! Form::text('EndocrineM_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Dermatological</td>
            <td>{!! Form::radio('Dermatological', 'Normal') !!}</td>
            <td>{!! Form::radio('Dermatological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Dermatological_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('Musculoskeletal', 'Normal') !!}</td>
            <td>{!! Form::radio('Musculoskeletal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Musculoskeletal_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Psychological</td>
            <td>{!! Form::radio('Psychological', 'Normal') !!}</td>
            <td>{!! Form::radio('Psychological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Psychological_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Family History</td>
            <td>{!! Form::radio('FamilyHistory', 'Normal') !!}</td>
            <td>{!! Form::radio('FamilyHistory', 'Abnormal') !!}</td>
            <td>{!! Form::text('FamilyHistory_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Surgical History</td>
            <td>{!! Form::radio('SurgicalHistory', 'Normal') !!}</td>
            <td>{!! Form::radio('SurgicalHistory', 'Abnormal') !!}</td>
            <td>{!! Form::text('SurgicalHistory_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Previous Hospitalization</td>
            <td>{!! Form::radio('PrevHospitalization', 'Normal') !!}</td>
            <td>{!! Form::radio('PrevHospitalization', 'Abnormal') !!}</td>
            <td>{!! Form::text('PrevHospitalization_txt', old('PrevHospitalization')) !!}</td>
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
            <td>{!! Form::radio('Smoker', 'No') !!}</td>
            <td>{!! Form::radio('Smoker', 'Yes') !!}</td>
            <td>
                {!! Form::label('Smoker_txt', 'number of sticks a day: ') !!}
                {!! Form::text('Smoker_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Alcohol Intake</td>
            <td>{!! Form::radio('RAI', 'No') !!}</td>
            <td>{!! Form::radio('RAI', 'Yes') !!}</td>
            <td>
                {!! Form::label('RAI_txt', 'amount and frequency: ') !!}
                {!! Form::text('RAI_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Medications or Supplements</td>
            <td>{!! Form::radio('RMS', 'No') !!}</td>
            <td>{!! Form::radio('RMS', 'Yes') !!}</td>
            <td>
                {!! Form::label('RMS_txt', 'describe: ') !!}
                {!! Form::text('RMS_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Exercise</td>
            <td>{!! Form::radio('RegularExercise', 'No') !!}</td>
            <td>{!! Form::radio('RegularExercise', 'Yes') !!}</td>
            <td>
                {!! Form::label('RegularExercise_txt', 'activity and frequency: ') !!}
                {!! Form::text('RegularExercise_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Blood Donations</td>
            <td>{!! Form::radio('BloodDonations', 'No') !!}</td>
            <td>{!! Form::radio('BloodDonations', 'Yes') !!}</td>
            <td>
                {!! Form::label('BloodDonations_txt', 'date and blood volume: ') !!}
                {!! Form::text('BloodDonations_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>
                Regular Periods
                {!! Form::radio('RegularPeriods', 'Not Applicable') !!}
                {!! Form::label('RegularPeriods', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('RegularPeriods', 'No') !!}</td>
            <td>{!! Form::radio('RegularPeriods', 'Yes') !!}</td>
            <td>
                {!! Form::label('RegularPeriods_No_txt', 'If No, describe: ') !!}
                {!! Form::text('RegularPeriods_No_txt', '') !!}
                {!! Form::label('RegularPeriods_No_txt', 'If Yes, please state last menstrual period: ') !!}
                {!! Form::text('RegularPeriods_No_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Active Sexual Activities</td>
            <td>{!! Form::radio('ActiveSexAct', 'No') !!}</td>
            <td>{!! Form::radio('ActiveSexAct', 'Yes') !!}</td>
            <td></td>
        </tr>
        <tr>
            <td>
                Fertility Control
                {!! Form::radio('FertilityControl', 'Not Applicable') !!}
                {!! Form::label('FertilityControl', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('FertilityControl', 'No') !!}</td>
            <td>{!! Form::radio('FertilityControl', 'Yes') !!}</td>
            <td>
                {!! Form::label('FertilityControlCounseling', 'If No, advice and counseling given: ') !!}
                {!! Form::radio('FertilityControlCounseling_No_txt', 'No') !!}
                {!! Form::radio('FertilityControlCounseling_No_txt', 'Yes') !!}

                {!! Form::label('FertilityControlCounseling', 'If No, advice and counseling given: ') !!}
                {!! Form::checkbox('FertilityControl_Yes_txt', 'The Natural Method (rhythm, withdrawal, mucus, body temperature') !!}
                {!! Form::checkbox('FertilityControl_Yes_txt', 'The Barrier Method (condom, spermicides, diaphragm etc)') !!}
                {!! Form::checkbox('FertilityControl_Yes_txt', 'Hormonal Method (OCP, depot, implant, IUD)') !!}
                {!! Form::checkbox('FertilityControl_Yes_txt', 'Long term (tubal ligation, vasectomy)') !!}
            </td>
        </tr>
        <tr>
            <td>Breastfeeding Female</td>
            <td>{!! Form::radio('Breastfeeding', 'No') !!}</td>
            <td>{!! Form::radio('Breastfeeding', 'Yes') !!}</td>
            <td></td>
        </tr>
    </table>
    <div>
        {!! Form::label('Conclusion', 'Conclusion: ') !!}
        {!! Form::radio('Conclusion', 'Normal medical listing') !!}
        {!! Form::label('Conclusion', 'Normal medical listing') !!}
        {!! Form::radio('Conclusion', 'Abnormal but not clinically significant medical history ') !!}
        {!! Form::label('Conclusion', 'Abnormal but not clinically significant medical history ') !!}
        {!! Form::radio('Conclusion', 'Abnormal and clinically significant medical history') !!}
        {!! Form::label('Conclusion', 'Abnormal and clinically significant medical history') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
