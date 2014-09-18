@extends('layouts.login')

@section('main')

<div class="container">
	<div class="row">
		{{ HTML::image('assets/Wiwi_websolutions_logo.png', 'Logo Wiwi Websolutions', array('class' => 'center-block')) }}
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		@include('partials.notification')
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Login</h2></div>
				<div class="panel-body">
				{{ Form::open(array('route' => 'users.login.post', 'role' => 'form')) }}
					<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
							{{ Form::text('email', Input::old('email'), array('placeholder'=>'E-mail','class' => 'form-control')) }}    
							{{ $errors->first('email', '<p class="help-block">:message</p>') }}
					</div>
					<div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
							{{ Form::password('password', array('placeholder'=>'Wachtwoord', 'class' => 'form-control')) }}
							{{ $errors->first('password', '<p class="help-block">:message</p>') }}
					</div>
					<div class="form-group">
						{{Form::checkbox('remember', 'checked')}} <span class="extraText">Mijn gebruikersnaam onthouden</span>
						</br></br>
						{{ Form::submit('Inloggen', array('class' => 'btn btn-success btn-block')) }}
						</br>
						<a href="{{ URL::to('forgot_password') }}"><span class="extraText">> Wachtwoord vergeten?</span></a>
					</div>            
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>

{{ javascript_include_tag() }}

@stop