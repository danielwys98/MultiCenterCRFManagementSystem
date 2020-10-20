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
               @include('details.forms.bmvs')
            </div>
         <div id="BATER" class="tab-pane fade">
                @include('details.forms.bater')
         </div>

       <div id="MHistory" class="tab-pane fade">
           @include('details.forms.mHistory')
       </div>
{{--
        <div id="PExam" class="tab-pane fade">
            @include('details.forms.pe')
       </div>

       <div id="UrineTest" class="tab-pane fade">
           @include('details.forms.urineTest')
       </div>--}}
{{--
       <div id="LabTest" class="tab-pane fade">
           @include('details.forms.labTest')
       </div>

       <div id="STest" class="tab-pane fade">
        @include('details.forms.sTest')
       </div>

       <div id="Criteria" class="tab-pane fade">
           @include('details.forms.critieria')
       </div>

       <div id="Conclude" class="tab-pane fade">
           @include('details.forms.conclusion')
        </div>--}}
            {{--This ending div tag is for the "tab-content" div--}}
    </div>


    </div>
@endsection
