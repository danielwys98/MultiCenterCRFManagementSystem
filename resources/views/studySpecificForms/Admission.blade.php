{!! Form::open(['route' => ['sp_Admission.store',$study->study_id]]) !!}
@csrf

{{-- admission --}}
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasRole('Admin'))
            <div class="row">
                <div class="col-md-2">
                    <h4>{!! Form::label('SubjectName', 'Subject: ') !!}</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('Admin view of name', 'Subject: ') !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('patient_id',$newName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <h4> {!! Form::label('studyPeriod', 'Study Period: ') !!}</h4>
            </div>
            <div class="col-md-3">
                <h4>{!! Form::select('studyPeriod',$studyPeriod,null,['class'=>'form-control']) !!}</h4>
            </div>
        </div>
    </div>
</div>
<h3>Admission</h3>
<hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('AdmissionDateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('AdmissionDateTaken',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('AdmissionTimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>

{{-- consent --}}
    <h3>Study-Specific Consent Taken</h3>
    <hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('ConsentDateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('ConsentDateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('ConsentTimeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('ConsentTimeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
