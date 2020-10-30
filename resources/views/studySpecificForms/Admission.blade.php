{!! Form::open(['route' => ['testing.store',$study->study_id]]) !!}
{{-- admission --}}
<div class="form-group row">
    <div id="Admission" class="tab-pane fade in active">
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
    </div>
</div>
<h3>Admission</h3>
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
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
