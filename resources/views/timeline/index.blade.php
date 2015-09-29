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
			@if (!$statuses->count())
				<p>There is nothing in your timeline, yet.</p>
			@else
				@foreach ($statuses as $status)
					<div class="media">
					    <a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
					        <img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }}">
					    </a>
					    <div class="media-body">
					        <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
					        <p>{{ $status->body }}</p>
					        <ul class="list-inline">
					            <li>{{ $status->created_at->diffForHumans() }}</li>
					            <li><a href="#">Like</a></li>
					            <li>10 likes</li>
					        </ul>

					        <!-- <div class="media">
					            <a class="pull-left" href="#">
					                <img class="media-object" alt="" src="">
					            </a>
					            <div class="media-body">
					                <h5 class="media-heading"><a href="#">Billy</a></h5>
					                <p>Yes, it is lovely!</p>
					                <ul class="list-inline">
					                    <li>8 minutes ago.</li>
					                    <li><a href="#">Like</a></li>
					                    <li>4 likes</li>
					                </ul>
					            </div>
					        </div>
 -->
					        <form role="form" action="{{ route('status.reply', $status->id) }}" method="post">
					            <div class="form-group">
					                <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
					            </div>
					            <input type="submit" value="Reply" class="btn btn-default btn-sm">
					            <input type="hidden" name="_token" value="{{ Session::token() }}">
					        </form>
					    </div>
					</div>
				@endforeach

				{!! $statuses->render() !!}

			@endif
		</div>
	</div>

@stop