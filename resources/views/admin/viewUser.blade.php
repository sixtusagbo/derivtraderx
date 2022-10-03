@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">User Details</h2>
            <div class="row">
                <div class="col-lg-12">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Name:</b> {{$user->name}}</li>
						<li class="list-group-item"><b>Email:</b> {{$user->email}}</li>
						<li class="list-group-item"><b>Username:</b> {{$user->username}}</li>
						<li class="list-group-item"><b>Created_at:</b> {{$user->created_at->toDayDateTimeString()}}</li>
						<li class="list-group-item"><b>Updated_at:</b> {{$user->updated_at->toDayDateTimeString()}}</li>
					</ul>
                </div>
            </div>
        </div>
    </main>
@endsection
