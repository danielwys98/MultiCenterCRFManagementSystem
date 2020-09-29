{{-- Interim Questionnaire(36 hours Post Dose Visit) --}}
    <div class="form-group">
        <h3>Interim Questionnaire(36 hours Post Dose Visit)</h3>
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
            <div class="col-sm-6">
            </div>
            <div class="col-sm-3">
                <p>Yes</p>
            </div>
            <div class="col-sm-3">
                <p>No</p>
            </div>
        </div>


        {{-- Interim Question 1 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>1.	Has the subject had any medical problems since last visit?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs01', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs01', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “No”, proceed to Question 2</p>
                <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
            </div>
        </div>
        {{-- Interim Question 2 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>2.	Has the subject taken any medication (including herbal remedies), except birth control medications and other medications deemed acceptable by the Investigator other than study drug since last visit?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs02', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs02', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “No”, proceed to Question 3</p>
                <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
            </div>
        </div>
        {{-- Interim Question 3 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>3.	Has the subject consumed any alcohol or xanthine-containing food or beverage since last visit?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs03', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs03', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “No”, proceed to Question 4</p>
                <p>If “Yes”, specify amount and time taken{!! Form::text('Interim36hrs03txt', '') !!}</p>
            </div>
        </div>
        {{-- Interim Question 4 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>4.    Has the subject consumed any food or beverage containing grapefruit (including marmalade) or pomelo since last visit?/p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs04', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs04', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “No”, proceed to Question 5</p>
                <p>If “Yes”, specify amount and time taken{!! Form::text('Interim36hrs04txt', '') !!}</p>
            </div>
        </div>
        {{-- Interim Question 5 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>5.	Has the subject participated in other experimental drug studies since last visit?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs05', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs05', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “No”, proceed to Question 6</p>
                <p>If “Yes”, provide details{!! Form::text('Interim36hrs05txt', '') !!}</p>
            </div>
        </div>
        {{-- Interim Question 6 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>6.	Has the subject participated in donation of blood (excluding the volume of whole blood that drawn during the procedures of this study) since last visit:</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs06', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs06', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “No”, proceed to Question 7</p>
                <p>If “Yes”, provide details{!! Form::text('Interim36hrs06txt', '') !!}</p>
            </div>
        </div>
        {{-- Interim Question 7 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>7.   For female subjects of childbearing potential only: Has the subject use of non-acceptable methods of contraception since last visit?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs07', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs05', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>If “Yes”, provide details{!! Form::text('Interim36hrs03txt', '') !!}</p>
            </div>
        </div>
        {{-- Interim Question 8 --}}
        <div class="row">
            <div class="col-sm-6">
                <p>8.   Does any event above potentially influence the PK or PD profile of study drug, or increase the subject’s risk if continue the study?</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs08', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs08', 'No') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Interim36hrs08', 'Not Applicable') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('Interim36hrsInterviewedby', 'Interviewed by (initial): ') !!}
                {!! Form::text('Interim36hrsInterviewedby', '') !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('Interim36hrsCheckedby', 'Checked by (initial): ') !!}
                {!! Form::text('Interim36hrsCheckedby', '') !!}
            </div>
        </div>
    </div>