@if (Session::has('flash_message'))
	<div class="{!! Session::get('flash_level') !!} alert alert-success notice">
		{!! Session::get('flash_message') !!}
	</div>
@endif