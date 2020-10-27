{!! Form::open(['route' => ['store.conclusion',$patient->id]]) !!}
    @csrf
    {{-- conclusion --}}
    <div class="form-group">
        <h3>Conclusion</h3>
        <div class="row">
            <div class="col-sm-6">
                <p>Does the subject fulfill all the inclusion criteria and none of the exclusion
                    criteria?</p>
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
        {!! Form::text('NoDetails', '') !!} <br/>
        <div>
            {!! Form::checkbox('NAbnormality', 'Yes','',['id'=>'NAbnormality']) !!}
            {!! Form::label('NAbnormality', 'The abnormality (ies) not clinically significant, this subject can be enrolled into this study and is safe to receive ……………………………, the study medication. ') !!}
            {!! Form::select('study', $studies, null, ['class' => 'form-control']) !!}
        </div>
        <div>
            {!! Form::checkbox('abnormality', 'Yes','',['id'=>'abnormality']) !!}
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