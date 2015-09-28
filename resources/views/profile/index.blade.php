@extends('templates.default')

@section('content')
	<h3>User Profile</h3>
	<div class="row">
		<div class="col-lg-5">
			@include('user.partials.userblock')
			<hr />
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			
		</div>
	</div>
@stop