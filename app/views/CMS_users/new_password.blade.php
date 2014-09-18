@extends('layouts.login')
{{ stylesheet_link_tag() }}
@section('main')
<div class="container">
	<div class="row">
		{{ HTML::image('assets/Wiwi_websolutions_logo.png', 'Logo Wiwi Websolutions', array('class' => 'center-block')) }}
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			@include('partials.notification')
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Voer nieuw wachtwoord in</h2></div>
				<div class="panel-body">
				{{ Form::open(array('route' => 'users.reset_password.post', 'role' => 'form')) }}
					<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
						{{ Form::password('password', array('placeholder'=>'Nieuw wachtwoord','class' => 'form-control')) }}    
						{{ $errors->first('password', '<p class="help-block">:message</p>') }}
						</br>
						{{ Form::text('resetcode', Input::old('resetcode'), array('placeholder'=>'Vul hier uw resetcode in','class' => 'form-control')) }}    
						{{ $errors->first('resetcode', '<p class="help-block">:message</p>') }}
					</div>
						{{ Form::submit('Verstuur nieuw wachtwoord', array('class' => 'btn btn-success btn-block')) }}
				</div>            
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@stop

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ javascript_include_tag() }}
<script>
	// function checkResetCode(e){
		// var code = $(e.target).val();
		
		// $.getJSON('/resetpassword/' + code, function(res){
			// if(res.success)
				// alert('jeuj, code is goed');
		// });
	// }

	// $(document).ready(function(){
		// $(document).on('change', '[name="resetcode"]', checkResetCode)
	// });
</script>

