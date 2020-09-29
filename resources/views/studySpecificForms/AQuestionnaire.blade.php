<h5>Admission Questionnaire</h5>
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
            <p>Subject will not be eligible for this study if any of the following exclusion criteria are
                met:</p>
        </div>
        <div class="col-sm-3">
            <p>Yes</p>
        </div>
        <div class="col-sm-3">
            <p>No</p>
        </div>
    </div>

    {{-- Admission Question 1 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>1.	Has the subject had any medical problems within the last 7 days before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission01', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission01', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “No”, proceed to next question.</p>
            <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem significantly increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0101', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0101', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the medical problem potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0102', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0102', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 2 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>2.	Has the subject taken any medication (including herbal remedies, with the exception of birth control medications) within 7 days before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission02', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission02', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “No”, proceed to next question.</p>
            <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication significantly increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0201', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0201', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of medication potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0202', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0202', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 3 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>3.	Has the subject been hospitalized within 4 weeks before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission03', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission03', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “No”, proceed to next question.</p>
            <p>If “Yes”, record in Adverse Event and Concomitant Medication Log.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the hospitalization significantly increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0301', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0301', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the hospitalization potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0302', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0302', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 4 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>4.	Has the subject consumed any alcohol or xanthine-containing food or beverage within 24 hours before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission04', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission04', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, specify amount and time taken</p>
            <p>If “No”, proceed to next question.</p>
        </div>
        <div class="col-sm-3">
            {!! Form::text('Admission04yes', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of alcohol or xanthine potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0401', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0401', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 5 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>5.	Has the subject consumed any food or beverage containing poppy seeds within 48 hours before drugs of abuse test? </p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission05', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission05', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, specify amount and time taken</p>
            <p>If “No”, proceed to next question.</p>
        </div>
        <div class="col-sm-3">
            {!! Form::text('Admission05yes', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of poppy seeds potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0501', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0501', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 6 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>6.	Has the subject consumed any food or beverage containing grapefruit (including marmalade) and pomelo within 7 days before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission06', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission06', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, specify amount and time taken</p>
            <p>If “No”, proceed to next question.</p>
        </div>
        <div class="col-sm-3">
            {!! Form::text('Admission06yes', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of grapefruit (including marmalade) or pomelo potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0601', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0601', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 7 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>7.	Has the subject participated in other experimental drug studies within 4 weeks before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission07', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission07', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, provide details</p>
            <p>If “No”, proceed to next question.</p>
        </div>
        <div class="col-sm-3">
            {!! Form::text('Admission07yes', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the participation significantly increase the subject’s risk if enrolled in the study</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0701', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0701', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the participation potentially influence the pharmacokinetic profile of the study drug?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0702', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0702', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 8 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>8.    Has the subject participated in donation of (excluding the volume of whole blood that will be drawn during the screening procedures of this study):</p>
            <ul>
                <li>Plasma (500 mL) within the last 14 days, or</li>
                <li>50 mL to 300 mL of whole blood within the last 28 days, or</li>
                <li>301 mL to 500 mL of whole blood within the last 42 days, or</li>
                <li>more than 500 mL of whole blood within 84 days before dosing?</li>
            </ul>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission08', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission08', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, provide details</p>
            <p>If “No”, proceed to next section.</p>
        </div>
        <div class="col-sm-3">
            {!! Form::text('Admission08yes', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the donation potentially increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0801', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0801', 'No') !!}</p>
        </div>
    </div>

    {{-- Admission Question 9 --}}
    <div class="row">
        <div class="col-sm-6">
            <p>9.   Has the subject use of non-acceptable methods of contraception within 14 days before dosing?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission09', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission09', 'No') !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>If “Yes”, provide details</p>
            <p>If “No”, proceed to next section.</p>
        </div>
        <div class="col-sm-3">
            {!! Form::text('Admission09yes', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>Can the use of this method potentially increase the subject’s risk if enrolled in the study?</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0901', 'Yes') !!}</p>
        </div>
        <div class="col-sm-3">
            <p>{!! Form::radio('Admission0901', 'No') !!}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('PhysicianInitial', 'Physician’s Initial: ') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('PhysicianInitial', old('Usertranscribed'),['class'=>'form-control']) !!}
        </div>
    </div>