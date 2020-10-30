@extends('MasterLayout')

@section('content')
    <h1>This is the Study Specific Page</h1>
    <div class="container-fluid">
        <h3>Study Period 1</h3>
        <ul class="nav nav-pills sticky-top bg-light">
            <li class="active"><a data-toggle="tab" href="#Admission">Admission</a></li>
            <li><a data-toggle="tab" href="#BMVS">Body Measurements and Vital Signs</a></li>
            <li><a data-toggle="tab" href="#BAT">Breath Alcohol Test</a></li>
            <li><a data-toggle="tab" href="#AQuestionnaire">Admission Questionnaire</a></li>
            <li><a data-toggle="tab" href="#UrineTest">Urine Tests & Conclusion</a></li>
            <li><a data-toggle="tab" href="#Pharmacokinetic">Pharmacokinetic Blood Sampling</a></li>
            <li><a data-toggle="tab" href="#Pharmacodynamic">Pharmacodynamic Blood Sampling</a></li>
            <li><a data-toggle="tab" href="#PharmacodynamicPD">Pharmacodynamic(PD)Analysis</a></li>
            <li><a data-toggle="tab" href="#VitalSigns">Vital Signs</a></li>
            <li><a data-toggle="tab" href="#Discharge">Discharge</a></li>
            <li><a data-toggle="tab" href="#DischargeQuestionnaire">Discharge Questionnaire</a></li>
            <li><a data-toggle="tab" href="#IQuestionnaire36">Interim Questionnaire(36 hours Post Dose Visit)</a></li>
            <li><a data-toggle="tab" href="#IQuestionnaire48">Interim Questionnaire(48 hours Post Dose Visit)</a></li>
        </ul>
            <hr/>
        <div class="form-group row">
          <div class="col-md-4">
                {!! Form::checkbox('Absent', '') !!}
                {!! Form::label('Absent','Subject absent. Page _ to _ of CRF will be cancelled/removed') !!}
            </div>
            <div class="col-md-1">
                {!! Form::label('AdmissionDate', 'Admission Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('AdmissionDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
            <div class="col-md-1">
                {!! Form::label('DischargeDate', 'Discharge Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('DischargeDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>
        <hr>

        <div class="tab-content">
            <div id="Admission" class="tab-pane fade in active">
               @include('studySpecificForms.Admission')

            </div>

            <div id="BMVS" class="tab-pane fade">
                @include('studySpecificForms.BMVS')

            </div>

            <div id="BAT" class="tab-pane fade">
                @include('studySpecificForms.BAT')

             </div>

             <div id="AQuestionnaire" class="tab-pane fade">
                 @include('studySpecificForms.AQuestionnaire')

             </div>

             <div id="UrineTest" class="tab-pane fade">
                @include('studySpecificForms.UrineTest')

             </div>

             <div id="Pharmacokinetic" class="tab-pane fade">
                 @include('studySpecificForms.Pharmacokinetic')

             </div>

             <div id="Pharmacodynamic" class="tab-pane fade">
                @include('studySpecificForms.Pharmacodynamic')

             </div>

             <div id="PharmacodynamicPD" class="tab-pane fade">
                 @include('studySpecificForms.PharmacodynamicPD')

             </div>
            <div id="VitalSigns" class="tab-pane fade">
                @include('studySpecificForms.VitalSigns')
            </div>

             <div id="Discharge" class="tab-pane fade">
                @include('studySpecificForms.Discharge')

             </div>

             <div id="DischargeQuestionnaire" class="tab-pane fade">
                 @include('studySpecificForms.DischargeQuestionnaire')

             </div>

             <div id="IQuestionnaire36" class="tab-pane fade">
                @include('studySpecificForms.IQuestionnaire36')

             </div>

             <div id="IQuestionnaire48" class="tab-pane fade">
                 @include('studySpecificForms.IQuestionnaire48')

             </div>
    </div>
    </div>
@endsection
