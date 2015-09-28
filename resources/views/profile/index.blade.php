@extends('templates.default')

@section('content')
	<h3>User Profile</h3>
	<div class="row">
		<div class="col-lg-5">
			@include('user.partials.userblock')
			<hr />
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			<h4>{{ $user->getFirstnameOrUsername() }}'s Friends</h4>

			@if ( ! $user->friends()->count())
				<p>{{ $user->getFirstnameOrUsername() }} has no friends</p>
			@else 
				@foreach ($user->friends() as $friend)
					@include('user/partials/userblock')
				@endforeach
			@endif
		</div>
	</div>
@stop