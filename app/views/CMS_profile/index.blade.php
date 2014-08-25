@extends('layouts.base')

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('js/lightbox.min.js') }}
{{ HTML::style('css/screen.css') }}
{{ HTML::style('css/lightbox.css') }}

@section('main')
<div class="panel panel-default">
	<div class="panel-heading">Profiel pagina</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel-body">
				<a class="example-image-link" href="uploads/{{ $user->profile_image}}" data-lightbox="example-1">
					<img class="img-thumbnail" src="uploads/{{ $user->profile_image}}" alt="image-1" width="250"/>
					<span class="glyphicon glyphicon-fullscreen" style="color:white;position:absolute;margin-top:25px;margin-left:-25px;"></span>
				</a>
				
				<p class="bg-primary text-center" style="max-width: 250px;">{{ $user->first_name . " " . $user->last_name }}</p>
				<button type="button" class="btn btn-block btn-info" style="max-width: 250px;" id="changeImg" data-toggle="modal" data-target="#myModal">Wijzig afbeelding</button>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td><b>Voornaam</b></td><td>{{ $user->first_name }}</td>
					</tr>
					<tr>
						<td><b>Achternaam</b></td><td>{{ $user->last_name }}</td>
					</tr>
					<tr>
						<td><b>E-mail</b></td><td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td><b>Voor het laatst ingelogd</b></td><td>{{ $user->last_login }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Wijzig uw profielafbeelding</h4>
			</div>
			{{ Form::open(array('route' => 'profile.changeImage.post', 'role' => 'form', 'files'=>true)) }}
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<input type="file" name="file" id="file" onchange="readURL(this);">
					</div>
					<div class="col-md-4">
						<img class="img-thumbnail" src="uploads/{{$user->profile_image}}" alt="image-1" width="250" id="previewImage"/>
						</br></br>
					</div>
				</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#previewImage').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@stop