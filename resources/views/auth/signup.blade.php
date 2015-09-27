@extends('templates.default')

@section('content')
	<div class="row">
	    <div class="col-lg-6">
	        <form class="form-vertical" role="form" method="post" action="{{ route('auth.signup') }}">
	            <div class="form-group">
	                <label for="email" class="control-label">Your email address</label>
	                <input type="text" name="email" class="form-control" id="email" value="">
	            </div>
	            <div class="form-group">
	                <label for="username" class="control-label">Choose a username</label>
	                <input type="text" name="username" class="form-control" id="username" value="">
	            </div>
	            <div class="form-group">
	                <label for="password" class="control-label">Choose a password</label>
	                <input type="password" name="password" class="form-control" id="password" value="">
	            </div>
	            <div class="form-group">
	                <button type="submit" class="btn btn-default">Sign up</button>
	            </div>
	            <input type="hidden" name="_token" value="{{ Session::token() }}">
	        </form>
	    </div>
	</div>
@stop