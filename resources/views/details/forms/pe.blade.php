{!! Form::model($Physical,['route' => ['update.pexam',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    <h3>Physical Examination</h3>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::date('dateTaken', old('dateTaken')) !!}
        </div>
    </div>
    <table class="table col-sm-9">
        <tr>
            <th>System Review</th>
            <th>Normal</th>
            <th>Abnormal</th>
            <th>If abnormal, give pertinent details</th>
        </tr>
        <tr>
            <td>General Appearance</td>
            <td>{!! Form::radio('generalappearance', 'Normal',(($Physical->GeneralAppearance)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('generalappearance', 'Abnormal',(($Physical->GeneralAppearance)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('generalappearance_txt',(($Physical->GeneralAppearance)!='Normal')? $Physical->GeneralAppearance : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Skin</td>
            <td>{!! Form::radio('skin', 'Normal',(($Physical->Skin)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('skin', 'Abnormal',(($Physical->Skin)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('skin_txt',(($Physical->Skin)!='Normal')? $Physical->Skin : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Head-Neck</td>
            <td>{!! Form::radio('head_neck', 'Normal',(($Physical->Head_Neck)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('head_neck', 'Abnormal',(($Physical->Head_Neck)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('head_neck_txt',(($Physical->Head_Neck)!='Normal')? $Physical->Head_Neck : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Eyes</td>
            <td>{!! Form::radio('eyes', 'Normal',(($Physical->Eyes)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('eyes', 'Abnormal',(($Physical->Eyes)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('eyes_txt',(($Physical->Eyes)!='Normal')? $Physical->Eyes : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Ears / Nose / Throat</td>
            <td>{!! Form::radio('ears_nose_throat', 'Normal',(($Physical->Ears_Nose_Throat)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('ears_nose_throat', 'Abnormal',(($Physical->Ears_Nose_Throat)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('ears_nose_throat_txt',(($Physical->Ears_Nose_Throat)!='Normal')? $Physical->Ears_Nose_Throat : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Mouth</td>
            <td>{!! Form::radio('mouth', 'Normal',(($Physical->Mouth)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('mouth', 'Abnormal',(($Physical->Mouth)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('mouth_txt',(($Physical->Mouth)!='Normal')? $Physical->Mouth : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Chest / Lungs</td>
            <td>{!! Form::radio('chest_lungs', 'Normal',(($Physical->Chest_Lungs)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('chest_lungs', 'Abnormal',(($Physical->Chest_Lungs)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('chest_lungs_txt',(($Physical->Chest_Lungs)!='Normal')? $Physical->Chest_Lungs : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Heart</td>
            <td>{!! Form::radio('heart', 'Normal',(($Physical->Heart)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('heart', 'Abnormal',(($Physical->Heart)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('heart_txt',(($Physical->Heart)!='Normal')? $Physical->Heart : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Abdomen</td>
            <td>{!! Form::radio('abdomen', 'Normal',(($Physical->Abdomen)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('abdomen', 'Abnormal',(($Physical->Abdomen)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('abdomen_txt',(($Physical->Abdomen)!='Normal')? $Physical->Abdomen : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Back-Spine</td>
            <td>{!! Form::radio('back_spine', 'Normal',(($Physical->Back_Spine)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('back_spine', 'Abnormal',(($Physical->Back_Spine)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('back_spine_txt',(($Physical->Back_Spine)!='Normal')? $Physical->Back_Spine : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('musculoskeletal', 'Normal',(($Physical->Musculoskeletal)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('musculoskeletal', 'Abnormal',(($Physical->Musculoskeletal)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('musculoskeletal_txt',(($Physical->Musculoskeletal)!='Normal')? $Physical->Musculoskeletal : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('neurological', 'Normal',(($Physical->Neurological)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('neurological', 'Abnormal',(($Physical->Neurological)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('neurological_txt',(($Physical->Neurological)!='Normal')? $Physical->Neurological : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Extremities</td>
            <td>{!! Form::radio('extremities', 'Normal',(($Physical->Extremities)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('extremities', 'Abnormal',(($Physical->Extremities)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('extremities_txt',(($Physical->Extremities)!='Normal')? $Physical->Extremities : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Lymph Nodes</td>
            <td>{!! Form::radio('lymph_nodes', 'Normal',(($Physical->Lymph_Nodes)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('lymph_nodes', 'Abnormal',(($Physical->Lymph_Nodes)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('lymph_nodes_txt',(($Physical->Lymph_Nodes)!='Normal')? $Physical->Lymph_Nodes : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
        <tr>
            <td>Other</td>
            <td>{!! Form::radio('other', 'Normal',(($Physical->Other)=='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::radio('other', 'Abnormal',(($Physical->Other)!='Normal')? 'checked' : '') !!}</td>
            <td>{!! Form::text('other_txt',(($Physical->Other)!='Normal')? $Physical->Other : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}</td>
        </tr>
    </table>
    <div>
        {!! Form::label('Cubital_Fossa_Veins', 'Cubital fossa veins: ') !!}
        {!! Form::radio('Cubital_Fossa_Veins', 'Clearly visible') !!}
        {!! Form::label('Cubital_Fossa_Veins', 'Clearly visible') !!}
        {!! Form::radio('Cubital_Fossa_Veins', 'Moderately visible') !!}
        {!! Form::label('Cubital_Fossa_Veins', 'Moderately visible') !!}
        {!! Form::radio('Cubital_Fossa_Veins', 'Poorly visible') !!}
        {!! Form::label('Cubital_Fossa_Veins', 'Poorly visible') !!}
    </div>
    <div>
        {!! Form::label('comments', 'Comments: ') !!}
        {!! Form::radio('comments', 'Physically Healthy',(($Physical->Comments)=='Physically Healthy')? 'checked' : '')!!}
        {!! Form::label('comments', 'Physically Healthy') !!}
        {!! Form::text('comments_Physically_Healthy',(($Physical->Comments)=='Physically Healthy')? $Physical->Comments_txt : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}

        {!! Form::radio('comments', 'Otherwise',(($Physical->Comments)=='Otherwise')? 'checked' : '') !!}
        {!! Form::label('comments', 'Otherwise') !!}
        {!! Form::text('comments_Otherwise',(($Physical->Comments)=='Otherwise')? $Physical->Comments_txt : '',['class'=>'form-control','placeholder'=>'Please specify']) !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

