{!! Form::open(['route' => ['store.labtest',$patient->id]]) !!}
    @csrf
    {{-- laboratory test--}}
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

            {!! Form::radio('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'Blood_Laboratory_BP']) !!}
            {!! Form::label('Blood_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}

            {!! Form::radio('Blood_Laboratory', 'Other','',['id'=>'Blood_Laboratory_Other']) !!}
            {!! Form::label('Blood_Laboratory_Other', 'Other: ') !!}

            {!! Form::text('Blood_Laboratory_Text', '',['placeholder'=>'Please specify']) !!}
        </div>

        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('Blood_NAtest', 'Not Applicable') !!}
                {!! Form::checkbox('Blood_NAtest', 'Not Applicable') !!}
                {!! Form::label('Blood_RepeatTest', 'Repeated test: ') !!}
                {!! Form::text('Blood_RepeatTest', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('Repeat_dateBCollected', 'Date Blood Collected: ') !!}
                {!! Form::date('Repeat_dateBCollected', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('BloodRepeat_Laboratory', 'Laboratory: ') !!}

            {!! Form::radio('BloodRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'BloodRepeat_Laboratory_BP']) !!}
            {!! Form::label('BloodRepeat_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}

            {!! Form::radio('BloodRepeat_Laboratory', 'Other','',['id'=>'BloodRepeat_Laboratory_Other']) !!}
            {!! Form::label('BloodRepeat_Laboratory_Other', 'Other: ') !!}

            {!! Form::text('BloodRepeat_Laboratory_Text', '',['placeholder'=>'Please specify']) !!}
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

            {!! Form::radio('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'Urine_Laboratory_BP']) !!}
            {!! Form::label('Urine_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}

            {!! Form::radio('Urine_Laboratory', 'Other','',['id'=>'Urine_Laboratory_Other']) !!}
            {!! Form::label('Urine_Laboratory_Other', 'Other: ') !!}

            {!! Form::text('Urine_Laboratory_Text', '',['placeholder'=>'Please specify']) !!}
        </div>
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('Urine_NAtest', 'Not Applicable') !!}
                {!! Form::checkbox('Urine_NAtest', 'Not Applicable') !!}
                {!! Form::label('Urine_RepeatTest', 'Repeated test: ') !!}
                {!! Form::text('Urine_RepeatTest', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('Repeat_dateUCollected', 'Date Urine Collected: ') !!}
                {!! Form::date('Repeat_dateUCollected', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div>
            {!! Form::label('UrineRepeat_Laboratory', 'Laboratory: ') !!}

            {!! Form::radio('UrineRepeat_Laboratory', 'B.P. Clinical Lab Sdn Bhd','',['id'=>'UrineRepeat_Laboratory_BP']) !!}
            {!! Form::label('UrineRepeat_Laboratory_BP', 'B.P. Clinical Lab Sdn Bhd') !!}

            {!! Form::radio('UrineRepeat_Laboratory', 'Other','',['id'=>'UrineRepeat_Laboratory_Other']) !!}
            {!! Form::label('UrineRepeat_Laboratory_Other', 'Other: ') !!}

            {!! Form::text('UrineRepeat_Laboratory_txt', '',['placeholder'=>'Please specify']) !!}
        </div>
    </div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}