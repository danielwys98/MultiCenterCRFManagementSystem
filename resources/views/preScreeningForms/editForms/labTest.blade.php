{!! Form::model($LabTest,['route' => ['update.labtest',$patient->id]]) !!}
@method('PUT')
@csrf
<h3>Laboratory Tests</h3>
<p>(Laboratory Test Report attached in Appendix)</p>
<br>
<fieldset>
    <legend>Blood (Haematology and Chemistry)</legend>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('dateBTaken', 'Date Blood Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateBTaken',$LabTest->dateBTaken,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('dateLMTaken', 'Date Last Meal Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateLMTaken',$LabTest->dateLMTaken,['class'=>'form-control']) !!}
        </div>
        <div class="offset-1 col-md-2">
            {!! Form::label('TimeLMTaken', 'Time Last Meal Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('TimeLMTaken',$LabTest->TimeLMTaken,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('describemeal', 'If within 8 hours, describe meal taken: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('describemeal', $LabTest->describemeal,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('Blood_Laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('blood_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->Blood_Laboratory=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
            {!! Form::label('blood_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('blood_laboratory','Others',($LabTest->Blood_Laboratory!='B.P. Clinical Lab Sdn Bhd' && $LabTest->Blood_Laboratory==NULL)? 'checked' : '') !!}
            {!! Form::label('blood_laboratory', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('Blood_Laboratory_Text',($LabTest->Blood_Laboratory!='B.P. Clinical Lab Sdn Bhd')? $LabTest->Blood_Laboratory : '',['class'=>'form-control']) !!}
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
            {!! Form::text('Blood_RepeatTest', $LabTest->Blood_RepeatTest,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Repeat_dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateBCollected',$LabTest->Repeat_dateBCollected,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('bloodrepeat_laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('bloodrepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->BloodRepeat_Laboratory=='B.P. Clinical Lab Sdn Bhd')?'checked':'') !!}
            {!! Form::label('bloodrepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('bloodrepeat_laboratory', 'Other',($LabTest->BloodRepeat_Laboratory!='Sarawak General Hospital Heart Centre' && $LabTest->BloodRepeat_Laboratory!=NULL)?'checked':'') !!}
            {!! Form::label('bloodrepeat_laboratory', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('Bloodrepeat_Laboratory_Text', ($LabTest->BloodRepeat_Laboratory!='B.P. Clinical Lab Sdn Bhd' && $LabTest->BloodRepeat_Laboratory!=NULL)? $LabTest->BloodRepeat_Laboratory: '',['class'=>'form-control']) !!}
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
            {!! Form::date('dateUTaken',$LabTest->dateUTaken,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-1">
            {!! Form::label('urine_laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('urine_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->Urine_Laboratory=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
            {!! Form::label('urine_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('urine_laboratory','Other',($LabTest->Urine_Laboratory!='B.P. Clinical Lab Sdn Bhd' &&  $LabTest->Urine_Laboratory!=NULL)? 'checked' : '') !!}
            {!! Form::label('urine_laboratory', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('Urine_Laboratory_Text',($LabTest->Urine_Laboratory!='B.P. Clinical Lab Sdn Bhd')? $LabTest->Urine_Laboratory : '',['class'=>'form-control']) !!}
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
            {!! Form::text('Urine_RepeatTest',$LabTest->Urine_RepeatTest,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            {!! Form::label('Repeat_dateUCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateUCollected',$LabTest->Repeat_dateUCollected,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            {!! Form::label('urinerepeat_laboratory', 'Laboratory: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::radio('urinerepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->UrineRepeat_Laboratory=='B.P. Clinical Lab Sdn Bhd')?'checked':'') !!}
            {!! Form::label('urinerepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}
        </div>
        <div class="col-md-1">
            {!! Form::radio('urinerepeat_laboratory', 'Other',($LabTest->UrineRepeat_Laboratory!='B.P. Clinical Lab Sdn Bhd' && $LabTest->UrineRepeat_Laboratory!=NULL)?'checked':'') !!}
            {!! Form::label('urinerepeat_laboratory_other', 'Other: ') !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('UrineRepeat_Laboratory_Text',($LabTest->UrineRepeat_Laboratory!='B.P. Clinical Lab Sdn Bhd')? $LabTest->UrineRepeat_Laboratory : '',['class'=>'form-control']) !!}
        </div>
    </div>
</fieldset>
<a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
