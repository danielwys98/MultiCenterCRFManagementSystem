{!! Form::open(['route' => ['store.testingPost']]) !!}
    @csrf
    {{-- conclusion --}}
    <div class="form-group">
        <h3>Conclusion</h3>
        @if(Auth::check() && Auth::user()->hasRole('user'))
        <div>
            {!! Form::label('name', 'name') !!}
            {!! Form::select('patient_id',$newName,null,['class' => 'form-control']) !!}
        </div>
        @endif
        @if(Auth::check() && Auth::user()->hasRole('admin'))
        <div>
            {!! Form::label('Admin view of name', 'name') !!}
            {!! Form::select('patient_id',$oriPatientName,null,['class' => 'form-control']) !!}
        </div>
        @endif
    </div>
{!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
