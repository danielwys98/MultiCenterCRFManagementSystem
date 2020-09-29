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
            {!! Form::radio('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::label('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
            {!! Form::radio('UDrug_Laboratory', 'Other') !!}
            {!! Form::label('UDrug_Laboratory', 'Other, specify: ') !!}
            {!! Form::text('UDrug_Laboratory', '') !!}
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
                {!! Form::text('UDrug_Methamphetamine', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::radio('UDrug_Morphine', 'Positive') !!}
                {!! Form::label('UDrug_Morphine', 'Positive ') !!}
                {!! Form::radio('UDrug_Morphine', 'Negative') !!}
                {!! Form::label('UDrug_Morphine', 'Negative ') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::text('UDrug_Morphine', '') !!}
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
                {!! Form::text('UDrug_Marijuana', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
                {!! Form::text('UDrug_Transcribedby', '') !!}
            </div>
        </div>
    </div>

{{-- conclusion --}}
    <div class="form-group">
        <h3>Conclusion</h3>
        <div class="row">
            <div class="col-sm-6">
                <p>Does the subject obey all the restrictions and/or fulfill all the inclusion criteria and none of the exclusion criteria?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::label('inclusionYesNo', 'Yes') !!}</p>
                <p>{!! Form::radio('inclusionYesNo', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::label('inclusionYesNo', 'No') !!}</p>
                <p>{!! Form::radio('inclusionYesNo', 'No') !!}</p>
            </div>
        </div>
        <p>If “Yes”, continue with enrollment into the Study Period 1.</p>
        <p>If “No”, the subject may or may not be admitted into the study ward, based on the discretion of the investigator.</p>
        {!! Form::label('Comments', 'Comments') !!}
        {!! Form::textarea('Comments', '') !!}
        <div class="row">
            <div class="col-sm-6">
                <p>Is the subject fit for dosing?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::label('subjectFit', 'Yes') !!}</p>
                <p>{!! Form::radio('subjectFit', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::label('subjectFit', 'No') !!}</p>
                <p>{!! Form::radio('subjectFit', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
                {!! Form::text('physicianSign', '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('physicianName', 'Name (Printed) : ') !!}
                {!! Form::text('physicianName', '') !!}
            </div>
        </div>
    </div>