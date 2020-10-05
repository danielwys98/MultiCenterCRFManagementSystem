@extends('MasterLayout')

@section('content')
    <h1>This is the Past-Studies History Page</h1>

    <div class="card">
        <div class="card-title">
            <p>Currently undergoing studies</p>
        </div>
        <div class="card-body">
            <a href="#">Example 1</a>
            <a href="#">Example 2</a>
            <a href="#">Example 3</a>
        </div>
        <div class="card">
            <div class="card-title">
                <p>Past studies</p>
            </div>
            <div class="card-body">
                <a href="#">Example 4</a>
                <a href="#">Example 5</a>
                <a href="#">Example 6</a>
            </div>
        </div>
    </div><br/>
    <a href="{{ url('/studySpecificdb/create') }}"><button class="btn btn-success" type="submit">Create new study-specific</button></a>

@endsection

