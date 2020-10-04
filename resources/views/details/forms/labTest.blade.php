
{!! Form::model($data2,['route' => ['update.labtest',$patient->id]]) !!}
@method('PUT')
<div class="form-group">
    <h3>Laboratory Tests</h3>
    <p>(Laboratory Test Report attached in Appendix)</p>
    <h5>Blood (Haematology and Chemistry)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateBTaken', 'Date Blood Taken: ') !!}
            {!! Form::date('dateBTaken', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateLMTaken', 'Date Last Meal Taken: ') !!}
            {!! Form::date('dateLMTaken', \Carbon\Carbon::now()) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('TimeLMTaken', 'Time Last Meal Taken: ') !!}
            {!! Form::time('TimeLMTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('describemeal', 'If within 8 hours, describe meal taken: ') !!}
            {!! Form::text('describemeal', '') !!}
        </div>
    </div>
    <div>
        {!! Form::label('Blood_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('Blood_Laboratory', 'Other') !!}
        {!! Form::label('Blood_Laboratory', 'Other, specify: ') !!}

        {!! Form::text('Blood_Laboratory_Text', '') !!}
    </div>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('NAtest', 'Not Applicable') !!}
            {!! Form::checkbox('NAtest', 'Not Applicable') !!}
            {!! Form::label('repeattest', 'Repeated test: ') !!}
            {!! Form::text('repeattest', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('dateBCollected', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div>
        {!! Form::label('BloodRepeat_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('BloodRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('BloodRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('BloodRepeat_Laboratory', 'Other') !!}
        {!! Form::label('BloodRepeat_Laboratory', 'Other, specify: ') !!}

        {!! Form::text('BloodRepeat_Laboratory_Text', '') !!}
    </div>

    <h5>Urine (Microbiology)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateUTaken', 'Date Urine Collected: ') !!}
            {!! Form::date('dateUTaken', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div>
        {!! Form::label('Urine_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('Urine_Laboratory', 'Other') !!}
        {!! Form::label('Urine_Laboratory', 'Other, specify: ') !!}

        {!! Form::text('Urine_Laboratory_Text', '') !!}
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('NAtest', 'Not Applicable') !!}
            {!! Form::checkbox('NAtest', 'Not Applicable') !!}
            {!! Form::label('repeattest', 'Repeated test: ') !!}
            {!! Form::text('repeattest', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('dateBCollected', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div>
        {!! Form::label('UrineRepeat_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('UrineRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('UrineRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('UrineRepeat_Laboratory', 'Other') !!}
        {!! Form::label('UrineRepeat_Laboratory', 'Other, specify: ') !!}

        {!! Form::text('UrineRepeat_Laboratory', '') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
