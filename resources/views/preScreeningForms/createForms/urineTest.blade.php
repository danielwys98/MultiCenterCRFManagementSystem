{!! Form::open(['route' => ['store.urinetest',$patient->id]]) !!}
    @csrf
    {{-- urine pregnancy test --}}
    <div class="form-group">
        <h3>Urine Pregnancy Test</h3>
        <p>(Transcribed from Urine Logbook)</p>
        {!! Form::label('UPreg_male', 'Not Applicable for male') !!}
        {!! Form::checkbox('UPreg_male') !!}
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UPreg_dateTaken', 'Date Taken: ') !!}
                {!! Form::date('UPreg_dateTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UPreg_TestTime', 'Test Time: ') !!}
                {!! Form::time('UPreg_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('UPreg_ReadTime', 'Read Time: ') !!}
                {!! Form::time('UPreg_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
        </div>
        <div>
            {!! Form::label('UPreg_Laboratory', 'Laboratory: ') !!}

            {!! Form::radio('UPreg_Laboratory', 'Sarawak General Hospital Heart Centre','',['id'=>'Sarawak General Hospital Heart Centre']) !!}
            {!! Form::label('Sarawak General Hospital Heart Centre', 'Sarawak General Hospital Heart Centre') !!}

            {!! Form::radio('UPreg_Laboratory', 'Other','',['id'=>'Other']) !!}
            {!! Form::label('Other', 'Other: ') !!}

            {!! Form::text('UPreg_Laboratory_Text', '',['placeholder'=>'Please specify']) !!}
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
                {!! Form::radio('UPreg_hCG', 'Positive','',['id'=>'hCG_Positive']) !!}
                {!! Form::label('hCG_Positive', 'Positive ') !!}
                {!! Form::radio('UPreg_hCG', 'Negative','',['id'=>'hCG_Negative']) !!}
                {!! Form::label('hCG_Negative', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('UPreg_hCG_Comment', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('UPreg_Transcribedby', 'Transcribed by (initial): ') !!}
                {!! Form::text('UPreg_Transcribedby', '') !!}
            </div>
        </div>
    </div>

    {{-- urine drugs for abuse test --}}
    <div class="form-group">
        <h3>Urine Drugs of Abuse Test</h3>
        <p>(Transcribed from Urine Logbook)</p>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
                {!! Form::date('UDrug_dateTaken', \Carbon\Carbon::now()) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
                {!! Form::time('UDrug_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
                {!! Form::time('UDrug_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s')) !!}
            </div>
        </div>
        <div>
            {!! Form::label('UDrug_Laboratory', 'Laboratory: ') !!}

            {!! Form::radio('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre','',['id'=>'UDrug_Laboratory_SGHHC']) !!}
            {!! Form::label('UDrug_Laboratory_SGHHC', 'Sarawak General Hospital Heart Centre') !!}

            {!! Form::radio('UDrug_Laboratory', 'Other','',['id'=>'UDrug_Laboratory_Other']) !!}
            {!! Form::label('UDrug_Laboratory_Other', 'Other: ') !!}

            {!! Form::text('UDrug_Laboratory_Text', '',['placeholder'=>'Please specify']) !!}
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
                {!! Form::radio('UDrug_Methamphetamine', 'Positive','',['id'=>'UDrug_Methamphetamine_Positive']) !!}
                {!! Form::label('UDrug_Methamphetamine_Positive', 'Positive ') !!}

                {!! Form::radio('UDrug_Methamphetamine', 'Negative','',['id'=>'UDrug_Methamphetamine_Negative']) !!}
                {!! Form::label('UDrug_Methamphetamine_Negative', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('UDrug_Methamphetamine_Comment', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('UDrug_Morphine', 'Positive','',['id'=>'UDrug_Morphine_Positive']) !!}
                {!! Form::label('UDrug_Morphine_Positive', 'Positive ') !!}

                {!! Form::radio('UDrug_Morphine', 'Negative','',['id'=>'UDrug_Morphine_Negative']) !!}
                {!! Form::label('UDrug_Morphine_Negative', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('UDrug_Morphine_Comment', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('UDrug_Marijuana', 'Positive','',['id'=>'UDrug_Marijuana_Positive']) !!}
                {!! Form::label('UDrug_Marijuana_Positive', 'Positive ') !!}

                {!! Form::radio('UDrug_Marijuana', 'Negative','',['id'=>'UDrug_Marijuana_Negative']) !!}
                {!! Form::label('UDrug_Marijuana_Negative', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('UDrug_Marijuana_Comment', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
                {!! Form::text('UDrug_Transcribedby', '') !!}
            </div>
        </div>
    </div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}