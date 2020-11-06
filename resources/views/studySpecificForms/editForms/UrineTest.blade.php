{!! Form::model($UrineTest,['route' => ['sp_UrineTest.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
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
        {!! Form::date('UPreg_dateTaken', old('UPreg_dateTaken',$UrineTest->UPreg_dateTaken)) !!}
    </div>
</div>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('UPreg_TestTime', 'Test Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UPreg_TestTime', old("UPreg_TestTime",$UrineTest->UPreg_TestTime)) !!}
    </div>
    <div class="offset-3 col-md-1">
        {!! Form::label('UPreg_ReadTime', 'Read Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UPreg_ReadTime', old("UPreg_ReadTime",$UrineTest->UPreg_ReadTime)) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('uPreg_Laboratory', 'Laboratory: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::radio('uPreg_Laboratory', 'Sarawak General Hospital Heart Centre',(($UrineTest->UPreg_Laboratory)=='Sarawak General Hospital Heart Centre')? 'checked' : '',['id'=>'Sarawak General Hospital Heart Centre']) !!}
        {!! Form::label('Sarawak General Hospital Heart Centre', 'Sarawak General Hospital Heart Centre') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                {!! Form::radio('uPreg_Laboratory', 'Other',(($UrineTest->UPreg_Laboratory)!='Sarawak General Hospital Heart Centre' && ($UrineTest->UPreg_Laboratory!=NULL))? 'checked' :'',['id'=>'Other']) !!}
                {!! Form::label('Other', 'Other: ') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('uPreg_Laboratory_Text',(($UrineTest->UPreg_Laboratory)!='Sarawak General Hospital Heart Centre')? $UrineTest->UPreg_Laboratory : '',['placeholder'=>'Please specify']) !!}
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
            {!! Form::radio('UPreg_hCG', 'Positive',(($UrineTest->UPreg_hCG)=='Positive')? 'checked' : '',['id'=>'hCG_P']) !!}
            {!! Form::label('hCG_P', 'Positive ') !!}
            {!! Form::radio('UPreg_hCG', 'Negative',(($UrineTest->UPreg_hCG)=='Negative')? 'checked' : '',['id'=>'hCG_N']) !!}
            {!! Form::label('hCG_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UPreg_hCG_Comment',old("UPreg_hCG_Comment",$UrineTest->UPreg_hCG_Comment),['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row" colspan="2" class="text-lg-right">
            {!! Form::label('UPreg_Transcribedby', 'Transcribed by (initial): ') !!}
        </th>
        <td>
            {!! Form::text('UPreg_Transcribedby',old("UPreg_ReadTime",$UrineTest->UPreg_Transcribedby),['class'=>'form-control']) !!}
        </td>
    </tr>
    </tbody>
</table>
<hr>
<h3>Urine Drugs of Abuse Test</h3>
<p>(Transcribed from Urine Logbook)</p>
<div class=" form-group row">
    <div class="col-md-2">
        {!! Form::label('NApplicable', 'Not Applicable:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('NApplicable') !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('UDrug_dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('UDrug_dateTaken',$UrineTest->UDrug_dateTaken) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('UDrug_TestTime', 'Test Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UDrug_TestTime',old("UPreg_ReadTime",$UrineTest->UDrug_TestTime),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('UDrug_ReadTime', 'Read Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('UDrug_ReadTime',old("UPreg_ReadTime",$UrineTest->UDrug_ReadTime),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('uDrug_Laboratory', 'Laboratory: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::radio('uDrug_Laboratory', 'Sarawak General Hospital Heart Centre',(($UrineTest->UDrug_Laboratory)=='Sarawak General Hospital Heart Centre')? 'checked' : '') !!}
        {!! Form::label('uDrug_Laboratory', 'Sarawak General Hospital Heart Centre') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                {!! Form::radio('uDrug_Laboratory', 'Other',(($UrineTest->UDrug_Laboratory)!='Sarawak General Hospital Heart Centre' && ($UrineTest->UDrug_Laboratory!=NULL))? 'checked' :'') !!}
                {!! Form::label('uDrug_Laboratory', 'Others') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('uDrug_Laboratory_Text',(($UrineTest->UDrug_Laboratory)!='Sarawak General Hospital Heart Centre')? $UrineTest->UDrug_Laboratory : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
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
            {!! Form::radio('UDrug_Methamphetamine', 'Positive',(($UrineTest->UDrug_Methamphetamine)=='Positive')? 'checked' : '',['id'=>'UDrug_Methamphetamine_P']) !!}
            {!! Form::label('UDrug_Methamphetamine_P', 'Positive ') !!}
            {!! Form::radio('UDrug_Methamphetamine', 'Negative',(($UrineTest->UDrug_Methamphetamine)=='Negative')? 'checked' : '',['id'=>'UDrug_Methamphetamine_N']) !!}
            {!! Form::label('UDrug_Methamphetamine_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UDrug_Methamphetamine_Comment',($UrineTest->UDrug_Methamphetamine_Comment!=NULL)? $UrineTest->UDrug_Methamphetamine_Comment:'',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::label('UDrug_Morphine', 'Morphine (MOR): ') !!}
        </th>
        <td>
            {!! Form::radio('UDrug_Morphine', 'Positive',(($UrineTest->UDrug_Morphine)=='Positive')? 'checked' : '',['id'=>'UDrug_Morphine_P']) !!}
            {!! Form::label('UDrug_Morphine_P', 'Positive ') !!}
            {!! Form::radio('UDrug_Morphine', 'Negative',(($UrineTest->UDrug_Morphine)=='Negative')? 'checked' : '',['id'=>'UDrug_Morphine_N']) !!}
            {!! Form::label('UDrug_Morphine_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UDrug_Morphine_Comment',($UrineTest->UDrug_Morphine_Comment!=NULL)? $UrineTest->UDrug_Morphine_Comment:'',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::label('UDrug_Marijuana', 'Marijuana (THC): ') !!}
        </th>
        <td>
            {!! Form::radio('UDrug_Marijuana', 'Positive',(($UrineTest->UDrug_Marijuana)=='Positive')? 'checked' : '',['id'=>'UDrug_Marijuana_P']) !!}
            {!! Form::label('UDrug_Marijuana_P', 'Positive ') !!}
            {!! Form::radio('UDrug_Marijuana', 'Negative',(($UrineTest->UDrug_Marijuana)=='Negative')? 'checked' : '',['id'=>'UDrug_Marijuana_N']) !!}
            {!! Form::label('UDrug_Marijuana_N', 'Negative ') !!}
        </td>
        <td>
            {!! Form::text('UDrug_Marijuana_Comment',($UrineTest->UDrug_Marijuana_Comment!=NULL)? $UrineTest->UDrug_Marijuana_Comment:'',['class'=>'form-control']) !!}
        </td>
    </tr>
    <tr>
        <th scope="row" colspan="2" class="text-lg-right">
            {!! Form::label('UDrug_Transcribedby', 'Transcribed by (initial): ') !!}
        </th>
        <td>
            {!! Form::text('UDrug_Transcribedby',old("UDrug_Transcribedby",$UrineTest->UDrug_Transcribedby),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('inclusionYesNo', 'Yes',(($UrineTest->inclusionYesNo)=='Yes')? 'checked' : '',['id'=>'inclusion_Y']) !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('inclusionYesNo', 'No',(($UrineTest->inclusionYesNo)=='No')? 'checked' : '',['id'=>'inclusion_N']) !!}</p>
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
            {!! Form::textarea('Comments',old("Comments",$UrineTest->Comments),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('subjectFit', 'Yes',(($UrineTest->subjectFit)=='Yes')? 'checked' : '',['id'=>'subjectFit_Y']) !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('subjectFit', 'No',(($UrineTest->subjectFit)=='No')? 'checked' : '',['id'=>'subjectFit_N']) !!}</p>
    </div>
</div>
<div class="form-group">
    <div class=" offset-5 col-md-3">
        {!! Form::label('physicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::text('physicianSign',old("physicianSign",$UrineTest->physicianSign),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class=" offset-5 col-md-3">
        {!! Form::label('physicianName', 'Name (Printed) : ') !!}
        {!! Form::text('physicianName',old("physicianName",$UrineTest->physicianName),['class'=>'form-control']) !!}
    </div>
</div>

{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
