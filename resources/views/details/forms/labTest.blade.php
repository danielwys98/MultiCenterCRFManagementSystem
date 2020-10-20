{!! Form::model($LabTest,['route' => ['update.labtest',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    <h3>Laboratory Tests</h3>
    <p>(Laboratory Test Report attached in Appendix)</p>
    <h5>Blood (Haematology and Chemistry)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateBTaken', 'Date Blood Taken: ') !!}
            {!! Form::date('dateBTaken') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateLMTaken', 'Date Last Meal Taken: ') !!}
            {!! Form::date('dateLMTaken') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('TimeLMTaken', 'Time Last Meal Taken: ') !!}
            {!! Form::time('TimeLMTaken') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('describemeal', 'If within 8 hours, describe meal taken: ') !!}
            {!! Form::text('describemeal', old('describemeal')) !!}
        </div>
    </div>
    <div>
        {!! Form::label('Blood_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd',(old('Blood_Laboratory',$LabTest->Blood_Laboratory)=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
        {!! Form::label('Blood_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('Blood_Laboratory',(old('Blood_Laboratory',$LabTest->Blood_Laboratory)=='B.P. Clinical Lab Sdn Bhd')? '' : true) !!}
        {!! Form::label('Blood_Laboratory', 'Other, specify: ') !!}

        {!! Form::text('Blood_Laboratory_Text',(old('Blood_Laboratory',$LabTest->Blood_Laboratory)=='B.P. Clinical Lab Sdn Bhd')? '' : $LabTest->Blood_Laboratory) !!}
    </div>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('Blood_NAtest', 'Not Applicable') !!}
            {!! Form::checkbox('Blood_NAtest', 'Not Applicable') !!}
            {!! Form::label('Blood_NAtest', 'Repeated test: ') !!}
            {!! Form::text('Blood_NAtest', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Repeat_dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateBCollected') !!}
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
            {!! Form::date('dateUTaken') !!}
        </div>
    </div>
    <div>
        {!! Form::label('Urine_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd',
(old('Urine_Laboratory',$LabTest->Urine_Laboratory)=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
        {!! Form::label('Urine_Laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('Urine_Laboratory',
(old('Urine_Laboratory',$LabTest->Urine_Laboratory)=='B.P. Clinical Lab Sdn Bhd')? '' : true) !!}
        {!! Form::label('Urine_Laboratory', 'Other, specify: ') !!}

        {!! Form::text('Urine_Laboratory_Text',
(old('Urine_Laboratory',$LabTest->Urine_Laboratory)=='B.P. Clinical Lab Sdn Bhd')? '' : $LabTest->Urine_Laboratory) !!}
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
            {!! Form::label('Repeat_dateUCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateUCollected') !!}
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
