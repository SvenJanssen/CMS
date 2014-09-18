<html>
	{{ HTML::style('/assets/bootstrap.css') }}
	{{ HTML::style('/assets/login.css') }}
	{{ HTML::style('/assets/bootstrap.min.css') }}
	{{ HTML::script('/assets/jquery.min.js') }}
	{{ HTML::script('/assets/bootstrap.js') }}
	{{ HTML::script('/assets/jquery-ajax-form.js') }}
    <body>
		@yield('main')
		@show
		<div class="footer navbar-fixed-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						{{ Form::Open(array('route' => 'sendEmail.post', 'role' => 'form', 'id' => 'form-email')) }}
							{{ Form::label('email', 'Vragen? Laat uw e-mail achter!') }}
							{{ Form::text('email', Input::old('email'), array('placeholder' => 'Vul uw e-mailadres in...','class' => 'form-control')) }}
							{{ Form::submit('E-mail me terug', array('class' => 'btn btn-warning btn-block')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</footer>
		<script>
			// $(document).ready(function(){
				// $('#form-email').ajaxForm({
					// success: function(res){
						// console.log(res);
					// }
				// });
			// });
		</script>
	</body>
</html>

