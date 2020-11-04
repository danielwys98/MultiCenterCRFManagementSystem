{!! Form::model($IQ96,['route' => ['sp_IQuestionnaire96.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
{{-- Interim Questionnaire(96 hours Post Dose Visit) --}}
<h3>Interim Questionnaire(96 hours Post Dose Visit)</h3>
<div class=" form-group row">
    <div class="col-md-2">
        {!! Form::label('NApplicable', 'Not Applicable:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('NApplicable') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('dateTaken',old("dateTaken",$IQ96->dateTaken),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken',old("timeTaken",$IQ96->timeTaken),['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    </div>
    <div class="col-md-1">
        <p>Yes</p>
    </div>
    <div class="col-md-1">
        <p>No</p>
    </div>
</div>


{{-- Interim Question 1 --}}
<div class="row">
    <div class="col-md-6">
        <p>1. Has the subject had any medical problems since last visit?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs01', 'Yes',(old('Interim96hrs01',$IQ96->interim96hrs01)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs01', 'No',(old('Interim96hrs01',$IQ96->interim96hrs01)!='Yes')? 'checked' : '') !!}</p>
    </div>
</div>
<div class="row col">
        <p>If “No”, proceed to Question 2</p>
</div>
<div class="row col">
        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
</div>
<hr>

{{-- Interim Question 2 --}}
<div class="row">
    <div class="col-md-6">
        <p>2. Has the subject taken any medication (including herbal remedies), except birth control medications and
            other medications deemed acceptable by the Investigator other than study drug since last visit?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs02', 'Yes',(old('Interim96hrs02',$IQ96->interim96hrs02)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs02', 'No',(old('Interim96hrs02',$IQ96->interim96hrs02)!='Yes')? 'checked' : '') !!}</p>
    </div>
</div>
<div class="row col">
        <p>If “No”, proceed to Question 3</p>
</div>
<div class="row col">
        <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
</div>
<hr>

{{-- Interim Question 3 --}}
<div class="row">
    <div class="col-md-6">
        <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since last visit?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs03', 'Yes',(old('Interim96hrs03',$IQ96->nterim96hrs03)=='Yes' && ($IQ96->interim96hrs03!=NULL))? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs03', 'No',(old('Interim96hrs03',$IQ96->interim96hrs03)!='Yes')? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row col">
    <p>If “No”, proceed to Question 4</p>
</div>
<div class="row col">
    If “Yes”, specify amount and time taken
</div>
<div class="row">
    <div class="col-md-5">
    {!! Form::text('Interim96hrs03txt',(old('Interim96hrs03', $IQ96->interim96hrs03)=='Yes')? $IQ96->interim96hrs03 : '',['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{-- Interim Question 4 --}}
<div class="row">
    <div class="col-md-6">
        <p>4. Has the subject consumed any food or beverage containing grapefruit (including marmalade) or pomelo since
            last visit?/p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs04', 'Yes',(old('interim96hrs04',$IQ96->interim96hrs04)!='No' && ($IQ96->interim96hrs04!=NULL))? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs04', 'No',(old('interim96hrs04',$IQ96->interim96hrs04)=='No')? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row col">
        <p>If “No”, proceed to Question 5</p>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim96hrs04txt',(old('interim96hrs04',$IQ96->interim96hrs04)!='No' && ($IQ96->interim96hrs04!=NULL))? $IQ96->interim96hrs04 :'',['class'=>'form-control']) !!}</p>
    </div>
</div>
<hr>
{{-- Interim Question 5 --}}
<div class="row">
    <div class="col-md-6">
        <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim96hrs05', 'Yes',(old('interim96hrs05',$IQ96->interim96hrs05)!='No' && ($IQ96->interim96hrs05!=NULL))? 'checked' : '') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim96hrs05', 'No',(old('interim96hrs05',$IQ96->interim96hrs05)=='No')? 'checked' :'') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “No”, proceed to Question 6</p>
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim96hrs05txt',(old('interim96hrs05',$IQ96->interim96hrs05)!='No' && ($IQ96->interim96hrs05!=NULL))? $IQ96->interim96hrs05 :'',['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{-- Interim Question 6 --}}
<div class="row">
    <div class="col-md-6">
        <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood that drawn during
            the procedures of this study) since last visit:</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs06', 'Yes',(old('interim96hrs06',$IQ96->interim96hrs06)!='No' && ($IQ96->interim96hrs06!=NULL))? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs06', 'No',(old('interim96hrs06',$IQ96->interim96hrs06)=='No')? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <p>If “No”, proceed to Question 7</p>
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim96hrs06txt',(old('interim96hrs06',$IQ96->interim96hrs06)!='No' && ($IQ96->interim96hrs06!=NULL))? $IQ96->interim96hrs06 :'',['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{-- Interim Question 7 --}}
<div class="row">
    <div class="col-md-6">
        <p>7. For female subjects of childbearing potential only: Has the subject use of non-acceptable methods of
            contraception since last visit?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs07', 'Yes',(old('interim96hrs07',$IQ96->interim96hrs07)!='No' && ($IQ96->interim96hrs07!=NULL))? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim96hrs07', 'No',(old('interim96hrs07',$IQ96->interim96hrs07)=='No')? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim96hrs07txt',(old('interim96hrs07',$IQ96->interim96hrs07)!='No' && ($IQ96->interim96hrs07!=NULL))? $IQ96->interim96hrs07 :'',['class'=>'form-control']) !!}
    </div>
</div>
<hr>
{{-- Interim Question 8 --}}
<div class="row">
    <div class="col-md-6">
        <p>8. Does any event above potentially influence the PK or PD profile of study drug, or increase the subject’s
            risk if continue the study?</p>
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim96hrs08', 'Yes',(old('interim96hrs08',$IQ96->interim96hrs08)=='Yes')? 'checked' : '') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim96hrs08', 'No',(old('interim96hrs08',$IQ96->interim96hrs08)=='No')? 'checked' :'') !!}
    </div>
    <div class="col-md-2">
        {!! Form::radio('Interim96hrs08', 'Not Applicable',(old('interim96hrs08',$IQ96->interim96hrs08)=='Not Applicable')? 'checked' :'') !!}
        {!! Form::label('NA','Not Applicable') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="offset-5 col-md-3">
        {!! Form::label('Interim96hrsInterviewedby', 'Interviewed by (initial): ') !!}
        {!! Form::text('Interim96hrsInterviewedby',($IQ96->Interim96hrsInterviewedby!=NULL)? $IQ96->Interim96hrsInterviewedby:'',['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('Interim96hrsCheckedby', 'Checked by (initial): ') !!}
        {!! Form::text('Interim96hrsCheckedby',($IQ96->Interim96hrsCheckedby!=NULL)? $IQ96->Interim96hrsCheckedby:'',['class'=>'form-control']) !!}
    </div>
</div>

{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}