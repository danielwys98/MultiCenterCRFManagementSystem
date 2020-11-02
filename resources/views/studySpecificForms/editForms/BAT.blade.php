{!! Form::model($BAT,['route' => ['sp1bat.update',$patient->id,$study_id]]) !!}
    @method('PUT')
    @csrf
{{--breath alcohol test starts here--}}
<h3>Breath Alcohol Test</h3>
<p>(Transcribed from Breath Alcohol Test Logbook)</p>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}</div>
    <div class="col-md-2">
        {!! Form::date('dateTaken',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('Laboratory', 'Laboratory:') !!}
    </div>
    <div class="col-md-3">
        {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre',(old('Laboratory')=='Sarawak General Hospital Heart Centre')? 'checked' : '') !!}
        {!! Form::label('Laboratory','Sarawak General Hospital Heart Centre') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                {!! Form::radio('Laboratory','Others') !!}
                {!! Form::label('Laboratory', 'Others') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('Laboratory_text', old('laboratory'),['class'=>'form-control','placeholder'=>'Please specify']) !!}
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Test</th>
        <th scope="col">%BAC</th>
        <th scope="col">Result</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{!! Form::label('breathalcohol', 'Breath Alcohol: ') !!}</th>
        <td>{!! Form::text('breathalcohol', old('breathalcohol'),['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
        <td>
            {!! Form::radio('breathalcoholResult', 'Positive',(old('breathalcoholResult')=='Positive')? 'checked' : '') !!}
            {!! Form::label('breathalcoholResult', 'Positive') !!}
            {!! Form::radio('breathalcoholResult', 'Negative',(old('breathalcoholResult')=='Negative')? 'checked' : '') !!}
            {!! Form::label('breathalcoholResult', 'Negative') !!}
        </td>
    <tr>
        <th scope="row" colspan="2"
            class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
        <td>{!! Form::text('Usertranscribed', old('Usertranscribed'),['class'=>'form-control']) !!}</td>
    </tr>
    </tbody>
</table>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
