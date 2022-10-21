@extends('layouts.user_layout')

@section('content')
    <div class="card white-block p-4">
        {!! Form::open(['route' => 'update_sec']) !!}
        <div class"row"="">
            <div class="col-12">
                <h5 class="mb-2">Detect IP Address Change</h5>
                <input class="form-check-input" type="radio" name="ip" value="0"
                    {{ Auth::user()->ip_change == 0 ? 'checked' : '' }}>Disabled<br>
                <input class="form-check-input" type="radio" name="ip" value="1"
                    {{ Auth::user()->ip_change == 1 ? 'checked' : '' }}>Medium<br>
                <input class="form-check-input" type="radio" name="ip" value="2"
                    {{ Auth::user()->ip_change == 2 ? 'checked' : '' }}>High<br>
                <input class="form-check-input" type="radio" name="ip" value="3"
                    {{ Auth::user()->ip_change == 3 ? 'checked' : '' }}>Paranoic<br><br>
            </div>
        </div>
        <div class"row"="">
            <div class="col-12">
                <h5 class="mb-2">Detect Browser Change</h5>
                <input class="form-check-input" type="radio" name="browser" value="0"
                    {{ Auth::user()->browser_change == 0 ? 'checked' : '' }}>Disabled<br>
                <input class="form-check-input" type="radio" name="browser" value="1"
                    {{ Auth::user()->browser_change == 1 ? 'checked' : '' }}>Enabled<br><br>

                <button class="btn btn-primary mt-2 mr-1 text-light" type="submit">Set</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
