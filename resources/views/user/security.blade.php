@extends('layouts.user_layout')

@section('content')
    <div class="card white-block p-4">
        {!! Form::open(['route' => 'update_sec']) !!}
        <div class"row"="">
            <div class="col-12">
                <h5 class="mb-2">Detect IP Address Change</h5>
                <input class="form-check-input" type="radio" name="ip" value="disabled" checked="">Disabled<br>
                <input class="form-check-input" type="radio" name="ip" value="medium">Medium<br>
                <input class="form-check-input" type="radio" name="ip" value="high">High<br>
                <input class="form-check-input" type="radio" name="ip" value="always">Paranoic<br><br>
            </div>
        </div>
        <div class"row"="">
            <div class="col-12">
                <h5 class="mb-2">Detect Browser Change</h5>
                <input class="form-check-input" type="radio" name="browser" value="disabled" checked="">Disabled<br>
                <input class="form-check-input" type="radio" name="browser" value="enabled">Enabled<br><br>

                <button class="btn btn-primary mt-2 mr-1 text-light" type="submit">Set</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
