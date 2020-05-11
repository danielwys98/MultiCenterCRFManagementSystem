@extends('MasterLayout')

@section('content')
   <h2>Visit 1: Pre-Study Screening</h2>
   <hr>

    {!! Form::open(['url' => 'foo/bar']) !!}

    {{-- general consent --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>
    {{-- subject demographics --}}
    <div class="form-group">
        <h3>Subject Demographics</h3>
        <table class="table col-sm-9">
            <tr>
                <td>{!! Form::label('Gender', 'Gender:') !!}</td>
                <td>
                    {!! Form::label('GenderM', 'Male') !!}
                    {!! Form::radio('GenderM', 'Male') !!}
                    {!! Form::label('GenderF', 'Female') !!}
                    {!! Form::radio('GenderF', 'Female') !!}
                </td>
            </tr>
            <tr>
                <td>{!! Form::label('Ethnicity', 'Ethnicity:') !!}</td>
                <td>
                    {!! Form::radio('Ethnicity-C', 'Chinese') !!}
                    {!! Form::label('Ethnicity-C', 'Chinese') !!}
                    
                    {!! Form::radio('Ethnicity-M', 'Malay') !!}
                    {!! Form::label('Ethnicity-M', 'Malay') !!}

                    {!! Form::radio('Ethnicity-I', 'Indian') !!}
                    {!! Form::label('Ethnicity-I', 'Indian') !!}

                    {!! Form::radio('Ethnicity-O', 'Others') !!}
                    {!! Form::label('Ethnicity-O', 'Others') !!}
                    {!! Form::text('Ethnicity-O', '') !!}
                </td>
            </tr>
            <tr>
                <td>{!! Form::label('DoB', 'Date of Birth: ') !!}</td>
                <td>{!! Form::date('DoB', \Carbon\Carbon::now()) !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('age', 'Age: ') !!}</td>
                <td>{!! Form::number('age', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('maritalstatus', 'Marital Status:') !!}</td>
                <td>
                    {!! Form::label('maritalstatusS', 'Single') !!}
                    {!! Form::radio('maritalstatusS', 'Single') !!}
                
                    {!! Form::label('maritalstatusM', 'Married') !!}
                    {!! Form::radio('maritalstatusM', 'Married') !!}
                </td>
            </tr>
        </table>
    </div>
    {{-- body measurements and vital signs --}}
    <div class="form-group">
        <h3>Body Measurements and Vital Signs</h3>
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
                <td>{!! Form::label('weight', 'Weight: ') !!}</td>
                <td>kg</td>
                <td>{!! Form::number('weight', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('height', 'Height: ') !!}</td>
                <td>cm</td>
                <td>{!! Form::number('height', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('bmi', 'Body Mass Index: ') !!}</td>
                <td>kg/m2</td>
                <td>{!! Form::number('bmi', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('temperature', 'Temperature: ') !!}</td>
                <td>°C</td>
                <td>{!! Form::number('temperature', '') !!}</td>
            </tr>
        </table>
        <table class="table col-sm-12">
            <tr>
                <h4>Vital Signs</h4>
            </tr>
            <tr>
                <th>Position</th>
                <th>
                    Reading Time
                    (24-hour clock)
                </th>
                <th>
                    Blood Pressure
                    (systolic/diastolic)
                    (mmHg)
                </th>
                <th>
                    Heart Rate
                    (beats per min)
                </th>
                <th>
                    Respiratory Rate
                    (breaths per min)
                </th>
            </tr>
            <tr>
                <td>{!! Form::label('Supine', 'Supine: ') !!}</td>
                <td>{!! Form::number('Supine', '') !!}</td>
                <td>{!! Form::number('Supine', '') !!}</td>
                <td>{!! Form::number('Supine', '') !!}</td>
                <td>{!! Form::number('Supine', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('Sitting', 'Sitting: ') !!}</td>
                <td>{!! Form::number('Sitting', '') !!}</td>
                <td>{!! Form::number('Sitting', '') !!}</td>
                <td>{!! Form::number('Sitting', '') !!}</td>
                <td>{!! Form::number('Sitting', '') !!}</td>
            </tr>
            <tr>
                <td>{!! Form::label('Standing', 'Standing: ') !!}</td>
                <td>{!! Form::number('Standing', '') !!}</td>
                <td>{!! Form::number('Standing', '') !!}</td>
                <td>{!! Form::number('Standing', '') !!}</td>
                <td>{!! Form::number('Standing', '') !!}</td>
                <td>
                    {!! Form::label('Initial', 'Initial: ') !!}
                    {!! Form::text('Initial', '') !!}
                </td>
            </tr>
        </table>
        {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
    </div>
    {{-- breath alcohol test --}}
    <div class="form-group">
        <h3>Breath Alcohol Test</h3>
        <p>(Transcribed from Breath Alcohol Test Logbook)</p>
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
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::label('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
        </div>
        <div class="row">
            <div class="col-sm-3">
                Test
            </div>
            <div class="col-sm-3">
                %BAC
            </div>
            <div class="col-sm-3">
                Result
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('breathalcohol', 'Breath Alcohol: ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::number('breathalcohol', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('breathalcohol', 'Positive') !!}
                {!! Form::label('breathalcohol', 'Positive ') !!}
                {!! Form::radio('breathalcohol', 'Negative') !!}
                {!! Form::label('breathalcohol', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('Transcribedby', 'Transcribed by: ') !!}
                {!! Form::text('Transcribedby', '') !!}
            </div>
        </div>
    </div>
    {{-- electrocardiogram recording --}}
    <div class="form-group">
        <h3>Electrocardiogram Recording</h3>
        <p>(ECG Recording attached in Appendix)</p>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('Conclusion', 'Conclusion: ') !!}
            {!! Form::radio('Conclusion', 'Normal') !!}
            {!! Form::label('Conclusion', 'Normal') !!}
            {!! Form::radio('Conclusion', 'Abnormal but not clinically significant ') !!}
            {!! Form::label('Conclusion', 'Abnormal but not clinically significant ') !!}
            {!! Form::radio('Conclusion', 'Abnormal and clinically significant') !!}
            {!! Form::label('Conclusion', 'Abnormal and clinically significant') !!}
        </div>
    </div>
    {{-- medical history --}}
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
            </tr>
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
    {{-- physical examination --}}
    <div class="form-group">
        <h3>Physical Examination</h3>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
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
                <td>General Appearance</td>
                <td>{!! Form::radio('General Appearance', 'Normal') !!}</td>
                <td>{!! Form::radio('General Appearance', 'Abnormal') !!}</td>
                <td>{!! Form::text('General Appearance', '') !!}</td>
            </tr>
            <tr>
                <td>Skin</td>
                <td>{!! Form::radio('Skin', 'Normal') !!}</td>
                <td>{!! Form::radio('Skin', 'Abnormal') !!}</td>
                <td>{!! Form::text('Skin', '') !!}</td>
            </tr>
            <tr>
                <td>Head-Neck</td>
                <td>{!! Form::radio('Head-Neck', 'Normal') !!}</td>
                <td>{!! Form::radio('Head-Neck', 'Abnormal') !!}</td>
                <td>{!! Form::text('Head-Neck', '') !!}</td>
            </tr>
            <tr>
                <td>Eyes</td>
                <td>{!! Form::radio('Eyes', 'Normal') !!}</td>
                <td>{!! Form::radio('Eyes', 'Abnormal') !!}</td>
                <td>{!! Form::text('Eyes', '') !!}</td>
            </tr>
            <tr>
                <td>Ears / Nose / Throat</td>
                <td>{!! Form::radio('Ears / Nose / Throat', 'Normal') !!}</td>
                <td>{!! Form::radio('Ears / Nose / Throat', 'Abnormal') !!}</td>
                <td>{!! Form::text('Ears / Nose / Throat', '') !!}</td>
            </tr>
            <tr>
                <td>Mouth</td>
                <td>{!! Form::radio('Mouth', 'Normal') !!}</td>
                <td>{!! Form::radio('Mouth', 'Abnormal') !!}</td>
                <td>{!! Form::text('Mouth', '') !!}</td>
            </tr>
            <tr>
                <td>Chest / Lungs</td>
                <td>{!! Form::radio('Chest / Lungs', 'Normal') !!}</td>
                <td>{!! Form::radio('Chest / Lungs', 'Abnormal') !!}</td>
                <td>{!! Form::text('Chest / Lungs', '') !!}</td>
            </tr>
            <tr>
                <td>Heart</td>
                <td>{!! Form::radio('Heart', 'Normal') !!}</td>
                <td>{!! Form::radio('Heart', 'Abnormal') !!}</td>
                <td>{!! Form::text('Heart', '') !!}</td>
            </tr>
            <tr>
                <td>Abdomen</td>
                <td>{!! Form::radio('Abdomen', 'Normal') !!}</td>
                <td>{!! Form::radio('Abdomen', 'Abnormal') !!}</td>
                <td>{!! Form::text('Abdomen', '') !!}</td>
            </tr>
            <tr>
                <td>Back-Spine</td>
                <td>{!! Form::radio('Back-Spine', 'Normal') !!}</td>
                <td>{!! Form::radio('Back-Spine', 'Abnormal') !!}</td>
                <td>{!! Form::text('Back-Spine', '') !!}</td>
            </tr>
            <tr>
                <td>Musculoskeletal</td>
                <td>{!! Form::radio('Musculoskeletal', 'Normal') !!}</td>
                <td>{!! Form::radio('Musculoskeletal', 'Abnormal') !!}</td>
                <td>{!! Form::text('Musculoskeletal', '') !!}</td>
            </tr>
            <tr>
                <td>Neurological</td>
                <td>{!! Form::radio('Neurological', 'Normal') !!}</td>
                <td>{!! Form::radio('Neurological', 'Abnormal') !!}</td>
                <td>{!! Form::text('Neurological', '') !!}</td>
            </tr>
            <tr>
                <td>Extremities</td>
                <td>{!! Form::radio('Extremities', 'Normal') !!}</td>
                <td>{!! Form::radio('Extremities', 'Abnormal') !!}</td>
                <td>{!! Form::text('Extremities', '') !!}</td>
            </tr>
            <tr>
                <td>Lymph Nodes</td>
                <td>{!! Form::radio('Lymph Nodes', 'Normal') !!}</td>
                <td>{!! Form::radio('Lymph Nodes', 'Abnormal') !!}</td>
                <td>{!! Form::text('Lymph Nodes', '') !!}</td>
            </tr>
            <tr>
                <td>Other</td>
                <td>{!! Form::radio('Other', 'Normal') !!}</td>
                <td>{!! Form::radio('Other', 'Abnormal') !!}</td>
                <td>{!! Form::text('Other', '') !!}</td>
            </tr>
        </table>
        <div>
            {!! Form::label('Cubital fossa veins', 'Cubital fossa veins: ') !!}
            {!! Form::radio('Cubital fossa veins', 'Clearly visible') !!}
            {!! Form::label('Cubital fossa veins', 'Clearly visible') !!}
            {!! Form::radio('Cubital fossa veins', 'Moderately visible') !!}
            {!! Form::label('Cubital fossa veins', 'Moderately visible') !!}
            {!! Form::radio('Cubital fossa veins', 'Poorly visible') !!}
            {!! Form::label('Cubital fossa veins', 'Poorly visible') !!}
        </div>
        <div>
            {!! Form::label('Comments', 'Comments: ') !!}
            {!! Form::radio('Physically Healthy', 'Physically Healthy') !!}
            {!! Form::label('Physically Healthy', 'Physically Healthy') !!}
            {!! Form::text('Physically Healthy ', '') !!}
            {!! Form::radio('Otherwise', 'Otherwise') !!}
            {!! Form::label('Otherwise', 'Otherwise') !!}
            {!! Form::text('Otherwise', '') !!}
        </div>
    </div>
    {{-- urine pregnancy test --}}
    <div class="form-group">
        <h3>Urine Pregnancy Test</h3>
        <p>(Transcribed from Urine Logbook)</p>
        {!! Form::label('male', 'Not Applicable for male') !!}
        {!! Form::checkbox('male', 'Not Applicable for male') !!}
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('TestTime', 'Test Time: ') !!}
                {!! Form::time('TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('Read Time', 'Read Time: ') !!}
                {!! Form::time('Read Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
        </div>
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::label('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
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
                {!! Form::label('Methamphetamine', 'Methamphetamine (mAMP): ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('Methamphetamine', 'Positive') !!}
                {!! Form::label('Methamphetamine', 'Positive ') !!}
                {!! Form::radio('Methamphetamine', 'Negative') !!}
                {!! Form::label('Methamphetamine', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('Methamphetamine', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('Morphine', 'Morphine (MOR): ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('Morphine', 'Positive') !!}
                {!! Form::label('Morphine', 'Positive ') !!}
                {!! Form::radio('Morphine', 'Negative') !!}
                {!! Form::label('Morphine', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('Morphine', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('Marijuana', 'Marijuana (THC): ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('Marijuana', 'Positive') !!}
                {!! Form::label('Marijuana', 'Positive ') !!}
                {!! Form::radio('Marijuana', 'Negative') !!}
                {!! Form::label('Marijuana', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('Marijuana', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('Transcribedby', 'Transcribed by: ') !!}
                {!! Form::text('Transcribedby', '') !!}
            </div>
        </div>
    </div>
    {{-- urine drugs for abuse test --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>
    {{-- laboratory test --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>
    {{-- serology test --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>
    {{-- inclusion and exclusion criteria --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>
    {{-- conclusion --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>
    {{-- pre-study screening signature --}}
    <div class="form-group">
        <h3>General Consent</h3>
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
    </div>

    {!! Form::close() !!}
    
    
@endsection