{!! Form::open(['route' => ['sp_Bat.store',$study->study_id]]) !!}
@csrf
{{--breath alcohol test starts here--}}
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasRole('Admin'))
            <div class="row">
                <div class="col-md-2">
                    <h4>{!! Form::label('SubjectName', 'Subject: ') !!}</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('Admin view of name', 'Subject: ') !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('patient_id',$newName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <h4> {!! Form::label('studyPeriod', 'Study Period: ') !!}</h4>
            </div>
            <div class="col-md-3">
                <h4>{!! Form::select('studyPeriod',$studyPeriod,null,['class'=>'form-control']) !!}</h4>
            </div>
        </div>
    </div>
</div>
<h3>Breath Alcohol Test</h3>
<p>(Transcribed from Breath Alcohol Test Logbook)</p>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
    <div class="col-md-1 offset-2">
        {!! Form::label('NApplicable', 'Not Applicable:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('NApplicable') !!}
    </div>
</div>
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
        {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre','',['id'=>'GH']) !!}
        {!! Form::label('GH','Sarawak General Hospital Heart Centre') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                {!! Form::radio('Laboratory','Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('Laboratory_text','',['class'=>'form-control','placeholder'=>'Please specify']) !!}
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
        <td>{!! Form::text('breathalcohol','',['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
        <td>
            {!! Form::radio('breathalcoholResult', 'Positive','',['id'=>'Positive']) !!}
            {!! Form::label('Positive', 'Positive') !!}
            {!! Form::radio('breathalcoholResult', 'Negative','',['id'=>'Negative']) !!}
            {!! Form::label('Negative', 'Negative') !!}
        </td>
    <tr>
        <th scope="row" colspan="2"
            class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
        <td>{!! Form::text('Usertranscribed','',['class'=>'form-control']) !!}</td>
    </tr>
    </tbody>
</table>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
