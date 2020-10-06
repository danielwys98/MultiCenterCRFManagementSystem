{!! Form::model($InclusionExclusion,['route' => ['update.urinetest',$patient->id]]) !!}
@method('PUT')
<div class="form-group">
        <h3>Inclusion and Exclusion Criteria</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <p>There are a few criteria that didn't fill in. Please fill in all the criteria</p>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5>Inclusion Criteria</h5>
        <div class="row">
            <div class="col-sm-6">
                <p>Subject will be eligible for this study if all of the following inclusion criteria are
                    met:</p>
            </div>
            <div class="col-sm-3">
                <p>Yes</p>
            </div>
            <div class="col-sm-3">
                <p>No</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>1. Age within 18 - 55 years.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion01', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion01', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>2. Weight within the BMI of 18-30 kg/m2.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion02', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion02', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>3. Non-smoker.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion03', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion03', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>4. Able to complete the clinical study including the follow-up.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion04', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion04', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>5. Capable of providing written informed consent.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion05', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Inclusion05', 'No') !!}</p>
            </div>
        </div>

        <h5>Exclusion Criteria</h5>
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
        <div class="row">
            <div class="col-sm-6">
                <p>1. Breastfeeding female.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion01', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion01', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>2. Pregnancy test positive female.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion02', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion02', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>3. Systolic blood pressure outside 90-140 mmHg or diastolic blood pressure outside 50-90
                    mmHg.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion03', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion03', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>4. Bradycardia defined as symptomatic heart rate < 50 bpm or asymptomatic heart rate < 45 bpm
                    and tachycardia defined as heart rate > 100 bpm.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion04', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion04', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>5. Clinically significant ECG abnormalities.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion05', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion05', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>6. QTc > 450 ms for male and > 460 ms for female.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion06', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion06', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>7. A history of asthma and allergies, or any significant adverse reactions, to any
                    medications.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion07', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion07', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>8. Clinically significant medical history of eyes, ears, nose, throat, respiratory,
                    cardiovascular, gastrointestinal, genitourinary, neurological, haematopoietic, lymphatic,
                    endocrine, metabolic, dermatological, musculoskeletal, psychological, family history or
                    surgical history.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion08', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion08', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>9. A history of gastritis or peptic ulcer.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion09', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion09', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>10. Family history of sudden cardiac death.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion10', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion10', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>11. Clinically significant physical examination finding.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion11', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion11', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>12. Clinically significant laboratory abnormalities.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion12', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion12', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>13. Haemoglobin < 12.0 g/dL for male and < 11.0 g/dL for female at screening.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion13', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion13', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>14. Total bilirubin > 1.25 x upper limit of normal (unless it is an isolated elevation where
                    the direct bilirubin is ≤ 35% of total), ALT/AST > 1.5 x upper limit of normal, or CPK > 2 x
                    upper limit of normal.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion14', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion14', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>15. Hepatitis B, Hepatitis C or HIV positive.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion15', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion15', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>16. A history of drug or substance abuse, including alcohol (≥ 14 units per week) within 6
                    months before dosing (1 unit of alcohol equals approximately ½ pint [285 mL] of beer, 1
                    glass [125 mL] of wine, or 1 shot [25 mL] of spirit).</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion16', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion16', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>17. Urine DOA test positive.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion17', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion17', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>18. Breath alcohol test positive.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion18', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion18', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>19. Have taken any medications (including herbal remedies) within 7 days before dosing, with
                    the exception of birth control and other medications deemed acceptable by the
                    Investigator.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion19', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion19', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>20. Clinically significant illness or injury or hospitalisation for any reason within 28 days
                    before dosing.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion20', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion20', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>21. Participation in other clinical study involving a marketed or investigational drug within
                    28 days or 10 half-lives of the drug before dosing, whichever is longer.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion21', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion21', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>22. Donation of > 500 mL of plasma within 14 days before dosing; or donation or loss of whole
                    blood (excluding the amount of blood collected during screening) before dosing as
                    follows:</p>
                <p>- 50-300 mL within 28 days,</p>
                <p>- 301-500 mL within 42 days, or</p>
                <p>- > 500 mL within 84 days.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion22', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion22', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>23. Difficulty to swallow the study drug.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion23', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion23', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>24. Any other medical condition or reason that, in the opinion of the Investigator or
                    Research Physician, makes the subject unsuitable to participate in the clinical study.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion24', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion24', 'No') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>25. Female of childbearing potential having unprotected sexual intercourse with any
                    nonsterile male partner within 14 days before dosing; acceptable methods of contraception
                    include:</p>
                <p>- double barrier (1 by each partner), and at least 1 of these barriers (condom, cervical cap,
                    diaphragm or sponge) must contain spermicide,</p>
                <p>- hormonal (oral, injectable, transdermal, intravaginal or implantable),</p>
                <p>- intrauterine contraceptive system,</p>
                <p>- surgical (vasectomy or tubal ligation), or</p>
                <p>- sexual abstinence.</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion25', 'Yes') !!}</p>
            </div>
            <div class="col-sm-3">
                <p>{!! Form::radio('Exclusion25', 'No') !!}</p>
            </div>
        </div>
    </div>

    <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

