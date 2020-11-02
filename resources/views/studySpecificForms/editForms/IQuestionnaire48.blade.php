{!! Form::model($IQ48,['route' => ['sp_IQuestionnaire48.update',$patient->id,$study_id]]) !!}
@method('PUT')
@csrf
{{-- Interim Questionnaire(48 hours Post Dose Visit) --}}
<h3>Interim Questionnaire(48 hours Post Dose Visit)</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('dateTaken',old("dateTaken",$IQ48->dateTaken),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken',old("dateTaken",$IQ48->dateTaken),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs01', 'Yes',(($IQ48->Interim48hrs01)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs01', 'No',(($IQ48->Interim48hrs01)=='No')? 'checked' : '') !!}</p>
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
        <p>{!! Form::radio('Interim48hrs02', 'Yes',(($IQ48->Interim48hrs02)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs02', 'No',(($IQ48->Interim48hrs02)=='No')? 'checked' : '') !!}</p>
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
        <p>{!! Form::radio('Interim48hrs03', 'Yes',(($IQ48->Interim48hrs03)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs03', 'No',(($IQ48->Interim48hrs03)!='Yes' && ($IQ48->Interim48hrs03!=NULL))? 'checked' :'') !!}</p>
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
    {!! Form::text('Interim48hrs03txt',(($IQ48->Interim48hrs03)!='Yes')? $IQ48->Interim48hrs03 : '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs04', 'Yes',(($IQ48->Interim48hrs04)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs04', 'No',(($IQ48->Interim48hrs04)!='Yes' && ($IQ48->Interim48hrs04!=NULL))? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row col">
        <p>If “No”, proceed to Question 5</p>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim48hrs04txt',(($IQ48->Interim48hrs04)!='Yes' && ($IQ48->Interim48hrs04!=NULL))? 'checked' :'',['class'=>'form-control']) !!}</p>
    </div>
</div>
<hr>
{{-- Interim Question 5 --}}
<div class="row">
    <div class="col-md-6">
        <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim48hrs05', 'Yes',(($IQ48->Interim48hrs05)=='Yes')? 'checked' : '') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim48hrs05', 'No',(($IQ48->Interim48hrs05)!='Yes' && ($IQ48->Interim48hrs05!=NULL))? 'checked' :'') !!}
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
        {!! Form::text('Interim48hrs05txt',(($IQ48->Interim48hrs05)!='Yes')? $IQ48->Interim48hrs05 : '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs06', 'Yes',(($IQ48->Interim48hrs06)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs06', 'No',(($IQ48->Interim48hrs06)!='Yes' && ($IQ48->Interim48hrs06!=NULL))? 'checked' :'') !!}</p>
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
       {!! Form::text('Interim48hrs06txt',(($IQ48->Interim48hrs06)!='Yes')? $IQ48->Interim48hrs06 : '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs07', 'Yes',(($IQ48->Interim48hrs07)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs07', 'No',(($IQ48->Interim48hrs07)!='Yes' && ($IQ48->Interim48hrs07!=NULL))? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim48hrs07txt',(($IQ48->Interim48hrs07)!='Yes')? $IQ48->Interim48hrs07 : '',['class'=>'form-control']) !!}
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
        {!! Form::radio('Interim48hrs08', 'Yes',(($IQ48->Interim48hrs08)=='Yes')? 'checked' : '') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim48hrs08', 'No',(($IQ48->Interim48hrs08)=='No')? 'checked' : '') !!}
    </div>
    <div class="col-md-2">
        {!! Form::radio('Interim48hrs08', 'Not Applicable',(($IQ48->Interim48hrs08)=='Not Applicable')? 'checked' : '',['id'=>'NA']) !!}
        {!! Form::label('NA','Not Applicable') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="offset-5 col-md-3">
        {!! Form::label('Interim48hrsInterviewedby', 'Interviewed by (initial): ') !!}
        {!! Form::text('Interim48hrsInterviewedby',($IQ48->Interim48hrsInterviewedby!=NULL)? $IQ48->Interim48hrsInterviewedby:'',['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('Interim48hrsCheckedby', 'Checked by (initial): ') !!}
        {!! Form::text('Interim48hrsCheckedby',($IQ48->Interim48hrsCheckedby!=NULL)? $IQ48->Interim48hrsCheckedby:'',['class'=>'form-control']) !!}
    </div>
</div>

{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}