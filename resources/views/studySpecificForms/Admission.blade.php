{!! Form::open(['route' => ['sp1Admission.store',$study->study_id]]) !!}
{{-- admission --}}
<div class="form-group row">
                <div class="col">
                    @if(Auth::check() && Auth::user()->hasRole('Admin'))
                        <div>
                            {!! Form::label('SubjectName', 'Subject') !!}
                            {!! Form::select('patient_id',$oriPatientName,null) !!}
                        </div>
                    @else
                        <div>
                            {!! Form::label('Admin view of name', 'Subject') !!}
                            {!! Form::select('patient_id',$newName,null) !!}
                        </div>
                    @endif
                </div>
                <div class="col">
                    <div class="col-md-2">
                        <h4> {!! Form::label('studyPeriod', 'Study Period') !!}</h4>
                    </div>
                    <div class="col-md-1">
                        <h4>{!! Form::select('studyPeriod',$studyPeriod,null) !!}</h4>
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
