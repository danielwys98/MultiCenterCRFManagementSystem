{!! Form::open(['route' => ['store.serology',$patient->id]]) !!}
    @csrf
    {{--  serology test --}}
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
            {!! Form::label('Laboratory', 'Laboratory: ') !!}

            {!! Form::radio('laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'Laboratory_BP']) !!}
            {!! Form::label('laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

            {!! Form::radio('laboratory', 'Other','',['id'=>'Laboratory_Other']) !!}
            {!! Form::label('Laboratory_Other', 'Other: ') !!}

            {!! Form::text('laboratory_txt', '',['placeholder'=>'Please specify']) !!}
        </div>
    </div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
