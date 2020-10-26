 {!! Form::model($UrineTest,['route' => ['update.urinetest',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    {{--{{dd($UrineTest)}}--}}
    <h3>Urine Pregnancy Test</h3>
    <p>(Transcribed from Urine Logbook)</p>
    {!! Form::label('UPreg_male', 'Not Applicable for male') !!}
    {!! Form::checkbox('UPreg_male') !!}
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('UPreg_dateTaken', 'Date Taken: ') !!}
            {!! Form::date('UPreg_dateTaken', $UrineTest->UPreg_dateTaken)!!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('UPreg_TestTime', 'Test Time: ') !!}
            {!! Form::time('UPreg_TestTime', old('UPreg_TestTime')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('UPreg_ReadTime', 'Read Time: ') !!}
            {!! Form::time('UPreg_ReadTime', old('UPreg_ReadTime'))!!}
        </div>
    </div>
    <div>
        {{--<div class="form-group row">
            <div class="col-md-2">--}}
        {!! Form::label('upreg_laboratory', 'Laboratory: ') !!}
        {{--</div>
        <div class="col-md-1">--}}
        {!! Form::radio('upreg_laboratory', 'Sarawak General Hospital Heart Centre',(($UrineTest->UPreg_Laboratory)=='Sarawak General Hospital Heart Centre')? 'checked' : '') !!}
        {!! Form::label('testing','Sarawak General Hospital Heart Centre') !!}
        {{--</div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-2">--}}
        {!! Form::radio('upreg_laboratory', 'Other',(($UrineTest->UPreg_Laboratory)!='Sarawak General Hospital Heart Centre' && ($UrineTest->UPreg_Laboratory!=NULL))? 'checked' :'')!!}
        {!! Form::label('upreg_laboratory', 'Other') !!}
        {{--</div>
        <div class="col-md-3">--}}
        {!! Form::text('UPreg_Laboratory_Text',(($UrineTest->UPreg_Laboratory)!='Sarawak General Hospital Heart Centre')? $UrineTest->UPreg_Laboratory : '',['placeholder'=>'Please specify']) !!}
        {{--</div>
    </div>--}}
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
            {!! Form::label('UPreg_hCG', 'hCG: ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('UPreg_hCG', 'Positive') !!}
            {!! Form::label('UPreg_hCG', 'Positive ') !!}
            {!! Form::radio('UPreg_hCG', 'Negative') !!}
            {!! Form::label('UPreg_hCG', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('UPreg_hCG_Comment',($UrineTest->UPreg_hCG_Comment!=NULL)? $UrineTest->UPreg_hCG_Comment:'') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('UPreg_Transcribedby', 'Transcribed by (initial): ') !!}
            {!! Form::text('UPreg_Transcribedby', old('UPreg_Transcribedby ')) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <h3>Urine Drugs of Abuse Test</h3>
    <p>(Transcribed from Urine Logbook)</p>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
            {!! Form::date('UDrug_dateTaken', $UrineTest->UDrug_dateTaken) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
            {!! Form::time('UDrug_TestTime', old('UDrug_TestTime')) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
            {!! Form::time('UDrug_ReadTime', old('UDrug_ReadTime')) !!}
        </div>
    </div>
    <div>
        {!! Form::label('udrug_laboratory', 'Laboratory: ') !!}

        {!! Form::radio('udrug_laboratory', 'Sarawak General Hospital Heart Centre',(($UrineTest->UDrug_Laboratory)=='Sarawak General Hospital Heart Centre')? 'checked' : '') !!}
        {!! Form::label('udrug_laboratory', 'Sarawak General Hospital Heart Centre') !!}

        {!! Form::radio('udrug_laboratory', 'Other',($UrineTest->UDrug_Laboratory!='Sarawak General Hospital Heart Centre')? 'checked' :'') !!}
        {!! Form::label('udrug_laboratory', 'Other') !!}

        {!! Form::text('UDrug_Laboratory_Text',(($UrineTest->UDrug_Laboratory)!='Sarawak General Hospital Heart Centre')? $UrineTest->UDrug_Laboratory : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
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
            {!! Form::label('UDrug_Methamphetamine', 'Methamphetamine (mAMP): ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('UDrug_Methamphetamine', 'Positive') !!}
            {!! Form::label('UDrug_Methamphetamine', 'Positive ') !!}
            {!! Form::radio('UDrug_Methamphetamine', 'Negative') !!}
            {!! Form::label('UDrug_Methamphetamine', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('UDrug_Methamphetamine_Comment',($UrineTest->UDrug_Methamphetamine_Comment!=NULL)? $UrineTest->UDrug_Methamphetamine_Comment:'') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Morphine', 'Morphine (MOR): ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('UDrug_Morphine', 'Positive') !!}
            {!! Form::label('UDrug_Morphine', 'Positive ') !!}
            {!! Form::radio('UDrug_Morphine', 'Negative') !!}
            {!! Form::label('UDrug_Morphine', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('UDrug_Morphine_Comment',($UrineTest->UDrug_Morphine_Comment!=NULL)? $UrineTest->UDrug_Morphine_Comment:'') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::radio('UDrug_Marijuana', 'Positive') !!}
            {!! Form::label('UDrug_Marijuana', 'Positive ') !!}
            {!! Form::radio('UDrug_Marijuana', 'Negative') !!}
            {!! Form::label('UDrug_Marijuana', 'Negative ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('UDrug_Marijuana_Comment',($UrineTest->UDrug_Marijuana_Comment!=NULL)? $UrineTest->UDrug_Marijuana_Comment:'') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
            {!! Form::text('UDrug_Transcribedby', $UrineTest->UDrug_Transcribedby) !!}
        </div>
    </div>
</div>
<a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

