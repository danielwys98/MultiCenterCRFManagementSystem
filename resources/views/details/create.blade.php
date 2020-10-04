@extends('MasterLayout')

@section('content')
    <div class="container-fluid">
        <h2>Visit 1: Pre-Study Screening of {{$patient->name}}</h2>
        <ul class="nav nav-pills sticky-top bg-light">
            <li class="active"><a data-toggle="tab" href="#BMVS">Body Measurements and Vital Signs</a></li>
            <li><a data-toggle="tab" href="#BATER">Breath Alcohol Test and Electrocardiogram Recording</a></li>
            <li><a data-toggle="tab" href="#MHistory">Medical History</a></li>
            <li><a data-toggle="tab" href="#PExam">Physical Examination</a></li>
            <li><a data-toggle="tab" href="#UrineTest">Urine Pregnancy and Drugs Test</a></li>
            <li><a data-toggle="tab" href="#LabTest">Laboratory Test</a></li>
            <li><a data-toggle="tab" href="#STest">Serology Test</a></li>
            <li><a data-toggle="tab" href="#Criteria">Inclusion and Exclusion Criteria</a></li>
            <li><a data-toggle="tab" href="#Conclude">Conclusion and Signature</a></li>
        </ul>
        <hr>
        <div class="tab-content">
            <div id="BMVS" class="tab-pane fade in active">
                {!! Form::open(['route' => ['details.store',$patient->id]]) !!}
                @csrf
                {{-- body measurements and vital signs --}}
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
                        {!! Form::number('weight','', ['class'=>'form-control','placeholder'=>'kg']) !!}
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
                    </div>
                </div>

                <h4>Vital Signs</h4>
                <hr>
                <table class="table table-bordered">
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
                        <td>{!! Form::number('Supine_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Supine_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Supine_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Supine_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                        <td>{!! Form::number('Sitting_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">{!! Form::label('Standing', 'Standing: ') !!}</th>
                        <td>{!! Form::number('Standing_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Standing_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Standing_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                        <td>{!! Form::number('Standing_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4"
                            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                        <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                    </tr>
                    </tbody>
                </table>
                <p>
                    {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
                </p>
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Body Measurement and Vital Signs end here after the div class below--}}
            </div>
            <div id="BATER" class="tab-pane fade">
                {!! Form::open(['route' => ['store.bater',$patient->id]]) !!}
                @csrf
                {{--breath alcohol test --}}
                <h3>Breath Alcohol Test</h3>
                <p>(Transcribed from Breath Alcohol Test Logbook)</p>
                <hr>
                <div class="form-group row">
                    <div class="col-md-1">
                        {!! Form::label('dateTaken', 'Date Taken: ') !!}</div>
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
                {{--        <div class="form-group row">
                            <div class="col-md-4">{!! Form::label('Laboratory', 'Laboratory: ') !!}</div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-1">
                                        {!! Form::radio('Laboratory1', 'Sarawak General Hospital Heart Centre') !!}
                                    </div>
                                    <div class="col-md-11">
                                        {!! Form::label('Laboratory1', 'Sarawak General Hospital Heart Centre') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        {!! Form::radio('Laboratory2', 'Other') !!}
                                        {!! Form::label('Laboratory2', 'Other') !!}
                                    </div>
                                    <div class="col-md-5">
                                        {!! Form::text('Laboratory2', '',['placeholder'=>'Please Specify']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                <div class="form-group row">
                    <div class="col-md-2">
                        {!! Form::label('Laboratory', 'Laboratory:') !!}
                    </div>
                    <div class="col-md-1">
                        {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
                        {!! Form::label('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::radio('Laboratory', 'Others') !!}
                                {!! Form::label('Laboratory', 'Others') !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('Others', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
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
                        <td>{!! Form::number('breathalcohol', '',['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
                        <td>
                            {!! Form::radio('breathalcoholResult', 'Positive') !!}
                            {!! Form::label('breathalcoholResult', 'Positive ') !!}
                            {!! Form::radio('breathalcoholResult', 'Negative') !!}
                            {!! Form::label('breathalcoholResult', 'Negative ') !!}
                        </td>
                    <tr>
                        <th scope="row" colspan="2"
                            class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
                        <td>{!! Form::text('Usertranscribed', '',['class'=>'form-control']) !!}</td>
                    </tr>
                    </tbody>
                </table>
                {{-- electrocardiogram recording --}}
                <h3>Electrocardiogram Recording</h3>
                <p>(ECG Recording attached in Appendix)</p>
                <hr>
                <div class="form-group row">
                    <div class="col-md-1">
                        {!! Form::label('ECGdateTaken', 'Date Taken: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('ECGdateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        {!! Form::label('Conclusion', 'Conclusion: ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::radio('Conclusion', 'Normal') !!}
                        {!! Form::label('Conclusion', 'Normal') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::radio('Conclusion', 'Abnormal but not clinically significant ') !!}
                        {!! Form::label('Conclusion', 'Abnormal but not clinically significant ') !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::radio('Conclusion', 'Abnormal and clinically significant') !!}
                        {!! Form::label('Conclusion', 'Abnormal and clinically significant') !!}
                    </div>
                </div>
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Breath Alcohol Test and Electrocardiogram Recording ends here--}}
            </div>

            <div id="MHistory" class="tab-pane fade">
                {!! Form::open(['route' => ['store.mhistory',$patient->id]]) !!}
                @csrf
                {{--  medical history --}}
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
                            <td>{!! Form::text('PrevHospitalization_txt', '') !!}</td>
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
                            <td>Regular Alchohol Intake</td>
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
                                {!! Form::label('RegularPeriods_Yes_txt', 'If Yes, please state last menstrual period: ') !!}
                                {!! Form::text('RegularPeriods_Yes_txt', '') !!}
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
                                {!! Form::radio('FertilityControl_No_txt', 'Counseling not given') !!}
                                {!! Form::radio('FertilityControl_No_txt', 'Counseling given') !!}

                                {!! Form::label('FertilityControlCounseling', 'If Yes, advice and counseling given: ') !!}
                                {!! Form::radio('FertilityControl_Yes_txt', 'The Natural Method (rhythm, withdrawal, mucus, body temperature') !!}
                                {!! Form::radio('FertilityControl_Yes_txt', 'The Barrier Method (condom, spermicides, diaphragm etc)') !!}
                                {!! Form::radio('FertilityControl_Yes_txt', 'Hormonal Method (OCP, depot, implant, IUD)') !!}
                                {!! Form::radio('FertilityControl_Yes_txt', 'Long term (tubal ligation, vasectomy)') !!}
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
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--medical history ends here after the div class below--}}
            </div>

            <div id="PExam" class="tab-pane fade">
                {!! Form::open(['route' => ['store.pexam',$patient->id]]) !!}
                @csrf
                {{--physical examination --}}
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
                            <td>{!! Form::radio('GeneralAppearance', 'Normal') !!}</td>
                            <td>{!! Form::radio('GeneralAppearance', 'Abnormal') !!}</td>
                            <td>{!! Form::text('GeneralAppearance', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Skin</td>
                            <td>{!! Form::radio('Skin', 'Normal') !!}</td>
                            <td>{!! Form::radio('Skin', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Skin', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Head-Neck</td>
                            <td>{!! Form::radio('Head_Neck', 'Normal') !!}</td>
                            <td>{!! Form::radio('Head_Neck', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Head_Neck', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Eyes</td>
                            <td>{!! Form::radio('Eyes', 'Normal') !!}</td>
                            <td>{!! Form::radio('Eyes', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Eyes', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Ears / Nose / Throat</td>
                            <td>{!! Form::radio('Ears_Nose_Throat', 'Normal') !!}</td>
                            <td>{!! Form::radio('Ears_Nose_Throat', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Ears_Nose_Throat', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Mouth</td>
                            <td>{!! Form::radio('Mouth', 'Normal') !!}</td>
                            <td>{!! Form::radio('Mouth', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Mouth', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Chest / Lungs</td>
                            <td>{!! Form::radio('Chest_Lungs', 'Normal') !!}</td>
                            <td>{!! Form::radio('Chest_Lungs', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Chest_Lungs', '') !!}</td>
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
                            <td>{!! Form::radio('Back_Spine', 'Normal') !!}</td>
                            <td>{!! Form::radio('Back_Spine', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Back_Spine', '') !!}</td>
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
                            <td>{!! Form::radio('Lymph_Nodes', 'Normal') !!}</td>
                            <td>{!! Form::radio('Lymph_Nodes', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Lymph_Nodes', '') !!}</td>
                        </tr>
                        <tr>
                            <td>Other</td>
                            <td>{!! Form::radio('Other', 'Normal') !!}</td>
                            <td>{!! Form::radio('Other', 'Abnormal') !!}</td>
                            <td>{!! Form::text('Other', '') !!}</td>
                        </tr>
                    </table>
                    <div>
                        {!! Form::label('Cubital_Fossa_Veins', 'Cubital fossa veins: ') !!}
                        {!! Form::radio('Cubital_Fossa_Veins', 'Clearly visible') !!}
                        {!! Form::label('Cubital_Fossa_Veins', 'Clearly visible') !!}
                        {!! Form::radio('Cubital_Fossa_Veins', 'Moderately visible') !!}
                        {!! Form::label('Cubital_Fossa_Veins', 'Moderately visible') !!}
                        {!! Form::radio('Cubital_Fossa_Veins', 'Poorly visible') !!}
                        {!! Form::label('Cubital_Fossa_Veins', 'Poorly visible') !!}
                    </div>
                    <div>
                        {!! Form::label('Comments', 'Comments: ') !!}
                        {!! Form::radio('Comments', 'Physically Healthy') !!}
                        {!! Form::label('Comments', 'Physically Healthy') !!}
                        {!! Form::text('Comments_Physically_Healthy', '') !!}
                        {!! Form::radio('Comments', 'Otherwise') !!}
                        {!! Form::label('Comments', 'Otherwise') !!}
                        {!! Form::text('Comments_Otherwise', '') !!}
                    </div>

                </div>
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--PE ends here after the div tag below--}}
            </div>

            <div id="UrineTest" class="tab-pane fade">
                {!! Form::open(['route' => ['store.urinetest',$patient->id]]) !!}
                @csrf
                {{-- urine pregnancy test --}}
                <div class="form-group">
                    <h3>Urine Pregnancy Test</h3>
                    <p>(Transcribed from Urine Logbook)</p>
                    {!! Form::label('UPreg_male', 'Not Applicable for male') !!}
                    {!! Form::checkbox('UPreg_male', 'Not Applicable for male') !!}
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('UPreg_dateTaken', 'Date Taken: ') !!}
                            {!! Form::date('UPreg_dateTaken', \Carbon\Carbon::now()) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('UPreg_TestTime', 'Test Time: ') !!}
                            {!! Form::time('UPreg_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('UPreg_ReadTime', 'Read Time: ') !!}
                            {!! Form::time('UPreg_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
                        </div>
                    </div>
                    <div>
                        {!! Form::label('UPreg_Laboratory', 'Laboratory: ') !!}

                        {!! Form::radio('UPreg_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
                        {!! Form::label('UPreg_Laboratory', 'Sarawak General Hospital Heart Centre') !!}

                        {!! Form::radio('UPreg_Laboratory', 'Other') !!}
                        {!! Form::label('UPreg_Laboratory', 'Other, specify: ') !!}

                        {!! Form::text('UPreg_Laboratory_Text', '') !!}
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
                            {!! Form::label('UPreg_hCG', 'hCG: ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::radio('UPreg_hCG', 'Positive') !!}
                            {!! Form::label('UPreg_hCG', 'Positive ') !!}
                            {!! Form::radio('UPreg_hCG', 'Negative') !!}
                            {!! Form::label('UPreg_hCG', 'Negative ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('UPreg_hCG_Comment', '') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('UPreg_Transcribedby', 'Transcribed by (initial): ') !!}
                            {!! Form::text('UPreg_Transcribedby', '') !!}
                        </div>
                    </div>
                </div>

                {{-- urine drugs for abuse test --}}
                <div class="form-group">
                    <h3>Urine Drugs of Abuse Test</h3>
                    <p>(Transcribed from Urine Logbook)</p>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
                            {!! Form::date('UDrug_dateTaken', \Carbon\Carbon::now()) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
                            {!! Form::time('UDrug_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
                            {!! Form::time('UDrug_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
                        </div>
                    </div>
                    <div>
                        {!! Form::label('UDrug_Laboratory', 'Laboratory: ') !!}

                        {!! Form::radio('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
                        {!! Form::label('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}

                        {!! Form::radio('UDrug_Laboratory', 'Other') !!}
                        {!! Form::label('UDrug_Laboratory', 'Other, specify: ') !!}

                        {!! Form::text('UDrug_Laboratory_Text', '') !!}
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
                            {!! Form::label('UDrug_Methamphetamine', 'Methamphetamine (mAMP): ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::radio('UDrug_Methamphetamine', 'Positive') !!}
                            {!! Form::label('UDrug_Methamphetamine', 'Positive ') !!}

                            {!! Form::radio('UDrug_Methamphetamine', 'Negative') !!}
                            {!! Form::label('UDrug_Methamphetamine', 'Negative ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('UDrug_Methamphetamine_Comment', '') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::radio('UDrug_Morphine', 'Positive') !!}
                            {!! Form::label('UDrug_Morphine', 'Positive ') !!}
                            {!! Form::radio('UDrug_Morphine', 'Negative') !!}
                            {!! Form::label('UDrug_Morphine', 'Negative ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('UDrug_Morphine_Comment', '') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::radio('UDrug_Marijuana', 'Positive') !!}
                            {!! Form::label('UDrug_Marijuana', 'Positive ') !!}
                            {!! Form::radio('UDrug_Marijuana', 'Negative') !!}
                            {!! Form::label('UDrug_Marijuana', 'Negative ') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('UDrug_Marijuana_Comment', '') !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
                            {!! Form::text('UDrug_Transcribedby', '') !!}
                        </div>
                    </div>
                </div>
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Urine Test ends here after the div tag below--}}
            </div>

            <div id="LabTest" class="tab-pane fade">
                {!! Form::open(['route' => ['store.labtest',$patient->id]]) !!}
                @csrf
                {{-- laboratory test--}}
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
                        {!! Form::label('Blood_Laboratory', 'Laboratory: ') !!}
                        {!! Form::radio('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::label('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::radio('Blood_Laboratory', 'Other') !!}
                        {!! Form::label('Blood_Laboratory', 'Other, specify: ') !!}
                        {!! Form::text('Blood_Laboratory', '') !!}
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('Blood_NAtest', 'Not Applicable') !!}
                            {!! Form::checkbox('Blood_NAtest', 'Not Applicable') !!}
                            {!! Form::label('Blood_RepeatTest', 'Repeated test: ') !!}
                            {!! Form::text('Blood_RepeatTest', '') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('Repeat_dateBCollected', 'Date Blood Collected: ') !!}
                            {!! Form::date('Repeat_dateBCollected', \Carbon\Carbon::now()) !!}
                        </div>
                    </div>
                    <div>
                        {!! Form::label('BloodRepeat_Laboratory', 'Laboratory: ') !!}
                        {!! Form::radio('BloodRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::label('BloodRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::radio('BloodRepeat_Laboratory', 'Other') !!}
                        {!! Form::label('BloodRepeat_Laboratory', 'Other, specify: ') !!}
                        {!! Form::text('BloodRepeat_Laboratory', '') !!}
                    </div>

                    <h5>Urine (Microbiology)</h5>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('dateUTaken', 'Date Urine Collected: ') !!}
                            {!! Form::date('dateUTaken', \Carbon\Carbon::now()) !!}
                        </div>
                    </div>
                    <div>
                        {!! Form::label('Urine_Laboratory', 'Laboratory: ') !!}
                        {!! Form::radio('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::label('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::radio('Urine_Laboratory', 'Other') !!}
                        {!! Form::label('Urine_Laboratory', 'Other, specify: ') !!}
                        {!! Form::text('Urine_Laboratory', '') !!}
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('Urine_NAtest', 'Not Applicable') !!}
                            {!! Form::checkbox('Urine_NAtest', 'Not Applicable') !!}
                            {!! Form::label('Urine_RepeatTest', 'Repeated test: ') !!}
                            {!! Form::text('Urine_RepeatTest', '') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            {!! Form::label('Repeat_dateUCollected', 'Date Urine Collected: ') !!}
                            {!! Form::date('Repeat_dateUCollected', \Carbon\Carbon::now()) !!}
                        </div>
                    </div>
                    <div>
                        {!! Form::label('UrineRepeat_Laboratory', 'Laboratory: ') !!}
                        {!! Form::radio('UrineRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::label('UrineRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
                        {!! Form::radio('UrineRepeat_Laboratory', 'Other') !!}
                        {!! Form::label('UrineRepeat_Laboratory', 'Other, specify: ') !!}
                        {!! Form::text('UrineRepeat_Laboratory', '') !!}
                    </div>
                </div>
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Lab Test ends here after the div tag below--}}
            </div>

            <div id="STest" class="tab-pane fade">
                {!! Form::open(['route' => ['store.serology',$patient->id]]) !!}
                @csrf
                {{--  serology test --}}
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
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Serology Test ends here after the div tag below--}}
            </div>

            <div id="Criteria" class="tab-pane fade">
                {!! Form::open(['route' => ['store.iecriteria',$patient->id]]) !!}
                @csrf
                {{--inclusion and exclusion criteria --}}
                <div class="form-group">
                    <h3>Inclusion and Exclusion Criteria</h3>
                    <h5>Inclusion Criteria</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Subject will be eligible for this study if all of the following inclusion criteria are
                                met:</p>
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
                            <p>Subject will not be eligible for this study if any of the following exclusion criteria are
                                met:</p>
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
                            <p>3. Systolic blood pressure outside 90-140 mmHg or diastolic blood pressure outside 50-90
                                mmHg.</p>
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
                            <p>4. Bradycardia defined as symptomatic heart rate < 50 bpm or asymptomatic heart rate < 45 bpm
                                and tachycardia defined as heart rate > 100 bpm.</p>
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
                            <p>7. A history of asthma and allergies, or any significant adverse reactions, to any
                                medications.</p>
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
                            <p>8. Clinically significant medical history of eyes, ears, nose, throat, respiratory,
                                cardiovascular, gastrointestinal, genitourinary, neurological, haematopoietic, lymphatic,
                                endocrine, metabolic, dermatological, musculoskeletal, psychological, family history or
                                surgical history.</p>
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
                            <p>14. Total bilirubin > 1.25 x upper limit of normal (unless it is an isolated elevation where
                                the direct bilirubin is ≤ 35% of total), ALT/AST > 1.5 x upper limit of normal, or CPK > 2 x
                                upper limit of normal.</p>
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
                            <p>16. A history of drug or substance abuse, including alcohol (≥ 14 units per week) within 6
                                months before dosing (1 unit of alcohol equals approximately ½ pint [285 mL] of beer, 1
                                glass [125 mL] of wine, or 1 shot [25 mL] of spirit).</p>
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
                            <p>19. Have taken any medications (including herbal remedies) within 7 days before dosing, with
                                the exception of birth control and other medications deemed acceptable by the
                                Investigator.</p>
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
                            <p>20. Clinically significant illness or injury or hospitalisation for any reason within 28 days
                                before dosing.</p>
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
                            <p>21. Participation in other clinical study involving a marketed or investigational drug within
                                28 days or 10 half-lives of the drug before dosing, whichever is longer.</p>
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
                            <p>22. Donation of > 500 mL of plasma within 14 days before dosing; or donation or loss of whole
                                blood (excluding the amount of blood collected during screening) before dosing as
                                follows:</p>
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
                            <p>24. Any other medical condition or reason that, in the opinion of the Investigator or
                                Research Physician, makes the subject unsuitable to participate in the clinical study.</p>
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
                            <p>25. Female of childbearing potential having unprotected sexual intercourse with any
                                nonsterile male partner within 14 days before dosing; acceptable methods of contraception
                                include:</p>
                            <p>- double barrier (1 by each partner), and at least 1 of these barriers (condom, cervical cap,
                                diaphragm or sponge) must contain spermicide,</p>
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
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Criteria ends here after the div tag below--}}
            </div>

            <div id="Conclude" class="tab-pane fade">
                {!! Form::open(['route' => ['store.conclusion',$patient->id]]) !!}
                @csrf
                {{-- conclusion --}}
                <div class="form-group">
                    <h3>Conclusion</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Does the subject fulfill all the inclusion criteria and none of the exclusion criteria?</p>
                        </div>
                        <div class="col-sm-3">
                            <p>{!! Form::label('inclusionYesNo', 'Yes') !!}</p>
                            <p>{!! Form::radio('inclusionYesNo', 'Yes') !!}</p>
                        </div>
                        <div class="col-sm-3">
                            <p>{!! Form::label('inclusionYesNo', 'No') !!}</p>
                            <p>{!! Form::radio('inclusionYesNo', 'No') !!}</p>
                        </div>
                    </div>
                    <p>If “Yes”, enroll the subject into the study.</p>
                    <p>If “No”, provide details. The subject may or may not be enrolled into the study, based on the
                        discretion of the research physician.</p>
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

                {{--pre-study screening signature--}}
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
                {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
                {!! Form::close() !!}
                {{--Conclusion ends here after the div tag below--}}
            </div>
            {{--This ending div tag is for the "tab-content" div--}}
        </div>


    </div>
@endsection
