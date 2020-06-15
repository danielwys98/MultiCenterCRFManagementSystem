<div class="form-group">
    <h3>Urine Pregnancy Test</h3>
    <p>(Transcribed from Urine Logbook)</p>
    {!! Form::label('male', 'Not Applicable for male') !!}
    {!! Form::checkbox('male', 'Not Applicable for male') !!}
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('TestTime', 'Test Time: ') !!}
            {!! Form::time('TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('Read Time', 'Read Time: ') !!}
            {!! Form::time('Read Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
        </div>
    </div>
    <div>
        {!! Form::label('Laboratory', 'Laboratory: ') !!}
        {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
        {!! Form::label('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
        {!! Form::radio('Laboratory', 'Other') !!}
        {!! Form::label('Laboratory', 'Other, specify: ') !!}
        {!! Form::text('Laboratory', '') !!}
    </div>
    <div class="row">
        <div class="col-sm-3">
            Test
        </div>
        <div class="col-sm-3">
            Result
        </div>
        <div class="col-sm-3">
            Comment
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('hCG', 'hCG: ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('hCG', 'Positive') !!}
            {!! Form::label('hCG', 'Positive ') !!}
            {!! Form::radio('hCG', 'Negative') !!}
            {!! Form::label('hCG', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('hCG', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('Transcribedby', 'Transcribed by (initial): ') !!}
            {!! Form::text('Transcribedby', '') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <h3>Urine Drugs of Abuse Test</h3>
    <p>(Transcribed from Urine Logbook)</p>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('TestTime', 'Test Time: ') !!}
            {!! Form::time('TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('Read Time', 'Read Time: ') !!}
            {!! Form::time('Read Time', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
        </div>
    </div>
    <div>
        {!! Form::label('Laboratory', 'Laboratory: ') !!}
        {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
        {!! Form::label('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
        {!! Form::radio('Laboratory', 'Other') !!}
        {!! Form::label('Laboratory', 'Other, specify: ') !!}
        {!! Form::text('Laboratory', '') !!}
    </div>
    <div class="row">
        <div class="col-sm-3">
            Test
        </div>
        <div class="col-sm-3">
            Result
        </div>
        <div class="col-sm-3">
            Comment
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Methamphetamine', 'Methamphetamine (mAMP): ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('Methamphetamine', 'Positive') !!}
            {!! Form::label('Methamphetamine', 'Positive ') !!}
            {!! Form::radio('Methamphetamine', 'Negative') !!}
            {!! Form::label('Methamphetamine', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('Methamphetamine', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Morphine', 'Morphine (MOR): ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('Morphine', 'Positive') !!}
            {!! Form::label('Morphine', 'Positive ') !!}
            {!! Form::radio('Morphine', 'Negative') !!}
            {!! Form::label('Morphine', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('Morphine', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Marijuana', 'Marijuana (THC): ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('Marijuana', 'Positive') !!}
            {!! Form::label('Marijuana', 'Positive ') !!}
            {!! Form::radio('Marijuana', 'Negative') !!}
            {!! Form::label('Marijuana', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('Marijuana', '') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('Transcribedby', 'Transcribed by (initial): ') !!}
            {!! Form::text('Transcribedby', '') !!}
        </div>
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

