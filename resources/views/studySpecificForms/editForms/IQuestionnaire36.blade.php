{!! Form::model($IQ36,['route' => ['spIQuestionnaire36.update',$patient->id,$study_id]]) !!}
    @method('PUT')
    @csrf
{{-- Interim Questionnaire(36 hours Post Dose Visit) --}}
<h3>Interim Questionnaire(36 hours Post Dose Visit)</h3>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('dateTaken',old("dateTaken",$IQ36->dateTaken),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken',old("dateTaken",$IQ36->dateTaken),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim36hrs01', 'Yes',(($IQ36->Interim36hrs01)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim36hrs01', 'No',(($IQ36->Interim36hrs01)=='No')? 'checked' : '') !!}</p>
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
        <p>{!! Form::radio('Interim36hrs02', 'Yes',(($IQ36->Interim36hrs02)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim36hrs02', 'No',(($IQ36->Interim36hrs02)=='No')? 'checked' : '') !!}</p>
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
        <p>{!! Form::radio('Interim36hrs03', 'Yes',(($IQ36->Interim36hrs03)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim36hrs03', 'No',(($IQ36->Interim36hrs03)!='Yes' && ($IQ36->Interim36hrs03!=NULL))? 'checked' :'') !!}</p>
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
    {!! Form::text('Interim36hrs03txt',(($IQ36->Interim36hrs03)!='Yes')? $IQ36->Interim36hrs03 : '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim36hrs04', 'Yes',(($IQ36->Interim36hrs04)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim36hrs04', 'No',(($IQ36->Interim36hrs04)!='Yes' && ($IQ36->Interim36hrs04!=NULL))? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row col">
        <p>If “No”, proceed to Question 5</p>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim36hrs04txt',(($IQ36->Interim36hrs04)!='Yes' && ($IQ36->Interim36hrs04!=NULL))? 'checked' :'',['class'=>'form-control']) !!}</p>
    </div>
</div>
<hr>
{{-- Interim Question 5 --}}
<div class="row">
    <div class="col-md-6">
        <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim36hrs05', 'Yes',(($IQ36->Interim36hrs05)=='Yes')? 'checked' : '') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim36hrs05', 'No',(($IQ36->Interim36hrs05)!='Yes' && ($IQ36->Interim36hrs05!=NULL))? 'checked' :'') !!}
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
        {!! Form::text('Interim36hrs05txt',(($IQ36->Interim36hrs05)!='Yes')? $IQ36->Interim36hrs05 : '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim36hrs06', 'Yes',(($IQ36->Interim36hrs06)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim36hrs06', 'No',(($IQ36->Interim36hrs06)!='Yes' && ($IQ36->Interim36hrs06!=NULL))? 'checked' :'') !!}</p>
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
       {!! Form::text('Interim36hrs06txt',(($IQ36->Interim36hrs06)!='Yes')? $IQ36->Interim36hrs06 : '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim36hrs07', 'Yes',(($IQ36->Interim36hrs07)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim36hrs07', 'No',(($IQ36->Interim36hrs07)!='Yes' && ($IQ36->Interim36hrs07!=NULL))? 'checked' :'') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim36hrs07txt',(($IQ36->Interim36hrs07)!='Yes')? $IQ36->Interim36hrs07 : '',['class'=>'form-control']) !!}
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
        {!! Form::radio('Interim36hrs08', 'Yes',(($IQ36->Interim36hrs08)=='Yes')? 'checked' : '') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim36hrs08', 'No',(($IQ36->Interim36hrs08)=='No')? 'checked' : '') !!}
    </div>
    <div class="col-md-2">
        {!! Form::radio('Interim36hrs08', 'Not Applicable',(($IQ36->Interim36hrs08)=='Not Applicable')? 'checked' : '',['id'=>'NA']) !!}
        {!! Form::label('NA','Not Applicable') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="offset-5 col-md-3">
        {!! Form::label('Interim36hrsInterviewedby', 'Interviewed by (initial): ') !!}
        {!! Form::text('Interim36hrsInterviewedby',($IQ36->Interim36hrsInterviewedby!=NULL)? $IQ36->Interim36hrsInterviewedby:'',['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('Interim36hrsCheckedby', 'Checked by (initial): ') !!}
        {!! Form::text('Interim36hrsCheckedby',($IQ36->Interim36hrsCheckedby!=NULL)? $IQ36->Interim36hrsCheckedby:'',['class'=>'form-control']) !!}
    </div>
</div>

{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}