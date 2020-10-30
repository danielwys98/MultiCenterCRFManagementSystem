{{-- urine drugs for abuse test --}}
<h3>Urine Pregnancy Test</h3>
<p>(Transcribed from Urine Logbook)</p>
<div class=" form-group row">
    <div class="col-md-2">
        {!! Form::label('UPreg_male', 'Not Applicable for male: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('UPreg_male') !!}
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('UPreg_dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('UPreg_dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('UPreg_TestTime', 'Test Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UPreg_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
    <div class="offset-3 col-md-1">
        {!! Form::label('UPreg_ReadTime', 'Read Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UPreg_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('UPreg_Laboratory', 'Laboratory: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::radio('UPreg_Laboratory', 'Sarawak General Hospital Heart Centre','',['id'=>'Sarawak General Hospital Heart Centre']) !!}
        {!! Form::label('Sarawak General Hospital Heart Centre', 'Sarawak General Hospital Heart Centre') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                {!! Form::radio('UPreg_Laboratory', 'Other','',['id'=>'Other']) !!}
                {!! Form::label('Other', 'Other: ') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('UPreg_Laboratory_Text', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
            Test
        </th>
        <th scope="col">
            Result
        </th>
        <th scope="col">
            Comment
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">
            {!! Form::label('UPreg_hCG', 'hCG: ') !!}
        </th>
        <td>
            {!! Form::radio('UPreg_hCG', 'Positive','',['id'=>'hCG_P']) !!}
            {!! Form::label('hCG_P', 'Positive ') !!}
            {!! Form::radio('UPreg_hCG', 'Negative','',['id'=>'hCG_N']) !!}
            {!! Form::label('hCG_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UPreg_hCG_Comment', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row" colspan="2" class="text-lg-right">
            {!! Form::label('UPreg_Transcribedby', 'Transcribed by (initial): ') !!}
        </th>
        <td>
            {!! Form::text('UPreg_Transcribedby', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    </tbody>
</table>
<hr>
<h3>Urine Drugs of Abuse Test</h3>
<p>(Transcribed from Urine Logbook)</p>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('UDrug_dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UDrug_TestTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UDrug_ReadTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('UDrug_Laboratory', 'Laboratory: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::radio('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
        {!! Form::label('UDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                {!! Form::radio('UDrug_Laboratory', 'Other') !!}
                {!! Form::label('UDrug_Laboratory', 'Others') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('UDrug_Laboratory_Text', '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Test</th>
        <th scope="col">Result</th>
        <th scope="col">Comment</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">
            {!! Form::label('UDrug_Methamphetamine', 'Methamphetamine (mAMP): ') !!}
        </th>
        <td>
            {!! Form::radio('UDrug_Methamphetamine', 'Positive','',['id'=>'UDrug_Methamphetamine_P']) !!}
            {!! Form::label('UDrug_Methamphetamine_P', 'Positive ') !!}
            {!! Form::radio('UDrug_Methamphetamine', 'Negative','',['id'=>'UDrug_Methamphetamine_N']) !!}
            {!! Form::label('UDrug_Methamphetamine_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UDrug_Methamphetamine_Comment', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
        </th>
        <td>
            {!! Form::radio('UDrug_Morphine', 'Positive','',['id'=>'UDrug_Morphine_P']) !!}
            {!! Form::label('UDrug_Morphine_P', 'Positive ') !!}
            {!! Form::radio('UDrug_Morphine', 'Negative','',['id'=>'UDrug_Morphine_N']) !!}
            {!! Form::label('UDrug_Morphine_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UDrug_Morphine_Comment', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
        </th>
        <td>
            {!! Form::radio('UDrug_Marijuana', 'Positive','',['id'=>'UDrug_Marijuana_P']) !!}
            {!! Form::label('UDrug_Marijuana_P', 'Positive ') !!}
            {!! Form::radio('UDrug_Marijuana', 'Negative','',['id'=>'UDrug_Marijuana_N']) !!}
            {!! Form::label('UDrug_Marijuana_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UDrug_Marijuana_Comment', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row" colspan="2" class="text-lg-right">
            {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
        </th>
        <td>
            {!! Form::text('UDrug_Transcribedby', '',['class'=>'form-control']) !!}
        </td>
    </tr>
    </tbody>
</table>
<hr>
{{-- conclusion --}}
<h3>Conclusion</h3>
<div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-1">
        <label for="inclusion_Y" class="font-weight-bold">Yes</label>
    </div>
    <div class="col-md-1">
        <label for="inclusion_N" class="font-weight-bold">No</label>
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-7">
        <p>Does the subject obey all the restrictions and/or fulfill all the inclusion criteria and none of the
            exclusion criteria?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('inclusionYesNo', 'Yes','',['id'=>'inclusion_Y']) !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('inclusionYesNo', 'No','',['id'=>'inclusion_N']) !!}</p>
    </div>
</div>
<div class="form-group row col">
    <p>If “Yes”, continue with enrollment into the Study Period 1.</p>
</div>
<div class="form-group row col">
    <p>If “No”, the subject may or may not be admitted into the study ward, based on the discretion of the
        investigator.</p>
</div>
<div class="form-group">
    <div class="row col">
        {!! Form::label('Comments', 'Comments') !!}
    </div>
    <div class="row">
        <div class="col-md-7">
            {!! Form::textarea('Comments', '',['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-1">
        <label for="subjectFit_Y" class="font-weight-bold">Yes</label>
    </div>
    <div class="col-md-1">
        <label for="subjectFit_N" class="font-weight-bold">No</label>
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-7">
        <p>Is the subject fit for dosing?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('subjectFit', 'Yes','',['id'=>'subjectFit_Y']) !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('subjectFit', 'No','',['id'=>'subjectFit_N']) !!}</p>
    </div>
</div>
<div class="form-group">
    <div class=" offset-5 col-md-3">
        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::text('physicianSign', '',['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class=" offset-5 col-md-3">
        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
        {!! Form::text('physicianName', '',['class'=>'form-control']) !!}
    </div>
</div>
