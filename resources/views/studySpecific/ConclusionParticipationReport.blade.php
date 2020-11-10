<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>
    <style>
        table, th, td {
          border: 1px solid black;
        }
        
        th, td {
          padding: 15px 30px;
        }
        </style>
</head>
<style>
    .page-break {
        page-break-after: always;
    }
</style>
<body>
    <h3>{{$patient->name}}'s Conclusion of Participation for {{$study->study_name}}</h3>
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
                {!! Form::checkbox('Pre_Reserve', 'Reserve Subject',$ConclusionP->Pre_Reserve,['id'=>'Pre_Reserve']) !!}
                {!! Form::label('Pre_Reserve', 'Reserve Subject') !!}
                <br>
                {!! Form::checkbox('Pre_Yes', 'Yes',$ConclusionP->Pre_Yes,['id'=>'Pre_Yes']) !!}
                {!! Form::label('Pre_Yes', 'Yes') !!}
                <br>
                {!! Form::label('Pre_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('Pre_SubDecision', 'Subject Decision',$ConclusionP->Pre_SubDecision,['id'=>'Pre_SubDecision']) !!}
                {!! Form::label('Pre_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('Pre_PhyDecision', 'Physician Decision',$ConclusionP->Pre_PhyDecision,['id'=>'Pre_PhyDecision']) !!}
                {!! Form::label('Pre_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('Pre_Exclusion', 'Entry Criteria Exclusion',$ConclusionP->Pre_Exclusion,['id'=>'Pre_Exclusion']) !!}
                {!! Form::label('Pre_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('Pre_ProtoViolation', 'Protocol Violation',$ConclusionP->Pre_ProtoViolation,['id'=>'Pre_ProtoViolation']) !!}
                {!! Form::label('Pre_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('Pre_Lost', 'Lost to Follow Up',$ConclusionP->Pre_Lost,['id'=>'Pre_Lost']) !!}
                {!! Form::label('Pre_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('Pre_Adverse', 'Adverse Event',$ConclusionP->Pre_Adverse,['id'=>'Pre_Adverse']) !!}
                {!! Form::label('Pre_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('Pre_Death', 'Death',$ConclusionP->Pre_Death,['id'=>'Pre_Death']) !!}
                {!! Form::label('Pre_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('Pre_Others', 'Others',$ConclusionP->Pre_others,['id'=>'Pre_Others']) !!}
                {!! Form::label('Pre_Others', 'Others: ') !!}
                {{-- <br> --}}
                {!! Form::label('Pre_Others_text',(($ConclusionP->Pre_others_text)=='')? ' ' : $ConclusionP->Pre_others_text,['class'=>'form-control']) !!}
            </td>

            <td>
                {!! Form::checkbox('SP1_Yes', 'Yes',$ConclusionP->SP1_Yes,['id'=>'SP1_Yes']) !!}
                {!! Form::label('SP1_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP1_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP1_SubDecision', 'Subject Decision',$ConclusionP->SP1_SubDecision,['id'=>'SP1_SubDecision']) !!}
                {!! Form::label('SP1_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP1_PhyDecision', 'Physician Decision',$ConclusionP->SP1_PhyDecision,['id'=>'SP1_PhyDecision']) !!}
                {!! Form::label('SP1_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP1_Exclusion', 'Entry Criteria Exclusion',$ConclusionP->SP1_Exclusion,['id'=>'SP1_Exclusion']) !!}
                {!! Form::label('SP1_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP1_ProtoViolation', 'Protocol Violation',$ConclusionP->SP1_ProtoViolation,['id'=>'SP1_ProtoViolation']) !!}
                {!! Form::label('SP1_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP1_Lost', 'Lost to Follow Up',$ConclusionP->SP1_Lost,['id'=>'SP1_Lost']) !!}
                {!! Form::label('SP1_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP1_Adverse', 'Adverse Event',$ConclusionP->SP1_Adverse,['id'=>'SP1_Adverse']) !!}
                {!! Form::label('SP1_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP1_Death', 'Death',$ConclusionP->SP1_Death,['id'=>'SP1_Death']) !!}
                {!! Form::label('SP1_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP1_Others', 'Others',$ConclusionP->SP1_others,['id'=>'SP1_Others']) !!}
                {!! Form::label('SP1_Others', 'Others: ') !!}
                {{-- <br> --}}
                {!! Form::label('SP1_Others_text',(($ConclusionP->SP1_others_text)=='')? ' ' : $ConclusionP->SP1_others_text,['class'=>'form-control']) !!}
            </td>
            {{--Study Period 2--}}
            <td>
                {!! Form::checkbox('SP2_Yes', 'Yes',$ConclusionP->SP2_Yes,['id'=>'SP2_Yes']) !!}
                {!! Form::label('SP2_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP2_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP2_SubDecision', 'Subject Decision',$ConclusionP->SP2_SubDecision,['id'=>'SP2_SubDecision']) !!}
                {!! Form::label('SP2_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP2_PhyDecision', 'Physician Decision',$ConclusionP->SP2_PhyDecision,['id'=>'SP2_PhyDecision']) !!}
                {!! Form::label('SP2_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP2_Exclusion', 'Entry Criteria Exclusion',$ConclusionP->SP2_Exclusion,['id'=>'SP2_Exclusion']) !!}
                {!! Form::label('SP2_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP2_ProtoViolation', 'Protocol Violation',$ConclusionP->SP2_ProtoViolation,['id'=>'SP2_ProtoViolation']) !!}
                {!! Form::label('SP2_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP2_Lost', 'Lost to Follow Up',$ConclusionP->SP2_Lost,['id'=>'SP2_Lost']) !!}
                {!! Form::label('SP2_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP2_Adverse', 'Adverse Event',$ConclusionP->SP2_Adverse,['id'=>'SP2_Adverse']) !!}
                {!! Form::label('SP2_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP2_Death', 'Death',$ConclusionP->SP2_Death,['id'=>'SP2_Death']) !!}
                {!! Form::label('SP2_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP2_Others', 'Others',$ConclusionP->SP2_others,['id'=>'SP2_Others']) !!}
                {!! Form::label('SP2_Others', 'Others: ') !!}
                {{-- <br> --}}
                {!! Form::label('SP2_Others_text',(($ConclusionP->SP2_others_text)=='')? ' ' : $ConclusionP->SP2_others_text,['class'=>'form-control']) !!}
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
                {!! Form::checkbox('SP3_Yes', 'Yes',$ConclusionP->SP3_Yes,['id'=>'SP3_Yes']) !!}
                {!! Form::label('SP3_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP3_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP3_SubDecision', 'Subject Decision',$ConclusionP->SP3_SubDecision,['id'=>'SP3_SubDecision']) !!}
                {!! Form::label('SP3_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP3_PhyDecision', 'Physician Decision',$ConclusionP->SP3_PhyDecision,['id'=>'SP3_PhyDecision']) !!}
                {!! Form::label('SP3_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP3_Exclusion', 'Entry Criteria Exclusion',$ConclusionP->SP3_Exclusion,['id'=>'SP3_Exclusion']) !!}
                {!! Form::label('SP3_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP3_ProtoViolation', 'Protocol Violation',$ConclusionP->SP3_ProtoViolation,['id'=>'SP3_ProtoViolation']) !!}
                {!! Form::label('SP3_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP3_Lost', 'Lost to Follow Up',$ConclusionP->SP3_Lost,['id'=>'SP3_Lost']) !!}
                {!! Form::label('SP3_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP3_Adverse', 'Adverse Event',$ConclusionP->SP3_Adverse,['id'=>'SP3_Adverse']) !!}
                {!! Form::label('SP3_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP3_Death', 'Death',$ConclusionP->SP3_Death,['id'=>'SP3_Death']) !!}
                {!! Form::label('SP3_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP3_Others', 'Others',$ConclusionP->SP3_others,['id'=>'SP3_Others']) !!}
                {!! Form::label('SP3_Others', 'Others: ') !!}
                {{-- <br> --}}
                {!! Form::label('SP3_Others_text',(($ConclusionP->SP3_others_text)=='')? ' ' : $ConclusionP->SP3_others_text,['class'=>'form-control']) !!}
            </td>
            {{--Study Period 4--}}
            <td>
                {!! Form::checkbox('SP4_Yes', 'Yes',$ConclusionP->SP4_Yes,['id'=>'SP4_Yes']) !!}
                {!! Form::label('SP4_Yes', 'Yes') !!}
                <br>
                {!! Form::label('SP4_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('SP4_SubDecision', 'Subject Decision',$ConclusionP->SP4_SubDecision,['id'=>'SP4_SubDecision']) !!}
                {!! Form::label('SP4_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('SP4_PhyDecision', 'Physician Decision',$ConclusionP->SP4_PhyDecision,['id'=>'SP4_PhyDecision']) !!}
                {!! Form::label('SP4_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('SP4_Exclusion', 'Entry Criteria Exclusion',$ConclusionP->SP4_Exclusion,['id'=>'SP4_Exclusion']) !!}
                {!! Form::label('SP4_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('SP4_ProtoViolation', 'Protocol Violation',$ConclusionP->SP4_ProtoViolation,['id'=>'SP4_ProtoViolation']) !!}
                {!! Form::label('SP4_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('SP4_Lost', 'Lost to Follow Up',$ConclusionP->SP4_Lost,['id'=>'SP4_Lost']) !!}
                {!! Form::label('SP4_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('SP4_Adverse', 'Adverse Event',$ConclusionP->SP4_Adverse,['id'=>'SP4_Adverse']) !!}
                {!! Form::label('SP4_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('SP4_Death', 'Death',$ConclusionP->SP4_Death,['id'=>'SP4_Death']) !!}
                {!! Form::label('SP4_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('SP4_Others', 'Others',$ConclusionP->SP4_others,['id'=>'SP4_Others']) !!}
                {!! Form::label('SP4_Others', 'Others: ') !!}
                {{-- <br> --}}
                {!! Form::label('SP4_Others_text',(($ConclusionP->SP4_others_text)=='')? ' ' : $ConclusionP->SP4_others_text,['class'=>'form-control']) !!}
            </td>
            {{--Follow Up--}}
            <td>
                {!! Form::checkbox('Fol_Yes', 'Yes',$ConclusionP->Fol_Yes,['id'=>'Fol_Yes']) !!}
                {!! Form::label('Fol_Yes', 'Yes') !!}
                <br>
                {!! Form::label('Fol_No','No,Explain: ') !!}
                <br>
                {!! Form::checkbox('Fol_SubDecision', 'Subject Decision',$ConclusionP->Fol_SubDecision,['id'=>'Fol_SubDecision']) !!}
                {!! Form::label('Fol_SubDecision', 'Subject Decision') !!}
                <br>
                {!! Form::checkbox('Fol_PhyDecision', 'Physician Decision',$ConclusionP->Fol_PhyDecision,['id'=>'Fol_PhyDecision']) !!}
                {!! Form::label('Fol_PhyDecision', 'Physician Decision') !!}
                <br>
                {!! Form::checkbox('Fol_Exclusion', 'Entry Criteria Exclusion',$ConclusionP->Fol_Exclusion,['id'=>'Fol_Exclusion']) !!}
                {!! Form::label('Fol_Exclusion', 'Entry Criteria Exclusion') !!}
                <br>
                {!! Form::checkbox('Fol_ProtoViolation', 'Protocol Violation',$ConclusionP->Fol_ProtoViolation,['id'=>'Fol_ProtoViolation']) !!}
                {!! Form::label('Fol_ProtoViolation', 'Protocol Violation') !!}
                <br>
                {!! Form::checkbox('Fol_Lost', 'Lost to Follow Up',$ConclusionP->Fol_Lost,['id'=>'Fol_Lost']) !!}
                {!! Form::label('Fol_Lost', 'Lost to Follow Up') !!}
                <br>
                {!! Form::checkbox('Fol_Adverse', 'Adverse Event',$ConclusionP->Fol_Adverse,['id'=>'Fol_Adverse']) !!}
                {!! Form::label('Fol_Adverse', 'Adverse Event') !!}
                <br>
                {!! Form::checkbox('Fol_Death', 'Death',$ConclusionP->Fol_Death,['id'=>'Fol_Death']) !!}
                {!! Form::label('Fol_Death', 'Death') !!}
                <br>
                {!! Form::checkbox('Fol_Others', 'Others',$ConclusionP->Fol_others,['id'=>'Fol_Others']) !!}
                {!! Form::label('Fol_Others', 'Others: ') !!}
                {{-- <br> --}}
                {!! Form::label('Fol_Others_text',(($ConclusionP->Fol_others_text)=='')? ' ' : $ConclusionP->Fol_others_text,['class'=>'form-control']) !!}
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('InvestSign','Investigator’s Signature: ') !!}
            {!! Form::label('InvestSign',$ConclusionP->InvestSign,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            {!! Form::label('InvestName', 'Name (Printed) : ') !!}
            {!! Form::label('InvestName',$ConclusionP->InvestName,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::label('DateTaken',$ConclusionP->DateTaken,['class'=>'form-control']) !!}
        </div>
    </div>
</body>
