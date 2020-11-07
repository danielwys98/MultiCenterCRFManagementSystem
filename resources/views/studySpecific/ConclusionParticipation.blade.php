@extends('MasterLayout')

@section('content')
    {!! Form::open() !!}
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
                {!! Form::radio('Pre_Reserve', 'Reserve Subject','',['id'=>'Reserve']) !!}
                {!! Form::label('Pre_Reserve', 'Reserve Subject') !!}
                <br>
                {!! Form::radio('Pre_Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Pre_Yes', 'Yes') !!}
                <br>
                {!! Form::label('Pre_No','No,Explain: ') !!}
                <br>
                {!! Form::radio('Pre_SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('Pre_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('Pre_PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('Pre_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Pre_Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Pre_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('Pre_ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Pre_Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Pre_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Pre_Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Pre_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Pre_Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Pre_Death', 'Death') !!}
                <br>
                {!! Form::radio('Pre_Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Pre_Others', 'Others: ') !!}
                <br>
                {!! Form::text('Pre_Others_text','') !!}
            </td>

            <td>
                {!! Form::radio('SP1_Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('SP1_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP1_No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SP1_SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SP1_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('SP1_PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('SP1_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('SP1_Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('SP1_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('SP1_ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('SP1_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('SP1_Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('SP1_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('SP1_Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('SP1_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('SP1_Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('SP1_Death', 'Death') !!}
                <br>
                {!! Form::radio('SP1_Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('SP1_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP1_Others_text','') !!}
            </td>
            {{--Study Period 2--}}
            <td>
                {!! Form::radio('SP2_Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('SP2_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP2_No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SP2_SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SP2_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('SP2_PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('SP2_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('SP2_Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('SP2_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('SP2_ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('SP2_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('SP2_Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('SP2_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('SP2_Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('SP2_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('SP2_Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('SP2_Death', 'Death') !!}
                <br>
                {!! Form::radio('SP2_Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('SP2_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP2_Others_text','') !!}
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
                {!! Form::radio('SP3_Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('SP3_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP3_No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SP3_SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SP3_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('SP3_PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('SP3_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('SP3_Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('SP3_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('SP3_ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('SP3_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('SP3_Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('SP3_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('SP3_Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('SP3_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('SP3_Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('SP3_Death', 'Death') !!}
                <br>
                {!! Form::radio('SP3_Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('SP3_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP3_Others_text','') !!}
            </td>
            {{--Study Period 4--}}
            <td>
                {!! Form::radio('SP4_Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('SP4_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP4_No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SP4_SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SP4_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('SP4_PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('SP4_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('SP4_Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('SP4_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('SP4_ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('SP4_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('SP4_Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('SP4_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('SP4_Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('SP4_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('SP4_Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('SP4_Death', 'Death') !!}
                <br>
                {!! Form::radio('SP4_Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('SP4_Others', 'Others: ') !!}
                <br>
                {!! Form::text('SP4_Others_text','') !!}
            </td>
            {{--Follow Up--}}
            <td>
                {!! Form::radio('Fol_Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Fol_Yes', 'Yes') !!}
                <br>
                {!! Form::label('Fol_No','No,Explain: ') !!}
                <br>
                {!! Form::radio('Fol_SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('Fol_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('Fol_PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('Fol_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Fol_Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Fol_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('Fol_ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('Fol_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Fol_Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Fol_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Fol_Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Fol_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Fol_Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Fol_Death', 'Death') !!}
                <br>
                {!! Form::radio('Fol_Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Fol_Others', 'Others: ') !!}
                <br>
                {!! Form::text('Fol_Others_text','') !!}
            </td>
        </tr>
        </tbody>
    </table>

    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('InvestSign','Investigator’s Signature: ') !!}
            {!! Form::text('InvestSign','',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('InvestName', 'Name (Printed) : ') !!}
            {!! Form::text('InvestName','',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::date('DateTaken',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endsection
