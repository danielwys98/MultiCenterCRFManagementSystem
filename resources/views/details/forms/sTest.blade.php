{!! Form::model($Serology,['route' => ['update.serology',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    <h3>Serology Test</h3>
    <p>(Laboratory Test Report attached in Appendix)</p>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateCTaken', 'Date of Consent Taken: ') !!}
            {!! Form::date('dateCTaken', \Carbon\Carbon::now()) !!}
        </div>
    </div>

    <h5>Blood (Hepatitis B and C & HIV Screening Test)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('dateBCollected', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div>
        {!! Form::label('laboratory', 'Laboratory: ') !!}
        {!! Form::radio('laboratory', 'B.P. Clinical Lab Sdn Bhd',(($Serology->Laboratory)=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
        {!! Form::label('laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('laboratory', 'Other',(($Serology->Laboratory)!='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
        {!! Form::label('laboratory', 'Other, specify: ') !!}

        {!! Form::text('laboratory_txt', (($Serology->Laboratory)!='B.P. Clinical Lab Sdn Bhd')? $Serology->Laboratory : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

