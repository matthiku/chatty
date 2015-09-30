@extends('templates.default')

@section('content')


	<h3>User Profile and Timeline</h3>

	<div class="row">

		<div class="col-lg-7">

			<!-- show the user profile -->
			@include('user.partials.userblock')<hr />
			
			<!-- show a status update form -->
			@include('timeline.partials.statusUpdateForm')

			<!-- show  the user timeline -->
			@include('timeline.partials.statuses')

		</div>


		<div class="col-lg-4 col-lg-offset-1">

			@if ( Auth::user()->hasFriendRequestPending($user) )
				<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request</p>
			@elseif ( Auth::user()->hasFriendRequestReceived($user) )
				<a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept friend request</a>
			@elseif ( Auth::user()->isFriendsWith($user) )
				<p>You and {{ $user->getNameOrUsername() }} are friends</p>
			@elseif ( Auth::user()->id !== $user->id) 
				<a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">Add as friend</a>
			@endif

			<h4>{{ $user->getFirstnameOrUsername() }}'s Friends</h4>

			@if ( ! $user->friends()->count())
				<p>{{ $user->getFirstnameOrUsername() }} currently has no friends</p>
			@else 
				@foreach ($user->friends() as $user)
					@include('user.partials.userblock')
				@endforeach
			@endif
			
		</div>


	</div>

@stop