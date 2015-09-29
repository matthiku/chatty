@extends('templates.default')

@section('content')
	
	<div class="row">
		<div class="col-lg-6">
			<h3>Your friends</h3>
			@if ( ! $friends->count())
				<p>You currently have no friends.</p>
			@else 
				@foreach ($friends as $user)
					@include('user/partials/userblock')
				@endforeach
			@endif
		</div>
		<div class="col-lg-6">
			<h4>Friend requests</h4>
			@if ( ! $friendRequests->count())
				<p>You currently have no friend requests.</p>
			@else 
				@foreach ($friendRequests as $user)
					@include('user/partials/userblock')
					<br>
					<a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary btn-xs">Accept</a>
				@endforeach
			@endif
		</div>
	</div>

@stop