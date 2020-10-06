{!! Form::model($Physical,['route' => ['update.labtest',$patient->id]]) !!}
@method('PUT')<div class="form-group">
    <h3>Physical Examination</h3>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
            {!! Form::date('dateTaken', \Carbon\Carbon::now()) !!}
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
            <td>{!! Form::radio('General Appearance', 'Normal') !!}</td>
            <td>{!! Form::radio('General Appearance', 'Abnormal') !!}</td>
            <td>{!! Form::text('General Appearance', '') !!}</td>
        </tr>
        <tr>
            <td>Skin</td>
            <td>{!! Form::radio('Skin', 'Normal') !!}</td>
            <td>{!! Form::radio('Skin', 'Abnormal') !!}</td>
            <td>{!! Form::text('Skin', '') !!}</td>
        </tr>
        <tr>
            <td>Head-Neck</td>
            <td>{!! Form::radio('Head-Neck', 'Normal') !!}</td>
            <td>{!! Form::radio('Head-Neck', 'Abnormal') !!}</td>
            <td>{!! Form::text('Head-Neck', '') !!}</td>
        </tr>
        <tr>
            <td>Eyes</td>
            <td>{!! Form::radio('Eyes', 'Normal') !!}</td>
            <td>{!! Form::radio('Eyes', 'Abnormal') !!}</td>
            <td>{!! Form::text('Eyes', '') !!}</td>
        </tr>
        <tr>
            <td>Ears / Nose / Throat</td>
            <td>{!! Form::radio('Ears / Nose / Throat', 'Normal') !!}</td>
            <td>{!! Form::radio('Ears / Nose / Throat', 'Abnormal') !!}</td>
            <td>{!! Form::text('Ears / Nose / Throat', '') !!}</td>
        </tr>
        <tr>
            <td>Mouth</td>
            <td>{!! Form::radio('Mouth', 'Normal') !!}</td>
            <td>{!! Form::radio('Mouth', 'Abnormal') !!}</td>
            <td>{!! Form::text('Mouth', '') !!}</td>
        </tr>
        <tr>
            <td>Chest / Lungs</td>
            <td>{!! Form::radio('Chest / Lungs', 'Normal') !!}</td>
            <td>{!! Form::radio('Chest / Lungs', 'Abnormal') !!}</td>
            <td>{!! Form::text('Chest / Lungs', '') !!}</td>
        </tr>
        <tr>
            <td>Heart</td>
            <td>{!! Form::radio('Heart', 'Normal') !!}</td>
            <td>{!! Form::radio('Heart', 'Abnormal') !!}</td>
            <td>{!! Form::text('Heart', '') !!}</td>
        </tr>
        <tr>
            <td>Abdomen</td>
            <td>{!! Form::radio('Abdomen', 'Normal') !!}</td>
            <td>{!! Form::radio('Abdomen', 'Abnormal') !!}</td>
            <td>{!! Form::text('Abdomen', '') !!}</td>
        </tr>
        <tr>
            <td>Back-Spine</td>
            <td>{!! Form::radio('Back-Spine', 'Normal') !!}</td>
            <td>{!! Form::radio('Back-Spine', 'Abnormal') !!}</td>
            <td>{!! Form::text('Back-Spine', '') !!}</td>
        </tr>
        <tr>
            <td>Musculoskeletal</td>
            <td>{!! Form::radio('Musculoskeletal', 'Normal') !!}</td>
            <td>{!! Form::radio('Musculoskeletal', 'Abnormal') !!}</td>
            <td>{!! Form::text('Musculoskeletal', '') !!}</td>
        </tr>
        <tr>
            <td>Neurological</td>
            <td>{!! Form::radio('Neurological', 'Normal') !!}</td>
            <td>{!! Form::radio('Neurological', 'Abnormal') !!}</td>
            <td>{!! Form::text('Neurological', '') !!}</td>
        </tr>
        <tr>
            <td>Extremities</td>
            <td>{!! Form::radio('Extremities', 'Normal') !!}</td>
            <td>{!! Form::radio('Extremities', 'Abnormal') !!}</td>
            <td>{!! Form::text('Extremities', '') !!}</td>
        </tr>
        <tr>
            <td>Lymph Nodes</td>
            <td>{!! Form::radio('Lymph Nodes', 'Normal') !!}</td>
            <td>{!! Form::radio('Lymph Nodes', 'Abnormal') !!}</td>
            <td>{!! Form::text('Lymph Nodes', '') !!}</td>
        </tr>
        <tr>
            <td>Other</td>
            <td>{!! Form::radio('Other', 'Normal') !!}</td>
            <td>{!! Form::radio('Other', 'Abnormal') !!}</td>
            <td>{!! Form::text('Other', '') !!}</td>
        </tr>
    </table>
    <div>
        {!! Form::label('Cubital fossa veins', 'Cubital fossa veins: ') !!}
        {!! Form::radio('Cubital fossa veins', 'Clearly visible') !!}
        {!! Form::label('Cubital fossa veins', 'Clearly visible') !!}
        {!! Form::radio('Cubital fossa veins', 'Moderately visible') !!}
        {!! Form::label('Cubital fossa veins', 'Moderately visible') !!}
        {!! Form::radio('Cubital fossa veins', 'Poorly visible') !!}
        {!! Form::label('Cubital fossa veins', 'Poorly visible') !!}
    </div>
    <div>
        {!! Form::label('Comments', 'Comments: ') !!}
        {!! Form::radio('Physically Healthy', 'Physically Healthy') !!}
        {!! Form::label('Physically Healthy', 'Physically Healthy') !!}
        {!! Form::text('Physically Healthy ', '') !!}
        {!! Form::radio('Otherwise', 'Otherwise') !!}
        {!! Form::label('Otherwise', 'Otherwise') !!}
        {!! Form::text('Otherwise', '') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

