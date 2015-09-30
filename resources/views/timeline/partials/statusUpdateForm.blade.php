
<!-- Shows a form to crate a new status -->


<form class="form-vertical" role="form" method="post" action="{{ route('status.post') }}">

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <textarea{{ $errors->count() ? '': ' autofocus' }} {{ $errors->has('status') ? ' autofocus' : '' }} placeholder="What's up, {{ Auth::user()->getFirstnameOrUsername() }}?" name="status" class="form-control" id="status" value="{{ old('status') }}"></textarea>
        @if ($errors->has('status'))
        	<span class="help-block">{{ $errors->first('status') }}</span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Update status</button>
    </div>

    <input type="hidden" name="_token" value="{{ Session::token() }}">

</form>

