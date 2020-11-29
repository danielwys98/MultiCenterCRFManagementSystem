{!! Form::open(['route' => ['store.labtest',$patient->id]]) !!}
@csrf
{{-- laboratory test--}}
<h3>Laboratory Tests</h3>
<p>(Laboratory Test Report attached in Appendix)</p>
<br>
<fieldset>
    <legend>Blood (Haematology and Chemistry)</legend>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('dateBTaken', 'Date Blood Taken:') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateBTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('dateLMTaken', 'Date Last Meal Taken:') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateLMTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class="offset-1 col-md-2">
            {!! Form::label('TimeLMTaken', 'Time Last Meal Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('TimeLMTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('describemeal', 'If within 8 hours, describe meal taken:') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('describemeal', '',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('Blood_Laboratory', 'Laboratory:') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'Blood_Laboratory_BP']) !!}
            {!! Form::label('Blood_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Blood_Laboratory', 'Other','',['id'=>'Blood_Laboratory_Other']) !!}
            {!! Form::label('Blood_Laboratory_Other', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('Blood_Laboratory_Text', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
        </div>
    </div>
</fieldset>

<fieldset>
    <legend>Repeated Blood Test</legend>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::checkbox('Blood_NAtest', 'Not Applicable') !!}
            {!! Form::label('Blood_NAtest', 'Not Applicable') !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Blood_RepeatTest', 'Repeated test: ') !!}
            {!! Form::text('Blood_RepeatTest', '',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Repeat_dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateBCollected', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('BloodRepeat_Laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('BloodRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'BloodRepeat_Laboratory_BP']) !!}
            {!! Form::label('BloodRepeat_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('BloodRepeat_Laboratory', 'Other','',['id'=>'BloodRepeat_Laboratory_Other']) !!}
            {!! Form::label('BloodRepeat_Laboratory_Other', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('BloodRepeat_Laboratory_Text', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Urine (Microbiology)</legend>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('dateUTaken', 'Date Urine Collected: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateUTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('Urine_Laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'Urine_Laboratory_BP']) !!}
            {!! Form::label('Urine_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Urine_Laboratory', 'Other','',['id'=>'Urine_Laboratory_Other']) !!}
            {!! Form::label('Urine_Laboratory_Other', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('Urine_Laboratory_Text', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Repeated Urine Test</legend>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::checkbox('Urine_NAtest', 'Not Applicable') !!}
            {!! Form::label('Urine_NAtest', 'Not Applicable') !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Urine_RepeatTest', 'Repeated test: ') !!}
            {!! Form::text('Urine_RepeatTest', '',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Repeat_dateUCollected', 'Date Urine Collected: ') !!}
            {!! Form::date('Repeat_dateUCollected', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
        {!! Form::label('UrineRepeat_Laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
        {!! Form::radio('UrineRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'UrineRepeat_Laboratory_BP']) !!}
        {!! Form::label('UrineRepeat_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
        {!! Form::radio('UrineRepeat_Laboratory', 'Other','',['id'=>'UrineRepeat_Laboratory_Other']) !!}
        {!! Form::label('UrineRepeat_Laboratory_Other', 'Other: ') !!}
        </div>
        <div class="col-md-3">
        {!! Form::text('UrineRepeat_Laboratory_txt', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
        </div>
    </div>
</fieldset>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
