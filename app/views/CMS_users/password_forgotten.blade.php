@extends('layouts.login')

@section('main')

<div class="container">
	<div class="row">
		{{ HTML::image('images/Wiwi_websolutions_logo.png', 'Logo Wiwi Websolutions', array('class' => 'center-block')) }}
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Passwoord vergeten</h2></div>
				<div class="panel-body">
				{{ Form::open(array('route' => 'users.password_forgotten.post', 'role' => 'form')) }}
					<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
						{{ Form::text('email', Input::old('email'), array('placeholder'=>'E-mail','class' => 'form-control')) }}    
						{{ $errors->first('email', '<p class="help-block">:message</p>') }}
					</div>
						{{ Form::submit('Verstuur wachtwoord', array('class' => 'btn btn-primary btn-block')) }}
				</div>            
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@stop