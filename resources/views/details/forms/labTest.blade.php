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
        {!! Form::label('Laboratory', 'Laboratory: ') !!}
        {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::radio('Laboratory', 'Other') !!}
        {!! Form::label('Laboratory', 'Other, specify: ') !!}
        {!! Form::text('Laboratory', '') !!}
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
        {!! Form::label('Laboratory', 'Laboratory: ') !!}
        {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::radio('Laboratory', 'Other') !!}
        {!! Form::label('Laboratory', 'Other, specify: ') !!}
        {!! Form::text('Laboratory', '') !!}
    </div>

    <h5>Urine (Microbiology)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateUTaken', 'Date Urine Collected: ') !!}
            {!! Form::date('dateUTaken', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div>
        {!! Form::label('Laboratory', 'Laboratory: ') !!}
        {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::radio('Laboratory', 'Other') !!}
        {!! Form::label('Laboratory', 'Other, specify: ') !!}
        {!! Form::text('Laboratory', '') !!}
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
        {!! Form::label('Laboratory', 'Laboratory: ') !!}
        {!! Form::radio('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::label('Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        {!! Form::radio('Laboratory', 'Other') !!}
        {!! Form::label('Laboratory', 'Other, specify: ') !!}
        {!! Form::text('Laboratory', '') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
