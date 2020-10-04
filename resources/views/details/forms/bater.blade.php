{!! Form::model($data,['route' => ['update.bater',$patient->id]]) !!}
    @method('PUT')
    <h3>Breath Alcohol Test</h3>
        <p>(Transcribed from Breath Alcohol Test Logbook)</p>
        <hr>
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}</div>
            <div class="col-md-2">
                {!! Form::date('dateTaken', old('dateTaken'),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::time('timeTaken', old('timeTaken'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('Laboratory', 'Laboratory:') !!}
            </div>
            <div class="col-md-1">
                {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre',(old('Laboratory')=='Sarawak General Hospital Heart Centre')? 'checked' : '') !!}
                {!! Form::label('Laboratory','Sarawak General Hospital Heart Centre') !!}
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::radio('Laboratory',(old('Laboratory')=='Others')? 'checked' : '') !!}
                        {!! Form::label('Laboratory', 'Others') !!}
                    </div>
                    <div class="col-md-3">
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
                <td>{!! Form::number('breathalcohol', old('breathalcohol'),['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
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
        <h3>Electrocardiogram Recording</h3>
        <p>(ECG Recording attached in Appendix)</p>
        <hr>
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('ECGdateTaken', 'Date Taken: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('ECGdateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('Conclusion', 'Conclusion: ') !!}
            </div>
            <div class="col-md-2">
            {!! Form::radio('Conclusion', 'Normal') !!}
            {!! Form::label('Conclusion', 'Normal') !!}
            </div>
            <div class="col-md-2">
            {!! Form::radio('Conclusion', 'Abnormal but not clinically significant') !!}
            {!! Form::label('Conclusion', 'Abnormal but not clinically significant') !!}
            </div>
            <div class="col-md-2">
            {!! Form::radio('Conclusion', 'Abnormal and clinically significant')!!}
            {!! Form::label('Conclusion', 'Abnormal and clinically significant') !!}
            </div>
        </div>
    <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
