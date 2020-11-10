@extends('MasterLayout')

@section('content')
{!! Form::model($ConclusionP,['route'=>['updateConclusionP',$PID,$study_id]]) !!}
<div class="col-md-2">
    {!! Form::submit('Generate Report',['class'=>'btn btn-success','onclick'=>'are you sure?','name'=>'submitbutton'])!!}
    {{--<button name="test" value="test"><a href="{{route('testing')}}"></a> Follow Up Questionnaire</button>--}}
</div>
    <h3>Conclusion of Participation</h3>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Pre-study Screening</th>
            <th scope="col">Study Period 1</th>
            <th scope="col">Study Period 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {!! Form::checkbox('Pre_Reserve', 'Reserve Subject',(old('Pre_Reserve',$ConclusionP->Pre_Reserve)!=NULL)? 'checked': '',['id'=>'Pre_Reserve']) !!}
                {!! Form::label('Pre_Reserve', 'Reserve Subject') !!}
                <br>
                {!! Form::checkbox('Pre_Yes', 'Yes',(old('Pre_Yes',$ConclusionP->Pre_Yes)!=NULL)? 'checked': '',['id'=>'Pre_Yes']) !!}
                {!! Form::label('Pre_Yes', 'Yes') !!}
                <br>
                {!! Form::label('Pre_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('Pre_SubDecision', 'Subject Decision',(old('Pre_SubDecision',$ConclusionP->Pre_SubDecision)!=NULL)? 'checked': '',['id'=>'Pre_SubDecision']) !!}
                {!! Form::label('Pre_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('Pre_PhyDecision', 'Physician Decision',(old('Pre_PhyDecision',$ConclusionP->Pre_PhyDecision)!=NULL)? 'checked': '',['id'=>'Pre_PhyDecision']) !!}
                {!! Form::label('Pre_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('Pre_Exclusion', 'Entry Criteria Exclusion',(old('Pre_Exclusion',$ConclusionP->Pre_Exclusion)!=NULL)? 'checked': '',['id'=>'Pre_Exclusion']) !!}
                {!! Form::label('Pre_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('Pre_ProtoViolation', 'Protocol Violation',(old('Pre_ProtoViolation',$ConclusionP->Pre_ProtoViolation)!=NULL)? 'checked': '',['id'=>'Pre_ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('Pre_Lost', 'Lost to Follow Up',(old('Pre_Lost',$ConclusionP->Pre_Lost)!=NULL)? 'checked': '',['id'=>'Pre_Lost']) !!}
                {!! Form::label('Pre_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('Pre_Adverse', 'Adverse Event',(old('Pre_Adverse',$ConclusionP->Pre_Adverse)!=NULL)? 'checked': '',['id'=>'Pre_Adverse']) !!}
                {!! Form::label('Pre_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('Pre_Death', 'Death',(old('Pre_Death',$ConclusionP->Pre_Death)!=NULL)? 'checked': '',['id'=>'Pre_Death']) !!}
                {!! Form::label('Pre_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('Pre_Others', 'Others',(old('Pre_Others',$ConclusionP->Pre_others)!=NULL)? 'checked': '',['id'=>'Pre_Others']) !!}
                {!! Form::label('Pre_Others', 'Others: ') !!}
                <br>
                {!! Form::text('Pre_Others_text',(old('Pre_Others_text',$ConclusionP->Pre_others_text)),['class'=>'form-control']) !!}
            </td>

            <td>
                {!! Form::checkbox('SP1_Yes', 'Yes',(old('SP1_Yes',$ConclusionP->SP1_Yes)!=NULL)? 'checked': '',['id'=>'SP1_Yes']) !!}
                {!! Form::label('SP1_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP1_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP1_SubDecision', 'Subject Decision',(old('SP1_SubDecision',$ConclusionP->SP1_SubDecision)!=NULL)? 'checked': '',['id'=>'SP1_SubDecision']) !!}
                {!! Form::label('SP1_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP1_PhyDecision', 'Physician Decision',(old('SP1_PhyDecision',$ConclusionP->SP1_PhyDecision)!=NULL)? 'checked': '',['id'=>'SP1_PhyDecision']) !!}
                {!! Form::label('SP1_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP1_Exclusion', 'Entry Criteria Exclusion',(old('SP1_Exclusion',$ConclusionP->SP1_Exclusion)!=NULL)? 'checked': '',['id'=>'SP1_Exclusion']) !!}
                {!! Form::label('SP1_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP1_ProtoViolation', 'Protocol Violation',(old('SP1_ProtoViolation',$ConclusionP->SP1_ProtoViolation)!=NULL)? 'checked': '',['id'=>'SP1_ProtoViolation']) !!}
                {!! Form::label('SP1_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP1_Lost', 'Lost to Follow Up',(old('SP1_Lost',$ConclusionP->SP1_Lost)!=NULL)? 'checked': '',['id'=>'SP1_Lost']) !!}
                {!! Form::label('SP1_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP1_Adverse', 'Adverse Event',(old('SP1_Adverse',$ConclusionP->SP1_Adverse)!=NULL)? 'checked': '',['id'=>'SP1_Adverse']) !!}
                {!! Form::label('SP1_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP1_Death', 'Death',(old('SP1_Death',$ConclusionP->SP1_Death)!=NULL)? 'checked': '',['id'=>'SP1_Death']) !!}
                {!! Form::label('SP1_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP1_Others', 'Others',(old('SP1_Others',$ConclusionP->SP1_others)!=NULL)? 'checked': '',['id'=>'SP1_Others']) !!}
                {!! Form::label('SP1_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP1_Others_text',(old('SP1_Others_text',$ConclusionP->SP1_others_text)),['class'=>'form-control']) !!}
            </td>
            {{--Study Period 2--}}
            <td>
                {!! Form::checkbox('SP2_Yes', 'Yes',(old('SP2_Yes',$ConclusionP->SP2_Yes)!=NULL)? 'checked': '',['id'=>'SP2_Yes']) !!}
                {!! Form::label('SP2_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP2_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP2_SubDecision', 'Subject Decision',(old('SP2_SubDecision',$ConclusionP->SP2_SubDecision)!=NULL)? 'checked': '',['id'=>'SP2_SubDecision']) !!}
                {!! Form::label('SP2_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP2_PhyDecision', 'Physician Decision',(old('SP2_PhyDecision',$ConclusionP->SP2_PhyDecision)!=NULL)? 'checked': '',['id'=>'SP2_PhyDecision']) !!}
                {!! Form::label('SP2_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP2_Exclusion', 'Entry Criteria Exclusion',(old('SP2_Exclusion',$ConclusionP->SP2_Exclusion)!=NULL)? 'checked': '',['id'=>'SP2_Exclusion']) !!}
                {!! Form::label('SP2_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP2_ProtoViolation', 'Protocol Violation',(old('SP2_ProtoViolation',$ConclusionP->SP2_ProtoViolation)!=NULL)? 'checked': '',['id'=>'SP2_ProtoViolation']) !!}
                {!! Form::label('SP2_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP2_Lost', 'Lost to Follow Up',(old('SP2_Lost',$ConclusionP->SP2_Lost)!=NULL)? 'checked': '',['id'=>'SP2_Lost']) !!}
                {!! Form::label('SP2_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP2_Adverse', 'Adverse Event',(old('SP2_Adverse',$ConclusionP->SP2_Adverse)!=NULL)? 'checked': '',['id'=>'SP2_Adverse']) !!}
                {!! Form::label('SP2_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP2_Death', 'Death',(old('SP2_Death',$ConclusionP->SP2_Death)!=NULL)? 'checked': '',['id'=>'SP2_Death']) !!}
                {!! Form::label('SP2_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP2_Others', 'Others',(old('SP2_Others',$ConclusionP->SP2_others)!=NULL)? 'checked': '',['id'=>'SP2_Others']) !!}
                {!! Form::label('SP2_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP2_Others_text',(old('SP2_Others_text',$ConclusionP->SP2_others_text)),['class'=>'form-control']) !!}
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Study Period 3</th>
            <th scope="col">Study Period 4</th>
            <th scope="col">Safety Follow Up</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {{--Study Period 3--}}
            <td>
                {!! Form::checkbox('SP3_Yes', 'Yes',(old('SP3_Yes',$ConclusionP->SP3_Yes)!=NULL)? 'checked': '',['id'=>'SP3_Yes']) !!}
                {!! Form::label('SP3_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP3_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP3_SubDecision', 'Subject Decision',(old('SP3_SubDecision',$ConclusionP->SP3_SubDecision)!=NULL)? 'checked': '',['id'=>'SP3_SubDecision']) !!}
                {!! Form::label('SP3_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP3_PhyDecision', 'Physician Decision',(old('SP3_PhyDecision',$ConclusionP->SP3_PhyDecision)!=NULL)? 'checked': '',['id'=>'SP3_PhyDecision']) !!}
                {!! Form::label('SP3_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP3_Exclusion', 'Entry Criteria Exclusion',(old('SP3_Exclusion',$ConclusionP->SP3_Exclusion)!=NULL)? 'checked': '',['id'=>'SP3_Exclusion']) !!}
                {!! Form::label('SP3_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP3_ProtoViolation', 'Protocol Violation',(old('SP3_ProtoViolation',$ConclusionP->SP3_ProtoViolation)!=NULL)? 'checked': '',['id'=>'SP3_ProtoViolation']) !!}
                {!! Form::label('SP3_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP3_Lost', 'Lost to Follow Up',(old('SP3_Lost',$ConclusionP->SP3_Lost)!=NULL)? 'checked': '',['id'=>'SP3_Lost']) !!}
                {!! Form::label('SP3_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP3_Adverse', 'Adverse Event',(old('SP3_Adverse',$ConclusionP->SP3_Adverse)!=NULL)? 'checked': '',['id'=>'SP3_Adverse']) !!}
                {!! Form::label('SP3_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP3_Death', 'Death',(old('SP3_Death',$ConclusionP->SP3_Death)!=NULL)? 'checked': '',['id'=>'SP3_Death']) !!}
                {!! Form::label('SP3_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP3_Others', 'Others',(old('SP3_Others',$ConclusionP->SP3_others)!=NULL)? 'checked': '',['id'=>'SP3_Others']) !!}
                {!! Form::label('SP3_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP3_Others_text',(old('SP3_Others_text',$ConclusionP->SP3_others_text)),['class'=>'form-control']) !!}
            </td>
            {{--Study Period 4--}}
            <td>
                {!! Form::checkbox('SP4_Yes', 'Yes',(old('SP4_Yes',$ConclusionP->SP4_Yes)!=NULL)? 'checked': '',['id'=>'SP4_Yes']) !!}
                {!! Form::label('SP4_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP4_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP4_SubDecision', 'Subject Decision',(old('SP4_SubDecision',$ConclusionP->SP4_SubDecision)!=NULL)? 'checked': '',['id'=>'SP4_SubDecision']) !!}
                {!! Form::label('SP4_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP4_PhyDecision', 'Physician Decision',(old('SP4_PhyDecision',$ConclusionP->SP4_PhyDecision)!=NULL)? 'checked': '',['id'=>'SP4_PhyDecision']) !!}
                {!! Form::label('SP4_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP4_Exclusion', 'Entry Criteria Exclusion',(old('SP4_Exclusion',$ConclusionP->SP4_Exclusion)!=NULL)? 'checked': '',['id'=>'SP4_Exclusion']) !!}
                {!! Form::label('SP4_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP4_ProtoViolation', 'Protocol Violation',(old('SP4_ProtoViolation',$ConclusionP->SP4_ProtoViolation)!=NULL)? 'checked': '',['id'=>'SP4_ProtoViolation']) !!}
                {!! Form::label('SP4_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP4_Lost', 'Lost to Follow Up',(old('SP4_Lost',$ConclusionP->SP4_Lost)!=NULL)? 'checked': '',['id'=>'SP4_Lost']) !!}
                {!! Form::label('SP4_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP4_Adverse', 'Adverse Event',(old('SP4_Adverse',$ConclusionP->SP4_Adverse)!=NULL)? 'checked': '',['id'=>'SP4_Adverse']) !!}
                {!! Form::label('SP4_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP4_Death', 'Death',(old('SP4_Death',$ConclusionP->SP4_Death)!=NULL)? 'checked': '',['id'=>'SP4_Death']) !!}
                {!! Form::label('SP4_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP4_Others', 'Others',(old('SP4_Others',$ConclusionP->SP4_others)!=NULL)? 'checked': '',['id'=>'SP4_Others']) !!}
                {!! Form::label('SP4_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP4_Others_text',(old('SP4_Others_text',$ConclusionP->SP4_others_text)),['class'=>'form-control']) !!}
            </td>
            {{--Follow Up--}}
            <td>
                {!! Form::checkbox('Fol_Yes', 'Yes',(old('Fol_Yes',$ConclusionP->Fol_Yes)!=NULL)? 'checked': '',['id'=>'Fol_Yes']) !!}
                {!! Form::label('Fol_Yes', 'Yes') !!}
                <br>
                {!! Form::label('Fol_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('Fol_SubDecision', 'Subject Decision',(old('Fol_SubDecision',$ConclusionP->Fol_SubDecision)!=NULL)? 'checked': '',['id'=>'Fol_SubDecision']) !!}
                {!! Form::label('Fol_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('Fol_PhyDecision', 'Physician Decision',(old('Fol_PhyDecision',$ConclusionP->Fol_PhyDecision)!=NULL)? 'checked': '',['id'=>'Fol_PhyDecision']) !!}
                {!! Form::label('Fol_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('Fol_Exclusion', 'Entry Criteria Exclusion',(old('Fol_Exclusion',$ConclusionP->Fol_Exclusion)!=NULL)? 'checked': '',['id'=>'Fol_Exclusion']) !!}
                {!! Form::label('Fol_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('Fol_ProtoViolation', 'Protocol Violation',(old('Fol_ProtoViolation',$ConclusionP->Fol_ProtoViolation)!=NULL)? 'checked': '',['id'=>'Fol_ProtoViolation']) !!}
                {!! Form::label('Fol_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('Fol_Lost', 'Lost to Follow Up',(old('Fol_Lost',$ConclusionP->Fol_Lost)!=NULL)? 'checked': '',['id'=>'Fol_Lost']) !!}
                {!! Form::label('Fol_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('Fol_Adverse', 'Adverse Event',(old('Fol_Adverse',$ConclusionP->Fol_Adverse)!=NULL)? 'checked': '',['id'=>'Fol_Adverse']) !!}
                {!! Form::label('Fol_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('Fol_Death', 'Death',(old('Fol_Death',$ConclusionP->Fol_Death)!=NULL)? 'checked': '',['id'=>'Fol_Death']) !!}
                {!! Form::label('Fol_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('Fol_Others', 'Others',(old('Fol_Others',$ConclusionP->Fol_others)!=NULL)? 'checked': '',['id'=>'Fol_Others']) !!}
                {!! Form::label('Fol_Others', 'Others: ') !!}
                <br>
                {!! Form::text('Fol_Others_text',(old('Fol_Others_text',$ConclusionP->Fol_others_text)),['class'=>'form-control']) !!}
            </td>
        </tr>
        </tbody>
    </table>

    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('InvestSign','Investigator’s Signature: ') !!}
            {!! Form::text('InvestSign',old('InvestSign',$ConclusionP->InvestSign),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('InvestName', 'Name (Printed) : ') !!}
            {!! Form::text('InvestName',old('InvestName',$ConclusionP->InvestName),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::date('DateTaken',old('DateTaken',$ConclusionP->DateTaken),['class'=>'form-control']) !!}
        </div>
    </div>
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection
