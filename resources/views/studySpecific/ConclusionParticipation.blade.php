@extends('MasterLayout')

@section('content')
    {!! Form::open() !!}
    <h3>Conclusion of Participation</h3>
    <hr>
    {{--TODO: Add Pre, SP1, SP2, SP3, SP4, FollowUp to all the names of the respective radio and label--}}
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
                {!! Form::radio('Reserve', 'Reserve Subject','',['id'=>'Reserve']) !!}
                {!! Form::label('Reserve', 'Reserve Subject') !!}
                <br>
                {!! Form::radio('Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Yes', 'Yes') !!}
                <br>
                {!! Form::label('No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Death', 'Death') !!}
                <br>
                {!! Form::radio('Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others: ') !!}
                <br>
                {!! Form::text('Others_text','') !!}
            </td>

            <td>
                {!! Form::radio('Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Yes', 'Yes') !!}
                <br>
                {!! Form::label('No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Death', 'Death') !!}
                <br>
                {!! Form::radio('Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others: ') !!}
                <br>
                {!! Form::text('Others_text','') !!}
            </td>
            <td>
                {!! Form::radio('Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Yes', 'Yes') !!}
                <br>
                {!! Form::label('No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Death', 'Death') !!}
                <br>
                {!! Form::radio('Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others: ') !!}
                <br>
                {!! Form::text('Others_text','') !!}
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
            <td>
                {!! Form::radio('Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Yes', 'Yes') !!}
                <br>
                {!! Form::label('No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Death', 'Death') !!}
                <br>
                {!! Form::radio('Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others: ') !!}
                <br>
                {!! Form::text('Others_text','') !!}
            </td>

            <td>
                {!! Form::radio('Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Yes', 'Yes') !!}
                <br>
                {!! Form::label('No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Death', 'Death') !!}
                <br>
                {!! Form::radio('Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others: ') !!}
                <br>
                {!! Form::text('Others_text','') !!}
            </td>
            <td>
                {!! Form::radio('Yes', 'Yes','',['id'=>'Yes']) !!}
                {!! Form::label('Yes', 'Yes') !!}
                <br>
                {!! Form::label('No','No,Explain: ') !!}
                <br>
                {!! Form::radio('SubDecision', 'Subject Decision','',['id'=>'SubDecision']) !!}
                {!! Form::label('SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::radio('PhyDecision', 'Physician Decision','',['id'=>'PhyDecision']) !!}
                {!! Form::label('PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::radio('Exclusion', 'Entry Criteria Exclusion','',['id'=>'Exclusion']) !!}
                {!! Form::label('Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::radio('ProtoViolation', 'Protocol Violation','',['id'=>'ProtoViolation']) !!}
                {!! Form::label('ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::radio('Lost', 'Lost to Follow Up','',['id'=>'Lost']) !!}
                {!! Form::label('Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::radio('Adverse', 'Adverse Event','',['id'=>'Adverse']) !!}
                {!! Form::label('Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::radio('Death', 'Death','',['id'=>'Death']) !!}
                {!! Form::label('Death', 'Death') !!}
                <br>
                {!! Form::radio('Others', 'Others','',['id'=>'Others']) !!}
                {!! Form::label('Others', 'Others: ') !!}
                <br>
                {!! Form::text('Others_text','') !!}
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
