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
            <td>{!! Form::text('Allergy', '') !!}</td>
        </tr>
        <tr>
            <td>Eyes-Ears-Nose-Throat</td>
            <td>{!! Form::radio('Eyes-Ears-Nose-Throat', 'Normal') !!}</td>
            <td>{!! Form::radio('Eyes-Ears-Nose-Throat', 'Abnormal') !!}</td>
            <td>{!! Form::text('Eyes-Ears-Nose-Throat', '') !!}</td>
        </tr>
        <tr>
            <td>Respiratory</td>
            <td>{!! Form::radio('Respiratory', 'Normal') !!}</td>
            <td>{!! Form::radio('Respiratory', 'Abnormal') !!}</td>
            <td>{!! Form::text('Respiratory', '') !!}</td>
        <tr>
        <tr>
            <td>Cardiovascular</td>
            <td>{!! Form::radio('Cardiovascular', 'Normal') !!}</td>
            <td>{!! Form::radio('Cardiovascular', 'Abnormal') !!}</td>
            <td>{!! Form::text('Cardiovascular', '') !!}</td>
        </tr>
        <tr>
            <td>Gastrointestinal</td>
            <td>{!! Form::radio('Gastrointestinal', 'Normal') !!}</td>
            <td>{!! Form::radio('Gastrointestinal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Gastrointestinal', '') !!}</td>
        </tr>
        <tr>
            <td>Genitourinary</td>
            <td>{!! Form::radio('Genitourinary', 'Normal') !!}</td>
            <td>{!! Form::radio('Genitourinary', 'Abnormal') !!}</td>
            <td>{!! Form::text('Genitourinary', '') !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('Neurological', 'Normal') !!}</td>
            <td>{!! Form::radio('Neurological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Neurological', '') !!}</td>
        </tr>
        <tr>
            <td>Haematopoietic-Lymphatic</td>
            <td>{!! Form::radio('Haematopoietic-Lymphatic', 'Normal') !!}</td>
            <td>{!! Form::radio('Haematopoietic-Lymphatic', 'Abnormal') !!}</td>
            <td>{!! Form::text('Haematopoietic-Lymphatic', '') !!}</td>
        </tr>
        <tr>
            <td>Endocrine-Metabolic</td>
            <td>{!! Form::radio('Endocrine-Metabolic', 'Normal') !!}</td>
            <td>{!! Form::radio('Endocrine-Metabolic', 'Abnormal') !!}</td>
            <td>{!! Form::text('Endocrine-Metabolic', '') !!}</td>
        </tr>
        <tr>
            <td>Dermatological</td>
            <td>{!! Form::radio('Dermatological', 'Normal') !!}</td>
            <td>{!! Form::radio('Dermatological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Dermatological', '') !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('Musculoskeletal', 'Normal') !!}</td>
            <td>{!! Form::radio('Musculoskeletal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Musculoskeletal', '') !!}</td>
        </tr>
        <tr>
            <td>Psychological</td>
            <td>{!! Form::radio('Psychological', 'Normal') !!}</td>
            <td>{!! Form::radio('Psychological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Psychological', '') !!}</td>
        </tr>
        <tr>
            <td>Family History</td>
            <td>{!! Form::radio('Family History', 'Normal') !!}</td>
            <td>{!! Form::radio('Family History', 'Abnormal') !!}</td>
            <td>{!! Form::text('Family History', '') !!}</td>
        </tr>
        <tr>
            <td>Surgical History</td>
            <td>{!! Form::radio('Surgical History', 'Normal') !!}</td>
            <td>{!! Form::radio('Surgical History', 'Abnormal') !!}</td>
            <td>{!! Form::text('Surgical History', '') !!}</td>
        </tr>
        <tr>
            <td>Previous Hospitalization</td>
            <td>{!! Form::radio('Previous Hospitalization', 'Normal') !!}</td>
            <td>{!! Form::radio('Previous Hospitalization', 'Abnormal') !!}</td>
            <td>{!! Form::text('Previous Hospitalization', '') !!}</td>
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
                {!! Form::label('Smoker', 'number of sticks a day: ') !!}
                {!! Form::text('Smoker', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Alchohol Intake</td>
            <td>{!! Form::radio('Regular Alchohol Intake', 'No') !!}</td>
            <td>{!! Form::radio('Regular Alchohol Intake', 'Yes') !!}</td>
            <td>
                {!! Form::label('Regular Alchohol Intake', 'amount and frequency: ') !!}
                {!! Form::text('Regular Alchohol Intake', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Medications or Supplements</td>
            <td>{!! Form::radio('Regular Medications or Supplements', 'No') !!}</td>
            <td>{!! Form::radio('Regular Medications or Supplements', 'Yes') !!}</td>
            <td>
                {!! Form::label('Regular Medications or Supplements', 'describe: ') !!}
                {!! Form::text('Regular Medications or Supplements', '') !!}
            </td>
        </tr>
        <tr>
            <td>Regular Exercise</td>
            <td>{!! Form::radio('Regular Exercise', 'No') !!}</td>
            <td>{!! Form::radio('Regular Exercise', 'Yes') !!}</td>
            <td>
                {!! Form::label('Regular Exercise', 'activity and frequency: ') !!}
                {!! Form::text('Regular Exercise', '') !!}
            </td>
        </tr>
        <tr>
            <td>Blood Donations</td>
            <td>{!! Form::radio('Blood Donations', 'No') !!}</td>
            <td>{!! Form::radio('Blood Donations', 'Yes') !!}</td>
            <td>
                {!! Form::label('Blood Donations', 'date and blood volume: ') !!}
                {!! Form::text('Blood Donations', '') !!}
            </td>
        </tr>
        <tr>
            <td>
                Regular Periods
                {!! Form::radio('Regular Periods', 'Not Applicable') !!}
                {!! Form::label('Regular Periods', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('Regular Periods', 'No') !!}</td>
            <td>{!! Form::radio('Regular Periods', 'Yes') !!}</td>
            <td>
                {!! Form::label('Regular Periods', 'If No, describe: ') !!}
                {!! Form::text('Regular Periods', '') !!}
                {!! Form::label('Regular Periods', 'If Yes, please state last menstrual period: ') !!}
                {!! Form::text('Regular Periods', '') !!}
            </td>
        </tr>
        <tr>
            <td>Active Sexual Activities</td>
            <td>{!! Form::radio('Active Sexual Activities', 'No') !!}</td>
            <td>{!! Form::radio('Active Sexual Activities', 'Yes') !!}</td>
            <td></td>
        </tr>
        <tr>
            <td>
                Fertility Control
                {!! Form::radio('Fertility Control', 'Not Applicable') !!}
                {!! Form::label('Fertility Control', 'Not Applicable') !!}
            </td>
            <td>{!! Form::radio('Fertility Control', 'No') !!}</td>
            <td>{!! Form::radio('Fertility Control', 'Yes') !!}</td>
            <td>
                {!! Form::label('Fertility Control', 'If No, advice and counseling given: ') !!}
                {!! Form::radio('Fertility Control counseling', 'No') !!}
                {!! Form::radio('Fertility Control counseling', 'Yes') !!}

                {!! Form::label('Fertility Control', 'If No, advice and counseling given: ') !!}
                {!! Form::checkbox('Fertility Control counseling', 'The Natural Method (rhythm, withdrawal, mucus, body temperature') !!}
                {!! Form::checkbox('Fertility Control counseling', 'The Barrier Method (condom, spermicides, diaphragm etc)') !!}
                {!! Form::checkbox('Fertility Control counseling', 'Hormonal Method (OCP, depot, implant, IUD)') !!}
                {!! Form::checkbox('Fertility Control counseling', 'Long term (tubal ligation, vasectomy)') !!}
            </td>
        </tr>
        <tr>
            <td>Breastfeeding Female</td>
            <td>{!! Form::radio('Breastfeeding Female', 'No') !!}</td>
            <td>{!! Form::radio('Breastfeeding Female', 'Yes') !!}</td>
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
