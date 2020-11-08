@extends('MasterLayout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
        <h2>Visit 1: Pre-Study Screening of {{$patient->name}}</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('preScreening.PDF',[$patient->id]) }}"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-share"></span> Generate Report</button></a>
            </div>
        </div>
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
            <div class="alert alert-success">
                {{ session('Messages') }}
            </div>
        @endif
        @if (session('ErrorMessages'))
            <div class="alert alert-danger">
                {{ session('ErrorMessages') }}
            </div>
        @endif
        <div class="tab-content">
            <div id="BMVS" class="tab-pane fade in active">
               @include('preScreeningForms.editForms.bmvs')
            </div>
            <div id="BATER" class="tab-pane fade">
                @include('preScreeningForms.editForms.bater')
            </div>

            <div id="MHistory" class="tab-pane fade">
                @include('preScreeningForms.editForms.mHistory')
            </div>
                <div id="PExam" class="tab-pane fade">
                    @include('preScreeningForms.editForms.pe')
            </div>

            <div id="UrineTest" class="tab-pane fade">
                @include('preScreeningForms.editForms.urineTest')
            </div>
            <div id="LabTest" class="tab-pane fade">
                @include('preScreeningForms.editForms.labTest')
            </div>

            <div id="STest" class="tab-pane fade">
                @include('preScreeningForms.editForms.sTest')
            </div>

            <div id="Criteria" class="tab-pane fade">
                @include('preScreeningForms.editForms.critieria')
            </div>

            <div id="Conclude" class="tab-pane fade">
                @include('preScreeningForms.editForms.conclusion')
            </div>
            {{--This ending div tag is for the "tab-content" div--}}
    </div>


    </div>
@endsection
