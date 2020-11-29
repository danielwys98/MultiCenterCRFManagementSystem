{!! Form::open(['route' => ['store.mhistory',$patient->id]]) !!}
    @csrf
    {{--  medical history --}}
    <h3>Medical History</h3>
    {{-- date and time --}}
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </div>
    </div>
    {{-- end date and time --}}
    {{-- system review --}}
    <table class="table table-sm">
        <thead>
        <tr>
            <th class="col-md-2">System Review</th>
            <th>Normal</th>
            <th>Abnormal</th>
            <th>If abnormal, give pertinent details</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Allergy</th>
            <td>{!! Form::radio('Allergy', 'Normal') !!}</td>
            <td>{!! Form::radio('Allergy', 'Abnormal') !!}</td>
            <td>{!! Form::text('Allergy_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Eyes-Ears-Nose-Throat</th>
            <td>{!! Form::radio('EENT', 'Normal') !!}</td>
            <td>{!! Form::radio('EENT', 'Abnormal') !!}</td>
            <td>{!! Form::text('EENT_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Respiratory</th>
            <td>{!! Form::radio('Respiratory', 'Normal') !!}</td>
            <td>{!! Form::radio('Respiratory', 'Abnormal') !!}</td>
            <td>{!! Form::text('Respiratory_txt', '',['class'=>'form-control']) !!}</td>
        <tr>
        <tr>
            <th scope="row">Cardiovascular</th>
            <td>{!! Form::radio('Cardiovascular', 'Normal') !!}</td>
            <td>{!! Form::radio('Cardiovascular', 'Abnormal') !!}</td>
            <td>{!! Form::text('Cardiovascular_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Gastrointestinal</th>
            <td>{!! Form::radio('Gastrointestinal', 'Normal') !!}</td>
            <td>{!! Form::radio('Gastrointestinal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Gastrointestinal_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Genitourinary</th>
            <td>{!! Form::radio('Genitourinary', 'Normal') !!}</td>
            <td>{!! Form::radio('Genitourinary', 'Abnormal') !!}</td>
            <td>{!! Form::text('Genitourinary_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Neurological</th>
            <td>{!! Form::radio('Neurological', 'Normal') !!}</td>
            <td>{!! Form::radio('Neurological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Neurological_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Haematopoietic-Lymphatic</th>
            <td>{!! Form::radio('HaematopoieticL', 'Normal') !!}</td>
            <td>{!! Form::radio('HaematopoieticL', 'Abnormal') !!}</td>
            <td>{!! Form::text('HaematopoieticL_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Endocrine-Metabolic</th>
            <td>{!! Form::radio('EndocrineM', 'Normal') !!}</td>
            <td>{!! Form::radio('EndocrineM', 'Abnormal') !!}</td>
            <td>{!! Form::text('EndocrineM_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Dermatological</th>
            <td>{!! Form::radio('Dermatological', 'Normal') !!}</td>
            <td>{!! Form::radio('Dermatological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Dermatological_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Musculoskeletal</th>
            <td>{!! Form::radio('Musculoskeletal', 'Normal') !!}</td>
            <td>{!! Form::radio('Musculoskeletal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Musculoskeletal_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Psychological</th>
            <td>{!! Form::radio('Psychological', 'Normal') !!}</td>
            <td>{!! Form::radio('Psychological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Psychological_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Family History</th>
            <td>{!! Form::radio('FamilyHistory', 'Normal') !!}</td>
            <td>{!! Form::radio('FamilyHistory', 'Abnormal') !!}</td>
            <td>{!! Form::text('FamilyHistory_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Surgical History</th>
            <td>{!! Form::radio('SurgicalHistory', 'Normal') !!}</td>
            <td>{!! Form::radio('SurgicalHistory', 'Abnormal') !!}</td>
            <td>{!! Form::text('SurgicalHistory_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <th scope="row">Previous Hospitalization</th>
            <td>{!! Form::radio('PrevHospitalization', 'Normal') !!}</td>
            <td>{!! Form::radio('PrevHospitalization', 'Abnormal') !!}</td>
            <td>{!! Form::text('PrevHospitalization_txt', '',['class'=>'form-control']) !!}</td>
        </tr>
        </tbody>
    </table>
    {{-- system review --}}
    {{-- subject lifestyle --}}
    <table class="table table-sm">
        <thead>
        <tr>
            <th class="col-md-3">Subject Lifestyle</th>
            <th class="col-md-1">No</th>
            <th class="col-md-1">Yes</th>
            <th class="col-md-2">Pertinent details (if applicable)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Smoker</td>
            <td>{!! Form::radio('Smoker', 'No') !!}</td>
            <td>{!! Form::radio('Smoker', 'Yes') !!}</td>
            <td>
                {!! Form::label('Smoker_txt', 'number of sticks a day: ') !!}
            </td>
            <td>
                {!! Form::text('Smoker_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Alchohol Intake</td>
            <td>{!! Form::radio('RAI', 'No') !!}</td>
            <td>{!! Form::radio('RAI', 'Yes') !!}</td>
            <td>
                {!! Form::label('RAI_txt', 'amount and frequency: ') !!}
            </td>
            <td>
                {!! Form::text('RAI_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Medications or Supplements</td>
            <td>{!! Form::radio('RMS', 'No') !!}</td>
            <td>{!! Form::radio('RMS', 'Yes') !!}</td>
            <td>
                {!! Form::label('RMS_txt', 'describe: ') !!}
            </td>
            <td>
                {!! Form::text('RMS_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Exercise</td>
            <td>{!! Form::radio('RegularExercise', 'No') !!}</td>
            <td>{!! Form::radio('RegularExercise', 'Yes') !!}</td>
            <td>
                {!! Form::label('RegularExercise_txt', 'activity and frequency: ') !!}
            </td>
            <td>
                {!! Form::text('RegularExercise_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Blood Donations</td>
            <td>{!! Form::radio('BloodDonations', 'No') !!}</td>
            <td>{!! Form::radio('BloodDonations', 'Yes') !!}</td>
            <td>
                {!! Form::label('BloodDonations_txt', 'date and blood volume: ') !!}
            </td>
            <td>
                {!! Form::text('BloodDonations_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>
                Regular Periods
                {!! Form::radio('RegularPeriods', 'Not Applicable','',['id'=>'NA_R']) !!}
                {!! Form::label('NA_R', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('RegularPeriods', 'No') !!}</td>
            <td>{!! Form::radio('RegularPeriods', 'Yes') !!}</td>
            <td>
                {!! Form::label('RegularPeriods_No_txt', 'If No, describe: ') !!}
                <br>
                {!! Form::text('RegularPeriods_No_txt', '') !!}
            </td>
            <td>
                {!! Form::label('RegularPeriods_Yes_txt', 'If Yes, please state last menstrual period: ') !!}
                <br>
                {!! Form::text('RegularPeriods_Yes_txt', '') !!}
            </td>
        </tr>
        <tr>
            <td>Active Sexual Activities</td>
            <td>{!! Form::radio('ActiveSexAct', 'No') !!}</td>
            <td>{!! Form::radio('ActiveSexAct', 'Yes') !!}</td>
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
            <td>{!! Form::radio('Breastfeeding', 'No') !!}</td>
            <td>{!! Form::radio('Breastfeeding', 'Yes') !!}</td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    {{-- subject lifestyle --}}
    {{-- medical history conculsion --}}
    <div>
        {!! Form::label('Conclusion', 'Conclusion: ') !!}

        {!! Form::radio('Conclusion', 'Normal medical listing','',['id'=>'Normal_MH']) !!}
        {!! Form::label('Normal_MH', 'Normal medical listing') !!}

        {!! Form::radio('Conclusion', 'Abnormal but not clinically significant medical history','',['id'=>'AbnormalN_MH']) !!}
        {!! Form::label('AbnormalN_MH','Abnormal but not clinically significant medical history') !!}

        {!! Form::radio('Conclusion', 'Abnormal and clinically significant medical history','',['id'=>'Abnormal_MH']) !!}
        {!! Form::label('Abnormal_MH','Abnormal and clinically significant medical history') !!}
    </div>
    {{-- end medical history conculsion --}}
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
