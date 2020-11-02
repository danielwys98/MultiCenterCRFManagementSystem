{!! Form::model($Admission,['route' => ['sp1Admission.update',$patient->id,$study_id]]) !!}
    @method('PUT')
    @csrf
<h3>Admission</h3>
<hr>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('AdmissionDateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('AdmissionDateTaken',old('AdmissionDateTaken',$admission->AdmissionDateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('AdmissionTimeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('AdmissionTimeTaken', old('AdmissionTimeTaken',$admission->AdmissionTimeTaken),['class'=>'form-control']) !!}
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
            {!! Form::date('ConsentDateTaken',old('ConsentDateTaken',$admission->ConsentDateTaken),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('ConsentTimeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('ConsentTimeTaken',old('ConsentTimeTaken',$admission->ConsentTimeTaken),['class'=>'form-control']) !!}
        </div>
    </div>
{!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
