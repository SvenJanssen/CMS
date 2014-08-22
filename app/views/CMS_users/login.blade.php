@extends('layouts.login')

@section('main')

<div class="container">
	<div class="row">
		{{ HTML::image('images/Wiwi_websolutions_logo.png', 'Logo Wiwi Websolutions', array('class' => 'center-block')) }}
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			{{ Form::open(array('route' => 'users.login.post', 'role' => 'form')) }}
				<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
					{{ Form::label('email', 'E-mail' ); }}
						{{ Form::text('email', Input::old('email'), array('placeholder'=>'E-mail','class' => 'form-control')) }}    
						{{ $errors->first('email', '<p class="help-block">:message</p>') }}
				</div>
			
				<div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
					{{ Form::label('password', 'Wachtwoord'); }}
						{{ Form::password('password', array('placeholder'=>'Wachtwoord', 'class' => 'form-control')) }}
						{{ $errors->first('password', '<p class="help-block">:message</p>') }}
				</div>
				<div class="form-group">
					{{Form::checkbox('rememberme', 'Ja', false)}} <span class="extraText">Mijn gebruikersnaam onthouden</span>
					</br></br>
					{{ Form::submit('Inloggen', array('class' => 'btn btn-success btn-block')) }}
					</br>
					<a href=""><span class="extraText">> Wachtwoord vergeten</span></a>
				</div>            
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop