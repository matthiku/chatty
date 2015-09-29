@extends('templates.default')

@section('content')

	<h3>Timeline</h3>

	<div class="row">
	    <div class="col-lg-6">


	        <form class="form-vertical" role="form" method="post" action="{{ route('status.post') }}">

	            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
	                <textarea placeholder="What's up, {{ Auth::user()->getFirstnameOrUsername() }}?" name="status" class="form-control" id="status" value="{{ old('status') }}"></textarea>
	                @if ($errors->has('status'))
	                	<span class="help-block">{{ $errors->first('status') }}</span>
	                @endif
	            </div>

	            <div class="form-group">
	                <button type="submit" class="btn btn-default">Update status</button>
	            </div>

	            <input type="hidden" name="_token" value="{{ Session::token() }}">

	        </form>

	        
	    </div>
	</div>

	<div class="row">
		<div class="col-lg-5">
			timeline ....
		</div>
	</div>

@stop