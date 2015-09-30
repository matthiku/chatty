
@extends('templates.default')

@section('content')

	<h3>Timeline</h3>

	<div class="row">
	    <div class="col-lg-6">
			@include('timeline.partials.statusUpdateForm')
	    </div>
	</div>

	<div class="row">
	    <div class="col-lg-6">
			@include('timeline.partials.statuses')
	    </div>
	</div>


@stop