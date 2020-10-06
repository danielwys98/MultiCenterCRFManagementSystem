{!! Form::model($Physical,['route' => ['update.labtest',$patient->id]]) !!}
@method('PUT')<div class="form-group">
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
            <td>{!! Form::radio('GeneralAppearance', 'Normal') !!}</td>
            <td>{!! Form::radio('GeneralAppearance', 'Abnormal') !!}</td>
            <td>{!! Form::text('GeneralAppearance_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Skin</td>
            <td>{!! Form::radio('Skin', 'Normal') !!}</td>
            <td>{!! Form::radio('Skin', 'Abnormal') !!}</td>
            <td>{!! Form::text('Skin_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Head-Neck</td>
            <td>{!! Form::radio('Head_Neck', 'Normal') !!}</td>
            <td>{!! Form::radio('Head_Neck', 'Abnormal') !!}</td>
            <td>{!! Form::text('Head_Neck_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Eyes</td>
            <td>{!! Form::radio('Eyes', 'Normal') !!}</td>
            <td>{!! Form::radio('Eyes', 'Abnormal') !!}</td>
            <td>{!! Form::text('Eyes_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Ears / Nose / Throat</td>
            <td>{!! Form::radio('Ears_Nose_Throat', 'Normal') !!}</td>
            <td>{!! Form::radio('Ears_Nose_Throat', 'Abnormal') !!}</td>
            <td>{!! Form::text('Ears_Nose_Throat_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Mouth</td>
            <td>{!! Form::radio('Mouth', 'Normal') !!}</td>
            <td>{!! Form::radio('Mouth', 'Abnormal') !!}</td>
            <td>{!! Form::text('Mouth_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Chest / Lungs</td>
            <td>{!! Form::radio('Chest_Lungs', 'Normal') !!}</td>
            <td>{!! Form::radio('Chest_Lungs', 'Abnormal') !!}</td>
            <td>{!! Form::text('Chest_Lungs_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Heart</td>
            <td>{!! Form::radio('Heart', 'Normal') !!}</td>
            <td>{!! Form::radio('Heart', 'Abnormal') !!}</td>
            <td>{!! Form::text('Heart_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Abdomen</td>
            <td>{!! Form::radio('Abdomen', 'Normal') !!}</td>
            <td>{!! Form::radio('Abdomen', 'Abnormal') !!}</td>
            <td>{!! Form::text('Abdomen_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Back-Spine</td>
            <td>{!! Form::radio('Back_Spine', 'Normal') !!}</td>
            <td>{!! Form::radio('Back_Spine', 'Abnormal') !!}</td>
            <td>{!! Form::text('Back_Spine_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('Musculoskeletal', 'Normal') !!}</td>
            <td>{!! Form::radio('Musculoskeletal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Musculoskeletal_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('Neurological', 'Normal') !!}</td>
            <td>{!! Form::radio('Neurological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Neurological_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Extremities</td>
            <td>{!! Form::radio('Extremities', 'Normal') !!}</td>
            <td>{!! Form::radio('Extremities', 'Abnormal') !!}</td>
            <td>{!! Form::text('Extremities_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Lymph Nodes</td>
            <td>{!! Form::radio('Lymph_Nodes', 'Normal') !!}</td>
            <td>{!! Form::radio('Lymph_Nodes', 'Abnormal') !!}</td>
            <td>{!! Form::text('Lymph_Nodes_txt', '') !!}</td>
        </tr>
        <tr>
            <td>Other</td>
            <td>{!! Form::radio('Other', 'Normal') !!}</td>
            <td>{!! Form::radio('Other', 'Abnormal') !!}</td>
            <td>{!! Form::text('Other_txt', '') !!}</td>
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
        {!! Form::label('Comments', 'Comments: ') !!}
        {!! Form::radio('Comments_Physically_Healthy', 'Physically Healthy',
(old('Comments_Physically_Healthy',$Physical->Comments_Physically_Healthy)=='Healthy')? 'checked':'')!!}
        {!! Form::label('Comments_Physically_Healthy', 'Physically Healthy') !!}
        {!! Form::text('Comments_Physically_Healthy', '') !!}

        {!! Form::radio('Comments_Otherwise', 'Otherwise') !!}
        {!! Form::label('Comments_Otherwise', 'Otherwise') !!}
        {!! Form::text('Comments_Otherwise', '') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

