<div class="page-break">
    <h3>Interim Questionnaire(96 hours Post Dose Visit)</h3>
    {{--    Interim Questionnaire 96 Starts here!--}}
    @if($IQ96->NApplicable == 1)
        <div class=" form-group row">
            <div class="col-md-2">
                <h3>Not Applicable</h3>
            </div>
        </div>
        <hr>
    @else
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('dateTaken', 'Date Taken: ') !!}
                {!! Form::label('dateTaken',($IQ96->dateTaken)) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('timeTaken', 'Time Taken: ') !!}
                {!! Form::label('timeTaken',($IQ96->timeTaken)) !!}
            </div>
        </div>

        {{-- Interim Question 1 --}}


        <div class="row">
            <div class="col-md-6">
                <p>1. Has the subject had any medical problems since last visit?</p>
                <p>{!! Form::label('interim96hrs01', ($IQ96->interim96hrs01)) !!}</p>
            </div>
        </div>
        <hr>

        {{-- Interim Question 2 --}}


        <div class="row">
            <div class="col-md-6">
                <p>2. Has the subject taken any medication (including herbal remedies), except birth control
                    medications and
                    other medications deemed acceptable by the Investigator other than study drug since last
                    visit?</p>
                <p>{!! Form::label('interim96hrs02', ($IQ96->interim96hrs02)) !!}</p>
            </div>
        </div>
        <hr>

        {{-- Interim Question 3 --}}


        <div class="row">
            <div class="col-md-6">
                <p>3. Has the subject consumed any alcohol or xanthine-containing food or beverage since
                    last visit?</p>
            </div>
        </div>
        @if($IQ96->interim96hrs03 != "No")
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs03txt',($IQ96->interim96hrs03)) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs03txt','No') !!}
                </div>
            </div>
        @endif
        <hr>

        {{-- Interim Question 4 --}}
        <div class="page-break">
            <div class="row">
                <div class="col-md-6">
                    <p>4. Has the subject consumed any food or beverage containing grapefruit (including
                        marmalade) or pomelo since
                        last visit?</p>
                </div>
            </div>
            @if($IQ96->interim96hrs04!="No")
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::label('interim96hrs04txt',($IQ96->interim96hrs04)) !!}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::label('interim96hrs03txt','No') !!}
                    </div>
                </div>
            @endif
        </div>
        <hr>

        {{-- Interim Question 5 --}}
        <div class="row">
            <div class="col-md-6">
                <p>5. Has the subject participated in other experimental drug studies since last visit?</p>
            </div>
        </div>
        @if($IQ96->interim96hrs05 != "No")
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs05txt',($IQ96->interim96hrs05)) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs03txt','No') !!}
                </div>
            </div>
        @endif
        <hr>

        {{-- Interim Question 6 --}}


        <div class="row">
            <div class="col-md-6">
                <p>6. Has the subject participated in donation of blood (excluding the volume of whole blood
                    that drawn during
                    the procedures of this study) since last visit:</p>
            </div>
        </div>
        @if($IQ96->interim96hrs06 != "No")
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs06txt',($IQ96->interim96hrs06)) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs03txt','No') !!}
                </div>
            </div>
        @endif
        <hr>

        {{-- Interim Question 7 --}}

        <div class="row">
            <div class="col-md-6">
                <p>7. For female subjects of childbearing potential only: Has the subject use of
                    non-acceptable methods of
                    contraception since last visit?</p>
            </div>
        </div>
        @if($IQ96->interim96hrs07 != "No")
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs07txt',($IQ96->interim96hrs07)) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('interim96hrs03txt','No') !!}
                </div>
            </div>
        @endif
        <hr>

        {{-- Interim Question 8 --}}

        <div class="row">
            <div class="col-md-6">
                <p>8. Does any event above potentially influence the PK or PD profile of study drug, or
                    increase the subject’s
                    risk if continue the study?</p>
                {!! Form::label('interim96hrs08', ($IQ96->interim96hrs08)) !!}
            </div>
        </div>
        <hr>

        {{--Interviewed and physician signature--}}

        <div class="form-group row">
            <div class="offset-5 col-md-3">
                {!! Form::label('interim96hrsInterviewedby', 'Interviewed by (initial): ') !!}
                {!! Form::label('interim96hrsInterviewedby',($IQ96->interim96hrsInterviewedby)) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('interim96hrsCheckedby', 'Checked by (initial): ') !!}
                {!! Form::label('interim96hrsCheckedby',($IQ96->interim96hrsCheckedby)) !!}
            </div>
        </div>
    @endif
</div>
