{!! Form::open(['route' => ['store.bater',$patient->id]]) !!}
    @csrf
    {{--breath alcohol test --}}
    <h3>Breath Alcohol Test</h3>
    <p>(Transcribed from Breath Alcohol Test Logbook)</p>
    <hr>
    {{-- date and time --}}
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}</div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>
    </div>
    {{-- end date and time --}}
    {{-- laboratory --}}
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('Laboratory', 'Laboratory:') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::label('Laboratory', 'Sarawak General Hospital Heart Centre') !!}
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-2">
                    {!! Form::radio('Laboratory', 'Others','',['id'=>'Others']) !!}
                    {!! Form::label('Others', 'Others') !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('Laboratory_text', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
                </div>
            </div>
        </div>
    </div>
    {{-- end laboratory --}}
    {{-- breath alcohol --}}
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
            <td>{!! Form::number('breathalcohol', '',['class'=>'form-control','placeholder'=>'0.000']) !!}</td>
            <td>
                {!! Form::radio('breathalcoholResult', 'Positive','',['id'=>'Positive']) !!}
                {!! Form::label('Positive', 'Positive ') !!}
                {!! Form::radio('breathalcoholResult', 'Negative','',['id'=>'Negative']) !!}
                {!! Form::label('Negative', 'Negative ') !!}
            </td>
        <tr>
            <th scope="row" colspan="2"
                class="text-lg-right">{!! Form::label('Transcribedby', 'Transcribed by: ') !!}</th>
            <td>{!! Form::text('Usertranscribed', '',['class'=>'form-control']) !!}</td>
        </tr>
        </tbody>
    </table>
    {{-- end breath alcohol --}}
    {{-- electrocardiogram recording --}}
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
    {{-- end electrocardiogram recording --}}
    {{-- breath alcohol test conculsion --}}
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('Conclusion', 'Conclusion: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('Conclusion', 'Normal','',['id'=>'Normal']) !!}
            {!! Form::label('Normal', 'Normal') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('Conclusion', 'Abnormal but not clinically significant ','',['id'=>'AbnormalN']) !!}
            {!! Form::label('AbnormalN', 'Abnormal but not clinically significant ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('Conclusion', 'Abnormal and clinically significant','',['id'=>'Abnormal']) !!}
            {!! Form::label('Abnormal', 'Abnormal and clinically significant') !!}
        </div>
    </div>
    {{-- end breath alcohol test conculsion --}}
    
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}