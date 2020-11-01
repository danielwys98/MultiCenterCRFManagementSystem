{!! Form::open(['route' => ['sp1IQuestionnaire48.store',$study->study_id]]) !!}
{{-- Interim Questionnaire(48 hours Post Dose Visit) --}}
<div class="form-group row">
    <div id="Admission" class="tab-pane fade in active">
                <div class="col">
                    @if(Auth::check() && Auth::user()->hasRole('Admin'))
                        <div>
                            {!! Form::label('SubjectName', 'Subject') !!}
                            {!! Form::select('patient_id',$oriPatientName,null) !!}
                        </div>
                    @else
                        <div>
                            {!! Form::label('Admin view of name', 'Subject') !!}
                            {!! Form::select('patient_id',$newName,null) !!}
                        </div>
                    @endif
                </div>
    </div>
</div>
<h3>Interim Questionnaire(48 hours Post Dose Visit)</h3>
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
        <p>{!! Form::radio('Interim48hrs01', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs01', 'No') !!}</p>
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
        <p>{!! Form::radio('Interim48hrs02', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs02', 'No') !!}</p>
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
        <p>{!! Form::radio('Interim48hrs03', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs03', 'No') !!}</p>
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
        {!! Form::text('Interim48hrs03txt', '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs04', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs04', 'No') !!}</p>
    </div>
</div>
<div class="row col">
    <p>If “No”, proceed to Question 5</p>
</div>
<div class="row">
    <div class="col-md-5">
        <p>If “Yes”, specify amount and time taken{!! Form::text('Interim48hrs04txt', '',['class'=>'form-control']) !!}</p>
    </div>
</div>
<hr>
{{-- Interim Question 5 --}}
<div class="row">
    <div class="col-md-6">
        <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim48hrs05', 'Yes') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim48hrs05', 'No') !!}
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
        {!! Form::text('Interim48hrs05txt', '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs06', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs06', 'No') !!}</p>
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
        {!! Form::text('Interim48hrs06txt', '',['class'=>'form-control']) !!}
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
        <p>{!! Form::radio('Interim48hrs07', 'Yes') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Interim48hrs07', 'No') !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        If “Yes”, provide details
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::text('Interim48hrs07txt', '',['class'=>'form-control']) !!}
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
        {!! Form::radio('Interim48hrs08', 'Yes') !!}
    </div>
    <div class="col-md-1">
        {!! Form::radio('Interim48hrs08', 'No') !!}
    </div>
    <div class="col-md-2">
        {!! Form::radio('Interim48hrs08', 'Not Applicable','',['id'=>'NA']) !!}
        {!! Form::label('NA','Not Applicable') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="offset-5 col-md-3">
        {!! Form::label('Interim48hrsInterviewedby', 'Interviewed by (initial): ') !!}
        {!! Form::text('Interim48hrsInterviewedby', '',['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('Interim48hrsCheckedby', 'Checked by (initial): ') !!}
        {!! Form::text('Interim48hrsCheckedby', '',['class'=>'form-control']) !!}
    </div>
</div>

{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}