{!! Form::model($Conclu,['route' => ['update.conclusion',$patient->id]]) !!}
    @method('PUT')
<div class="form-group">
    <h3>Conclusion</h3>
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
    <div class="row">
        <div class="col-sm-6">
            <p>Does the subject fulfill all the inclusion criteria and none of the exclusion criteria?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::label('Yes', 'Yes') !!}</p>
            <p>{!! Form::radio('Yes', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::label('No', 'No') !!}</p>
            <p>{!! Form::radio('No', 'No') !!}</p>
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
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
