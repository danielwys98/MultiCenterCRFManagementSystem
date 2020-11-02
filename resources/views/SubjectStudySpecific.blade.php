@extends('MasterLayout')

@section('content')
    <h1>This is the Study Specific Page</h1>
    <div class="container-fluid">
        <h3>Study Period 1 for {{$patient->name}}</h3>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <p>There are a few criteria that didn't fill in. Please fill in all the criteria</p>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('Messages'))
            {{-- <div class="alert alert-success">
                {{ session('Messages') }}
            </div> --}}
            <script>
                toast('Your Post as been submited!','success');
            </script>
        @endif
        @if (session('ErrorMessages'))
            <div class="alert alert-danger">
                {{ session('ErrorMessages') }}
            </div>
        @endif

        <div class="tab-content">
            <div id="Admission" class="tab-pane fade in active">
               @include('studySpecificForms.editForms.Admission')

            </div>

            <div id="BMVS" class="tab-pane fade">
                @include('studySpecificForms.editForms.BMVS')

            </div>

           {{-- <div id="BAT" class="tab-pane fade">
                @include('studySpecificForms.editForms.BAT')

             </div>

             <div id="AQuestionnaire" class="tab-pane fade">
                 @include('studySpecificForms.editForms.AQuestionnaire')

             </div>

             <div id="UrineTest" class="tab-pane fade">
                @include('studySpecificForms.editForms.UrineTest')

             </div>

             <div id="Pharmacokinetic" class="tab-pane fade">
                 @include('studySpecificForms.editForms.Pharmacokinetic')

             </div>

             <div id="Pharmacodynamic" class="tab-pane fade">
                @include('studySpecificForms.editForms.Pharmacodynamic')

             </div> --}}

             <div id="PharmacodynamicPD" class="tab-pane fade">
                 @include('studySpecificForms.editForms.PharmacodynamicPD')

             </div>
            <div id="VitalSigns" class="tab-pane fade">
                @include('studySpecificForms.editForms.VitalSigns')
            </div>

            <div id="Discharge" class="tab-pane fade">
                @include('studySpecificForms.editForms.Discharge')

             </div>

            {{-- <div id="DischargeQuestionnaire" class="tab-pane fade">
                 @include('studySpecificForms.editForms.DischargeQuestionnaire')

             </div>

             <div id="IQuestionnaire36" class="tab-pane fade">
                @include('studySpecificForms.editForms.IQuestionnaire36')

             </div>

             <div id="IQuestionnaire48" class="tab-pane fade">
                 @include('studySpecificForms.editForms.IQuestionnaire48')

             </div>--}}
    </div>
    </div>
@endsection
