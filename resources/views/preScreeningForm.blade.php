@extends('MasterLayout')

@section('content')
    <h2>Visit 1: Pre-Study Screening</h2>
    <hr>

    {!! Form::open(['url' => 'foo/bar']) !!}

    <h3>General Consent</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>

    <h3>Subject Demographics</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Gender', 'Gender:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Gender', 'Male') !!}
            {!! Form::label('Male', 'Male') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Gender', 'Female') !!}
            {!! Form::label('Female', 'Female') !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Ethnicity', 'Ethnicity:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Ethnicity', 'Chinese') !!}
            {!! Form::label('Chinese', 'Chinese') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Ethnicity', 'Malay') !!}
            {!! Form::label('Malay', 'Malay') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Ethnicity', 'Indian') !!}
            {!! Form::label('Indian', 'Indian') !!}
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-3">
            {!! Form::radio('Ethnicity', 'Others') !!}
            {!! Form::label('Others', 'Others') !!}
                </div>
                <div class="col-md-5">
            {!! Form::text('Others', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('DoB', 'Date of Birth: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('DoB', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('age', 'Age: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::number('age', '',['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('maritalstatus', 'Marital Status:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('maritalstatus', 'Single') !!}
            {!! Form::label('maritalstatusS', 'Single') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('maritalstatus', 'Married') !!}
            {!! Form::label('maritalstatusM', 'Married') !!}
        </div>
    </div>

    <h3>Body Measurements and Vital Signs</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('weight', 'Weight: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('weight', '', ['class'=>'form-control','placeholder'=>'kg']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('height', 'Height: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('height', '', ['class'=> 'form-control','placeholder'=>'cm']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('bmi', 'Body Mass Index: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('bmi', '',['class'=>'form-control','placeholder'=>'kg/m2']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('temperature', 'Temperature: ') !!}
        </div>
        <div class="col-md-1">
            {!! Form::number('temperature', '',['class'=>'form-control','placeholder'=>'°C']) !!}

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
                {!! Form::label('hCG', 'hCG: ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('hCG', 'Positive') !!}
                {!! Form::label('hCG', 'Positive ') !!}
                {!! Form::radio('hCG', 'Negative') !!}
                {!! Form::label('hCG', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('hCG', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('Transcribedby', 'Transcribed by (initial): ') !!}
                {!! Form::text('Transcribedby', '') !!}
            </div>
        </div>
    </div>
    {{-- urine drugs for abuse test --}}
    <div class="form-group">
        <h3>Urine Drugs of Abuse Test</h3>
        <p>(Transcribed from Urine Logbook)</p>
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
                {!! Form::label('Transcribedby', 'Transcribed by (initial): ') !!}
                {!! Form::text('Transcribedby', '') !!}
            </div>
    </div>
    {{-- laboratory test --}}
    <div class="form-group">
        <h3>Laboratory Tests</h3>
        <p>(Laboratory Test Report attached in Appendix)</p>
        <h5>Blood (Haematology and Chemistry)</h5>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateBTaken', 'Date Blood Taken: ') !!}
                {!! Form::date('dateBTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateLMTaken', 'Date Last Meal Taken: ') !!}
                {!! Form::date('dateLMTaken', \Carbon\Carbon::now()) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('TimeLMTaken', 'Time Last Meal Taken: ') !!}
                {!! Form::time('TimeLMTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('describemeal', 'If within 8 hours, describe meal taken: ') !!}
                {!! Form::text('describemeal', '') !!}
            </div>
        </div>
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
        </div>

        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('NAtest', 'Not Applicable') !!}
                {!! Form::checkbox('NAtest', 'Not Applicable') !!}
                {!! Form::label('repeattest', 'Repeated test: ') !!}
                {!! Form::text('repeattest', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
                {!! Form::date('dateBCollected', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
        </div>

        <h5>Urine (Microbiology)</h5>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateUTaken', 'Date Urine Collected: ') !!}
                {!! Form::date('dateUTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
        </div>
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('NAtest', 'Not Applicable') !!}
                {!! Form::checkbox('NAtest', 'Not Applicable') !!}
                {!! Form::label('repeattest', 'Repeated test: ') !!}
                {!! Form::text('repeattest', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
                {!! Form::date('dateBCollected', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
        </div>
    </div>
    {{-- serology test --}}
    <div class="form-group">
        <h3>Serology Test</h3>
        <p>(Laboratory Test Report attached in Appendix)</p>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateCTaken', 'Date of Consent Taken: ') !!}
                {!! Form::date('dateCTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>

        <h5>Blood (Hepatitis B and C & HIV Screening Test)</h5>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
                {!! Form::date('dateBCollected', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('Laboratory', 'Laboratory: ') !!}
            {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
            {!! Form::radio('Laboratory', 'Other') !!}
            {!! Form::label('Laboratory', 'Other, specify: ') !!}
            {!! Form::text('Laboratory', '') !!}
        </div>
    </div>
    {{-- inclusion and exclusion criteria --}}
    <div class="form-group">
        <h3>Inclusion and Exclusion Criteria</h3>
        <h5>Inclusion Criteria</h5>
        <div class="row">
            <div class="col-sm-6">
                <p>Subject will be eligible for this study if all of the following inclusion criteria are met:</p>
            </div>
            <div class="col-sm-3">
                <p>Yes</p>
            </div>
            <div class="col-sm-3">
                <p>No</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>1. Age within 18 - 55 years.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion01', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion01', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>2. Weight within the BMI of 18-30 kg/m2.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion02', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion02', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>3. Non-smoker.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion03', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion03', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>4. Able to complete the clinical study including the follow-up.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion04', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion04', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>5. Capable of providing written informed consent.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion05', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion05', 'No') !!}</p>
            </div>
        </div>

        <h5>Exclusion Criteria</h5>
        <div class="row">
            <div class="col-sm-6">
                <p>Subject will not be eligible for this study if any of the following exclusion criteria are met:</p>
            </div>
            <div class="col-sm-3">
                <p>Yes</p>
            </div>
            <div class="col-sm-3">
                <p>No</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>1. Breastfeeding female.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion01', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion01', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>2. Pregnancy test positive female.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion02', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion02', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>3. Systolic blood pressure outside 90-140 mmHg or diastolic blood pressure outside 50-90 mmHg.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion03', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion03', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>4. Bradycardia defined as symptomatic heart rate < 50 bpm or asymptomatic heart rate < 45 bpm and tachycardia defined as heart rate > 100 bpm.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion04', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion04', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>5. Clinically significant ECG abnormalities.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion05', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion05', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>6. QTc > 450 ms for male and > 460 ms for female.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion06', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion06', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>7. A history of asthma and allergies, or any significant adverse reactions, to any medications.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion07', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion07', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>8. Clinically significant medical history of eyes, ears, nose, throat, respiratory, cardiovascular, gastrointestinal, genitourinary, neurological, haematopoietic, lymphatic, endocrine, metabolic, dermatological, musculoskeletal, psychological, family history or surgical history.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion08', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion08', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>9. A history of gastritis or peptic ulcer.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion09', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion09', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>10. Family history of sudden cardiac death.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion10', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion10', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>11. Clinically significant physical examination finding.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion11', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion11', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>12. Clinically significant laboratory abnormalities.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion12', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion12', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>13. Haemoglobin < 12.0 g/dL for male and < 11.0 g/dL for female at screening.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion13', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion13', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>14. Total bilirubin > 1.25 x upper limit of normal (unless it is an isolated elevation where the direct bilirubin is ≤ 35% of total), ALT/AST > 1.5 x upper limit of normal, or CPK > 2 x upper limit of normal.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion14', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion14', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>15. Hepatitis B, Hepatitis C or HIV positive.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion15', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion15', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>16. A history of drug or substance abuse, including alcohol (≥ 14 units per week) within 6 months before dosing (1 unit of alcohol equals approximately ½ pint [285 mL] of beer, 1 glass [125 mL] of wine, or 1 shot [25 mL] of spirit).</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion16', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion16', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>17. Urine DOA test positive.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion17', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion17', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>18. Breath alcohol test positive.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion18', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion18', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>19. Have taken any medications (including herbal remedies) within 7 days before dosing, with the exception of birth control and other medications deemed acceptable by the Investigator.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion19', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion19', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>20. Clinically significant illness or injury or hospitalisation for any reason within 28 days before dosing.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion20', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion20', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>21. Participation in other clinical study involving a marketed or investigational drug within 28 days or 10 half-lives of the drug before dosing, whichever is longer.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion21', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion21', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>22. Donation of > 500 mL of plasma within 14 days before dosing; or donation or loss of whole blood (excluding the amount of blood collected during screening) before dosing as follows:</p>
                <p>- 50-300 mL within 28 days,</p>
                <p>- 301-500 mL within 42 days, or</p>
                <p>- > 500 mL within 84 days.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion22', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion22', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>23. Difficulty to swallow the study drug.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion23', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion23', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>24. Any other medical condition or reason that, in the opinion of the Investigator or Research Physician, makes the subject unsuitable to participate in the clinical study.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion24', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion24', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>25. Female of childbearing potential having unprotected sexual intercourse with any nonsterile male partner within 14 days before dosing; acceptable methods of contraception include:</p>
                <p>- double barrier (1 by each partner), and at least 1 of these barriers (condom, cervical cap, diaphragm or sponge) must contain spermicide,</p>
                <p>- hormonal (oral, injectable, transdermal, intravaginal or implantable),</p>
                <p>- intrauterine contraceptive system,</p>
                <p>- surgical (vasectomy or tubal ligation), or</p>
                <p>- sexual abstinence.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion25', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion25', 'No') !!}</p>
            </div>
        </div>
    </div>
    {{-- conclusion --}}
    <div class="form-group">
        <h3>Conclusion</h3>
        <div class="row">
            <div class="col-sm-6">
                <p>Does the subject fulfill all the inclusion criteria and none of the exclusion criteria?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::label('Yes', 'Yes') !!}</p>
                <p>{!! Form::radio('Yes', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::label('No', 'No') !!}</p>
                <p>{!! Form::radio('No', 'No') !!}</p>
            </div>
        </div>
        <p>If “Yes”, enroll the subject into the study.</p>
        <p>If “No”, provide details. The subject may or may not be enrolled into the study, based on the discretion of the research physician.</p>
        {!! Form::text('NoDetails', '') !!}
        <div>
            {!! Form::checkbox('NAbnormality ', 'NAbnormality ') !!}
            {!! Form::label('NAbnormality', 'The abnormality (ies) not clinically significant, this subject can be enrolled into this study and is safe to receive ……………………………, the study medication. ') !!}
        </div>
        <div>
            {!! Form::checkbox('abnormality ', 'abnormality ') !!}
            {!! Form::label('abnormality', 'Clinically significant abnormality (ies), this subject cannot be enrolled into this study.') !!}
        </div>
    </div>
    {{-- pre-study screening signature --}}
    <div class="form-group">
        <h3>Pre-study Screening Signature</h3>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('physicianSign', 'Physician’s Signature: ') !!}
                {!! Form::text('physicianSign', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                {!! Form::text('physicianName', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
