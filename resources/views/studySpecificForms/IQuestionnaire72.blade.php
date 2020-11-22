{!! Form::open(['route' => ['sp_IQuestionnaire72.store',$study->study_id]]) !!}
@csrf
{{-- Interim Questionnaire(72 hours Post Dose Visit) --}}
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasAnyRoles(['Admin','superAdmin']))
            <div class="row">
                <div class="col-md-2">
                    <h4>{!! Form::label('SubjectName', 'Subject: ') !!}</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('Admin view of name', 'Subject: ') !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('patient_id',$newName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <h4> {!! Form::label('studyPeriod', 'Study Period: ') !!}</h4>
            </div>
            <div class="col-md-3">
                <h4>{!! Form::select('studyPeriod',$studyPeriod,null,['class'=>'form-control']) !!}</h4>
            </div>
        </div>
    </div>
</div>
<h3>Interim Questionnaire(72 hours Post Dose Visit)</h3>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
    <div class="col-md-1 offset-2">
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
        {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim72hrs01', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim72hrs01', 'No') !!}</p>
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
        <p>{!! Form::radio('Interim72hrs02', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim72hrs02', 'No') !!}</p>
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
        <p>{!! Form::radio('Interim72hrs03', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim72hrs03', 'No') !!}</p>
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
    {!! Form::text('Interim72hrs03txt', '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim72hrs04', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim72hrs04', 'No') !!}</p>
    </div>
</div>
<div class="row col">
        <p>If “No”, proceed to Question 5</p>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim72hrs04txt', '',['class'=>'form-control']) !!}</p>
    </div>
</div>
<hr>
{{-- Interim Question 5 --}}
<div class="row">
    <div class="col-md-6">
        <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim72hrs05', 'Yes') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim72hrs05', 'No') !!}
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
        {!! Form::text('Interim72hrs05txt', '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim72hrs06', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim72hrs06', 'No') !!}</p>
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
       {!! Form::text('Interim72hrs06txt', '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim72hrs07', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim72hrs07', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim72hrs07txt', '',['class'=>'form-control']) !!}
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
        {!! Form::radio('Interim72hrs08', 'Yes') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim72hrs08', 'No') !!}
    </div>
    <div class="col-md-2">
        {!! Form::radio('Interim72hrs08', 'Not Applicable','',['id'=>'NA']) !!}
        {!! Form::label('NA','Not Applicable') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="offset-5 col-md-3">
        {!! Form::label('Interim72hrsInterviewedby', 'Interviewed by (initial): ') !!}
        {!! Form::text('Interim72hrsInterviewedby', '',['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('Interim72hrsCheckedby', 'Checked by (initial): ') !!}
        {!! Form::text('Interim72hrsCheckedby', '',['class'=>'form-control']) !!}
    </div>
</div>

{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
